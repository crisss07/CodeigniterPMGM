<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ubicacion extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Edificacion_model");
        $this->load->model("Audit_model");
        $this->load->model("Auditoria_model");
        $this->load->library('session');
        $this->load->model('Tipopredio_model');
        $this->load->model("Logacceso_model");
        $this->load->helper('url_helper');
        $this->load->helper('vayes_helper');
        $this->load->model("Rol_model");
        $this->load->library('pdf');
    }
    public function index()
    {
        if ($this->session->userdata("login")) {
            redirect(base_url() . "Ubicacion/mostrar");
        } else {
            redirect(base_url());
        }
    }
    public function mostrar($predio_id = null, $msj=null)
    {
        if ($this->session->userdata("login")) {

            $query = $this->db->query('SELECT * FROM inspeccion.ubicacion
        ORDER BY mapa_id desc
LIMIT 1 ')->row();           
            $data['coordinates']=$query;
            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('maps/Ubicacion',$data);
            $this->load->view('admin/footer');        
            
            
        } else {
            redirect(base_url());
        }
    }

    public function guardar()
    {
        if ($this->session->userdata("login")) {
           
            $latitud=$this->input->post('latitud');
            $longitud=$this->input->post('longitud');
           


            $data = array(
                //'codcatas' => $this->input->post('cod_catastral'), //input
                'latitud' => $this->input->post('latitud'), //input
                'longitud' => $this->input->post('longitud'), //crear         
            );
            
            $this->db->insert('inspeccion.ubicacion', $data);
            redirect(base_url()."Ubicacion");            
        } else {
            redirect(base_url()."Ubicacion");
    }
}

}
     