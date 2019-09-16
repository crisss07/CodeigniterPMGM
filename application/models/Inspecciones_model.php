<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inspecciones_model extends CI_Model {

	public $variable;
	
	public function __construct()
	{
		parent::__construct();
	}

		public function insertar_tramite_inspecciones($organigrama_persona_id, $tipo_documento_id, $tipo_tramite_id, $cite, $fecha, $fojas, $anexos, $remitente, $procedencia, $referencia, $usu_creacion, $adjunto, $destino, $correlativo, $gestion, $tipo_solicitante, $via_solicitud, $solicitante_id, $observaciones, $requisitos, $tipo){	
		$this->load->helper('vayes_helper');
		$array = array(
			'organigrama_persona_id' =>$organigrama_persona_id,
			'tipo_documento_id' =>$tipo_documento_id,
			'tipo_tramite_id' =>$tipo_tramite_id,
			'cite' =>$cite,
			'fecha' =>$fecha,
			'fojas' =>$fojas,
			'anexos' =>$anexos,
			'remitente' =>$remitente,
			'procedencia' =>$procedencia,
			'referencia' =>$referencia,
			'usu_creacion' =>$usu_creacion,
			'adjunto' =>$adjunto,
			'tipo_solicitante' => $tipo_solicitante,
			'via_solicitud' => $via_solicitud,
			'solicitante_id' => $solicitante_id,
			'observaciones' => $observaciones
			);
		$this->db->insert('tramite.tramite', $array);
		$tramite_id = $this->db->query("SELECT * FROM tramite.numero_tramite WHERE gestion = '$gestion' AND activo = '1'")->row();
		$numero_tramite_id = $tramite_id->numero_tramite_id;
		$data = array(
        	'correlativo' => $correlativo
        );
		$id_tramite = $this->db->insert_id();
		$this->db->where('numero_tramite_id', $numero_tramite_id);
		$this->db->update('tramite.numero_tramite', $data);
		$tramite = $this->db->get_where('tramite.tramite', array('tramite_id'=>$id_tramite))->row();
		//if($tramite->tipo_tramite_id == 10){
			$contador_asignaciones = $this->db->query("SELECT k.*  FROM
			(SELECT j.persona_id,(CASE WHEN j.total IS NULL THEN 0 ELSE j.total	END) FROM 
			(SELECT d.*,b.total FROM 
			(SELECT g.* FROM (SELECT persona_id FROM tramite.organigrama_persona WHERE cargo_id= (SELECT cargo_id FROM tramite.cargo WHERE descripcion in ('inspector','Inspector','INSPECTOR'))) AS g INNER JOIN
				(SELECT p.persona_id FROM persona_perfil p LEFT JOIN perfil o ON p.perfil_id=o.perfil_id WHERE o.perfil='Inspector' or o.perfil='inspector' or o.perfil='INSPECTOR' and p.activo=1  and o.activo=1 GROUP BY p.persona_id) 
				as f on g.persona_id=f.persona_id) as d
			LEFT JOIN
			(SELECT  A.persona_id,COUNT(A.persona_id) as total FROM inspeccion.asignacion A	WHERE A.activo=1 GROUP BY A.persona_id ORDER BY total ASC) as b
			on b.persona_id=d.persona_id ORDER BY b.total ASC) as j) as k ORDER BY k.total asc limit 1")->result();	
			//fin de la consulta para asignar inspector			
			$ditrict = $this->db->query("SELECT * FROM catastro.geo_distritos ORDER BY  random()  limit 1")->row();
			$dia_siguiente = date('Y-m-d', strtotime(' +1 day'));
			$data = array(
				'tramite_id'=>$id_tramite,
				'persona_id'=>$contador_asignaciones[0]->persona_id,
				'tipo_asignacion_id'=>1,
				'inicio'=>$dia_siguiente.' 08:30:00',
				'fin'=>$dia_siguiente.' 12:30:00',
				'activo'=>1,
				'distrito'=>$ditrict->distrito,
			);
			$this->db->insert('inspeccion.asignacion', $data);
		//}
		
		
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
