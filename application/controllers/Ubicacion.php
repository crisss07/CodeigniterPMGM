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
            redirect(base_url() . "Edificacion/nuevo");
        } else {
            redirect(base_url());
        }
    }
    public function mostrar($predio_id = null, $msj=null)
    {
        if ($this->session->userdata("login")) {
           
            //$this->load->view('admin/header');
            //$this->load->view('admin/menu');
            $this->load->view('maps/Ubicacion');
            //$this->load->view('bloque/validar');        
            //$this->load->view('bloque/jtables');
            
        } else {
            redirect(base_url());
        }
    }

}
     