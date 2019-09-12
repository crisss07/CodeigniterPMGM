<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organigrama_persona extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("tramite/OrganigramaP_model");
	}

	public function inicio(){
		if($this->session->userdata("login"))
		{
			$lista['datos'] = $this->OrganigramaP_model->lista();
			$lista['personas'] = $this->OrganigramaP_model->persona();
			$lista['organigramas'] = $this->OrganigramaP_model->organigrama();
			$lista['cargos'] = $this->OrganigramaP_model->cargo();
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
			$cargo_id = $this->input->post('cargo_id');
			$fec_alta = $this->input->post('fec_alta');

			$this->form_validation->set_rules('persona_id', 'Persona', 'required');
			$this->form_validation->set_rules('organigrama_id', 'Organigrama', 'required');
			$this->form_validation->set_rules('cargo_id', 'Persona', 'required');
			$this->form_validation->set_rules('fec_alta', 'Fecha', 'required');

			if ($this->form_validation->run() == TRUE){
				$this->OrganigramaP_model->insertarOrganigrama($organigrama_id, $persona_id, $fec_alta, $usu_creacion, $cargo_id);
			}
			redirect(base_url()."Organigrama_persona/inicio");
		}else{
			redirect(base_url());
		}
	}

	public function baja(){
		// if($this->session->userdata("login"))
		// {
		// 	$this->_validate();
		// 	$id1 = $this->session->userdata("persona_perfil_id");
	 //        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id1))->row();
	 //        $usu_modificacion = $resi->persona_id;
		// 	$fec_modificacion = date("Y-m-d H:i:s");
		// 	$organigrama_persona_id = $this->input->post('organigrama_persona_id1');
		// 	$fec_baja = $this->input->post('fec_baja');
		// 	$observacion = $this->input->post('observacion');

			
		// 		$lista = $this->db->get_where('tramite.organigrama_persona', array('organigrama_persona_id' => $organigrama_persona_id))->row();
		// 		$fecha1 = new DateTime($lista->fec_alta);
		// 		$fecha2 = new DateTime($fec_baja);
		// 		$fecha = $fecha1->diff($fecha2);
		// 		//$anio = $fecha->format("%y");
		// 		$vigencia=  $fecha->format("%a")/30;
		// 		$this->organigramaP_model->agregarBaja($organigrama_persona_id, $usu_modificacion, $fec_modificacion, $vigencia, $observacion, $fec_baja);
			

		// 	echo json_encode(array("status" => TRUE));
		// }else{
		// 	redirect(base_url());
		// }

		if($this->session->userdata("login"))
		{
			$id1 = $this->session->userdata("persona_perfil_id");
	        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id1))->row();
	        $usu_modificacion = $resi->persona_id;
			$fec_modificacion = date("Y-m-d H:i:s");
			$organigrama_persona_id = $this->input->post('organigrama_persona_id1');
			$fec_baja = $this->input->post('fec_baja');
			$observacion = $this->input->post('observacion');

			//$this->load->helper(array('form', 'url'));
  			$this->load->library('form_validation');

			$this->form_validation->set_rules('fec_baja', 'Fecha de baja', 'required');
			$this->form_validation->set_rules('observacion', 'Observación', 'required');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

			if ($this->form_validation->run() == TRUE){		
				$lista = $this->db->get_where('tramite.organigrama_persona', array('organigrama_persona_id' => $organigrama_persona_id))->row();
				$fecha1 = new DateTime($lista->fec_alta);
				$fecha2 = new DateTime($fec_baja);
				$fecha = $fecha1->diff($fecha2);
				//$anio = $fecha->format("%y");
				$vigencia=  $fecha->format("%a")/30;
				$this->OrganigramaP_model->agregarBaja($organigrama_persona_id, $usu_modificacion, $fec_modificacion, $vigencia, $observacion, $fec_baja);
			}else{
				echo validation_errors();
			}

			redirect(base_url()."Organigrama_persona/inicio");
		}else{
			redirect(base_url());
		}
	}

	private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('fec_baja') == '')
        {
            $data['inputerror'][] = 'fec_baja';
            $data['error_string'][] = 'Fecha de baja is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('observacion') == '')
        {
            $data['inputerror'][] = 'observacion';
            $data['error_string'][] = 'Observacion is required';
            $data['status'] = FALSE;
        }
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

	public function ajax_select2(){
		if($this->session->userdata("login"))
		{
			$json = [];
			$this->load->database();
			if(!empty($this->input->get("q"))){
				$this->db->like('nombres', $this->input->get("q"));
				$query = $this->db->select('persona_id as id, nombres as text')
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
			$this->OrganigramaP_model->eliminarOrganigrama($organigrama_persona_id, $usu_eliminacion, $fec_eliminacion);
			redirect("organigrama_persona/inicio");
			//redirect(base_url()."Organigrama_persona/inicio");
		}else{
			redirect(base_url());
		}
	}

	public function editar_organigrama($id){
		$data = $this->OrganigramaP_model->buscaOr($id);
		echo json_encode($data);	
	}

	public function guardar_editado(){
		if($this->session->userdata("login")){
			$id1 = $this->session->userdata("persona_perfil_id");
	        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id1))->row();
	        $usu_modificacion = $resi->persona_id;
			$fec_modificacion = date("Y-m-d H:i:s");

			$organigrama_persona_id = $this->input->post('organigrama_persona_id');
			$persona_id = $this->input->post('persona_id1');
			$organigrama_id = $this->input->post('organigrama_id1');
			$cargo_id = $this->input->post('cargo_id1');
			$fec_alta = $this->input->post('fec_alta1');			
			$this->OrganigramaP_model->insertarEditado($organigrama_persona_id, $persona_id, $organigrama_id, $cargo_id, $fec_alta, $usu_modificacion, $fec_modificacion);
			redirect(base_url()."Organigrama_persona/inicio");
		}else{
			redirect(base_url());
		}
	}


	
 
  
	
}

