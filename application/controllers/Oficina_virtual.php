<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Oficina_virtual extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model("Cargo_model");
        $this->load->library('session');
        $this->load->helper('url_helper');
        $this->load->helper('vayes_helper');
        $this->load->model("Rol_model");
    }

    public function index(){
        if ($this->session->userdata("login")) {
            $id = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $dato = $resi->persona_id;
            $data['nombre']=$this->db->query("SELECT nombres||' '||paterno||' '||materno nombre FROM public.persona WHERE persona_id='$dato'")->row();
        	$data['logueado']= "si";

        }else{
            $data['logueado']= "no";
        }
        $this->load->view('oficina/header', $data);
        $this->load->view('oficina/inicio');
        $this->load->view('oficina/footer');
    }

    public function noticias(){
        if ($this->session->userdata("login")) {
            $this->load->view('oficina/header');
            
            $this->load->view('oficina/noticias');
            $this->load->view('oficina/footer');
        }else{
            redirect(base_url());
        }
    }

    public function requisitos(){
        if ($this->session->userdata("login")) {
            $id = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $dato = $resi->persona_id;
            $data['nombre']=$this->db->query("SELECT nombres||' '||paterno||' '||materno nombre FROM public.persona WHERE persona_id='$dato'")->row();
            $data['logueado']= "si";
        }else{
            $data['logueado']= "no";
        }
        $datos['tramites'] = $this->db->query("SELECT * FROM tramite.tipo_tramite WHERE activo=1 ORDER BY tramite")->result();
        $this->load->view('oficina/header', $data);
        $this->load->view('oficina/requisitos', $datos);
        $this->load->view('oficina/footer');
    }

    public function servicios(){
        if ($this->session->userdata("login")) {
            $id = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $dato = $resi->persona_id;
            $data['nombre']=$this->db->query("SELECT nombres||' '||paterno||' '||materno nombre FROM public.persona WHERE persona_id='$dato'")->row();
            $data['logueado']= "si";
        }else{
            $data['logueado']= "no";
        }
        $this->load->view('oficina/header', $data);
        $this->load->view('oficina/servicios');
        $this->load->view('oficina/footer');
    }

    public function nuevo(){
        if ($this->session->userdata("login")) {   
            $id = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $dato = $resi->persona_id;
            $data['nombre']=$this->db->query("SELECT nombres||' '||paterno||' '||materno nombre FROM public.persona WHERE persona_id='$dato'")->row();
            $data['logueado']= "si"; 
            $datos['tramites'] = $this->db->query("SELECT tipo_tramite_id, tramite FROM tramite.tipo_tramite WHERE activo=1 ORDER BY tramite")->result();
            $this->load->view('oficina/header', $data);
            $this->load->view('oficina/nuevo', $datos);
            $this->load->view('oficina/footer');
        }else{
            redirect(base_url());
        }
    }

    public function seguimiento(){
        if ($this->session->userdata("login")) {  
            $id = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $dato = $resi->persona_id;
            $data['nombre']=$this->db->query("SELECT nombres||' '||paterno||' '||materno nombre FROM public.persona WHERE persona_id='$dato'")->row();
            $data['logueado']= "si";
        }else{
            $data['logueado']= "no";
        }
            $this->load->view('oficina/header', $data);
            $this->load->view('oficina/seguimiento');
            $this->load->view('oficina/footer');
    }

    public function inspecciones(){
        if ($this->session->userdata("login")) {
            $this->load->view('oficina/header');
            
            $this->load->view('oficina/inspecciones');
            $this->load->view('oficina/footer');
        }else{
            redirect(base_url());
        }
    }     

    public function certificado(){
        date_default_timezone_set('America/La_Paz');
        set_time_limit(0);
        ini_set('memory_limit','1024M');

        $data['data_bloques'] = $this->db->query("SELECT b.*,d.descripcion,u.descripcion as uso FROM catastro.bloque b LEFT JOIN catastro.destino_bloque d ON b.destino_bloque_id=d.destino_bloque_id LEFT JOIN catastro.uso_bloque u ON b.uso_bloque_id=u.uso_bloque_id WHERE predio_id=50 ORDER BY b.nro_bloque")->result(); 
        $data['data_grupos'] = $this->db->query("SELECT * FROM catastro.bloque_grupo_mat where activo=1")->result_array(); 
        $data['num_grupos'] = $this->db->query("SELECT count(grupo_mat_id) as total from catastro.bloque_grupo_mat where activo=1 ")->row();
        $data['num_bloques'] = $this->db->query("SELECT count(grupo_mat_id) as total from catastro.bloque_mat_item where activo=1  ")->row();

        // Define key-value array
        $days_dias = array(
            'Monday'=>'Lunes',
            'Tuesday'=>'Martes',
            'Wednesday'=>'Miércoles',
            'Thursday'=>'Jueves',
            'Friday'=>'Viernes',
            'Saturday'=>'Sábado',
            'Sunday'=>'Domingo'
        );
        $mes=date('F');
        if ($mes == "January") $mes = "Enero";
        if ($mes == "February") $mes = "Febrero";
        if ($mes == "March") $mes = "Marzo";
        if ($mes == "April") $mes = "Abril";
        if ($mes == "May") $mes = "Mayo";
        if ($mes == "June") $mes = "Junio";
        if ($mes == "July") $mes = "Julio";
        if ($mes == "August") $mes = "Agosto";
        if ($mes == "September") $mes = "Setiembre";
        if ($mes == "October") $mes = "Octubre";
        if ($mes == "November") $mes = "Noviembre";
        if ($mes == "December") $mes = "Diciembre";        
        $data['dia']=date('d');
        $data['dia_l']=$days_dias[date('l')];
        $data['mes']=  date('m');
        $data['mes_l']= $mes;
        $data['anio']=date('Y');         
        $dia =  $days_dias[date('l')];

        $key = "";
        $caracteres = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        //aquí podemos incluir incluso caracteres especiales pero cuidado con las ‘ y “ y algunos otros
        $length = 5;
        $max = strlen($caracteres) - 1;
        for ($i=0;$i<$length;$i++) {
            $key .= substr($caracteres, rand(0, $max), 1);
        }
        
        $this->load->library('ciqrcode');
        $params['data'] = "Codigo catastral: 00-34-125-024-0-00-000-000   Propietario: HERNAN YUCRA MASIAS localhost/CodeigniterPMGM/oficina_virtual/certificacion/".$key ;
        $params['level'] = 'A';
        $params['size'] = 6;

        //decimos el directorio a guardar el codigo qr, en este 
        //caso una carpeta en la raíz llamada qr_code
        $params['savename'] = FCPATH . "public/assets/images/oficina/codigos/qr_2.png";
        //generamos el código qr
        $this->ciqrcode->generate($params);

        $data['img'] = "qr_2.png";

        $this->load->view('oficina/certificado',$data);
        $html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->set_option('isRemoteEnabled', TRUE);  
        $this->dompdf->setPaper('letter', 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream("certificado.pdf", array("Attachment"=>0));
    } 

    
    public function certificacion($clave=NULL){
        if ($this->session->userdata("login")) {
            $datos['tramites'] = $this->db->query("SELECT tipo_tramite_id, tramite FROM tramite.tipo_tramite WHERE activo=1 ORDER BY tramite")->result();
            $this->load->view('oficina/header');
            
            $this->load->view('oficina/certificacion');
            //$this->load->view('oficina/footer');
        }else{
            redirect(base_url());
        }
    }

}