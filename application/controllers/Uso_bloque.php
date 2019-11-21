<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class uso_bloque extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Uso_bloque_model");
		$this->load->model("Rol_model");
	}

	public function uso_bloque(){
		if($this->session->userdata("login")){
		
			$lista['verifica'] = $this->Rol_model->verifica();
			$lista['uso_bloque'] = $this->Uso_bloque_model->index();
			$this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('crud/uso_bloque', $lista);
			$this->load->view('admin/footer');
		}
		else{
			redirect(base_url());
		}
	}

	
	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."Uso_bloque/uso_bloque");
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
				$this->Uso_bloque_model->insertar_uso_bloque($descripcion, $alias, $coeficiente, $usu_creacion);
				redirect('Uso_bloque');

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

		    $uso_bloque_id = $this->input->post('uso_bloque_id');
		    $descripcion = $this->input->post('descripcion');
		    $alias = $this->input->post('alias');
		    $coeficiente = $this->input->post('coeficiente');

		    $actualizar = $this->Uso_bloque_model->actualizar($uso_bloque_id,$descripcion,$alias,$coeficiente, $usu_modificacion, $fec_modificacion);
		   redirect('Uso_bloque');
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
		    $this->Uso_bloque_model->eliminar($u, $usu_eliminacion, $fec_eliminacion);
		    redirect('Uso_bloque');
		}
		else{
			redirect(base_url());
		}
	}

   	 
}
