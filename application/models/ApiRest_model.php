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

    function getGrupos() {//obtiene los datos de la tabla tipo_predio en array result
        $query = $this->db->query('SELECT grupo_mat_id as id_g,descripcion as texto FROM catastro.bloque_grupo_mat WHERE activo=1');
        return $query->result_array();
    }

    function getSubgrupos($id) {//obtiene los datos de la tabla tipo_predio en array result
    	
        $query = $this->db->query("SELECT grupo_mat_id,descripcion as texto FROM catastro.bloque_mat_item WHERE activo=1 and grupo_mat_id=$id");
        return $query->result_array();
    }
    function getlistadotramite() {//obtiene los datos de la tabla tipo_predio en array result
        $query = $this->db->query('SELECT tipo_tramite_id as id,tramite as texto  FROM tramite.tipo_tramite where activo=1 ORDER BY id ');
        return $query->result_array();
    }
     function getRequisitos($id) {//obtiene los datos de la tabla tipo_predio en array result
        
        $query = $this->db->query("SELECT descripcion FROM tramite.requisito where activo=1 and tipo_tramite_id=$id");
        return $query->result_array();
    }
}