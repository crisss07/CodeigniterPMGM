<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model("usuario_model");
		$this->load->model("rol_model");
	}

	
	public function prueba(){
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('usuarios/usuarios');
		$this->load->view('admin/footer');
		
	}

	public function listar(){

		if($this->session->userdata("login")){

			$lista['verifica'] = $this->rol_model->verifica();
			$lista['usuario'] = $this->usuario_model->index();
			

			$this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('usuarios/listar', $lista);
			$this->load->view('admin/footer');
		}
		else{
			redirect(base_url());
		}
		
	}

	public function usuario(){

		if($this->session->userdata("login")){
			$this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('usuarios/usuarioss');
			$this->load->view('admin/footer');
		}
		else{
			redirect(base_url());
		}
		
	}

	
	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."Usuario/usuario");
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
				$this->zona_urbana_model->insertar_zona($descripcion, $usu_creacion);
				redirect('Zona_urbana');

			}
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
		    $this->zona_urbana_model->eliminar($u, $usu_eliminacion, $fec_eliminacion);
		    redirect('Zona_urbana');
		}
		else{
			redirect(base_url());
		}
	}

	   public function adaptar()
	{
		//$id = $this->db->get_where('persona', array('ci' => '9112739'))->row();
		//var_dump($id->nombres);
		$id = $this->db->query("SELECT * FROM persona WHERE ci = '9112739'")->row();
		$id_persona = $id->persona_id;
		$nombres = $id->nombres;
		var_dump($id_persona, $nombres);
	}

	public function registra()
	{
		if($this->session->userdata("login")){
			$datos = $this->input->post();
			
			if(isset($datos))
			{
				$nombres = $datos['nombres'];
				$paterno = $datos['paterno'];
				$materno = $datos['materno'];
				$ci = $datos['ci'];
				$fec_nacimiento = $datos['fec_nacimiento'];
				$this->usuario_model->insertar_usuario($nombres, $paterno, $materno, $ci, $fec_nacimiento);

				$id = $this->db->query("SELECT * FROM persona WHERE ci = '$ci'")->row();

				$persona_id = $id->persona_id;
				$perfil_id = $datos['perfil_id'];
				$this->usuario_model->insertar_persona_perfil($persona_id, $perfil_id);

				$perfil_id = $this->db->query("SELECT MAX(persona_perfil_id) as max FROM persona_perfil")->row();

				$persona_perfil_id = $perfil_id->max;
				$rol_id = $datos['rol_id'];
				$usuario = $datos['usuario'];
				$contrasenia = $datos['contrasenia'];
				$pass_cifrado = md5($contrasenia);

				$this->usuario_model->insertar_credencial($persona_perfil_id, $rol_id, $usuario, $pass_cifrado);
				
				redirect('usuario/listar');
				

			}
		 }
		else{
			redirect(base_url());
		}

	 }

	 public function abc()
	 {

	 	$persona_perfil_id = $this->db->query("SELECT MAX(persona_perfil_id) as max FROM persona_perfil")->row();
	 	var_dump($persona_perfil_id->max);


	 }


	 public function asignar($credencial_id)
	{	
		if($this->session->userdata("login")){
			$datos = $this->input->post();
			
			if(isset($datos))
			{
				//$c = $this->uri->segment(3);
				//echo $c;
				
				//OBTENER EL ID DEL USUARIO LOGUEADO
				$id = $this->session->userdata("persona_perfil_id");
	            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
	            $usu_creacion = $resi->persona_id;

	            $lista['verifica'] = $this->rol_model->verifica();
				$lista['credencial_id'] =  $this->uri->segment(3);
				$this->db->select('servicio_id, descripcion');
				$this->db->order_by('descripcion', 'ASC');
				$this->db->where('activo', 1);
				$query = $this->db->get('catastro.servicio');
				$lista['listado_servicios'] = $query->result();

				$this->load->view('admin/header');
				$this->load->view('admin/menu');
				$this->load->view('usuarios/crear_menu', $lista);
				$this->load->view('admin/footer');
				
				//$descripcion = $datos['descripcion'];
				//$this->zona_urbana_model->insertar_zona($descripcion, $usu_creacion);
				//redirect('Zona_urbana');
			}
		}
		else{
			redirect(base_url());
		}
	}


	 public function update()     
	{  
		if($this->session->userdata("login")){ 
			$id = $this->session->userdata("persona_perfil_id");
	        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
	        $usu_modificacion = $resi->persona_id;
	        $fec_modificacion = date("Y-m-d H:i:s"); 

	        			
	        	$cre = $this->input->post('credencial');

	        	$borrar = $this->db->query("SELECT *
											FROM credencial_menu 
											WHERE credencial_id = '$cre'
											ORDER BY credencial_menu_id")->result();

	        	foreach ($borrar as $valor) {
	        		$this->db->delete('credencial_menu', array('credencial_menu_id' => $valor->credencial_menu_id));
	        	}
		   		
		        foreach ($this->input->post('menus') as $me) {

		        $menu = array(
						'credencial_id'=>$cre,
						'menu_id'=>$me,
						'activo'=>1
						);

						$this->db->insert('public.credencial_menu', $menu);
			        							
					 }
					 
					redirect('usuario/listar');
					
			}
		else
		{
			redirect(base_url());
		}
	}

	public function activo($id)
    {
        if ($this->session->userdata("login")) {

            $consulta = $this->db->query("SELECT *
										FROM credencial
										WHERE credencial_id = $id")->row();            
            $valor = $consulta->activo;
            
            $valor=1-$valor;

            $data = array(

                'activo' => $valor, //input                                 
            );
            $this->db->where('credencial_id', $id);
            $this->db->update('public.credencial', $data);          
            redirect(base_url() . 'usuario/listar/');
        } 
        else 
        {
            redirect(base_url());
        }
    }
}



	