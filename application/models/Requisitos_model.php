<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Requisitos_model extends CI_Model {

	public function __construct() {
        $this->load->database();
    }   
    function get_data() {//obtiene los datos de la tabla requisito en array result
        $query = $this->db->query('SELECT t.*,y.tramite FROM tramite.requisito t
        LEFT JOIN tramite.tipo_tramite y
        on t.tipo_tramite_id=y.tipo_tramite_id
        ORDER BY tipo_tramite_id ASC');
        return $query->result();
    }

    function get_tipotramite() {//obtiene los datos de la tabla tipotramite en array result
        $query = $this->db->query('SELECT * FROM
        tramite.tipo_tramite');
        return $query->result();
    }
}
