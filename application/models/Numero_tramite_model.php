<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Numero_tramite_model extends CI_Model {

	public $variable;
	
	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$lista = $this->db->query("SELECT * FROM tramite.numero_tramite ORDER BY numero_tramite_id ASC")->result();

		if ($lista > 0) {
			return $lista;
		}
		else{
			return false;
		}
	}

	public function insertar_numero_tramite($tipo, $gestion, $correlativo, $observaciones, $usu_creacion)
	{	
		
		$array = array(
			'tipo' =>$tipo,
			'gestion' =>$gestion,
			'correlativo' =>$correlativo,
			'observaciones' =>$observaciones,
			'usu_creacion' =>$usu_creacion,
			'activo' =>'0',
			);
		$this->db->insert('tramite.numero_tramite', $array);
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
        $this->db->where('numero_tramite_id', $id);
        return $this->db->update('tramite.numero_tramite', $data);
    }

    public function actualizar($numero_tramite_id, $tipo, $gestion, $correlativo, $observaciones, $usu_modificacion, $fec_modificacion)
    {
        $data = array(
            'tipo' => $tipo,
            'gestion' => $gestion,
            'correlativo' => $correlativo,
            'observaciones' => $observaciones,
            'usu_modificacion' => $usu_modificacion,
            'fec_modificacion' => $fec_modificacion
        );
        $this->db->where('numero_tramite_id', $numero_tramite_id);
        return $this->db->update('tramite.numero_tramite', $data);
    }
}
