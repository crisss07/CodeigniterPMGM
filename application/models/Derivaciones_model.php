<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Derivaciones_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model("derivaciones_model");
    }

    public function get_personal($idTramite = null)
    {
        // $idTramite = 13;
        $tramite = $this->db->get_where('tramite.tramite', array('tramite_id' => $idTramite))->row();
        $persona_organigrama = $this->db->get_where('tramite.organigrama_persona', array('organigrama_persona_id' => $tramite->organigrama_persona_id))->row();

        $organigrama = $this->db->get_where('tramite.organigrama', array('organigrama_id' => $persona_organigrama->organigrama_id))->row();
        $id_jefe = $organigrama->hijo;

        // $nivel_jefes = $organigrama->nivel-1;
        $cargo = $persona_organigrama->cargo_id;
        $organigrama_personal = $this->db->get_where('tramite.organigrama', array('organigrama_id' => $id_jefe))->result_array();
        $personal = $this->db->get_where(
            'tramite.organigrama_persona',
            array(
                'organigrama_id' => $organigrama_personal[0]['organigrama_id'],
                'activo' => 1,
            ))->result_array();
        $array_personal = array();
        foreach ($personal as $p) {
            array_push($array_personal, $p['persona_id']);
            // vdebug($oj['organigrama_id'], FALSE, FALSE, true);
        }

        $this->db->where_in('persona_id', $array_personal);
        $personal_derivacion = $this->db->get('public.persona')->result_array();
        return $personal_derivacion;

        // vdebug($personal_derivacion, true, false, true);
        // vdebug($cargo, FALSE, FALSE, true);
    }

    public function personal($persona_id = null){
        $personal = $this->db->query("SELECT
        organigrama_persona_id AS id,
        UPPER(nombres || ' ' || paterno || ' ' || materno) AS nombre,
        UPPER(unidad) AS unidad,
        UPPER(descripcion) AS cargo
        FROM tramite.vista_organigrama_persona_cargo
        WHERE persona_id != $persona_id
        ORDER BY nombres;")->result_array();
        return($personal);
    }

    public function encontrado($persona_id = null){
        $personal = $this->db->query("SELECT
        organigrama_persona_id AS id,
        UPPER(nombres || ' ' || paterno || ' ' || materno) AS nombre,
        UPPER(unidad) AS unidad,
        UPPER(descripcion) AS cargo
        FROM tramite.vista_organigrama_persona_cargo
        WHERE persona_id = $persona_id;")->result_array();
        return($personal);
    }
}
