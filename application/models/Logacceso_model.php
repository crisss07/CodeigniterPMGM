<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logacceso_model extends CI_Model {

	public $variable;
	
	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$lista = $this->db->query("SELECT * FROM catastro.zona_urbana ORDER BY zonaurb_id ASC")->result();

		if ($lista > 0) {
			return $lista;
		}
		else{
			return false;
		}
	}

	public function insertar_logacceso($credencial_id, $acceso_inicio, $ip)
	{	
		
		$array = array(
			'credencial_id' =>$credencial_id,
			'acceso_inicio' =>$acceso_inicio,
			'ip' =>$ip
			);
		$this->db->insert('logacceso', $array);
	}

	public function ip_local() 
		{
		  $ipaddress = '';
		  if (getenv('HTTP_CLIENT_IP'))
		      $ipaddress = getenv('HTTP_CLIENT_IP');

		  else if(getenv('HTTP_X_FORWARDED_FOR'))
		      $ipaddress = getenv('HTTP_X_FORWARDED_FOR');

		  else if(getenv('HTTP_X_FORWARDED'))
		      $ipaddress = getenv('HTTP_X_FORWARDED');

		  else if(getenv('HTTP_FORWARDED_FOR'))
		      $ipaddress = getenv('HTTP_FORWARDED_FOR');

		  else if(getenv('HTTP_FORWARDED'))
		     $ipaddress = getenv('HTTP_FORWARDED');

		  else if(getenv('REMOTE_ADDR'))
		      $ipaddress = getenv('REMOTE_ADDR');
		  else
		      $ipaddress = 'UNKNOWN';
		  if (strpos($ipaddress, ",") !== false) :
		    $ipaddress = strtok($ipaddress, ",");
		  endif;
			 return $ipaddress;
		}

	public function ip_publico()
		{
		  $externalContent = file_get_contents('http://checkip.dyndns.com/');
		  preg_match('/Current IP Address: \[?([:.0-9a-fA-F]+)\]?/', $externalContent, $m);
		  $externalIp = $m[1];
		  return $externalIp;
		}

	public function fecha_salida($logacceso_id, $acceso_fin)
   		 {
        $data = array(
            'acceso_fin' => $acceso_fin
        );
        $this->db->where('logacceso_id', $logacceso_id);
        return $this->db->update('logacceso', $data);
   		 }

   	public function inactividad()
	{
		$logacceso_id = $this->db->query("SELECT MAX(logacceso_id) as max FROM logacceso")->row();
		$acceso_inicio = $this->db->query("SELECT acceso_inicio FROM logacceso WHERE logacceso_id = '$logacceso_id'")->row();
		
		$ahora = date("Y-n-j H:i:s"); 
    	$tiempo_transcurrido = (strtotime($ahora)-strtotime($acceso_inicio));
    	
    	if ($tiempo_transcurrido >= 30) {
			$this->session->sess_destroy();
			redirect(base_url());
		}		
	}

}
