<?php
class Predios extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        // $this->load->model('news_model');
        $this->load->helper('url_helper');
        $this->load->helper('vayes_helper');
    }

	public function index(){
		// echo 'holas desde el controladora';
		// $crt = 'Holas';
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('admin/contenidos');
		$this->load->view('admin/footer');
		// $this->load->view('header');
		// $this->load->view('menu');
		// $this->load->view('contenido');
		// $this->load->view('footer');
		// $this->load->view('complementos');
	}

	public function nuevo(){
		// $data = 'Demo';

/*		$data['todo_list'] = array('Clean House', 'Call Mom', 'Run Errands');
		$data['title'] = "My Real Title";
		$data['heading'] = "My Real Heading";
*/

		$data['hola'] = "Mi cuate es un Pillin";
		$con = $this->db->get('catastro.tipo_predio');
		// log_message('debug', print_r($con,TRUE));
		// vdebug($con);
		// $this->load->model('Tipopredio');
		$tipos_predios = $this->db->query('SELECT * FROM catastro.tipo_predio');
		$tp = $tipos_predios->result();
		vdebug($tipos_predios);
		die();
		foreach ($tp as $t) {
			echo $t->descripcion. "<br />";
		}
		// print_r($tipos_predios);die;
		echo $tipos_predios; die;

		
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('predios/nuevo', $data);
		$this->load->view('admin/footer');
		$this->load->view('admin/wizard_js');
	}

}