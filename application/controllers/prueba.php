<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prueba extends CI_Controller {

	public function __construct() {
        parent:: __construct();
        $this->load->model("AllBloque_model");
        //Cargamos la librería JSON-PHP
       
        $this->load->model("inspecciones/inspeccion_model");
        $this->load->model("rol_model");
    }

    public function principal()    
    {   
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/principal');
        $this->load->view('admin/footer');
       
    }
	
	public function prueba()	
	{	
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/index');
        $this->load->view('admin/footer');
       
	}

    public function index()    
    {   
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/proceso');
        $this->load->view('admin/footer');
       
    }

    public function index1()    
    {   
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/proceso');
        $this->load->view('admin/footer');
       
    }

    public function index2()    
    {   
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/proceso');
        $this->load->view('admin/footer');
       
    }

    public function index3()    
    {   
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/proceso');
        $this->load->view('admin/footer');
       
    }

    public function index4()    
    {   
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/proceso');
        $this->load->view('admin/footer');
       
    }

    public function index5()    
    {   
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/proceso');
        $this->load->view('admin/footer');
       
    }

    public function index6()    
    {   
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/proceso');
        $this->load->view('admin/footer');
       
    }

    public function menu()    
    {  
        $this->load->view('admin/header');
        $this->load->view('admin/menuprueba');
        $this->load->view('admin/proceso');
        $this->load->view('admin/footer');
       
    }

     public function tramite()    
    {  
        $this->load->view('admin/header');
        $this->load->view('admin/menuprueba');
        $this->load->view('tramites/tramite');
        $this->load->view('admin/footer');
       
    }

     public function sin_permisos()    
    {   
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/proceso1');
        $this->load->view('admin/footer');
       
    }

    public function probar()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/prueba_menu');
        $this->load->view('admin/footer');
    }

     public function prueba5()
    {
        $this->load->view('admin/header');
        $this->load->view('usuarios/menu_prueba');
        $this->load->view('admin/footer');
    }

    public function prueba6()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/principal');
        $this->load->view('admin/footer');
    }

    public function asignacion()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('inspecciones/asignacion');
        $this->load->view('admin/footer');
    }

     public function calendario()
    {
        $id = $this->session->userdata("persona_perfil_id");
        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
        $usu_creacion = $resi->persona_id;

        /*$lista = $this->db->query("SELECT ins.tipo_asignacion_id as title, ins.inicio as start, ins.fin as end  
                                    FROM inspeccion.asignacion ins, public.persona_perfil pub, public.perfil per
                                    WHERE ins.persona_id = $usu_creacion 
                                    AND pub.persona_id = $usu_creacion
                                    AND pub.perfil_id = per.perfil_id
                                    AND per.perfil = 'Inspector'
                                    ORDER BY inicio ASC")->result();*/
                                    $lista = $this->db->query("	SELECT t.cite as title,a.inicio as start,a.fin as end FROM inspeccion.asignacion a
                                    LEFT JOIN tramite.tramite t
                                    on a.tramite_id=t.tramite_id                                    
                                    WHERE a.persona_id=$usu_creacion")->result();
        
         echo json_encode($lista);

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

    public function lis1(){//listado de asignaciones pendientes no concluidas
        if($this->session->userdata("login")){
        $lista['verifica'] = $this->rol_model->verifica();
        $lista['asignacion'] = $this->inspeccion_model->index();
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('inspecciones/listado', $lista);
        $this->load->view('admin/footer');
        }
        else{
            redirect(base_url());
        }
    }

}