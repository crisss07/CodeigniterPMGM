<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Destino_bloque extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Destino_bloque_model");
		$this->load->model("Rol_model");
	}

	public function destino_bloque(){
		if($this->session->userdata("login")){

		$lista['verifica'] = $this->Rol_model->verifica();
		$lista['destino_bloque'] = $this->Destino_bloque_model->index();
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('crud/destino_bloque', $lista);
		$this->load->view('admin/footer');
		}
		else{
			redirect(base_url());
		}
	}

	
	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."Destino_bloque/destino_bloque");
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
				$this->Destino_bloque_model->insertar_destino_bloque($descripcion, $alias, $coeficiente, $usu_creacion);
				redirect('Destino_bloque');

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
	        
		    $destino_bloque_id = $this->input->post('destino_bloque_id');
		    $descripcion = $this->input->post('descripcion');
		    $alias = $this->input->post('alias');
		    $coeficiente = $this->input->post('coeficiente');

		    $actualizar = $this->Destino_bloque_model->actualizar($destino_bloque_id,$descripcion,$alias,$coeficiente, $usu_modificacion, $fec_modificacion);
		   redirect('Destino_bloque');
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
		    $this->Destino_bloque_model->eliminar($u, $usu_eliminacion, $fec_eliminacion);
		    redirect('Destino_bloque');
		}
		else{
			redirect(base_url());
		} 
	  }


}
