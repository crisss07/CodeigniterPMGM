<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clase_predio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("clase_predio_model");
	}

	public function clase_predio(){
		if($this->session->userdata("login")){
		
			$lista['clase_predio'] = $this->clase_predio_model->index();
			$this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('crud/clase_predio', $lista);
			$this->load->view('admin/footer');
		}
		else{
			redirect(base_url());
		}
	}

	
	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."Clase_predio/clase_predio");
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
				$this->clase_predio_model->insertar_clase_predio($descripcion, $alias, $coeficiente, $usu_creacion);
				redirect('clase_predio');

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

		    $clase_predio_id = $this->input->post('clase_predio_id');
		    $descripcion = $this->input->post('descripcion');
		    $alias = $this->input->post('alias');
		    $coeficiente = $this->input->post('coeficiente');

		    $actualizar = $this->clase_predio_model->actualizar($clase_predio_id,$descripcion,$alias,$coeficiente, $usu_modificacion, $fec_modificacion);
		   redirect('Clase_predio');
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
		    $this->clase_predio_model->eliminar($u, $usu_eliminacion, $fec_eliminacion);
		    redirect('Clase_predio');
		}
		else{
			redirect(base_url());
		}
	}


	   	  
}

