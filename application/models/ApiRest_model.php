<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiRest_model extends CI_Model {

	public function __construct() {
        $this->load->database();
    } 
      
    function getData() {//obtiene los datos de la tabla tipo_predio en array result
         $this->db->select('inicio as texto, persona_id as fecha, asignacion_id as icon, tramite_id as ruta');
        $query = $this->db->get_where('inspeccion.asignacion',array('activo' => 1 ));
        return $query->result_array();
    }

    function getGrupos() {//obtiene los datos de la tabla tipo_predio en array result
        
        $this->db->select('grupo_mat_id as id_g,descripcion as texto');
        $query = $this->db->get_where('catastro.bloque_grupo_mat',array('activo' => 1 ));
        
        return $query->result_array();
    }

    function getSubgrupos($id) {//obtiene los datos de la tabla tipo_predio en array result
        $this->db->select('grupo_mat_id, descripcion as texto');
    	$query= $this->db->get_where('catastro.bloque_mat_item',array('activo' =>1 ,'grupo_mat_id' => $id));
       
        return $query->result_array();
    }
    function getlistadotramite() {//obtiene los datos de la tabla tipo_predio en array result
        $query = $this->db->query('SELECT tipo_tramite_id as id,tramite as texto  FROM tramite.tipo_tramite where activo=1 ORDER BY id ');
        return $query->result_array();
    }
     function getRequisitos($id) {//obtiene los datos de la tabla tipo_predio en array result
        $this->db->select('descripcion');
        $query = $this->db->get_where('tramite.requisito', array('activo' =>1 ,'tipo_tramite_id'=>$id ));        
        return $query->result_array();
    }
       function getReq($id) {//obtiene los datos de la tabla tipo_predio en array result
        
        $this->db->select('descripcion');
        //$this->db->select('descripcion as desc');
        $query = $this->db->get_where('tramite.requisito',array('activo' => 1, 'tipo_tramite_id'=>$id));
        return $query->result_array();
    }
}