<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model("Perfil_model");
		$this->load->model("Rol_model");
	}

	public function menu(){
		if($this->session->userdata("login")){
			// $lista['verifica'] = $this->Rol_model->verifica();
			// $lista['perfil'] = $this->Perfil_model->index();
			// MENU DEL PRIMER NIVEL
			$this->db->select('*');
			$this->db->from('public.menu');
			$this->db->where('padre', 0);
			$this->db->where('nivel', 1);
			$this->db->order_by("orden", "asc");
			$query1 = $this->db->get(); 
			$lista['primer'] = $query1->result();

			// MENU DEL SEGUNDO NIVEL
			// $this->db->select('*');
			// $this->db->from('public.menu');
			// $this->db->where('nivel', 2);
			// $this->db->order_by("orden", "asc");
			// $query2 = $this->db->get(); 
			// $lista['segundo'] = $query2->result();

			// // MENU DEL TERCER NIVEL
			// $this->db->select('*');
			// $this->db->from('public.menu');
			// $this->db->where('nivel', 3);
			// $this->db->order_by("orden", "asc");
			// $query3 = $this->db->get(); 
			// $lista['tercero'] = $query3->result();
			
			$this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('crud/menu', $lista);
			$this->load->view('admin/footer');
		}
		else{
			redirect(base_url());
        }	
		
	}


	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."Menu/menu");
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
				$this->Perfil_model->insertar_perfil($perfil, $usu_creacion);
				redirect('Perfil');

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

		    $actualizar = $this->Perfil_model->actualizar($perfil_id, $perfil, $usu_modificacion, $fec_modificacion);
		    // var_dump($actualizar);
		  	redirect('Perfil');
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
		    $this->Perfil_model->eliminar($u, $usu_eliminacion, $fec_eliminacion);
		    redirect('Perfil');
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

	public function asignar_perfil_menu()
	{	
		if($this->session->userdata("login")){
			$datos = $this->input->post();
			
			if(isset($datos))
			{
				
				//OBTENER EL ID DEL USUARIO LOGUEADO
				$id = $this->session->userdata("persona_perfil_id");
	            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
	            $usu_creacion = $resi->persona_id;

	            $lista['verifica'] = $this->Rol_model->verifica();
				$lista['perfil_id'] =  $this->uri->segment(3);
				
				$this->load->view('admin/header');
				$this->load->view('admin/menu');
				$this->load->view('perfil/crear_menu_perfil', $lista);
				$this->load->view('admin/footer');
				
			}
		}
		else{
			redirect(base_url());
		}
	}

	public function updates()     
	{  
		if($this->session->userdata("login")){ 
			$id = $this->session->userdata("persona_perfil_id");
	        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
	        $usu_modificacion = $resi->persona_id;
	        $fec_modificacion = date("Y-m-d H:i:s"); 

	        			
	        	$cre = $this->input->post('perfil');

	        	$borrar = $this->db->query("SELECT *
											FROM perfil_menu 
											WHERE perfil_id = '$cre'
											ORDER BY perfil_menu_id")->result();

	        	foreach ($borrar as $valor) {
	        		$this->db->delete('perfil_menu', array('perfil_menu_id' => $valor->perfil_menu_id));
	        	}
		   		
		        foreach ($this->input->post('menus') as $me) {

		        $menu = array(
						'perfil_id'=>$cre,
						'menu_id'=>$me,
						'activo'=>1
						);

						$this->db->insert('public.perfil_menu', $menu);
			        							
					 }
					 
					redirect('Perfil');
					
			}
		else
		{
			redirect(base_url());
		}
	}

}

	