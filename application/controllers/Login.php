


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
		$this->load->model("Archivos_Model");
		$this->load->model("Auditoria_Model");
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
		// enviar URL a la AGETIC
		//if ($this->input->post("usuario")){
			/*$url_receptor = "https://<base-url-proveedor-identidad>/auth?";
			$state     = "54f5sda4fa6s5d4f65a";
			$client_id = "1452";
			$url = $this->url_emisor($url_receptor, $state, $client_id);
			echo ($url);
			$CURL = curl_init($url);
			curl_setopt($CURL, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($CURL, CURLOPT_HTTPHEADER, array(
				'Content-type: application/json'
			));
			$dataAGETIC        = curl_exec($CURL);
			$informacionAGETIC = curl_getinfo($CURL);
			CURl_close($CURL); */
		//}

		
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

	public function token_sistema ($longitud){
		$key 	 =  '';
 		$pattern =  '1234567890abcdefghijklmnopqrstuvwxyz';
 		$max     =  strlen($pattern)-1;
 		for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
 		return $key;
	}

	public function verificar_usuario_cYq ($cedula_identidad){
		$verificar_usuario = $this->usuario_model->verificar_persona_sistema($cedula_identidad);
	}
	
	public function url_emisor($url_receptor, $client_id, $state){
		$response_type = "none";
		$redirecct_uri = "http://localhost/CodeigniterPMGM/login/login";
		$nonce          = $this->token_sistema(30);
		$scope         = "openid%20profile";
		$result 	   = $url_receptor."response_type=".$response_type."&client_id=".$client_id."&state=".$state."&nonce=".$nonce."&redirect_
		uri=".$redirecct_uri."&scope=".$scope;
		return $result;
	}

}
