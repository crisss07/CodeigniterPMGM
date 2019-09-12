<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bloque_mat_item extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model("Bloque_mat_item_model");
		$this->load->model("zona_urbana_model");
		$this->load->model("rol_model");
	}

	public function bloque_mat_item(){
		if($this->session->userdata("login")){
			
			$lista['verifica'] = $this->rol_model->verifica();
			$lista['bloque_mat_item'] = $this->Bloque_mat_item_model->index();
			
			$this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('crud/bloque_mat_item', $lista);
			$this->load->view('admin/footer');
		}
		else{
			redirect(base_url());
		}
	}

	
	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."bloque_mat_item/bloque_mat_item");
		}
		else{
			redirect(base_url());
		}
		
	}

	public function insertar()
	{
		if($this->session->userdata("login")){
			$datos = $this->input->post();
		
			if(isset($datos))
			{
				//OBTENER EL ID DEL USUARIO LOGUEADO
				$id = $this->session->userdata("persona_perfil_id");
	            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
	            $usu_creacion = $resi->persona_id;

	            $grupo_mat_id = $datos['grupo_mat_id'];
	            $descripcion = $datos['descripcion'];
				$factor = $datos['factor'];
				$this->Bloque_mat_item_model->insertar_bloque($grupo_mat_id, $descripcion, $factor, $usu_creacion);
				redirect('bloque_mat_item');
			}
		}
		else{
			redirect(base_url());
		}

	 }

	 public function update()     
	{   
		if($this->session->userdata("login")){
			//OBTENER EL ID DEL USUARIO LOGUEADO
			$id = $this->session->userdata("persona_perfil_id");
	        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
	        $usu_modificacion = $resi->persona_id;
	        $fec_modificacion = date("Y-m-d H:i:s");

		    $mat_item_id = $this->input->post('mat_item_id');
		    $grupo_mat_id = $this->input->post('grupo_mat_id');
		    $descripcion = $this->input->post('descripcion');
		    $factor = $this->input->post('factor');

		    $actualizar = $this->Bloque_mat_item_model->actualizar($mat_item_id, $grupo_mat_id, $descripcion, $factor, $usu_modificacion, $fec_modificacion);
		   redirect('bloque_mat_item');
		 }
		else{
			redirect(base_url());
		}
	}

	 public function eliminar()
	 {
		if($this->session->userdata("login")){
		 	//OBTENER EL ID DEL USUARIO LOGUEADO
			$id = $this->session->userdata("persona_perfil_id");
	        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
	        $usu_eliminacion = $resi->persona_id;
	        $fec_eliminacion = date("Y-m-d H:i:s"); 

		    $u = $this->uri->segment(3);
		    $this->Bloque_mat_item_model->eliminar($u, $usu_eliminacion, $fec_eliminacion);
		    redirect('bloque_mat_item');
		}
		else{
			redirect(base_url());
		}
	  }

}

