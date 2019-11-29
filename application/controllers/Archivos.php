<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Archivos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model("Archivos_Model");
		$this->load->model("Auditoria_Model");
		$this->load->model("rol_model");
        $this->load->helper('vayes_helper');
        $this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."Archivos/archivo");
		}
		else{
			redirect(base_url());
			// redirectPreviousPage(); 
        }	
		
	}

	public function archivo(){
		if($this->session->userdata("login")){
			// $lista['verifica'] = $this->rol_model->verifica();
			// $lista['zona_urbana'] = $this->zona_urbana_model->index();
			/*$lista['predios'] = $this->db->get_where('catastro.predio')->result();
			
			foreach ($lista['predios'] as $val) {
					$car = FCPATH.'public/assets/archivos/'.$val->codcatas.'-'.$val->predio_id;

					if (!file_exists($car)) {
			    		mkdir($car, 0777, true);

			    		$nombre = $val->codcatas.'-'.$val->predio_id;
						$array = array(
						'padre' => 0,
						'nombre' =>$nombre,
						'descripcion1' =>'descripcion1',
						'descripcion2' =>'descripcion2',
						'predio_id' =>$val->predio_id,
						'nivel' => 1,
						'activo' =>1,
						'carpeta' => 'carpeta'
						);
						$vari = $this->db->insert('archivo.archivo', $array);
					}
			}*/

			$listass['predios'] = $this->db->get_where('archivo.archivo' , array('padre' => '0', 'nivel' => '1', 'activo' => '1'))->result();
			$this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('archivos/raiz', $listass);
			$this->load->view('admin/footer');
		}
		else{
			redirect(base_url());
        }	
	}

	// ESTOS SON LOS CONTROLADORES DE LA RAIZ

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

				$veri = $this->db->get_where('archivo.archivo', array('nombre' => $nombre, 'padre' => '0', 'activo' => '1'))->row();
				if ($veri) {
					// echo 'ya existe una carpeta con el mismo nombre';
					redirect('Archivos');
				}else{
					// echo $nombre;
					// exit();
					$car = FCPATH.'public/assets/archivos/'.$nombre;
					mkdir($car, 0777, true);

					$this->Archivos_Model->insertarraiz($nombre, $descripcion1, $descripcion2, $carpeta);
					//AUDITORIA
					$tabla = 'archivo.archivo';
					$ultimoId = $this->db->insert_id();
					$data1 = $this->db->get_where('archivo.archivo', array('archivo_id' => $ultimoId))->row();
					$this->Auditoria_Model->auditoria_insertar(json_encode($data1), $tabla);

					redirect('Archivos');
				}

			}
		}
		else{
			redirect(base_url());
        }	
	}

	public function ingresar($archivo_id)
	{
		if($this->session->userdata("login")){
			$res['archivo'] = $this->db->get_where('archivo.archivo' , array('padre' => $archivo_id, 'activo' => '1'))->result();
			$res['documentos'] = $this->db->get_where('archivo.documentos' , array('archivo_id' => $archivo_id, 'activo' => '1'))->result();
			$resi = $this->db->get_where('archivo.archivo', array('archivo_id' => $archivo_id))->row();
			$res['archivo_id'] = $resi->archivo_id;
			$res['nombre_archivo'] = $resi->nombre;
			$res['padre'] = $resi->padre;

			$this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('archivos/hijo', $res);
			$this->load->view('admin/footer');
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


	        $archivo_id = $this->input->post('archivo_id');
	        $nom = $this->db->get_where('archivo.archivo', array('archivo_id' => $archivo_id))->row();
			$ant = $nom->nombre;
			$nombre = $this->input->post('nombre');

			$data1 = $this->db->get_where('archivo.archivo', array('archivo_id' => $archivo_id))->row();
			$confirma = $this->db->get_where('archivo.archivo', array('nombre' => $nombre, 'padre' => $data1->padre, 'activo' => '1'))->row();
			   
			if ($confirma) {
				$padree = $confirma->padre;
				if ($padree == '0') {
					redirect('Archivos');
				}
				else{
					redirect('Archivos/ingresar/'.$padree);
				}
			}
			else{
				$descripcion1 = $this->input->post('descripcion1');
			    $descripcion2 = $this->input->post('descripcion2');
			    $carpeta = $this->input->post('carpeta');

				$anti = $ant;		       
				$url = $nombre;
				$padre = $archivo_id;
				$base =FCPATH.'public/assets/archivos/';
				while($padre!=0) {
					$var = $this->db->get_where('archivo.archivo', array('archivo_id' => $nom->padre))->row();
					$anti = $var->nombre.'/'.$anti;
					$url = $var->nombre.'/'.$url;
					$padre = $var->padre;
				}
				$antiguo = $base.$anti;
				$nuevo = $base.$url;
			
			    rename($antiguo, $nuevo);
			    
			    $this->Archivos_Model->actualizarraiz($archivo_id, $nombre, $descripcion1, $descripcion2, $carpeta);

			    //AUDITORIA
				$tabla = 'archivo.archivo';
				$data2 = $this->db->get_where('archivo.archivo', array('archivo_id' => $archivo_id))->row();
				$this->Auditoria_Model->auditoria_modificar(json_encode($data1), json_encode($data2), $tabla);

			  	$padreee = $nom->padre;
				if ($padreee == '0') {
					redirect('Archivos');
				}
				else{
					redirect('Archivos/ingresar/'.$padreee);
				}
			}
		}
		else{
			redirect(base_url());
		}
	}
	

	public function eliminarraiz($id)
	{
		if($this->session->userdata("login")){
		 	// $id = $this->input->post("id");
		 	$this->Archivos_Model->eliminarraiz($id);
		 	//AUDITORIA
			$tabla = 'archivo.archivo';
			$data1 = $this->db->get_where('archivo.archivo', array('archivo_id' => $id))->row();
			$this->Auditoria_Model->auditoria_eliminar(json_encode($data1), $tabla);

		 	$url = $data1->nombre;
		 	$padre = $data1->padre;
		 	$base =FCPATH.'public/assets/archivos/';
				while($padre!=0) {
					$var = $this->db->get_where('archivo.archivo', array('archivo_id' => $padre))->row();
					$url = $var->nombre.'/'.$url;
					$padre = $var->padre;
				}
			$eliminar = $base.$url;
   			rmdir($eliminar);

   			if ($data1->padre == '0') {
				redirect('Archivos');
			}
			else{
				redirect('Archivos/ingresar/'.$data1->padre);
			}
		}
		else{
			redirect(base_url());
        }	
	}


	// ESTOS CON LOS CONTROLADORES DE HIJO

	// public function ingresarhijo($hijo_id)
	// {
	// 	if($this->session->userdata("login")){


	// 		$res['predios'] = $this->db->query("SELECT *
	// 								FROM archivo.hijo
	// 								WHERE hijo_id = $hijo_id
	// 								AND activo = 1
	// 								")->result();

	// 		$this->load->view('admin/header');
	// 		$this->load->view('admin/menu');
	// 		$this->load->view('archivos/documento', $res);
	// 		$this->load->view('admin/footer');
	// 	}
	// 	else{
	// 		redirect(base_url());
 //        }	

	// }

	public function insertarhijo()
	{
		if($this->session->userdata("login")){
			$datos = $this->input->post();
			if(isset($datos))
			{
				$nombre_archivo = $datos['nombre_archivo'];
				$archivo_id = $datos['archivo_id'];
				$nombre = $datos['nombre'];
				$descripcion1 = $datos['descripcion1'];
				$descripcion2 = $datos['descripcion2'];
				$carpeta = 'carpeta';
				
				$veri = $this->db->get_where('archivo.archivo', array('nombre' => $nombre, 'padre' => $archivo_id, 'activo' => '1'))->row();
				if ($veri) {
					redirect('Archivos/ingresar/'.$archivo_id);
				}else{

				// OBTIENE LA URL PARA CREAR LA CARPETA EN LA DIRECCION CORRECTA SI ES NECESARIO
				$compara = $this->db->get_where('archivo.archivo', array('archivo_id' => $archivo_id))->row();
				$url = $nombre;
				$padre = $archivo_id;
				$base =FCPATH.'public/assets/archivos/';
				while($padre!=0) {
					$var = $this->db->get_where('archivo.archivo', array('archivo_id' => $padre))->row();
					$url = $var->nombre.'/'.$url;
					$padre = $var->padre;
				}
				$concatenado = $base.$url;
				mkdir($concatenado, 0777, true);

				$this->Archivos_Model->insertarhijo($nombre, $descripcion1, $descripcion2, $carpeta, $archivo_id);
				redirect('Archivos/ingresar/'.$archivo_id);
				}
			}
		}
		else{
			redirect(base_url());
        }	
	}

	// public function updatehijo()     
	// {  
	// 	if($this->session->userdata("login")){      
	// 		//OBTENER EL ID DEL USUARIO LOGUEADO
	// 		$id = $this->session->userdata("persona_perfil_id");
	//         $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
	//         $usu_modificacion = $resi->persona_id;
	//         $fec_modificacion = date("Y-m-d H:i:s");
	//         $raiz_id = $this->input->post('raiz_id');
	//         $hijo_id = $this->input->post('hijo_id');
	//         $nom = $this->db->query("SELECT *
	//         						FROM archivo.hijo
	//         						WHERE hijo_id = '$hijo_id'")->row();
	//         $nomm = $this->db->query("SELECT *
	//         						FROM archivo.raiz
	//         						WHERE raiz_id = '$raiz_id'")->row();
	//         $nombre_raiz = $nomm->nombre;
	// 		$ant = $nom->nombre;
	// 		$nombre = $this->input->post('nombre');
	// 	    $descripcion1 = $this->input->post('descripcion1');
	// 	    $descripcion2 = $this->input->post('descripcion2');
	// 	    $tipo = $this->input->post('tipo');

	//         $antiguo = FCPATH.'public/assets/archivos/'.$nombre_raiz.'/'.$ant;
	//         $nuevo = FCPATH.'public/assets/archivos/'.$nombre_raiz.'/'.$nombre;
	     

	// 	    rename($antiguo, $nuevo);
		    
	// 	    $actualizar = $this->Archivos_Model->actualizarhijo($hijo_id, $nombre, $descripcion1, $descripcion2, $tipo);

	// 	   redirect('archivo/ingresarraiz/'.$raiz_id);
	// 	}
	// 	else{
	// 		redirect(base_url());
	// 	}
	// }
	
	

	// public function eliminarhijo($id)
	// {
	// 	if($this->session->userdata("login")){
		 	
	// 	 	// $id = $this->input->post("id");
	// 	 	$this->Archivos_Model->eliminarhijo($id);

	// 	 	$var = $this->db->query("SELECT *
	// 	 							FROM archivo.hijo
	// 	 							WHERE hijo_id = $id")->row();
	// 	 	$raiz_id = $var->raiz_id;
   
	// 	    redirect('archivo/ingresarraiz/'.$raiz_id);
	// 	}
	// 	else{
	// 		redirect(base_url());
 //        }	

	// }

	// ESTOS SON LOS CONTROLADORES DE LOS DOCUMENTOS PARA 

	public function do_upload()
	{
		if($this->session->userdata("login")){
			$datos = $this->input->post();
			if(isset($datos))
			{
				//OBTENER EL ID DEL USUARIO LOGUEADO
				$id = $this->session->userdata("persona_perfil_id");
	            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
	            $usu_creacion = $resi->persona_id;

	            $nombre_archivo = $datos['nombre_archivo'];
	            $archivo_id = $datos['archivo_id'];
	            $carpeta = $datos['carpeta'];
				$nombre = $datos['nombre'];
				$descripcion1 = $datos['descripcion1'];
				$descripcion2 = $datos['descripcion2'];
				$adjunto = $datos['nombre'];


				// $nombrer = $this->db->query("SELECT *
				// 							FROM archivo.raiz
				// 							WHERE raiz_id = $raiz_id")->row();
				// $nombre_raiz = $nombrer->nombre;

				// $this->Archivos_Model->insertardocumento($nombre, $descripcion1, $descripcion2, $raiz_id, $carpeta, $adjunto);



				$nom = $this->db->get_where('archivo.archivo', array('archivo_id' => $archivo_id))->row();
			 	$url = $nom->nombre;
			 	$padre = $nom->padre;
			 	$base ='./public/assets/archivos/';
					while($padre!=0) {
						$var = $this->db->get_where('archivo.archivo', array('archivo_id' => $padre))->row();
						$url = $var->nombre.'/'.$url;
						$padre = $var->padre;
					}

				$concatenado = $base.$url;

					$config['upload_path']      = $concatenado;
					$config['file_name']        = $adjunto;
					$config['allowed_types']    = '*';
					$config['overwrite']        = TRUE;
					$config['max_size']         = 10000;

					$this->load->library('upload', $config);
					
					if ( ! $this->upload->do_upload('adjunto'))
						{
							
							redirect(base_url());
							
						}
					else
						{
							$a =$this->upload->data();
							$partes = explode(".", $a['client_name']); 
							$extension = end($partes); 


							$consulta = $this->db->get_where('archivo.documentos', array('archivo_id' => $archivo_id, 'nombre' => $nombre, 'extension' => $extension, 'archivo_id' => '1'))->row(); 
							
							if ($consulta) {
								redirect('Archivos/ingresar/'.$archivo_id);
							}
							else{
							
								$url1 = $concatenado;

								$this->Archivos_Model->insertardocumentoh($nombre, $descripcion1, $descripcion2, $archivo_id, $carpeta, $adjunto, $extension, $url1);
								redirect('Archivos/ingresar/'.$archivo_id);
							}
						}

			}
			
		}
		else{
			redirect(base_url());
        }	

	}


	public function updatedocumento()     
	{  
		if($this->session->userdata("login")){      
			//OBTENER EL ID DEL USUARIO LOGUEADO
			$id = $this->session->userdata("persona_perfil_id");
	        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
	        $usu_modificacion = $resi->persona_id;
	        $fec_modificacion = date("Y-m-d H:i:s");
	        $datos = $this->input->post();
	        

	        $archivo_id = $this->input->post('archivo_id');
	        $documentos_id = $this->input->post('documentos_id');
	        $nombre = $this->input->post('nombre');
		    $descripcion1 = $this->input->post('descripcion1');
		    $descripcion2 = $this->input->post('descripcion2');
		    $adjunto = $this->input->post('nombre');

	        $nom_ant = $this->db->get_where('archivo.documentos', array('documentos_id' => $documentos_id))->row();
	        $anti = $nom_ant->nombre;
	        $ext = $nom_ant->extension;

	        $url1 = $nom_ant->url;
	        $url = substr($url1, 2);  // devuelve "cde"02-10-2018

	        $antiguo = FCPATH.$url.'/'.$anti.'.'.$ext;
	        $nuevo =FCPATH.$url.'/'.$adjunto.'.'.$ext;
		    rename($antiguo, $nuevo);
		    
		    $actualizar = $this->Archivos_Model->actualizardocumento($documentos_id, $nombre, $descripcion1, $descripcion2, $adjunto);

			redirect('Archivos/ingresar/'.$archivo_id);


	       
		}
		else{
			redirect(base_url());
		}
	}
	
	

	public function eliminardocumento($id)
	{
		if($this->session->userdata("login")){
		 	
		 	// $id = $this->input->post("id");
		 	$nom = $this->db->get_where('archivo.documentos', array('documentos_id' => $id, 'activo' => '1'))->row();
		 	$adjunto = $nom->adjunto;
	        $ext = $nom->extension;
		 	$url1 = $nom->url;
	        $url = substr($url1, 2);  // devuelve "cde"02-10-2018
	        $concatenado = FCPATH.$url.'/'.$adjunto.'.'.$ext;
	        unlink($concatenado);//PARA ELIMINAR UN ARCHIVO

		 	$this->Archivos_Model->eliminardocumento($id);
		    redirect('Archivos/ingresar/'.$nom->archivo_id);
		}
		else{
			redirect(base_url());
        }	

	}

	public function buscar()
	{
		if($this->session->userdata("login")){

		$buscador = $this->input->post('buscador');

		$bus['nom'] = $buscador;

		$bus['archivo'] = $this->db->query("SELECT *
									FROM archivo.archivo
									WHERE nombre like '%$buscador%'
									OR descripcion1 like '%$buscador%'
									OR descripcion2 like '%$buscador%' 
									AND activo = 1")->result();

		$bus['documento'] = $this->db->query("SELECT *
									FROM archivo.documentos
									WHERE nombre like '%$buscador%'
									OR descripcion1 like '%$buscador%'
									OR descripcion2 like '%$buscador%' 
									AND activo = 1")->result();

		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('archivos/buscadores', $bus);
		$this->load->view('admin/footer');
		}
		else{
			redirect(base_url());
        }	
		
	}

	public function atras()
	{	
		$cris = 'Cris';
		$criss = '%'.$cris.'%';
		$prueba = $this->db->get_where('archivo.archivo', array('nombre' => $criss, 'descripcion1' => $criss, 'descripcion2' => $criss, 'activo' => '1'))->row();
		var_dump($prueba);
		exit();



			$nombre_archivo = $datos['nombre_archivo'];
			$nombre = $datos['nombre'];
			$descripcion1 = $datos['descripcion1'];
			$descripcion2 = $datos['descripcion2'];
			$tipo = 'carpeta';
			$archivo_id = $datos['archivo_id'];
		
		$compara = $this->db->get_where('archivo.archivo', array('archivo_id' => $archivo_id))->row();
		$url = $compara->nombre;
		$padre = $compara->padre;
		$base =FCPATH.'public/assets/archivos/';
		while($padre!=0) {
			$var = $this->db->get_where('archivo.archivo', array('archivo_id' => $padre))->row();
			$url = $var->nombre.'/'.$url;
			$padre = $var->padre;
		}
		$concatenado = $base.$url;
		echo $concatenado;
	}

}