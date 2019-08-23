<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Oficina_virtual extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("cargo_model");
        $this->load->library('session');
        $this->load->helper('url_helper');
        $this->load->helper('vayes_helper');
        $this->load->model("rol_model");
    }

    public function index()
    {
        if ($this->session->userdata("login")) {
        	$this->load->view('oficina/header');
            $this->load->view('oficina/menu');
            $this->load->view('oficina/inicio');
            $this->load->view('oficina/footer');
           
        } else {
            redirect(base_url());
        }
    }

    public function noticias()
    {
        if ($this->session->userdata("login")) {
           
            $this->load->view('oficina/header');
            $this->load->view('oficina/menu');
            $this->load->view('oficina/noticias');
            $this->load->view('oficina/footer');
           
        } else {
            redirect(base_url());
        }
    }



    public function requisitos(){
        if ($this->session->userdata("login")) {
            $datos['tramites'] = $this->db->query("SELECT tipo_tramite_id, tramite FROM tramite.tipo_tramite WHERE activo=1 ORDER BY tramite")->result();
            $this->load->view('oficina/header');
            $this->load->view('oficina/menu');
            $this->load->view('oficina/requisitos', $datos);
            $this->load->view('oficina/footer');

        } else {
            redirect(base_url());
        }

    }

    public function nuevo()
    {
        if ($this->session->userdata("login")) {    
            $datos['tramites'] = $this->db->query("SELECT tipo_tramite_id, tramite FROM tramite.tipo_tramite WHERE activo=1 ORDER BY tramite")->result();        
            $this->load->view('oficina/header');
            $this->load->view('oficina/menu');
            $this->load->view('oficina/nuevo', $datos);
            $this->load->view('oficina/footer');
        } else {
            redirect(base_url());
        }
    }

    public function seguimiento()
    {
        if ($this->session->userdata("login")) {
           
            $this->load->view('oficina/header');
            $this->load->view('oficina/menu', );
            $this->load->view('oficina/seguimiento');
            $this->load->view('oficina/footer');
           
        } else {
            redirect(base_url());
        }
    }

    public function inspecciones()
    {
        if ($this->session->userdata("login")) {
            
            $this->load->view('oficina/header');
            $this->load->view('oficina/menu');
            $this->load->view('oficina/inspecciones');
            $this->load->view('oficina/footer');
           
        } else {
            redirect(base_url());
        }
    }
    
}
