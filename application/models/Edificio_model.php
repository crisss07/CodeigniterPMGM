<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edificio_model extends CI_Model {

	public $variable;
	
	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$lista = $this->db->query("SELECT * FROM catastro.edificio WHERE activo = '1' ORDER BY edificio_id ASC")->result();

		if ($lista > 0) {
			return $lista;
		}
		else{
			return false;
		}
		
	}

	public function insertar_edificio($descripcion, $alias, $usu_creacion)
	{	
		
		$array = array(
			'descripcion' =>$descripcion,
			'alias' =>$alias,
			'usu_creacion' =>$usu_creacion
			);
		$this->db->insert('catastro.edificio', $array);
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
        $this->db->where('edificio_id', $id);
        return $this->db->update('catastro.edificio', $data);
    }

    public function actualizar($edificio_id, $descripcion, $alias, $usu_modificacion, $fec_modificacion)
    {
        $data = array(
            'descripcion' => $descripcion,
            'alias' => $alias,
            'usu_modificacion' => $usu_modificacion,
            'fec_modificacion' => $fec_modificacion
        );
        $this->db->where('edificio_id', $edificio_id);
        return $this->db->update('catastro.edificio', $data);
    }
}
