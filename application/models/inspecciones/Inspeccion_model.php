<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inspeccion_model extends CI_Model {

	public $variable;
	
	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$id = $this->session->userdata("persona_perfil_id");
	    $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
	    $usu_creacion = $resi->persona_id;
		$lista = $this->db->query("SELECT ins.* 
									FROM inspeccion.asignacion ins, public.persona_perfil pub, public.perfil per
									WHERE ins.persona_id = $usu_creacion 
									AND pub.persona_id = $usu_creacion
									AND pub.perfil_id = per.perfil_id
									AND per.perfil = 'Inspector'
									AND ins.activo=1
									ORDER BY inicio desc")->result();
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
