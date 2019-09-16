<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes_model extends CI_Model {

	public function __construct() {
        $this->load->database();
    }   
    function get_data($id) {//obtiene los datos de la tabla tipo_documento en array result
        $query = $this->db->query("SELECT p.*,u.descripcion as desc_ubi FROM catastro.predio p
LEFT JOIN
catastro.ubicacion u
on p.ubicacion_id=u.ubicacion_id
where predio_id=$id");
        return $query->row();
    }
    
 function get_propietarios($id) {//obtiene los datos de la tabla tipo_documento en array result
        $query = $this->db->query("SELECT p.*,t.persona_id,t.porcen_parti,concat(c.nombres,' ',c.paterno,' ',c.materno) as nombres_pro, c.* FROM 
catastro.predio_ddrr p
LEFT JOIN  catastro.predio_titular t
on p.ddrr_id=t.ddrr_id
LEFT JOIN public.persona c
on t.persona_id=c.persona_id
WHERE p.predio_id=$id");
        return $query->result();
    }


}
