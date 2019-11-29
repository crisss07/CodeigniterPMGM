<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicio_model extends CI_Model {

	public $variable;
	
	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$lista = $this->db->query("SELECT * FROM catastro.servicio WHERE activo = '1' ORDER BY servicio_id ASC")->result();

		if ($lista > 0) {
			return $lista;
		}
		else{
			return false;
		}
	}

	public function insertar_servicio($descripcion, $alias, $coeficiente, $usu_creacion)
	{	
		
		$array = array(
			'descripcion' =>$descripcion,
			'alias' =>$alias,
			'coeficiente' =>$coeficiente,
			'usu_creacion' =>$usu_creacion
			);
		$this->db->insert('catastro.servicio', $array);
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
        $this->db->where('servicio_id', $id);
        return $this->db->update('catastro.servicio', $data);
    
    }

    public function actualizar($servicio_id, $descripcion, $alias, $coeficiente, $usu_modificacion, $fec_modificacion)
    {
        $data = array(
            'descripcion' => $descripcion,
            'alias' => $alias,
            'coeficiente' => $coeficiente,
            'usu_modificacion' => $usu_modificacion,
            'fec_modificacion' => $fec_modificacion
        );
        $this->db->where('servicio_id', $servicio_id);
        return $this->db->update('catastro.servicio', $data);
    }
}
