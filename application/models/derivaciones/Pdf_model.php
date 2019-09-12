<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf_model extends CI_Model {

	public function __construct() {
        $this->load->database();
        $this->load->model('Pdf_model');
    }   

    public function cite($idTramite) {//obtiene los datos de la tabla tipo_documento en array result
        $query = $this->db->query("SELECT cite FROM tramite.tramite WHERE tramite_id=$idTramite");        
        return $query->row();
    }
}
