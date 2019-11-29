<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bloque_grupo_mat_model extends CI_Model {

	public $variable;
	
	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$lista = $this->db->query("SELECT * FROM catastro.bloque_grupo_mat ORDER BY grupo_mat_id ASC")->result();

		if ($lista > 0) {
			return $lista;
		}
		else{
			return false;
		}
	}

	public function insertar_zona($descripcion, $usu_creacion)
	{	
		
		$array = array(
			'descripcion' =>$descripcion,
			'usu_creacion' =>$usu_creacion
			);
		$this->db->insert('catastro.bloque_grupo_mat', $array);
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
        $this->db->where('grupo_mat_id', $id);
        return $this->db->update('catastro.bloque_grupo_mat', $data);
    }

    public function actualizar($grupo_mat_id, $descripcion, $usu_modificacion, $fec_modificacion)
    {
        $data = array(
            'descripcion' => $descripcion,
            'usu_modificacion' => $usu_modificacion,
            'fec_modificacion' => $fec_modificacion
        );
        $this->db->where('grupo_mat_id', $grupo_mat_id);
        return $this->db->update('catastro.bloque_grupo_mat', $data);
    }
}
