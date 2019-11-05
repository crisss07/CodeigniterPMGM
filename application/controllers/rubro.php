<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rubro extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model("rubro_model");
		$this->load->model("rol_model");
	}

	public function rubro(){
		if($this->session->userdata("login")){
			$lista['verifica'] = $this->rol_model->verifica();
			$lista['rubro'] = $this->rubro_model->index();
			
			$this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('crud/rubro', $lista);
			$this->load->view('admin/footer');
		}
		else{
			redirect(base_url());
        }	
		
	}


	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."rubro/rubro");
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

				$rubro = $datos['rubro'];
				$this->rubro_model->insertar_rubro($rubro, $usu_creacion);
				redirect('rubro');

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

		    $rubros_id = $this->input->post('rubros_id');
		    $rubro = $this->input->post('rubro');

		   // var_dump($rubros_id);

		    $actualizar = $this->rubro_model->actualizar($rubros_id, $rubro, $usu_modificacion, $fec_modificacion);
		    // var_dump($actualizar);
		  	redirect('rubro');
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
		    $this->rubro_model->eliminar($u, $usu_eliminacion, $fec_eliminacion);
		    redirect('rubro');
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

	