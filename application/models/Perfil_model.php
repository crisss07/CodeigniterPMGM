<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil_model extends CI_Model {

	public $variable;
	
	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$lista = $this->db->query("SELECT * FROM public.perfil WHERE activo = '1' ORDER BY perfil_id ASC")->result();

		if ($lista > 0) {
			return $lista;
		}
		else{
			return false;
		}
	}

	public function insertar_perfil($perfil, $usu_creacion)
	{	
		
		$array = array(
			'perfil' =>$perfil,
			'usu_creacion' =>$usu_creacion
			);
		$this->db->insert('public.perfil', $array);
	}


	
	public function eliminar($id, $usu_eliminacion, $fec_eliminacion)
	{
		$data = array(
            'activo' => 0,
            'usu_eliminacion' => $usu_eliminacion,
            'fec_eliminacion' => $fec_eliminacion
        );
        $this->db->where('perfil_id', $id);
        return $this->db->update('public.perfil', $data);
    }

    public function actualizar($perfil_id, $perfil, $usu_modificacion, $fec_modificacion)
    {
        $data = array(
            'perfil' => $perfil,
            'usu_modificacion' => $usu_modificacion,
            'fec_modificacion' => $fec_modificacion
        );
        $this->db->where('perfil_id', $perfil_id);
        return $this->db->update('public.perfil', $data);
    }
}
