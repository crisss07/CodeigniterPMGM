<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bloque_mat_item_model extends CI_Model {

	public $variable;
	
	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$lista = $this->db->query("SELECT * FROM catastro.bloque_mat_item  WHERE activo = '1' ORDER BY mat_Item_Id ASC")->result();

		if ($lista > 0) {
			return $lista;
		}
		else{
			return false;
		}
	}

	public function insertar_bloque($grupo_mat_id, $descripcion, $factor, $usu_creacion)
	{	
		
		$array = array(
			'grupo_mat_id' =>$grupo_mat_id,
			'descripcion' =>$descripcion,
			'factor' =>$factor,
			'usu_creacion' =>$usu_creacion
			);
		$this->db->insert('catastro.bloque_mat_item', $array);
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
        $this->db->where('mat_item_id', $id);
        return $this->db->update('catastro.bloque_mat_item', $data);
    }

    public function actualizar($mat_item_id, $grupo_mat_id, $descripcion, $factor, $usu_modificacion, $fec_modificacion)
    {
        $data = array(
            'grupo_mat_id' => $grupo_mat_id,
            'descripcion' => $descripcion,
            'factor' => $factor,
            'usu_modificacion' => $usu_modificacion,
            'fec_modificacion' => $fec_modificacion
        );
        $this->db->where('mat_item_id', $mat_item_id);
        return $this->db->update('catastro.bloque_mat_item', $data);
    }
}
