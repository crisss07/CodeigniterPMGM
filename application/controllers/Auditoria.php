<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auditoria extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->model("AllBloque_model");
        //Cargamos la librería JSON-PHP
       
        $this->load->model("inspecciones/Inspeccion_model");
        $this->load->model("Rol_model");
        $this->load->model("Auditoria_Model");
    }

    public function index()    
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

        //$lista = $this->Auditoria_Model->auditoria_insertar(json_encode($dato1), $tabla);
        //$lista = $this->Auditoria_Model->auditoria_modificar($data1, $data2, $tabla);
        //$lista = $this->Auditoria_Model->auditoria_eliminar($data1, $tabla);
    }


    

}