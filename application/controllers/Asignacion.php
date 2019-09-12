<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asignacion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model("inspecciones_model");
		$this->load->model("rol_model");
        $this->load->helper('vayes_helper');
        $this->load->helper(array('form', 'url'));
    }
    
    public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."inspecciones/nuevo");
		}
		else{
			redirect(base_url());
        }	
		
	}	

	public function guarda_edicion()
	{
		// vdebug($this->input->post(), false, false, true);
		if($this->input->post('turno') == 't'){
			$hora_inicio = ' 14:30:00';
			$hora_final = ' 18:30:00';
		}else{
			$hora_inicio = ' 08:00:00';
			$hora_final = ' 12:30:00';
		}

		$nueva_fecha_inicio = $this->input->post('fecha_inicio').$hora_inicio;
		$nueva_fecha_fin = $this->input->post('fecha_inicio').$hora_final;
		$this->db->set('inicio', $nueva_fecha_inicio);
		$this->db->set('fin', $nueva_fecha_fin);
		$this->db->set('tipo_asignacion_id', 2);
		$this->db->set('persona_id', $this->input->post('persona_id'));
		$this->db->where('asignacion_id', $this->input->post('asignacion_id'));
		$this->db->update('inspeccion.asignacion');
		redirect(base_url('Inspeccion/lista_asign'));

	}

	public function edita($id_asignacion = null){

		$this->db->where('perfil_id', 5);
		$inspectores = $this->db->get('persona_perfil')->result();
		$array_inspectores = array();
		foreach ($inspectores as $i) {
			array_push($array_inspectores, $i->persona_id);
		}
		// vdebug($array_inspectores, true, false, true);
		$this->db->where_in('persona_id', $array_inspectores);
		$data['inspectores'] = $this->db->get('persona')->result();
		// vdebug($inspec, true, false, true);
		$data['asignacion'] = $this->db->get_where('inspeccion.asignacion', array('asignacion_id' => $id_asignacion))->row();
		$data['dist'] = $this->db->get('catastro.geo_distritos')->result();//todos los distritos
		$this->load->view('admin/header');
	    $this->load->view('admin/menu');
	    $this->load->view('asignacion/edita', $data);
	    $this->load->view('admin/footer');			
	}

	public function nuevo($ida=null){

		if($this->session->userdata("login")){
			//$lista['verifica'] = $this->rol_model->verifica();
			//$lista['zona_urbana'] = $this->zona_urbana_model->index();
			$id = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $dato = $resi->persona_id;
            $res = $this->db->get_where('persona', array('persona_id' => $dato))->row();

            $data['data_act'] = $this->inspecciones_model->get_data_act();   
            $data['data_inf'] = $this->inspecciones_model->get_data_inf();   
            $data['asignacion_id']=$ida;
		  
		            	
		            	$this->load->view('admin/header');
				        $this->load->view('admin/menu');
				        $this->load->view('asignacion/edita', $data);
				        $this->load->view('admin/footer');			
			
       		}
		else{
			redirect(base_url());
        }	
		
	}

}

	