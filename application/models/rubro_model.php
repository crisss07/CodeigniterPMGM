<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rubro_model extends CI_Model {

	public $variable;
	
	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$lista = $this->db->query("SELECT * FROM tramite.rubros WHERE activo = '1' ORDER BY rubros_id ASC")->result();

		if ($lista > 0) {
			return $lista;
		}
		else{
			return false;
		}
	}

	public function insertar_rubro($rubro, $usu_creacion)
	{	
		
		$array = array(
			'rubro' =>$rubro,
			'usu_creacion' =>$usu_creacion
			);
		$this->db->insert('tramite.rubros', $array);
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
        $this->db->where('rubros_id', $id);
        return $this->db->update('tramite.rubros', $data);
    }

    public function actualizar($rubros_id, $rubro, $usu_modificacion, $fec_modificacion)
    {
        $data = array(
            'rubro' => $rubro,
            'usu_modificacion' => $usu_modificacion,
            'fec_modificacion' => $fec_modificacion
        );
        $this->db->where('rubros_id', $rubros_id);
        return $this->db->update('tramite.rubros', $data);
    }
}
