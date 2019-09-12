<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inspecciones_model extends CI_Model {

	public $variable;
	
	public function __construct()
	{
		parent::__construct();
	}

	function get_data_act() {
        $query = $this->db->query('SELECT * FROM inspeccion.tipo_actuacion WHERE activo=1');
        return $query->result();
	}
	
	function get_data_inf() {
        $query = $this->db->query('SELECT * FROM inspeccion.tipo_infraccion WHERE activo=1');
        return $query->result();
	}
	
	function get_lista() {
        $query = $this->db->query('SELECT i.*,t.descripcion as actuacion,m.descripcion as infraccion,a.*,p.* FROM inspeccion.inspeccion i
	LEFT JOIN inspeccion.tipo_actuacion t
	on i.tipo_actuacion_id=t.tipo_actuacion_id
	LEFT JOIN inspeccion.tipo_infraccion m
	on i.tipo_infraccion_id=m.tipo_infraccion_id
	LEFT JOIN inspeccion.asignacion a
	on i.asignacion_id=a.asignacion_id
	LEFT JOIN persona p
	on p.persona_id=a.persona_id		
	WHERE i.activo=1');
        return $query->result();
	    }
	    
	function get_lista_id($id) {
		$query = $this->db->query("SELECT i.*,t.descripcion as actuacion,m.descripcion as infraccion,g.cite FROM inspeccion.inspeccion i
		LEFT JOIN inspeccion.tipo_actuacion t
		on i.tipo_actuacion_id=t.tipo_actuacion_id
		LEFT JOIN inspeccion.tipo_infraccion m
		on i.tipo_infraccion_id=m.tipo_infraccion_id
		LEFT JOIN inspeccion.asignacion a
		on i.asignacion_id=a.asignacion_id
		LEFT JOIN tramite.tramite g
		on a.tramite_id=g.tramite_id
		WHERE i.activo=1 and a.persona_id=$id");
	return $query->result();
	}

	function get_lista_asign() {
		$query = $this->db->query('SELECT a.*,i.*,p.*,t.* FROM inspeccion.asignacion a
		LEFT JOIN inspeccion.tipo_asignacion i
		on a.tipo_asignacion_id=i.tipo_asignacion_id
		LEFT JOIN persona p
		on a.persona_id=p.persona_id
		LEFT JOIN tramite.tramite t
		on a.tramite_id=t.tramite_id
		WHERE a.activo=1
		');
		return $query->result();
	}

	function get_lista_asign_id($id) {
		$query = $this->db->query("SELECT a.*,i.*,p.*,t.* FROM inspeccion.asignacion a
		LEFT JOIN inspeccion.tipo_asignacion i
		on a.tipo_asignacion_id=i.tipo_asignacion_id
		LEFT JOIN persona p
		on a.persona_id=p.persona_id
		LEFT JOIN tramite.tramite t
		on a.tramite_id=t.tramite_id
		WHERE a.activo=1 and a.persona_id=$id
		");
		return $query->result();
	}
		    








}
