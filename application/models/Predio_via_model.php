<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Predio_via_model extends CI_Model {

	public $variable;
	
	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$lista = $this->db->query("SELECT * FROM catastro.predio_via  WHERE activo = '1' ORDER BY via_id ASC")->result();

		if ($lista > 0) {
			return $lista;
		}
		else{
			return false;
		}
	}

	public function insertar_via($codcatas, $objectid_via, $matvia_id, $usu_creacion)
	{	
		
		$array = array(
			'codcatas' =>$codcatas,
			'objectid_via' =>$objectid_via,
			'matvia_id' =>$matvia_id,
			'usu_creacion' =>$usu_creacion
			);
		$this->db->insert('catastro.predio_via', $array);
	}


	public function login($usuario, $contrasenia)
	{
		$this->db->where('usuario', $usuario);
		$this->db->where('contrasenia', $contrasenia);
		
		$resultado = $this->db->get("credencial");

		if ($resultado->num_rows() > 0) {
			return $resultado->row();
		}
		else{
			return false;
		}

	}


	public function eliminar($id, $usu_eliminacion, $fec_eliminacion)
	{
		$data = array(
            'activo' => 0,
            'usu_eliminacion' => $usu_eliminacion,
            'fec_eliminacion' => $fec_eliminacion
        );
        $this->db->where('via_id', $id);
        return $this->db->update('catastro.predio_via', $data);
    }

    public function actualizar($via_id, $codcatas, $objectid_via, $matvia_id, $usu_modificacion, $fec_modificacion)
    {
        $data = array(
            'codcatas' => $codcatas,
            'objectid_via' => $objectid_via,
            'matvia_id' => $matvia_id,
            'usu_modificacion' => $usu_modificacion,
            'fec_modificacion' => $fec_modificacion
        );
        $this->db->where('via_id', $via_id);
        return $this->db->update('catastro.predio_via', $data);
    }
}
