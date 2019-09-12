<<<<<<< Updated upstream
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bloque_grupo_mat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model("Bloque_grupo_mat_model");
		$this->load->model("rol_model");
	}

	public function bloque_grupo_mat(){
		if($this->session->userdata("login")){

		$lista['verifica'] = $this->rol_model->verifica();
		$lista['bloque_grupo_mat'] = $this->bloque_grupo_mat_model->index();
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('crud/bloque_grupo_mat', $lista);
		$this->load->view('admin/footer');
		}
		else{
			redirect(base_url());
        }
	}

	
	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."bloque_grupo_mat/bloque_grupo_mat");
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
				$this->bloque_grupo_mat_model->insertar_zona($descripcion, $usu_creacion);
				redirect('bloque_grupo_mat');
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

		    $grupo_mat_id = $this->input->post('grupo_mat_id');
		    $descripcion = $this->input->post('descripcion');

		    $actualizar = $this->bloque_grupo_mat_model->actualizar($grupo_mat_id, $descripcion, $usu_modificacion, $fec_modificacion);
		   redirect('bloque_grupo_mat');
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
		    $this->bloque_grupo_mat_model->eliminar($u, $usu_eliminacion, $fec_eliminacion);
		    redirect('bloque_grupo_mat');
		  
		}
		else{
			redirect(base_url());
		}
	 }

	 public function activo($id)
    {
        if ($this->session->userdata("login")) {

            $consulta = $this->db->query("SELECT *
										FROM catastro.bloque_grupo_mat
										WHERE grupo_mat_id = $id")->row();            
            $valor = $consulta->activo;
            
            $valor=1-$valor;

            $data = array(

                'activo' => $valor, //input                                 
            );
            $this->db->where('grupo_mat_id', $id);
            $this->db->update('catastro.bloque_grupo_mat', $data);          
            redirect(base_url() . 'bloque_grupo_mat');
        } else {
            redirect(base_url());
        }
    }

}

=======
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bloque_grupo_mat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model("bloque_grupo_mat_model");
		$this->load->model("rol_model");
	}

	public function bloque_grupo_mat(){
		if($this->session->userdata("login")){

		$lista['verifica'] = $this->rol_model->verifica();
		$lista['bloque_grupo_mat'] = $this->bloque_grupo_mat_model->index();
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('crud/bloque_grupo_mat', $lista);
		$this->load->view('admin/footer');
		}
		else{
			redirect(base_url());
        }
	}

	
	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."bloque_grupo_mat/bloque_grupo_mat");
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
				$this->bloque_grupo_mat_model->insertar_zona($descripcion, $usu_creacion);
				redirect('bloque_grupo_mat');
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

		    $grupo_mat_id = $this->input->post('grupo_mat_id');
		    $descripcion = $this->input->post('descripcion');

		    $actualizar = $this->bloque_grupo_mat_model->actualizar($grupo_mat_id, $descripcion, $usu_modificacion, $fec_modificacion);
		   redirect('bloque_grupo_mat');
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
		    $this->bloque_grupo_mat_model->eliminar($u, $usu_eliminacion, $fec_eliminacion);
		    redirect('bloque_grupo_mat');
		  
		}
		else{
			redirect(base_url());
		}
	 }

	 public function activo($id)
    {
        if ($this->session->userdata("login")) {

            $consulta = $this->db->query("SELECT *
										FROM catastro.bloque_grupo_mat
										WHERE grupo_mat_id = $id")->row();            
            $valor = $consulta->activo;
            
            $valor=1-$valor;

            $data = array(

                'activo' => $valor, //input                                 
            );
            $this->db->where('grupo_mat_id', $id);
            $this->db->update('catastro.bloque_grupo_mat', $data);          
            redirect(base_url() . 'bloque_grupo_mat');
        } else {
            redirect(base_url());
        }
    }

}

>>>>>>> Stashed changes
