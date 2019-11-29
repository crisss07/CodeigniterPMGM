<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AllBloque extends CI_Controller {

	public function __construct() {
        parent:: __construct();
        $this->load->model("AllBloque_model");
    }
	
	public function index()	
	{	
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $data['result'] = $this->AllBloque_model->getAllData(); 
        $this->load->view('AllBloqueView',$data);
        $this->load->view('admin/footer');
        $this->load->view('admin/wizard_js');
	}
}
