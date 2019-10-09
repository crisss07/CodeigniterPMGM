<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

	public $variable;
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$lista = $this->db->query("SELECT pe.nombres, pe.paterno, pe.materno, pe.ci, pe.fec_nacimiento, c.usuario, c.contrasenia, pf.perfil, r.rol, c.activo, c.credencial_id, c.persona_perfil_id
										FROM credencial c, persona_perfil p, rol r, persona pe, perfil pf 
										WHERE c.persona_perfil_id = p.persona_perfil_id
										AND p.persona_id = pe.persona_id
										AND p.perfil_id = pf.perfil_id
										AND c.rol_id = r.rol_id
										ORDER BY c.credencial_id DESC")->result();

		if ($lista > 0) {
			return $lista;
		}
		else{
			return false;
		}
	}

	public function login($usuario, $contrasenia)
	{
		$this->db->where('usuario', $usuario);
		$this->db->where('contrasenia', $contrasenia);
		$this->db->where('activo', '1');
		
		$resultado = $this->db->get("credencial");

		if ($resultado->num_rows() > 0) {
			return $resultado->row();
		}
		else{
			return false;
		}

	}

	public function insertar_usuario($nombres, $paterno, $materno, $ci, $fec_nacimiento)
	{	

		$id = $this->db->query("SELECT * FROM persona WHERE ci = '$ci'")->row();
		if (!$id) {
			$array = array(
			'nombres' =>$nombres,
			'paterno' =>$paterno,
			'materno' =>$materno,
			'ci' =>$ci,
			'fec_nacimiento' =>$fec_nacimiento
			);
		$this->db->insert('public.persona', $array);
		}
		
	}

	public function insertar_persona_perfil($persona_id, $perfil_id)
	{	
		
		$array = array(
			'persona_id' =>$persona_id,
			'perfil_id' =>$perfil_id
			);
		$this->db->insert('public.persona_perfil', $array);
	}

	public function insertar_credencial($persona_perfil_id, $rol_id, $usuario, $contrasenia)
	{	
		
		$array = array(
			'persona_perfil_id' =>$persona_perfil_id,
			'rol_id' =>$rol_id,
			'usuario' =>$usuario,
			'contrasenia' =>$contrasenia,
			'token' => 0
			);
		$this->db->insert('public.credencial', $array);
	}

	public function actualizar_usuario($credencial_id, $persona_perfil_id, $perfil_id, $rol_id, $usuario, $contrasenia)
    {
        $data = array(
            'rol_id' => $rol_id,
            'usuario' => $usuario,
            'contrasenia' => $contrasenia
        );
        $this->db->where('credencial_id', $credencial_id);
        $this->db->update('public.credencial', $data);

        $data1 = array(
            'perfil_id' => $perfil_id
        );
        $this->db->where('persona_perfil_id', $persona_perfil_id);
        return $this->db->update('public.persona_perfil', $data1);
    }

}
