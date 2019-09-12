<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Predio_via extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model("Predio_via_model");
		$this->load->model("rol_model");
	}

	public function predio_via(){
		if($this->session->userdata("login")){
		
		$lista['verifica'] = $this->rol_model->verifica();
		$lista['predio_via'] = $this->Predio_via_model->index();
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('crud/predio_via', $lista);
		$this->load->view('admin/footer');
		}
		else{
			redirect(base_url());
		}
	}

	
	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."predio_via/predio_via");
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

	            $codcatas = $datos['codcatas'];
	            $objectid_via = $datos['objectid_via'];
				$matvia_id = $datos['matvia_id'];
				$this->Predio_via_model->insertar_via($codcatas, $objectid_via, $matvia_id, $usu_creacion);
				redirect('predio_via');

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

		    $via_id = $this->input->post('via_id');
		    $codcatas = $this->input->post('codcatas');
		    $objectid_via = $this->input->post('objectid_via');
		    $matvia_id = $this->input->post('matvia_id');

		    $actualizar = $this->Predio_via_model->actualizar($via_id, $codcatas, $objectid_via, $matvia_id, $usu_modificacion, $fec_modificacion);
		   redirect('predio_via');
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
		    $this->Predio_via_model->eliminar($u, $usu_eliminacion, $fec_eliminacion);
		    redirect('predio_via');
		}
		else{
			redirect(base_url());
		}
	}

}

