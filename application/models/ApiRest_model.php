<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiRest_model extends CI_Model {

	public function __construct() {
        $this->load->database();
    } 
      
    function getData() {//obtiene los datos de la tabla tipo_predio en array result
        $query = $this->db->query('SELECT inicio as texto, persona_id as fecha, asignacion_id as icon, tramite_id as ruta  FROM inspeccion.asignacion where activo=1 ');
        return $query->result_array();
    }
}