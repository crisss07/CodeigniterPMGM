<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tools_model extends CI_Model {

	public function __construct() {
        $this->load->database();
    }   
    function persona_datos($id) {//obtiene los datos de la tabla tipo_documento en array result
        $datos = $this->db->get_where('persona',array('persona_id' =>$id ))->row();
        return $datos;
    }
    function persona_cargo($id) {//obtiene los datos de la tabla tipo_documento en array result
        $datos = $this->db->query("SELECT t.* FROM
        	tramite.organigrama_persona o
        	LEFT JOIN
        	tramite.cargo t
        	on o.cargo_id=o.cargo_id
        	WHERE persona_id=$id")->row();
        return $datos;
    }

    function get_a() {//obtiene los datos de la cabeza del organigrama
        $datos = $this->db->query("SELECT c.descripcion as cargo,p.* FROM
            tramite.organigrama_persona o
                        JOIN
                    tramite.cargo C
                    on c.cargo_id=o.cargo_id
                    JOIN
                    persona p
                    on o.persona_id=p.persona_id
                        
            WHERE o.organigrama_persona_id=1")->row();
        return $datos;
    }

    function get_via() {//obtiene los datos de la cabeza del organigrama
        $datos = $this->db->query("SELECT c.descripcion as cargo,p.* FROM
            tramite.organigrama_persona o
                        JOIN
                    tramite.cargo C
                    on c.cargo_id=o.cargo_id
                    JOIN
                    persona p
                    on o.persona_id=p.persona_id
                        
            WHERE o.organigrama_persona_id=18")->row();
        return $datos;
    }
    function nro_tramite($t_id) {//obtiene los datos de la cabeza del organigrama
        $datos = $this->db->query("SELECT cite FROM
tramite.tramite
WHERE tramite_id=$t_id")->row();
        return $datos;
    }

}
