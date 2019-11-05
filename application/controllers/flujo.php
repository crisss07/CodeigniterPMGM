<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Flujo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("flujo_model");
        $this->load->library('session');
        $this->load->helper('url_helper');
        $this->load->helper('vayes_helper');
        $this->load->model("rol_model");
    }

    public function index($cod_catastral = null)
    {
        if ($this->session->userdata("login")) {
			$data['data_flujo'] = $this->flujo_model->get_data();
            $data['data_tramite'] = $this->flujo_model->get_tipotramite();
            $data['data_org'] = $this->flujo_model->get_organigrama();
            $data['verifica'] = $this->rol_model->verifica();
            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('crud/flujo', $data);
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
            'tipo_tramite_id' => $this->input->post('tipo_tramite_id'), //input
            'organigrama_persona_id' => $this->input->post('organigrama_id'), //input
            'orden' => $this->input->post('orden'), //input
            'flujo' => $this->input->post('flujo'), //input        
            'activo' => '1',
            'usu_creacion' => $usu_creacion,
        );
            $this->db->insert('tramite.flujo', $data);
            redirect(base_url() . 'Flujo');
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

            $data = array(				
				'tipo_tramite_id' => $this->input->post('tipo_tramite_id_e'), //input
            'organigrama_persona_id' => $this->input->post('organigrama_id_e'), //input
            'orden' => $this->input->post('orden_e'), //input
            'flujo' => $this->input->post('flujo_e'), //input                    
         
                'usu_modificacion' => $usu_modificacion, //input
                'fec_modificacion' => $fec_modificacion, //input
            );
            $id_flujo=$this->input->post('flujo_id_e');
            $this->db->where('flujo_id', $id_flujo);
            $this->db->update('tramite.flujo', $data);


            redirect(base_url() . 'flujo');
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

            $activo = $this->db->query("SELECT activo from tramite.flujo WHERE flujo_id=$ida");
            foreach ($activo ->result() as $row) {
                $valor=$row->activo;
            }
            $valor=1-$valor;
            $data = array(
                'activo' => $valor, //input
                'usu_eliminacion' => $usu_eliminacion, //input
                'fec_eliminacion' => $fec_eliminacion, //input
            );
            $this->db->where('flujo_id', $ida);
            $this->db->update('tramite.flujo', $data);
            redirect(base_url() . 'flujo');
        } else {
            redirect(base_url());
        }
    }
}
