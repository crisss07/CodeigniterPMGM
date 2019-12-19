<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prueba extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->model("AllBloque_model");
        //Cargamos la librería JSON-PHP
       
        $this->load->model("inspecciones/Inspeccion_model");
        $this->load->model("Rol_model");
        $this->load->model("Auditoria_Model");
    }

    public function auditoria()    
    {   

        $datos = $this->input->post();
        // $this->load->view('admin/header');
        // $this->load->view('admin/menu');
        // $this->load->view('admin/principal');
        // $this->load->view('admin/footer');
        // $dato1 = 'hola mundo desde La Paz'; 
        // $dato2 = 'hola mundo desde Cochabamba';

        $id = $this->db->query("SELECT *
                                FROM persona
                                WHERE ci = '1661111'")->row();
        $data1 = json_encode($id);
        
        $nombres = 'CRISPIN';
        $paterno = 'HERRERA';
        $materno = 'PONGO';
        $ci = '8436245';
        $direccion = 'Avenida Chacaltaya';
        $email = 'r@gmail.com';
        $telefono_fijo = '';
        $telefono_celular = '78784079';
        $fec_nacimiento = '1985-10-25';

        $dato1 = array(
            'nombres' =>$nombres,
            'paterno' =>$paterno,
            'materno' =>$materno,
            'ci' =>$ci,
            'fec_nacimiento' =>$fec_nacimiento,
            'direccion' => $direccion,
            'email' => $email,
            'telefono_fijo' => $telefono_fijo,
            'telefono_celular' => $telefono_celular
            );
        $data2 = json_encode($dato1);
        // $this->db->insert('persona', $array);
        $tabla = 'persona';

        $lista = $this->Auditoria_Model->auditoria_insertar(json_encode($dato1), $tabla);
        //$lista = $this->Auditoria_Model->auditoria_modificar($data1, $data2, $tabla);
        //$lista = $this->Auditoria_Model->auditoria_eliminar($data1, $tabla);
       
        
    }

    public function prueba_ip()    
    {   
        $ci = '9112739';
        $this->db->select('persona.nombres');
        $this->db->from('persona');
        $this->db->join('persona_perfil', 'persona.persona_id = persona_perfil.persona_id');
        $query2 = $this->db->get();
        $valor = $query2->result();

        foreach ($valor as $val) {
            echo $val->nombres;
            echo ',';
        }

        
    }

    public function principal()    
    {   
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/principal');
        $this->load->view('admin/footer');
       
    }

    public function lista_auditoria()    
    {   
        $this->db->select('app_tipo_accion.accion, persona.nombres, persona.paterno, persona.materno, app_auditoria_accion.fecha, app_auditoria_accion.ip, app_auditoria_accion.dato, app_auditoria_accion.entidad');
        $this->db->from('app_auditoria_accion');
        $this->db->join('app_tipo_accion', 'app_auditoria_accion.app_tipo_accion_id = app_tipo_accion.app_tipo_accion_id');
        $this->db->join('persona', 'app_auditoria_accion.persona_id = persona.persona_id');
        $this->db->where('app_auditoria_accion.app_tipo_accion_id', 1);
        $query1 = $this->db->get();
        $valor['agregar'] = $query1->result();

        $this->db->select('app_tipo_accion.accion, persona.nombres, persona.paterno, persona.materno, app_auditoria_accion.fecha, app_auditoria_accion.ip, app_auditoria_accion.dato, app_auditoria_accion.entidad');
        $this->db->from('app_auditoria_accion');
        $this->db->join('app_tipo_accion', 'app_auditoria_accion.app_tipo_accion_id = app_tipo_accion.app_tipo_accion_id');
        $this->db->join('persona', 'app_auditoria_accion.persona_id = persona.persona_id');
        $this->db->where('app_auditoria_accion.app_tipo_accion_id', 2);
        $query2 = $this->db->get();
        $valor['modificar'] = $query2->result();

        $this->db->select('app_tipo_accion.accion, persona.nombres, persona.paterno, persona.materno, app_auditoria_accion.fecha, app_auditoria_accion.ip, app_auditoria_accion.dato, app_auditoria_accion.entidad');
        $this->db->from('app_auditoria_accion');
        $this->db->join('app_tipo_accion', 'app_auditoria_accion.app_tipo_accion_id = app_tipo_accion.app_tipo_accion_id');
        $this->db->join('persona', 'app_auditoria_accion.persona_id = persona.persona_id');
        $this->db->where('app_auditoria_accion.app_tipo_accion_id', 3);
        $query3 = $this->db->get();
        $valor['eliminar'] = $query3->result();

        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('auditoria/principal', $valor);
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
                                    $lista = $this->db->query(" SELECT t.cite as title,a.inicio as start,a.fin as end FROM inspeccion.asignacion a
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
        $lista['verifica'] = $this->Rol_model->verifica();
        $lista['asignacion'] = $this->Inspeccion_model->index();
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