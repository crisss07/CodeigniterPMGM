<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		 // load Session Library
        $this->load->library('session');
         
        // load url helper
        $this->load->helper('url');
		$this->load->model("usuario_model");
		$this->load->model("logacceso_model");
	}

	public function index()
	{
		
		if($this->session->userdata("login"))
		{	
			redirect(base_url()."Predios");
		}
		else{
			$this->load->view('login/login');	
		}
		
	}

	public function prueba()
	{
		//var_dump('hola');
		$ejemplo = $this->db->query("select * from credencial")->result();
		foreach ($ejemplo as $eje) {
			print_r($eje->rol_id."<br>");
			print_r($eje->usuario."<br>");
			print_r($eje->contrasenia."<br>");
			print_r($eje->token."<br>");
		}
	}

	public function login()
	{	
		//var_dump("hola");
		
		$usuario = $this->input->post("usuario");
		$contrasena = $this->input->post("contrasenia");
		$contrasenia = md5($contrasena);
		
		$res = $this->usuario_model->login($usuario, $contrasenia);
		if (!$res) {
			redirect(base_url());
		}
		else{

			$iddd = $this->db->query("SELECT pf.*, p.*
									FROM persona_perfil pf, perfil p
									WHERE pf.persona_perfil_id = '$res->persona_perfil_id'
									AND p.perfil_id = pf.perfil_id
									AND p.perfil = 'Beneficiario'")->row();

			if ($iddd) {
					$data = array(
					'persona_perfil_id' => $res->persona_perfil_id,
					'rol_id' => $res->rol_id,
					'usuario' => $res->usuario,
					'login' => TRUE
				);
				$this->session->set_userdata($data);
				redirect(base_url()."Oficina_virtual/index");
			}
			else
			{

				$data = array(
				'persona_perfil_id' => $res->persona_perfil_id,
				'rol_id' => $res->rol_id,
				'usuario' => $res->usuario,
				'login' => TRUE
			);
			$this->session->set_userdata($data);
			redirect(base_url()."Predios/index");

			}
			
		
		}
		

	}


	public function logout()
	{
		$this->session->sess_destroy();
		$ultimo = $this->db->query("SELECT MAX(logacceso_id) FROM logacceso")->row();
		$logacceso_id = $ultimo->max;
		$acceso_fin = date("Y-m-d H:i:s");
		$actualizar = $this->logacceso_model->fecha_salida($logacceso_id, $acceso_fin);
		redirect(base_url());
	}

	public function algo()
	{
		$this->logacceso_model->inactividad();
	}

}

