<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		 // load Session Library
		$this->load->library('session');
		$this->load->library('cart');
		$this->load->library('form_validation');
		$this->load->helper('vayes_helper');
		$this->load->model("Persona_model");
		$this->load->helper('form');

         
        // load url helper
        $this->load->helper('url');
		$this->load->model("Usuario_model");
		$this->load->model("Logacceso_model");
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

	public function login($code = null)
	{	
	 // Recibir el code de la URL que envia la AGETIC PASO (2) 

		if ($code) {
			echo 'llego';	
		} else {
			$code 						= 	$_GET['code'];
			// echo "El codigo de acceso:".$code."<br />";
			$secret             		=	urlencode("WXqlbS8J+X92+1fx2QWzTR0JlT6QMwqKjDsm6j9o0C29WOjvL66kxganY+nNvQK+");
			$client_id 					=	"68d55a97-cec0-45e7-b0d3-1a1b1eaedba2";
			$variable_authorization		=   $secret.":".$client_id;
			$Authorization	 			=	base64_encode($variable_authorization);
			$CURL	 	=		curl_init	('https://account-idetest.agetic.gob.bo/token');
								// curl_setopt	($CURL, CURLOPT_RETURNTRANSFER, true);
								curl_setopt	($CURL, CURLOPT_HTTPHEADER, array(
									'Host : https://account-idetest.agetic.gob.bo/token',
									'Content-Type  : application/x-www-form-urlencoded',
									'Authorization : Basic '.$Authorization,
									// 'grant_type    = authorization_code&code='.$code.'&redirect_uri=https://pmgm.oopp.gob.bo/testseicu/login/login'
								));
								$variables = "grant_type=authorization_code&code=$code&redirect_uri=https://pmgm.oopp.gob.bo/testseicu/login/login";
								curl_setopt($CURL, CURLOPT_POSTFIELDS,$variables); 
					$dataAGETIC        	= 	curl_exec($CURL);
					$informacionAGETIC 	= 	curl_getinfo($CURL);
											curl_close($CURL);
		}
			
		
		// echo "datos json";	
		// print_r(json_decode($dataAGETIC));
		 /*$code="adfsdf46a5sd4f6a5sd4f";
		 $data = '{"grant_type":"authorization_code", "code":"'.$code.'", "redirect_uri":"https://pmgm.oopp.gob.bo/testseicu/login/login"}';
		 $url  = "https://account-idetest.agetic.gob.bo/token";
		 $ch = curl_init();
		 curl_setopt($ch, CURLOPT_URL, $url);
		 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		 curl_setopt($ch, CURLOPT_POST, 1);
		 curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		 curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		 					'Content-Type  : application/x-www-form-urlencoded',
							'Authorization : Basic'.$Authorization
		 ));
		 $responde 				= 	curl_exec($ch);
		 if(curl_error($ch)){
			echo  'Error:'. curl_errno($ch);
		 }else{
			echo "Consulta realizado con exito";
			$dato=json_decode($responde);
			print_r($dato);
		 }*/
		//print_r($array_AGETIC);
		//$tokenAGETIC	   	=	$dataAGETIC_array['id_token'];	
	//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------\\

	//********************************************************* Peticion al proveedor haciendo uso de TOKEN (3) *************************************************************************\\

		/*$cURLConnection = curl_init('https://account-idetest.agetic.gob.bo/');
		curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Authorization: Bearer '.$TOKEN
		));
		$usuarios_ciudadano_digital = curl_exec($cURLConnection);
		curl_close($cURLConnection);
		$usuario_autenticado_AGETIC = json_decode($usuarios_ciudadano_digital);
		print_r($usuario_autenticado_AGETIC);*/

	//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------\\
		
		/*$usuario = $this->input->post("usuario");
		$contrasena = $this->input->post("contrasenia");
		$contrasenia = md5($contrasena);
		
		$res = $this->Usuario_model->login($usuario, $contrasenia);
		if (!$res) {
			redirect(base_url());
		}
		else{
			/*$iddd = $this->db->query("SELECT pf.*, p.*
									FROM persona_perfil pf, perfil p
									WHERE pf.persona_perfil_id = '$res->persona_perfil_id'
									AND p.perfil_id = pf.perfil_id
									AND p.perfil = 'Beneficiario'")->row();
			var_dump($iddd);*/

			/*$this->db->select('persona_perfil.*, perfil.*');
	        $this->db->from('persona_perfil');
	        $this->db->where('persona_perfil.persona_perfil_id', $res->persona_perfil_id);
	        $this->db->join('perfil', 'persona_perfil.perfil_id = perfil.perfil_id');
	        $this->db->where('perfil.perfil', 'Beneficiario');
	        $query1 = $this->db->get();
	        $iddd = $query1->row();

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
		$actualizar = $this->Logacceso_model->fecha_salida($logacceso_id, $acceso_fin);
		redirect(base_url());
	}

	public function algo()
	{
		$this->Logacceso_model->inactividad();
	}

	public function token_sistema ($longitud){
		$key 	 =  '';
 		$pattern =  '1234567890abcdefghijklmnopqrstuvwxyz';
 		$max     =  strlen($pattern)-1;
 		for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
 		return $key;
	}

	public function verificar_usuario_cYq ($cedula_identidad){
		$verificar_usuario = $this->Usuario_model->verificar_persona_sistema($cedula_identidad);
	}
	
	public function url_emisor(){
		$url_receptor 	= "https://account-idetest.agetic.gob.bo/auth?";
		$state     		= "fS~pijlVX8~kF_xjYsRaqzBLCpeD_Q5LWBSMPRIb1bw";
		$client_id 		= "68d55a97-cec0-45e7-b0d3-1a1b1eaedba2";
		$response_type 	= "code";
		$redirecct_uri 	= "https://pmgm.oopp.gob.bo/testseicu/login/login";
		$nonce          = $this->token_sistema(30);
		// $scope         	= "scope=openid%20nombre%20documento_identidad%20email%20fecha_nacimiento%20celular";
		$scope         	= "openid%20documento_identidad%20nombre%20email%20fecha_nacimiento%20celular";
		$result 	   	= $url_receptor."response_type=".$response_type."&client_id=".$client_id."&state=".$state."&nonce=".$nonce."&redirect_uri=".$redirecct_uri."&scope=".$scope;
		// vdebug($result);
		return $result;
	}

	public function envia()
	{
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL,"http://localhost/CodeigniterPMGM/login/recive");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,"postvar1=value1&postvar2=value2&postvar3=value3");

		// In real life you should use something like:
		// curl_setopt($ch, CURLOPT_POSTFIELDS, 
		//          http_build_query(array('postvar1' => 'value1')));

		// Receive server response ...
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$server_output = curl_exec($ch);

		curl_close ($ch);
		// Further processing ...
		if ($server_output == "OK")
		{ 
			echo "si";
		} else { 
			echo "no"; 
		}
	}

	public function recive()
	{
		$aqui = $this->input->post();
		echo $aqui;

	}
	
}
