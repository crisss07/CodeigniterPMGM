<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_planta extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("tipo_planta_model");
		$this->load->model("rol_model");
	}

	public function tipo_planta(){
		if($this->session->userdata("login")){
		
			$lista['verifica'] = $this->rol_model->verifica();
			$lista['tipo_planta'] = $this->tipo_planta_model->index();
			$this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('crud/tipo_planta', $lista);
			$this->load->view('admin/footer');
		}
		else{
			redirect(base_url());
		}
	}

	
	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."tipo_planta/tipo_planta");
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
				$this->tipo_planta_model->insertar_tipo_planta($descripcion, $alias, $coeficiente, $usu_creacion);
				redirect('tipo_planta');

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

		    $tipo_planta_id = $this->input->post('tipo_planta_id');
		    $descripcion = $this->input->post('descripcion');
		    $alias = $this->input->post('alias');
		    $coeficiente = $this->input->post('coeficiente');

		    $actualizar = $this->tipo_planta_model->actualizar($tipo_planta_id,$descripcion,$alias,$coeficiente, $usu_modificacion, $fec_modificacion);
		   redirect('Tipo_planta');
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
		    $this->tipo_planta_model->eliminar($u, $usu_eliminacion, $fec_eliminacion);
		    redirect('tipo_planta');
	    }
		else{
			redirect(base_url());
		}
	}

	 
}

