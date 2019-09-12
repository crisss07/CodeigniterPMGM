<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uso_suelo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("uso_suelo_model");
		$this->load->model("rol_model");
	}

	public function uso_suelo(){
		if($this->session->userdata("login")){

			$lista['verifica'] = $this->rol_model->verifica();
			$lista['uso_suelo'] = $this->uso_suelo_model->index();
			$this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('crud/uso_suelo', $lista);
			$this->load->view('admin/footer');
		}
		else{
			redirect(base_url());
		}
	}

	
	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."uso_suelo/uso_suelo");
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

				$descripcion = $datos['descripcion'];
				$alias = $datos['alias'];
				$coeficiente = $datos['coeficiente'];
				$this->uso_suelo_model->insertar_uso_suelo($descripcion, $alias, $coeficiente, $usu_creacion);
				redirect('uso_suelo');

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

		    $uso_suelo_id = $this->input->post('uso_suelo_id');
		    $descripcion = $this->input->post('descripcion');
		    $alias = $this->input->post('alias');
		    $coeficiente = $this->input->post('coeficiente');

		    $actualizar = $this->uso_suelo_model->actualizar($uso_suelo_id,$descripcion,$alias,$coeficiente, $usu_modificacion, $fec_modificacion);
		   redirect('Uso_suelo');
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
		    $this->uso_suelo_model->eliminar($u, $usu_eliminacion, $fec_eliminacion);
		    redirect('uso_suelo');
	    }
		else{
			redirect(base_url());
		}
	}

	 
}

