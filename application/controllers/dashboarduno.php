<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboarduno extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("Edificacion_model");
        $this->load->library('session');
        $this->load->model('tipopredio_model');
        //$this->load->model("logacceso_model");
        $this->load->helper('url_helper');
        $this->load->helper('vayes_helper');
        $this->load->model("rol_model");
        $this->load->library('pdf');
    }
    public function index()
    {
        if ($this->session->userdata("login")) {
         
            $this->load->view('dashboard/header');
            $this->load->view('dashboard/menu');
            $this->load->view('dashboard/dashboard');
            $this->load->view('dashboard/validar');//footer
            //$this->load->view('admin/footer');
            $this->load->view('dashboard/jtables');
        } else {
            redirect(base_url());
        }
    }
}
