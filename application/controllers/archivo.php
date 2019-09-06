<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Archivo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model("archivo_model");
		$this->load->model("rol_model");
	}

	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."Archivo/archivo");
		}
		else{
			redirect(base_url());
        }	
		
	}

	public function archivo(){
		if($this->session->userdata("login")){
			// $lista['verifica'] = $this->rol_model->verifica();
			// $lista['zona_urbana'] = $this->zona_urbana_model->index();
			$lista['predios'] = $this->db->query("SELECT * FROM catastro.predio")->result();

			foreach ($lista['predios'] as $val) {
					$car = 'C:\xampp\htdocs\CodeigniterPMGM\public/assets/archivos/'.$val->codcatas.'-'.$val->predio_id;
					$documentos = 'C:\xampp\htdocs\CodeigniterPMGM\public/assets/archivos/'.$val->codcatas.'-'.$val->predio_id.'/documentos';
					$imagenes = 'C:\xampp\htdocs\CodeigniterPMGM\public/assets/archivos/'.$val->codcatas.'-'.$val->predio_id.'/imagenes';
					$planos = 'C:\xampp\htdocs\CodeigniterPMGM\public/assets/archivos/'.$val->codcatas.'-'.$val->predio_id.'/planos';
					// var_dump($carpeta);
					if (!file_exists($car)) {
			    		mkdir($car, 0777, true);
			    		mkdir($documentos, 0777, true);
			    		mkdir($imagenes, 0777, true);
			    		mkdir($planos, 0777, true);

			    		$nombre = $val->codcatas.'-'.$val->predio_id;
						$array = array(
						'nombre' =>$nombre,
						'descripcion1' =>'descripcion1',
						'descripcion2' =>'descripcion2',
						'predio_id' =>$val->predio_id,
						'activo' =>1,
						'carpeta' => 'carpeta'
						);
					$this->db->insert('archivo.raiz', $array);
					$lista2 = $this->db->query("SELECT * FROM archivo.raiz WHERE nombre = '$nombre'")->row();

						$array1 = array(
						'nombre' =>'documentos',
						'descripcion1' =>'descripcion1',
						'descripcion2' =>'descripcion2',
						'raiz_id' =>$lista2->raiz_id,
						'activo' =>1
						);
						$this->db->insert('archivo.hijo', $array1);

						$array2 = array(
						'nombre' =>'imagenes',
						'descripcion1' =>'descripcion1',
						'descripcion2' =>'descripcion2',
						'raiz_id' =>$lista2->raiz_id,
						'activo' =>1
						);
						$this->db->insert('archivo.hijo', $array2);

						$array3 = array(
						'nombre' =>'planos',
						'descripcion1' =>'descripcion1',
						'descripcion2' =>'descripcion2',
						'raiz_id' =>$lista2->raiz_id,
						'activo' =>1
						);
						$this->db->insert('archivo.hijo', $array3);

					}

			}

			$listass['predios'] = $this->db->query("SELECT * FROM archivo.raiz WHERE activo = 1 ORDER BY predio_id")->result();

			$this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('archivo/raiz', $listass);
			$this->load->view('admin/footer');
				
				
		}
		else{
			redirect(base_url());
        }	
		
	}

	// ESTOS SON LOS CONTROLADORES DE LA RAIZ

	public function ingresarraiz($raiz_id)
	{
		if($this->session->userdata("login")){


			// $res['predios'] = $this->db->query("SELECT *
			// 						FROM archivo.hijo
			// 						WHERE raiz_id = $raiz_id
			// 						")->result();

			$res['predios'] = $this->db->query("SELECT *
									FROM archivo.raiz
									WHERE raiz_id = $raiz_id
									")->result();

			$this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('archivo/hijo', $res);
			$this->load->view('admin/footer');
		}
		else{
			redirect(base_url());
        }	

	}

	public function insertarraiz()
	{
		if($this->session->userdata("login")){
			$datos = $this->input->post();
			
			if(isset($datos))
			{
				$nombre = $datos['nombre'];
				$descripcion1 = $datos['descripcion1'];
				$descripcion2 = $datos['descripcion2'];
				$carpeta = $datos['carpeta'];


				$car = 'C:\xampp\htdocs\CodeigniterPMGM\public/assets/archivos/'.$nombre;
				mkdir($car, 0777, true);


				$this->archivo_model->insertarraiz($nombre, $descripcion1, $descripcion2, $carpeta);
				redirect('archivo');

			}
		}
		else{
			redirect(base_url());
        }	

	}

	public function updateraiz()     
	{  
		if($this->session->userdata("login")){      
			//OBTENER EL ID DEL USUARIO LOGUEADO
			$id = $this->session->userdata("persona_perfil_id");
	        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
	        $usu_modificacion = $resi->persona_id;
	        $fec_modificacion = date("Y-m-d H:i:s");
	        $raiz_id = $this->input->post('raiz_id');
	        $nom = $this->db->query("SELECT *
	        						FROM archivo.raiz
	        						WHERE raiz_id = '$raiz_id'")->row();
			$ant = $nom->nombre;
			$nombre = $this->input->post('nombre');
		    $descripcion1 = $this->input->post('descripcion1');
		    $descripcion2 = $this->input->post('descripcion2');
		    $carpeta = $this->input->post('carpeta');

	        $antiguo = 'C:\xampp\htdocs\CodeigniterPMGM\public/assets/archivos/'.$ant;
	        $nuevo = 'C:\xampp\htdocs\CodeigniterPMGM\public/assets/archivos/'.$nombre;

			// $documentos = 'C:\xampp\htdocs\CodeigniterPMGM\public/assets/archivos/'.$val->codcatas.'-'.$val->predio_id.'/documentos';
			// $imagenes = 'C:\xampp\htdocs\CodeigniterPMGM\public/assets/archivos/'.$val->codcatas.'-'.$val->predio_id.'/imagenes';
			// $planos = 'C:\xampp\htdocs\CodeigniterPMGM\public/assets/archivos/'.$val->codcatas.'-'.$val->predio_id.'/planos';
			// var_dump($carpeta);
		    //		mkdir($carpeta, 0777, true);
		    //  		mkdir($documentos, 0777, true);
		    //  		mkdir($imagenes, 0777, true);
		    //  		mkdir($planos, 0777, true);
		    // rename ("viejo_nombre", "nuevo_nombre")

		    rename($antiguo, $nuevo);
		    
		    $actualizar = $this->archivo_model->actualizarraiz($raiz_id, $nombre, $descripcion1, $descripcion2, $carpeta);
		   redirect('archivo');
		}
		else{
			redirect(base_url());
		}
	}
	
	

	public function eliminarraiz($id)
	{
		if($this->session->userdata("login")){
		 	
		 	// $id = $this->input->post("id");
		 	$this->archivo_model->eliminarraiz($id);
   
		    redirect('archivo');
		}
		else{
			redirect(base_url());
        }	

	}



	// ESTOS CON LOS CONTROLADORES DE HJJO

	public function ingresarhijo($hijo_id)
	{
		if($this->session->userdata("login")){


			// $res['predios'] = $this->db->query("SELECT *
			// 						FROM archivo.hijo
			// 						WHERE raiz_id = $raiz_id
			// 						")->result();

			$res['predios'] = $this->db->query("SELECT *
									FROM archivo.hijo
									WHERE hijo_id = $hijo_id
									")->result();

			$this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('archivo/documento', $res);
			$this->load->view('admin/footer');
		}
		else{
			redirect(base_url());
        }	

	}

	public function insertarhijo()
	{
		if($this->session->userdata("login")){
			$datos = $this->input->post();
			
			if(isset($datos))
			{
				$nombre = $datos['nombre'];
				$descripcion1 = $datos['descripcion1'];
				$descripcion2 = $datos['descripcion2'];
				$tipo = $datos['tipo'];
				$raiz_id = $datos['raiz_id'];


				$car = 'C:\xampp\htdocs\CodeigniterPMGM\public/assets/archivos/'.$nombre;
				mkdir($car, 0777, true);


				$this->archivo_model->insertarhijo($nombre, $descripcion1, $descripcion2, $tipo);
				redirect('archivo/ingresarraiz'.$raiz_id);

			}
		}
		else{
			redirect(base_url());
        }	

	}

	public function updatehijo()     
	{  
		if($this->session->userdata("login")){      
			//OBTENER EL ID DEL USUARIO LOGUEADO
			$id = $this->session->userdata("persona_perfil_id");
	        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
	        $usu_modificacion = $resi->persona_id;
	        $fec_modificacion = date("Y-m-d H:i:s");
	        $raiz_id = $this->input->post('raiz_id');
	        $hijo_id = $this->input->post('hijo_id');
	        $nom = $this->db->query("SELECT *
	        						FROM archivo.hijo
	        						WHERE hijo_id = '$hijo_id'")->row();
			$ant = $nom->nombre;
			$nombre = $this->input->post('nombre');
		    $descripcion1 = $this->input->post('descripcion1');
		    $descripcion2 = $this->input->post('descripcion2');
		    $tipo = $this->input->post('tipo');

	        $antiguo = 'C:\xampp\htdocs\CodeigniterPMGM\public/assets/archivos/'.$ant;
	        $nuevo = 'C:\xampp\htdocs\CodeigniterPMGM\public/assets/archivos/'.$nombre;

			// $documentos = 'C:\xampp\htdocs\CodeigniterPMGM\public/assets/archivos/'.$val->codcatas.'-'.$val->predio_id.'/documentos';
			// $imagenes = 'C:\xampp\htdocs\CodeigniterPMGM\public/assets/archivos/'.$val->codcatas.'-'.$val->predio_id.'/imagenes';
			// $planos = 'C:\xampp\htdocs\CodeigniterPMGM\public/assets/archivos/'.$val->codcatas.'-'.$val->predio_id.'/planos';
			// var_dump($carpeta);
		    //		mkdir($carpeta, 0777, true);
		    //  		mkdir($documentos, 0777, true);
		    //  		mkdir($imagenes, 0777, true);
		    //  		mkdir($planos, 0777, true);
		    // rename ("viejo_nombre", "nuevo_nombre")

		    rename($antiguo, $nuevo);
		    
		    $actualizar = $this->archivo_model->actualizarhijo($hijo_id, $nombre, $descripcion1, $descripcion2, $tipo);

		   redirect('archivo/ingresarraiz/'.$raiz_id);
		}
		else{
			redirect(base_url());
		}
	}
	
	

	public function eliminarhijo($id)
	{
		if($this->session->userdata("login")){
		 	
		 	// $id = $this->input->post("id");
		 	$this->archivo_model->eliminarhijo($id);
   
		    redirect('archivo/ingresarraiz');
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

	