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
            $anio=date('Y');
            $mes=date('m');
            $dia=date('d');

            //tramites iniciados por mes
            for ($x = 1; $x <= 12; $x++) {
                $dato = $this->Dashboard_model->get_tramite_mes($x,$anio);
                $rows[]=$dato->mes;               
            }
            
            //predios registrados por mes
            for ($x = 1; $x <= 12; $x++) {
                $dato = $this->Dashboard_model->get_predios_mes($x,$anio);
                $predios[]=$dato->mes;               
            }

            //valida el mes anterior
            if($dia>0 and $dia<32){
                $mes=$mes-1;

            }

            //inspecciones concluidas por mes
            for ($x = 1; $x <= 12; $x++) {
                $dato = $this->Dashboard_model->get_inspeccion_mes($x,$anio);
                $inspecciones[]=$dato->total_ins;               
            }
           

            

            $array = array(65,68,75,81,95,105,45,22,58,56,89,36);

            $data['data_tram_ini_ant'] = $this->Dashboard_model->get_tramite_mes($mes,$anio);
            $data['data_tram_fin_ant'] = $this->Dashboard_model->get_tramite_concluido_mes($mes);

              

            $data['data_tramites'] = $res = json_encode($rows);
            $data['data_predios'] = $res = json_encode($predios);

            $data['data_inspecciones'] = $res = json_encode($inspecciones);
              

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
