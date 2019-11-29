<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Audit_model extends CI_Model {

	public function __construct() {
        $this->load->database();
    } 

    //on create  
    public function insert($usu_creacion,$entidad, $dato,$ip)
	{			
		$array = array(
			'entidad' =>$entidad,
			'app_tipo_accion_id' =>1,
			'persona_id' =>$usu_creacion,
			'ip'=>$ip,			
			'dato' =>json_encode($dato),			
			'usu_creacion' =>$usu_creacion
			);
		$this->db->set('fecha', 'NOW()', FALSE);
		$this->db->insert('app_auditoria_accion', $array);
		

	}

    //on update  
    public function update($usu_creacion,$entidad, $dato,$dato_anterior,$ip)
	{	
		
		$datos = array('data_new' => $dato,'datos anterior'=> $dato_anterior);
		$array = array(
			'entidad' =>$entidad,
			'app_tipo_accion_id' =>2,			
			'persona_id' =>$usu_creacion,
			'ip'=>$ip,				
			'dato' =>json_encode($datos),
			'usu_creacion' =>$usu_creacion
			);
		$this->db->set('fecha', 'NOW()', FALSE);
		$this->db->insert('app_auditoria_accion', $array);
	}

    //on delete  
     public function delete($usu_creacion,$entidad, $dato,$ip)
	{			
		$array = array(
			'entidad' =>$entidad,
			'app_tipo_accion_id' =>1,
			'persona_id' =>$usu_creacion,
			'ip'=>$ip,			
			'dato' =>json_encode($dato),			
			'usu_creacion' =>$usu_creacion
			);
		$this->db->set('fecha', 'NOW()', FALSE);
		$this->db->insert('app_auditoria_accion', $array);
		

	}
}
