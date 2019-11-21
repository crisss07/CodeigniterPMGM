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
			$datos['direccion'] = $url_AGETIC = $this->url_emisor(); 
			$this->load->view('login/login', $datos);	
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
			print_r($eje->token."<>");
		}
	}

	public function login()
	{	
	//****************************************************** Recibir el code de la URL que envia la AGETIC PASO (2) *******************************************************************\\
		$code 				= 	$_GET['code'];echo "El codigo de acceso:".$code"<br />";
		//$state				= 	$_GET['state'];
		//$code 				=   "ausTUY67HyGTog78"; 
		//VARIABLE authorization
		$secret             =	urlencode($code);
		$client_id 			=	"68d55a97-cec0-45e7-b0d3-1a1b1eaedba2";
		$variable_code		=   $secret.$client_id;
		$Authorization		=	base64_encode($variable_code);
		//VARIABLE grant_type
		$grant_type 		= 	"authorization_code";
		//VARIABLE redirect_uri
		$redirecct_uri 		= 	"https://pmgm.oopp.gob.bo/testseicu/login/login";

		
		$CURL = curl_init('https://account-idetest.agetic.gob.bo/');
			curl_setopt($CURL, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($CURL, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/x-www-form-urlencoded',
				'Authorization: Basic'.$Authorization,
				'grant_type=authorization_code&code='.$code.'&redirect_uri=https://pmgm.oopp.gob.bo/testseicu/login/login'
			));
		$dataAGETIC        	= 	curl_exec($CURL);
		$informacionAGETIC 	= 	curl_getinfo($CURL);
								CURl_close($CURL);
		$array_AGETIC 	   	= 	(array)$dataAGETIC;
		print_r($array_AGETIC);
		$tokenAGETIC	   	=	$dataAGETIC_array['id_token'];	
	//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------\\

	//********************************************************* Peticion al proveedor haciendo uso de TOKEN (3) *************************************************************************\\

		$cURLConnection = curl_init('https://account-idetest.agetic.gob.bo/');
		curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Authorization: Bearer '.$TOKEN
		));
		$usuarios_ciudadano_digital = curl_exec($cURLConnection);
		curl_close($cURLConnection);
		$usuario_autenticado_AGETIC = json_decode($usuarios_ciudadano_digital);
		print_r($usuario_autenticado_AGETIC);

	//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------\\

		/*$usuario = $this->input->post("usuario");
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
		}*/
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
	
	public function url_emisor(){
		$url_receptor 	= "https://account-idetest.agetic.gob.bo/auth?";
		$state     		= "fS~pijlVX8~kF_xjYsRaqzBLCpeD_Q5LWBSMPRIb1bw";
		$client_id 		= "68d55a97-cec0-45e7-b0d3-1a1b1eaedba2";
		$response_type 	= "code";
		$redirecct_uri 	= "https://pmgm.oopp.gob.bo/testseicu/login/login";
		$nonce          = $this->token_sistema(30);
		$scope         	= "openid%20documento_identidad";
		$result 	   	= $url_receptor."response_type=".$response_type."&client_id=".$client_id."&state=".$state."&nonce=".$nonce."&redirect_
		uri=".$redirecct_uri."&scope=".$scope;
		return $result;
	}

	
}

