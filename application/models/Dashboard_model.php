
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	public $variable;
	
	public function __construct()
	{
		parent::__construct();	
	}

	public function get_datospersona()
    {    
        $query = $this->db->query('SELECT count(persona_id) as total_p FROM persona WHERE persona_id NOT IN (SELECT persona_id FROM persona_perfil)');
        return $query->row();
    }

    public function get_datotramite()
    {        
    	$this->db->select('count(tramite_id) as total_t');
        $data=$this->db->get('tramite.tramite')->row();
        return $data;
    }
    public function get_datotramite_concluido()
    {        
    	$this->db->select('count(DISTINCT tramite_id) as total_fin');
        $data=$this->db->get_where('tramite.derivacion',array('orden' => 5 ))->row();
        return $data;
    }



    public function get_data_predios()
    {        
    	$this->db->select('count(predio) as total_predios');
        $data=$this->db->get_where('catastro.predio',array('activo >=' => 3 ))->row();
        return $data;
    }
    public function get_tramite_mes($id,$year){  
		$this->db->select('count(EXTRACT(MONTH FROM fecha)) as mes');
        $data=$this->db->get_where('tramite.tramite',array('EXTRACT(MONTH FROM fecha) =' => $id,'EXTRACT(YEAR FROM fecha) =' => $year))->row();
        return $data;
    }   

    public function get_predios_mes($id,$year){  
		$this->db->select('count(EXTRACT(MONTH FROM fec_creacion)) as mes');
        $data=$this->db->get_where('catastro.predio',array('EXTRACT(MONTH FROM fec_creacion) =' => $id,'EXTRACT(YEAR FROM fec_creacion) =' => $year,'activo >='=>3))->row();
        return $data;

    }
}

?>
