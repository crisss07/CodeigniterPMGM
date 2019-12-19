<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cargo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Cargo_model");
        $this->load->library('session');
        $this->load->helper('url_helper');
        $this->load->helper('vayes_helper');
        $this->load->model("Rol_model");
        $this->load->model("Auditoria_Model");
    }

    public function index()
    {
        if ($this->session->userdata("login")) {
            redirect(base_url() . "Cargo/nuevo");
        } else {
            redirect(base_url());
        }
    }
    public function nuevo($cod_catastral = null)
    {
        if ($this->session->userdata("login")) {
            $data['data_cargo'] = $this->Cargo_model->get_data();
            $data['verifica'] = $this->Rol_model->verifica();
            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('crud/cargo', $data);
            $this->load->view('admin/footer');
        } else {
            redirect(base_url());
        }
    }
    public function create()
    {
        if ($this->session->userdata("login")) {
            $id = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $usu_creacion = $resi->persona_id;
        
            $data = array(

            'descripcion' => $this->input->post('descripcion'), //input
            'activo' => '1',
            'usu_creacion' => $usu_creacion,
        );
            $this->db->insert('tramite.cargo', $data);
            
            //AUDITORIA
            $tabla = 'tramite.cargo';
            $ultimoId = $this->db->query("SELECT MAX(cargo_id) as max FROM tramite.cargo")->row();
            $data1 = $this->db->get_where('tramite.cargo', array('cargo_id' => $ultimoId->max))->row();
            $this->Auditoria_Model->auditoria_insertar(json_encode($data1), $tabla);

            redirect(base_url() . 'cargo/nuevo/');
        } else {
            redirect(base_url());
        }
    }
    public function update($id = null)
    {
        if ($this->session->userdata("login")) {
            $id = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $usu_modificacion = $resi->persona_id;
            $fec_modificacion = date("Y-m-d H:i:s");

            $id_cargo = $this->input->post('cargo_id');
            $data1 = $this->db->get_where('tramite.cargo', array('cargo_id' => $id_cargo))->row();

            $data = array(
                'descripcion' => $this->input->post('descripcion_e'), //input
                'usu_modificacion' => $usu_modificacion, //input
                'fec_modificacion' => $fec_modificacion, //input
            );
            
            $this->db->where('cargo_id', $id_cargo);
            $this->db->update('tramite.cargo', $data);

            //AUDITORIA
            $tabla = 'tramite.cargo';
            $data2 = $this->db->get_where('tramite.cargo', array('cargo_id' => $id_cargo))->row();
            $this->Auditoria_Model->auditoria_modificar(json_encode($data1), json_encode($data2), $tabla);


            redirect(base_url() . 'cargo/nuevo/');
        } else {
            redirect(base_url());
        }
    }
    public function delete($ida = null)
    {
        if ($this->session->userdata("login")) {
            $id = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $usu_eliminacion = $resi->persona_id;
            $fec_eliminacion = date("Y-m-d H:i:s");

            $activo = $this->db->query("SELECT activo from tramite.cargo WHERE cargo_id=$ida");
            foreach ($activo ->result() as $row) {
                $valor=$row->activo;
            }
            $valor = 1-$valor;
            $data = array(
                'activo' => $valor, //input
                'usu_eliminacion' => $usu_eliminacion, //input
                'fec_eliminacion' => $fec_eliminacion, //input
            );
            $this->db->where('cargo_id', $ida);
            $this->db->update('tramite.cargo', $data);

            //AUDITORIA
            $tabla = 'tramite.cargo';
            $data1 = $this->db->get_where('tramite.cargo', array('cargo_id' => $ida))->row();
            $this->Auditoria_Model->auditoria_eliminar(json_encode($data1), $tabla);

            
            redirect(base_url() . 'cargo/nuevo/');
        } else {
            redirect(base_url());
        }
    }
}
