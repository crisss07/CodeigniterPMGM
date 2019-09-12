<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Numero_tramite extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model("numero_tramite_model");
		$this->load->model("rol_model");
	}

	public function numero_tramite(){
		if($this->session->userdata("login")){

		$lista['verifica'] = $this->rol_model->verifica();
		$lista['numero_tramite'] = $this->numero_tramite_model->index();
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('crud/numero_tramite', $lista);
		$this->load->view('admin/footer');
		}
		else{
			redirect(base_url());
        }
	}

	
	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."numero_tramite/numero_tramite");
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

				$tipo = $datos['tipo'];
				$gestion = $datos['gestion'];
				$correlativo = $datos['correlativo'];
				$observaciones = $datos['observaciones'];

				$this->numero_tramite_model->insertar_numero_tramite($tipo, $gestion, $correlativo, $observaciones, $usu_creacion);
				redirect('numero_tramite');
			}
		}
		else{
			redirect(base_url());
		}	

	 }

	 public function update()     
	{   
		//OBTENER EL ID DEL USUARIO LOGUEADO
		if($this->session->userdata("login")){
			$id = $this->session->userdata("persona_perfil_id");
	        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
	        $usu_modificacion = $resi->persona_id;
	        $fec_modificacion = date("Y-m-d H:i:s");

		    $numero_tramite_id = $this->input->post('numero_tramite_id');
		    $tipo = $this->input->post('tipo');
		    $gestion = $this->input->post('gestion');
		    $correlativo = $this->input->post('correlativo');
		    $observaciones = $this->input->post('observaciones');

		    $actualizar = $this->numero_tramite_model->actualizar($numero_tramite_id, $tipo, $gestion, $correlativo, $observaciones, $usu_modificacion, $fec_modificacion);
		   redirect('numero_tramite');
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
		    $this->numero_tramite_model->eliminar($u, $usu_eliminacion, $fec_eliminacion);
		    redirect('numero_tramite');
		  
		}
		else{
			redirect(base_url());
		}
	 }

	 public function activo($id)
    {
        if ($this->session->userdata("login")) {

            $consulta = $this->db->query("SELECT *
										FROM tramite.numero_tramite
										WHERE numero_tramite_id = $id")->row();            
            $valor = $consulta->activo;
            
            $valor=1-$valor;

            $data = array(

                'activo' => $valor, //input                                 
            );
            $this->db->where('numero_tramite_id', $id);
            $this->db->update('tramite.numero_tramite', $data);          
            redirect(base_url() . 'numero_tramite');
        } else {
            redirect(base_url());
        }
    }

}

