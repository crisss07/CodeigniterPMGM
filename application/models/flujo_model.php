<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Flujo_model extends CI_Model {

	public function __construct() {
        $this->load->database();
    }   
    function get_data() {//obtiene los datos de la tabla requisito en array result
        $query = $this->db->query("SELECT t.*,o.*,e.tramite,concat(p.nombres,' ',p.paterno,' ',p.materno) as nombreusuer from  tramite.flujo  t
        LEFT JOIN 
        tramite.organigrama_persona o
        on t.organigrama_persona_id=o.organigrama_persona_id
                
        LEFT JOIN
        tramite.tipo_tramite e
        on t.tipo_tramite_id=e.tipo_tramite_id
                
                LEFT JOIN
                public.persona p
                on o.persona_id=p.persona_id
        
        
        WHERE t.activo=1");
        return $query->result();
    }

    function get_tipotramite() {//obtiene los datos de la tabla tipotramite en array result
        $query = $this->db->query('SELECT * FROM
        tramite.tipo_tramite');
        return $query->result();
    }
    function get_organigrama() {//obtiene los datos de la tabla tipotramite en array result
        $query = $this->db->query("SELECT o.*,concat(p.nombres,' ' ,p.paterno,' ',p.materno) as nombreusuer FROM
        tramite.organigrama_persona o
                LEFT JOIN
                public.persona p
                on o.persona_id=p.persona_id
        ");
        return $query->result();
    }
}
