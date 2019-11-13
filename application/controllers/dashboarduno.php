<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboarduno extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("Dashboard_model");
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

    public function datos()
    {
        if ($this->session->userdata("login")) {
            $data['data_personas'] = $this->Dashboard_model->get_datospersona();
            $data['data_tramite_ini'] = $this->Dashboard_model->get_datotramite();
            $data['data_tramite_fin'] = $this->Dashboard_model->get_datotramite_concluido();
            $data['data_predio_reg'] = $this->Dashboard_model->get_data_predios();

            for ($x = 1; $x <= 12; $x++) {
                $dato = $this->Dashboard_model->get_tramite_mes($x);
                $rows[]=$dato->mes;               
            }
            //var_dump(json_encode($rows));
            //exit();


            $array = array(65,68,75,81,95,105,45,22,58,56,89,36);


            $data['data_tramites'] = $res = json_encode($rows);


            $this->load->view('dashboard/header');
            $this->load->view('dashboard/menu');
            $this->load->view('dashboard/dashboard_test',$data);
            //$this->load->view('dashboard/validar');         
            //$this->load->view('dashboard/jtables');
        } else {
            redirect(base_url());
        }
    }



}
