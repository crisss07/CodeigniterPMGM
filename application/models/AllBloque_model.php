<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AllBloque_model extends CI_Model {

	public function __construct() {
        $this->load->database();
    }
        
	function getAllData() {
        $query = $this->db->query('SELECT * FROM catastro.tipo_predio where activo=1');
        return $query->result();
    }
}
