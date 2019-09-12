<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("servicio_model");
		$this->load->model("rol_model");
	}

	public function servicio(){
		if($this->session->userdata("login")){

			$lista['verifica'] = $this->rol_model->verifica();
			$lista['servicio'] = $this->servicio_model->index();
			$this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('crud/servicio', $lista);
			$this->load->view('admin/footer');
		}
		else{
			redirect(base_url());
		}
	}

	
	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."servicio/servicio");
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
				$this->servicio_model->insertar_servicio($descripcion, $alias, $coeficiente, $usu_creacion);
				redirect('servicio');

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
	        
		    $servicio_id = $this->input->post('servicio_id');
		    $descripcion = $this->input->post('descripcion');
		    $alias = $this->input->post('alias');
		    $coeficiente = $this->input->post('coeficiente');

		    $actualizar = $this->servicio_model->actualizar($servicio_id,$descripcion,$alias,$coeficiente, $usu_modificacion, $fec_modificacion);
		   redirect('Servicio');
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
		    $this->servicio_model->eliminar($u, $usu_eliminacion, $fec_eliminacion);
		    redirect('servicio');
	   	}
		else{
			redirect(base_url());
		}
	}


}

