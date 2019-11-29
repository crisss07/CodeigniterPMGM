<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auditoria_Model extends CI_Model {

	public $variable;
	
	public function __construct()
	{
		parent::__construct();
		
	}

	public function auditoria_insertar($data1, $tabla)
	{	
		// DATOS DE LA PERSONA
		$id = $this->session->userdata("persona_perfil_id");
        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
        $persona_id = $resi->persona_id;

       // DATOS DE LA FECHA
        $fecha = date("Y-m-d H:i:s");
		   	//  $externalContent = file_get_contents('http://checkip.dyndns.com/');
			// preg_match('/Current IP Address: \[?([:.0-9a-fA-F]+)\]?/', $externalContent, $m);
			// $externalIp = $m[1];
			// echo $externalIp;

        // DATOS DE LA IP
		$ip = $this->Auditoria_Model->ip();

		$array = array(
			'entidad' =>$tabla,
			'app_tipo_accion_id' =>1,
			'persona_id' =>$persona_id,
			'fecha' =>$fecha,
			'ip' =>$ip,
			'dato' =>$data1,
			'activo' =>1,
			'usu_creacion' =>$id
			);
		$this->db->insert('app_auditoria_accion', $array);

	}

	public function auditoria_modificar($data1, $data2, $tabla)
	{	
		// DATOS DE LA PERSONA
		$id = $this->session->userdata("persona_perfil_id");
        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
        $persona_id = $resi->persona_id;
       
       // DATOS DE LA FECHA
        $fecha = date("Y-m-d H:i:s");

        // DATOS DE LA IP
        $ip = $this->Auditoria_Model->ip();

		$datos = 'ANTIGUO: '.$data1.' || NUEVO: '.$data2;

		$array = array(
			'entidad' =>$tabla,
			'app_tipo_accion_id' =>2,
			'persona_id' =>$persona_id,
			'fecha' =>$fecha,
			'ip' =>$ip,
			'dato' =>$datos,
			'activo' =>1,
			'usu_creacion' =>$id
			);
		$this->db->insert('app_auditoria_accion', $array);

	}

	public function auditoria_eliminar($data1, $tabla)
	{	
		// DATOS DE LA PERSONA
		$id = $this->session->userdata("persona_perfil_id");
        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
        $persona_id = $resi->persona_id;
       
       // DATOS DE LA FECHA
        $fecha = date("Y-m-d H:i:s");

        // DATOS DE LA IP
		$ip = $this->Auditoria_Model->ip();


		$array = array(
			'entidad' =>$tabla,
			'app_tipo_accion_id' =>3,
			'persona_id' =>$persona_id,
			'fecha' =>$fecha,
			'ip' =>$ip,
			'dato' =>$data1,
			'activo' =>1,
			'usu_creacion' =>$id
			);
		$this->db->insert('app_auditoria_accion', $array);

	}

	public function ip(){
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

}
