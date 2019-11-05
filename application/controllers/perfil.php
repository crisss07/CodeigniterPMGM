<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model("perfil_model");
		$this->load->model("rol_model");
	}

	public function perfil(){
		if($this->session->userdata("login")){
			$lista['verifica'] = $this->rol_model->verifica();
			$lista['perfil'] = $this->perfil_model->index();
			
			$this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('crud/perfil', $lista);
			$this->load->view('admin/footer');
		}
		else{
			redirect(base_url());
        }	
		
	}


	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."perfil/perfil");
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

				$perfil = $datos['perfil'];
				$this->perfil_model->insertar_perfil($perfil, $usu_creacion);
				redirect('perfil');

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

		    $perfil_id = $this->input->post('perfil_id');
		    $perfil = $this->input->post('perfil');

		   // var_dump($perfils_id);

		    $actualizar = $this->perfil_model->actualizar($perfil_id, $perfil, $usu_modificacion, $fec_modificacion);
		    // var_dump($actualizar);
		  	redirect('perfil');
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
		    $this->perfil_model->eliminar($u, $usu_eliminacion, $fec_eliminacion);
		    redirect('perfil');
		}
		else{
			redirect(base_url());
        }	

	}

	   public function adaptar()
	{
		//$id = $this->db->get_where('persona', array('ci' => '9112739'))->row();
		//var_dump($id->nombres);
		$id = $this->db->query("SELECT * FROM persona WHERE ci = '9112739'")->result();
	}

}

	