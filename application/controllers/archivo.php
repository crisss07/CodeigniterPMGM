<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Archivo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model("archivo_model");
		$this->load->model("rol_model");
        $this->load->helper('vayes_helper');
        $this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."Archivo/archivo");
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
			$lista['predios'] = $this->db->query("SELECT * FROM catastro.predio")->result();

			foreach ($lista['predios'] as $val) {

				
					$car = FCPATH.'public/assets/archivos/'.$val->codcatas.'-'.$val->predio_id;

					if (!file_exists($car)) {
			    		mkdir($car, 0777, true);

			    		$nombre = $val->codcatas.'-'.$val->predio_id;
						$array = array(
						'nombre' =>$nombre,
						'descripcion1' =>'descripcion1',
						'descripcion2' =>'descripcion2',
						'predio_id' =>$val->predio_id,
						'activo' =>1,
						'carpeta' => 'carpeta'
						);
						$vari = $this->db->insert('archivo.raiz', $array);

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

			$res['predios'] = $this->db->query("SELECT *
									FROM archivo.raiz
									WHERE raiz_id = $raiz_id
									AND activo = 1
									ORDER BY raiz_id
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

				$veri = $this->db->query("SELECT *
											FROM archivo.raiz
											WHERE nombre = '$nombre'")->row();

				if ($veri->nombre) {
					redirect('archivo');
				}else{
					$car = FCPATH.'public/assets/archivos/'.$nombre;
					mkdir($car, 0777, true);


					$this->archivo_model->insertarraiz($nombre, $descripcion1, $descripcion2, $carpeta);
					redirect('archivo');
				}

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

	        $antiguo =FCPATH.'public/assets/archivos/'.$ant;
	        $nuevo =FCPATH.'public/assets/archivos/'.$nombre;

			// $documentos =FCPATH.'public/assets/archivos/'.$val->codcatas.'-'.$val->predio_id.'/documentos';
			// $imagenes =FCPATH.'public/assets/archivos/'.$val->codcatas.'-'.$val->predio_id.'/imagenes';
			// $planos =FCPATH.'public/assets/archivos/'.$val->codcatas.'-'.$val->predio_id.'/planos';
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


			$res['predios'] = $this->db->query("SELECT *
									FROM archivo.hijo
									WHERE hijo_id = $hijo_id
									AND activo = 1
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
				$nombre_raiz = $datos['nombre_raiz'];
				$nombre = $datos['nombre'];
				$descripcion1 = $datos['descripcion1'];
				$descripcion2 = $datos['descripcion2'];
				$tipo = 'carpeta';
				$raiz_id = $datos['raiz_id'];

				$veri = $this->db->query("SELECT *
											FROM archivo.hijo
											WHERE nombre = '$nombre'")->row();

				if ($veri->nombre) {
					redirect('archivo/ingresarraiz/'.$raiz_id);
				}else{


				$car =FCPATH.'public/assets/archivos/'.$nombre_raiz.'/'.$nombre;
				mkdir($car, 0777, true);


				$this->archivo_model->insertarhijo($nombre, $descripcion1, $descripcion2, $tipo, $raiz_id);
				redirect('archivo/ingresarraiz/'.$raiz_id);
				}
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
	        $nomm = $this->db->query("SELECT *
	        						FROM archivo.raiz
	        						WHERE raiz_id = '$raiz_id'")->row();
	        $nombre_raiz = $nomm->nombre;
			$ant = $nom->nombre;
			$nombre = $this->input->post('nombre');
		    $descripcion1 = $this->input->post('descripcion1');
		    $descripcion2 = $this->input->post('descripcion2');
		    $tipo = $this->input->post('tipo');

	        $antiguo = FCPATH.'public/assets/archivos/'.$nombre_raiz.'/'.$ant;
	        $nuevo = FCPATH.'public/assets/archivos/'.$nombre_raiz.'/'.$nombre;
	     

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

		 	$var = $this->db->query("SELECT *
		 							FROM archivo.hijo
		 							WHERE hijo_id = $id")->row();
		 	$raiz_id = $var->raiz_id;
   
		    redirect('archivo/ingresarraiz/'.$raiz_id);
		}
		else{
			redirect(base_url());
        }	

	}

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

	            $nombre_hijo = $datos['nombre_hijo'];
				$nombre = $datos['nombre'];
				$descripcion1 = $datos['descripcion1'];
				$descripcion2 = $datos['descripcion2'];
				$raiz_id = $datos['raiz_id'];
				$hijo_id = $datos['hijo_id'];
				$carpeta = $datos['carpeta'];
				$adjunto = $datos['nombre'];


				$nombrer = $this->db->query("SELECT *
											FROM archivo.raiz
											WHERE raiz_id = $raiz_id")->row();
				$nombre_raiz = $nombrer->nombre;

				// $this->archivo_model->insertardocumento($nombre, $descripcion1, $descripcion2, $raiz_id, $carpeta, $adjunto);

				if($hijo_id){
					// var_dump($nombre_hijo);
						$con = $this->db->query("SELECT *
													FROM archivo.hijo
													WHERE hijo_id = $hijo_id")->row();
						$con1 = $con->raiz_id;
						$con2 = $this->db->query("SELECT *
													FROM archivo.raiz
													WHERE raiz_id = $con1")->row();
						$nombre_raizz = $con2->nombre;

						$config['upload_path']      = './public/assets/archivos/'.$nombre_raizz.'/'.$nombre_hijo;
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


								$consulta = $this->db->query("SELECT *
													FROM archivo.documento
													WHERE nombre like '$adjunto'
													AND extension like '$extension' 
													AND hijo_id = '$hijo_id'")->row();
								if ($consulta) {
									redirect('archivo/ingresarhijo/'.$hijo_id);
								}
								else{
								
									$url = './public/assets/archivos/'.$nombre_raizz.'/'.$nombre_hijo.'/'.$adjunto;

									$this->archivo_model->insertardocumentoh($nombre, $descripcion1, $descripcion2, $hijo_id, $carpeta, $adjunto, $extension, $url);
									redirect('archivo/ingresarhijo/'.$hijo_id);
								}
							}

				}
				else{
						$config['upload_path']      = './public/assets/archivos/'.$nombre_raiz;
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

								$veri = $this->db->query("SELECT *
															FROM archivo.documento
															WHERE nombre like '$adjunto' 
															AND extension like '$extension'
															AND raiz_id = '$raiz_id'")->row();
								if ($veri) {
									redirect('archivo/ingresarraiz/'.$raiz_id);
								}
								else
								{
									$url = './public/assets/archivos/'.$nombre_raiz.'/'.$adjunto;

									$this->archivo_model->insertardocumento($nombre, $descripcion1, $descripcion2, $raiz_id, $carpeta, $adjunto, $extension, $url);
									redirect('archivo/ingresarraiz/'.$raiz_id);
								}
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

	        $raiz_id = $this->input->post('raiz_id');
	        $hijo_id = $this->input->post('hijo_id');
	        $documento_id = $this->input->post('documento_id');

	        if ($hijo_id) {
	        	$nom = $this->db->query("SELECT *
	        						FROM archivo.documento
	        						WHERE documento_id = '$documento_id'")->row();
		        $nomm = $this->db->query("SELECT *
		        						FROM archivo.hijo
		        						WHERE hijo_id = '$hijo_id'")->row();

		        $nomr = $this->db->query("SELECT *
		        						FROM archivo.raiz
		        						WHERE raiz_id = '$nomm->raiz_id'")->row();


		        $nombre_hijo = $nomm->nombre;
		        $nombre_raiz = $nomr->nombre;
				$ant = $nom->nombre;
				$ext = $nom->extension;
				$nombre = $this->input->post('nombre');
			    $descripcion1 = $this->input->post('descripcion1');
			    $descripcion2 = $this->input->post('descripcion2');
			    $adjunto = $this->input->post('nombre');

			    $url = './public/assets/archivos/'.$nombre_raiz.'/'.$nombre_hijo.'/'.$adjunto;
			   

		        $antiguo = FCPATH.'public/assets/archivos/'.$nombre_raiz.'/'.$nombre_hijo.'/'.$ant.'.'.$ext;
		        $nuevo =FCPATH.'public/assets/archivos/'.$nombre_raiz.'/'.$nombre_hijo.'/'.$nombre.'.'.$ext;
			    rename($antiguo, $nuevo);
			    
			    $actualizar = $this->archivo_model->actualizardocumento($documento_id, $nombre, $descripcion1, $descripcion2, $adjunto, $url);

			   redirect('archivo/ingresarhijo/'.$hijo_id);



	        }
	        else
	        {
	        	$nom = $this->db->query("SELECT *
	        						FROM archivo.documento
	        						WHERE documento_id = '$documento_id'")->row();
		        $nomm = $this->db->query("SELECT *
		        						FROM archivo.raiz
		        						WHERE raiz_id = '$raiz_id'")->row();
		        $nombre_raiz = $nomm->nombre;
				$ant = $nom->nombre;
				$ext = $nom->extension;
				$nombre = $this->input->post('nombre');
			    $descripcion1 = $this->input->post('descripcion1');
			    $descripcion2 = $this->input->post('descripcion2');
			    $adjunto = $this->input->post('nombre');

			    $url = './public/assets/archivos/'.$nombre_raiz.'/'.$adjunto;
			   

		        $antiguo = FCPATH.'public/assets/archivos/'.$nombre_raiz.'/'.$ant.'.'.$ext;
		        $nuevo =FCPATH.'public/assets/archivos/'.$nombre_raiz.'/'.$nombre.'.'.$ext;
			    rename($antiguo, $nuevo);
			    
			    $actualizar = $this->archivo_model->actualizardocumento($documento_id, $nombre, $descripcion1, $descripcion2, $adjunto, $url);

			   redirect('archivo/ingresarraiz/'.$raiz_id);



	        }
	       
		}
		else{
			redirect(base_url());
		}
	}
	
	

	public function eliminardocumento($id)
	{
		if($this->session->userdata("login")){
		 	
		 	// $id = $this->input->post("id");
		 	$this->archivo_model->eliminardocumento($id);

		 	$var = $this->db->query("SELECT *
		 							FROM archivo.documento
		 							WHERE documento_id = $id")->row();
		 	$raiz_id = $var->raiz_id;
   
		    redirect('archivo/ingresarraiz/'.$raiz_id);
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

		$bus['raiz'] = $this->db->query("SELECT *
									FROM archivo.raiz
									WHERE nombre like '%$buscador%'
									OR descripcion1 like '%$buscador%'
									OR descripcion2 like '%$buscador%' 
									AND activo = 1")->result();
		$bus['hijo'] = $this->db->query("SELECT *
									FROM archivo.hijo
									WHERE nombre like '%$buscador%'
									OR descripcion1 like '%$buscador%'
									OR descripcion2 like '%$buscador%' 
									AND activo = 1")->result();
		$bus['documento'] = $this->db->query("SELECT *
									FROM archivo.documento
									WHERE nombre like '%$buscador%'
									OR descripcion1 like '%$buscador%'
									OR descripcion2 like '%$buscador%' 
									AND activo = 1")->result();

		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('archivo/buscadores', $bus);
		$this->load->view('admin/footer');
		}
		else{
			redirect(base_url());
        }	
		
	}

	public function atras()
	{
		if($this->session->userdata("login")){
		    history.back(); 
		}
		else{
			redirect(base_url());
        }	

	}

}

	