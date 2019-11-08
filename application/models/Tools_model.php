<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tools_model extends CI_Model {

	public function __construct() {
        $this->load->database();
    }   
    function persona_datos($id) {//obtiene los datos de la tabla tipo_documento en array result
        $datos = $this->db->get_where('persona',array('persona_id' =>$id ))->row();
        return $datos;
    }
    function persona_cargo($id) {//obtiene los datos de la tabla tipo_documento en array result
        $datos = $this->db->query("SELECT t.* FROM
        	tramite.organigrama_persona o
        	LEFT JOIN
        	tramite.cargo t
        	on o.cargo_id=o.cargo_id
        	WHERE persona_id=$id")->row();
        return $datos;
    }
}
