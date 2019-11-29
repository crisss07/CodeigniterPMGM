<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrganigramaP_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function lista(){
		$lista = $this->db->query("SELECT op.organigrama_persona_id, to_char(op.fec_alta, 'DD-MM-YYYY') as fec_alta, to_char(op.fec_baja, 'DD-MM-YYYY') as fec_baja, op.vigencia, p.nombres, p.paterno, p.materno, o.unidad, ca.descripcion FROM tramite.organigrama_persona as op JOIN persona as p ON op.persona_id = p.persona_id JOIN tramite.organigrama as o ON op.organigrama_id = o.organigrama_id JOIN tramite.cargo as ca ON op.cargo_id = ca.cargo_id WHERE op.activo = '1' AND op.fec_baja IS NULL")->result();
		if ($lista > 0) {
			return $lista;
		}
		else{
			return false;
		}
	}

	public function persona(){
		$personas = $this->db->query("SELECT DISTINCT p.persona_id, p.nombres, p.paterno, p.materno FROM persona as p JOIN persona_perfil as pf ON p.persona_id = pf.persona_id JOIN perfil as pe ON pf.perfil_id = pe.perfil_id WHERE pe.perfil != 'Beneficiario' AND pf.activo = 1 AND NOT EXISTS (SELECT NULL FROM tramite.organigrama_persona as op WHERE p.persona_id = op.persona_id AND op.fec_baja IS NULL)")->result();
		if ($personas > 0) {
			return $personas;
		}
		else{
			return false;
		}
	}

	public function organigrama(){
		$organigramas = $this->db->query("SELECT organigrama_id, unidad FROM tramite.organigrama where activo = 1")->result();
		if ($organigramas > 0) {
			return $organigramas;
		}
		else{
			return false;
		}
	}

	public function cargo(){
		$cargos = $this->db->query("SELECT cargo_id, descripcion FROM tramite.cargo where activo = 1")->result();
		if ($cargos > 0) {
			return $cargos;
		}
		else{
			return false;
		}
	}

	public function insertarOrganigrama($organigrama_id, $persona_id, $fec_alta, $usu_creacion, $cargo_id){
		$array = array(
			'organigrama_id' =>$organigrama_id,
			'persona_id' => $persona_id,
			'fec_alta' => $fec_alta,
			'vigencia' => 0,
			'usu_creacion' =>$usu_creacion,
			'cargo_id' => $cargo_id
			);
		$this->db->insert('tramite.organigrama_persona', $array);
	}

	public function agregarBaja($organigrama_persona_id, $usu_modificacion, $fec_modificacion, $vigencia, $observacion, $fec_baja){
		$data = array(
			'activo' => 0,
			'fec_baja' => $fec_baja,
            'usu_eliminacion' => $usu_modificacion,
            'vigencia' => $vigencia,
            'fec_modificacion' => $fec_modificacion,
            'observacion' => $observacion
        );
        $this->db->where('organigrama_persona_id', $organigrama_persona_id);
        return $this->db->update('tramite.organigrama_persona', $data);
	}
	public function eliminarOrganigrama($organigrama_persona_id, $usu_eliminacion, $fec_eliminacion){
		$data = array(
			'activo' => 0,
            'usu_eliminacion' => $usu_eliminacion,
            'fec_eliminacion' => $fec_eliminacion
        );
        $this->db->where('organigrama_persona_id', $organigrama_persona_id);
        return $this->db->update('tramite.organigrama_persona', $data);
	}

	public function buscaOr($id){
		$con = $this->db->query("SELECT to_char(op.fec_alta, 'YYYY-MM-DD') as fec_alta, p.persona_id, p.nombres, p.paterno, p.materno, o.organigrama_id, o.unidad, ca.cargo_id, ca.descripcion FROM tramite.organigrama_persona as op JOIN persona as p ON op.persona_id = p.persona_id JOIN tramite.organigrama as o ON op.organigrama_id = o.organigrama_id JOIN tramite.cargo as ca ON op.cargo_id = ca.cargo_id WHERE op.activo = '1' AND op.organigrama_persona_id = '".$id."'");
		// print_r($con);
	    if($con)
	    // if ($con->num_rows() > 0)
	        return $con->row();
	    else
	    	return null;
	 }

	public function insertarEditado($organigrama_persona_id, $persona_id, $organigrama_id, $cargo_id , $fec_alta, $usu_modificacion, $fec_modificacion){
		$data = array(
			'organigrama_id' =>$organigrama_id,
			'persona_id' => $persona_id,
			'fec_alta' => $fec_alta,
			'usu_modificacion' =>$usu_modificacion,
			'fec_modificacion' =>$fec_modificacion,
			'cargo_id' => $cargo_id
        );
        $this->db->where('organigrama_persona_id', $organigrama_persona_id);
        return $this->db->update('tramite.organigrama_persona', $data);
	}

}
