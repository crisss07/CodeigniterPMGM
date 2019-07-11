<?php
class Derivaciones extends CI_Controller    
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('tipopredio_model');
        $this->load->model("logacceso_model");
        $this->load->model("persona_model");
        $this->load->model("derivaciones_model");
        $this->load->model("Ddrr_model");
        $this->load->helper('url_helper');
        $this->load->helper('vayes_helper');
        $this->load->library('cart');
        $this->load->model("rol_model");
        $this->load->library('email');
    }

    public function principal()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('derivaciones/nuevo');
        // $this->load->view('predios/registra_predio', $data);
        $this->load->view('admin/footer');
        $this->load->view('predios/registra_js');
        // echo 'Holas desde derivaciones';
    }

    public function nuevo($idTramite = null)
    {
        // $idTramite = 13;
        $data['idTramite']=$idTramite;
        // vdebug($idTramite, true, FALSE, TRUE);

        if($this->session->userdata("login")){

			//usuario que esta registrando
			$id = $this->session->userdata("persona_perfil_id");
	        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $usu_creacion = $resi->persona_id;
            $organigrama_persona = $this->db->get_where('tramite.organigrama_persona', array('persona_id'=>$usu_creacion, 'activo'=>1))->result_array();
            $data['organigrama_id']=$organigrama_persona[0]['organigrama_id'];
            // vdebug($data['organigrama_id'], true, false, true);

            $data['tramite'] = $this->db->get_where('tramite.tramite', array('tramite_id' => $idTramite))->row();
            $data['personas'] = $this->derivaciones_model->personal($resi->persona_id);

            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('derivaciones/nuevo', $data);
            $this->load->view('admin/footer');
            $this->load->view('predios/registra_js');
        }
    }

    public function guarda(){

        if($this->input->post('boton')=='cite'){

            $cite = $this->db->get_where('tramite.cite', array('organigrama_id'=>$this->input->post('organigrama_id')))->result_array();
            $correlativo = $cite[0]['correlativo']+1;
            $this->db->where('cite_id', $cite[0]['cite_id']);
            $this->db->update('tramite.cite', array('correlativo'=>$correlativo));
            // $this->db->select_max('correlativo');
            // $this->db->where('organigrama_id', $this->input->post('organigrama_id'));
            
            $cite_generado = $cite[0]['tipo'].'/'.$cite[0]['gestion'].'-0000'.$correlativo;
            // vdebug($cite_generado, true, false, true);
            /*$max_correlativo = $this->db->get('tramite.cite')->result_array();
            if ($max_correlativo[0]['correlativo'] == NULL) {
                $correlativo = 1;
            } else {
                $correlativo = $max_correlativo[0]['correlativo']+1;
                // echo 'no';
            }
            $data = array(
                'organigrama_id'=>$this->input->post('organigrama_id'),
                'tipo'=>'Nota Interna',
                'gestion'=>'2019',
                'correlativo'=>$correlativo,
                'activo'=>1,
            );
            $this->db->insert('tramite.cite', $data);
            $id_cite = $this->db->insert_id();*/
        }else{
            $cite_generado = NULL;
        }
        
        $perfil_persona = $this->session->userdata('persona_perfil_id');
        $datos_persona_perfil = $this->db->get_where('persona_perfil', array('persona_perfil_id'=>$perfil_persona))->result_array();
        $idTramite = $this->input->post('idTramite');
        
        $anio= date("Y");
        $datos = $this->db->query('SELECT max(adjunto) FROM tramite.derivacion')->row();
        if($datos->max != NULL){
            $cadena = substr($datos->max, 13)+1;
            $adjunto='ARC-DER/'.$anio.'-'.$cadena;
        }else{
            $adjunto="ARC-DER/2019-1";
        }
        
        $this->db->select_max('derivacion_id');
        $this->db->where('tramite_id', $idTramite);
        $query = $this->db->get('tramite.derivacion')->result_array();
        if ($query[0]['derivacion_id'] != NULL) {
            $estado = 1;
            $this->db->where('derivacion_id', $query[0]['derivacion_id']);
            $this->db->update('tramite.derivacion', array('estado'=>0));
        } else {
            $estado = 1;
        }

        $datos_organigrama_persona = $this->db->get_where(
            'tramite.organigrama_persona', 
            array(
                'persona_id'=>$datos_persona_perfil[0]['persona_id'],
                'activo'=>1
            ))->result_array();

        $data = array(
            'tramite_id'=>$this->input->post('idTramite'),
            // 'organigrama_persona_id'=>$datos_organigrama_persona[0]['organigrama_persona_id'],
            'fuente'=>$datos_organigrama_persona[0]['organigrama_persona_id'],
            'destino'=>$this->input->post('destino'),
            'estado'=>$estado,
            'cite'=>$cite_generado,
            'adjunto' => $adjunto,
            'fecha'=>date("Y-m-d H:i:s"),
            'descripcion'=>$this->input->post('descripcion'),
        );
        $this->db->insert('tramite.derivacion', $data);
            $config['upload_path']      = './public/assets/images/tramites';
            $config['file_name']        = $adjunto;
            $config['allowed_types']    = 'pdf';
            $config['overwrite']        = TRUE;
            $config['max_size']         = 2048;

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('adjunto')){
            $error = array('error' => $this->upload->display_errors());
            redirect(base_url());
            //$this->load->view('crud/organigrama', $error);
        }else{
            $data = array('upload_data' => $this->upload->data());
            //redirect('Derivaciones/nuevo/'.$idTramite);
            redirect(base_url().'derivaciones/listado');
        }    
    }

    public function listado(){                                                                                              
        // $this->db->order_by('tramite.derivacion.fec_creacion', 'DESC');
        $perfil_persona = $this->session->userdata('persona_perfil_id');
        $datos_persona_perfil = $this->db->get_where('persona_perfil', array('persona_perfil_id'=>$perfil_persona))->result_array();
        // vdebug($datos_persona_perfil, false, false, true);
        $datos_organigrama_persona = $this->db->get_where(
            'tramite.organigrama_persona', 
            array(
                'persona_id'=>$datos_persona_perfil[0]['persona_id'],
                'activo'=>1
            ))->result_array();

        // vdebug($datos_organigrama_persona, false, false, true);
        $fuente = $datos_organigrama_persona[0]['organigrama_persona_id'];
        // vdebug($fuente, false, false, true);
        $this->db->where('tramite.derivacion.destino', $fuente);
        $this->db->where('tramite.derivacion.estado', 1);
        $this->db->order_by('tramite.derivacion.derivacion_id', 'DESC');
        $query = $this->db->get('tramite.derivacion');
        // vdebug($query, true, false, true);

        $data['mis_tramites'] = $query->result();
        $data['verifica'] = $this->rol_model->verifica();
        //var_dump($usu_creacion);

        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('derivaciones/listado', $data);
        $this->load->view('admin/footer');
        $this->load->view('predios/index_js');

    }

    public function ver($idTramite = null){
        $data['flujo'] = $this->db->get_where('tramite.derivacion', array('tramite_id'=>$idTramite))->result_array();

        //usuario que esta registrando
        $id = $this->session->userdata("persona_perfil_id");
        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
        $usu_creacion = $resi->persona_id;

        $data['tramite'] = $this->db->get_where('tramite.tramite', array('tramite_id' => $idTramite))->row();

        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('derivaciones/ver', $data);
        $this->load->view('admin/footer');
        $this->load->view('predios/index_js');
    }

    public function editar(){
        if($this->session->userdata("login")){
            $id = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $usu_creacion = $resi->persona_id;
            $idTramite = $this->input->post('id_tramite');
            $data = array(
                'referencia'=>$this->input->post('referencia'),
                'remitente'=>$this->input->post('remitente'),
                'procedencia'=>$this->input->post('procedencia'),
                'fojas'=>$this->input->post('fojas'),
                'anexos'=>$this->input->post('anexos'),
                'usu_modificacion' => $usu_creacion,
                'fec_modificacion'=>date("Y-m-d H:i:s"),
            );
            $this->db->where('tramite_id', $idTramite);
            $this->db->update('tramite.tramite', $data);
            redirect(base_url().'derivaciones/listado');
        }
        else{
            redirect(base_url());
        }
    }

    public function archivar($idTramite = null){
        if($this->session->userdata("login")){
            $id = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $usu_creacion = $resi->persona_id;
            $data = array(
                'estado' => 2,
                'usu_modificacion' => $usu_creacion,
                'fec_modificacion' => date("Y-m-d H:i:s")
                
            );
            $this->db->where('tramite_id', $idTramite);
            $this->db->where('estado', 1);
            $this->db->update('tramite.derivacion', $data);
            redirect(base_url().'derivaciones/listado');
        }
        else{
            redirect(base_url());
        }
    }

}
?>