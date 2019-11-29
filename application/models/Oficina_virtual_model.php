<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Oficina_virtual_model extends CI_Model {
    public function __construct()
	{
		parent::__construct();
	}
    public function verificar_usuario($clave){
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
}
