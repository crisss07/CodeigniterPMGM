<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organigrama_persona extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("tramite/organigramaP_model");
	}

	public function inicio(){
		if($this->session->userdata("login"))
		{
			$lista['datos'] = $this->organigramaP_model->lista();
			$lista['personas'] = $this->organigramaP_model->persona();
			$lista['organigramas'] = $this->organigramaP_model->organigrama();
			$this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('organigrama/asignacion_organigrama', $lista);
			$this->load->view('admin/footer');
		}else{
			redirect(base_url());
		}
	}

	public function insertar(){
		if($this->session->userdata("login"))
		{
			$id = $this->session->userdata("persona_perfil_id");
		    $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
		    $usu_creacion = $resi->persona_id;
			$persona_id = $this->input->post('persona_id');
			$organigrama_id = $this->input->post('organigrama_id');
			$fec_alta = $this->input->post('fec_alta');

			$this->form_validation->set_rules('persona_id', 'Persona', 'required');
			$this->form_validation->set_rules('organigrama_id', 'Organigrama', 'required');
			$this->form_validation->set_rules('fec_alta', 'Fecha', 'required');

			if ($this->form_validation->run() == TRUE){
				$this->organigramaP_model->insertarOrganigrama($organigrama_id, $persona_id, $fec_alta, $usu_creacion);
			}
			redirect(base_url()."Organigrama_persona/inicio");
		}else{
			redirect(base_url());
		}
	}

	public function baja($organigrama_persona_id){
		if($this->session->userdata("login"))
		{
			$id1 = $this->session->userdata("persona_perfil_id");
	        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id1))->row();
	        $usu_modificacion = $resi->persona_id;
			$fec_modificacion = date("Y-m-d H:i:s");

			$lista = $this->db->get_where('tramite.organigrama_persona', array('organigrama_persona_id' => $organigrama_persona_id))->row();
			//var_dump($lista->fec_alta);

			$fecha1 = new DateTime($lista->fec_alta);
			$fecha2 = new DateTime($fec_modificacion);
			$fecha = $fecha1->diff($fecha2);
			//$anio = $fecha->format("%y");
			$vigencia=  $fecha->format("%a")/30;

			$this->organigramaP_model->agregarBaja($organigrama_persona_id, $usu_modificacion, $fec_modificacion, $vigencia);
			redirect(base_url()."Organigrama_persona/inicio");
		}else{
			redirect(base_url());
		}
	}

	public function ajax_select2(){
		if($this->session->userdata("login"))
		{
			$json = [];
			$this->load->database();
			if(!empty($this->input->get("q"))){
				$this->db->like('nombres', $this->input->get("q"));
				$query = $this->db->select('persona_id, nombres as text')
							->limit(10)
							->get("persona");
				$json = $query->result();
			}
			echo json_encode($json);
		}else{
			redirect(base_url());
		}
	}
	public function eliminar($organigrama_persona_id){
		if($this->session->userdata("login")){
			$id1 = $this->session->userdata("persona_perfil_id");
	        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id1))->row();
	        $usu_eliminacion = $resi->persona_id;
			$fec_eliminacion = date("Y-m-d H:i:s");
			$this->organigramaP_model->eliminarOrganigrama($organigrama_persona_id, $usu_eliminacion, $fec_eliminacion);
			redirect(base_url()."Organigrama_persona/inicio");
		}else{
			redirect(base_url());
		}
	}
}

