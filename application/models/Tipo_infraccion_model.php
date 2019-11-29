<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_infraccion_model extends CI_Model {

	public function __construct() {
        $this->load->database();
    }   
    function get_data() {//obtiene los datos de la tabla tipo_documento en array result
        $query = $this->db->query('SELECT * FROM inspeccion.tipo_infraccion ORDER BY tipo_infraccion_id ASC');
        return $query->result();
    }
}
