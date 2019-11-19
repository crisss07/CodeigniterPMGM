<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiRest_model extends CI_Model {

	public function __construct() {
        $this->load->database();
    } 
      
    function getData() {//obtiene los datos de la tabla tipo_predio en array result
         $this->db->select('inicio as texto, persona_id as fecha, asignacion_id as icon, tramite_id as ruta');
        $query = $this->db->get_where('inspeccion.asignacion',array('activo' => 1));
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

    function get_asign_list($id) {//asignacion de inspecciones
       
        $query = $this->db->query("SELECT i.*,a.*,t.*,p.* FROM inspeccion.asignacion i LEFT JOIN inspeccion.tipo_asignacion a on i.tipo_asignacion_id=a.tipo_asignacion_id
            LEFT JOIN
            tramite.tramite t on i.tramite_id=t.tramite_id
            LEFT JOIN
            persona p on t.solicitante_id=p.persona_id where i.persona_id=63 and i.activo=1");
        return $query->result_array();
    }

    function get_asign_list_test($id) {//asignacion de inspecciones
         $this->db->select('inicio as fecha, persona_id, asignacion_id as id_a, tramite_id');
        $query = $this->db->get_where('inspeccion.asignacion',array('activo' => 1,'persona_id'=>$id));
        return $query->result_array();
    }

    function derivacion($id) {//asignacion de inspecciones
         $this->db->select('fuente,destino,fecha');
         $this->db->order_by('orden', 'asc');
        $query = $this->db->get_where('tramite.derivacion',array('tramite_id' => $id));
        return $query->result_array();
    }

    /*
    SELECT d.fuente,d.destino,p.persona_id as p_f,o.persona_id as p_d,concat(k.nombres,' ',k.paterno,' ',k.materno) as per_fuente,concat(j.nombres,' ',j.paterno,' ',j.materno) as per_destino,c.descripcion as cargo_fuente,e.descripcion as cargo_destino
FROM
tramite.derivacion d
LEFT JOIN tramite.organigrama_persona p
on p.organigrama_persona_id=d.fuente
LEFT JOIN tramite.organigrama_persona o
on o.organigrama_persona_id=d.destino
LEFT JOIN tramite.cargo c
on p.cargo_id=c.cargo_id
LEFT JOIN tramite.cargo e
on o.cargo_id=e.cargo_id
LEFT JOIN persona k
on p.persona_id=k.persona_id
LEFT JOIN persona j
on o.persona_id=j.persona_id
WHERE d.tramite_id=230 order by d.orden ASC
    */
}