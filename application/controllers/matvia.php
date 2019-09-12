<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matvia extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("matvia_model");
		$this->load->model("rol_model");
	}

	public function matvia(){
		if($this->session->userdata("login")){
		
			$lista['verifica'] = $this->rol_model->verifica();
			$lista['matvia'] = $this->matvia_model->index();
			$this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('crud/matvia', $lista);
			$this->load->view('admin/footer');
		}
		else{
			redirect(base_url());
		}
	}

	
	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."Matvia/matvia");
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
				$coeficiente = $datos['coeficiente'];
				$this->matvia_model->insertar_matvia($descripcion, $coeficiente, $usu_creacion);
				redirect('matvia');

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
	      
		    $matvia_id = $this->input->post('matvia_id');
		    $descripcion = $this->input->post('descripcion');
		    $coeficiente = $this->input->post('coeficiente');

		    $actualizar = $this->matvia_model->actualizar($matvia_id,$descripcion,$coeficiente, $usu_modificacion, $fec_modificacion);
		   redirect('Matvia');
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
		    $this->matvia_model->eliminar($u, $usu_eliminacion, $fec_eliminacion);
		    redirect('Matvia');
		}
		else{
			redirect(base_url());
		}
	}
   	  
}

