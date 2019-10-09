<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inspeccion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model("Inspecciones_model");
		$this->load->model("Derivaciones_model");
		$this->load->model("Rol_model");
        $this->load->helper('vayes_helper');
        $this->load->helper(array('form', 'url'));
    }
    
    public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."Inspeccion/crear");
		}
		else{
			redirect(base_url());
        }			
	}	


    public function crear(){
		if($this->session->userdata("login")){
			//$lista['verifica'] = $this->rol_model->verifica();
			//$lista['zona_urbana'] = $this->zona_urbana_model->index();
			$id = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $dato = $resi->persona_id;
            $res = $this->db->get_where('persona', array('persona_id' => $dato))->row();
            $consulta = $this->db->query("SELECT organigrama_persona_id FROM tramite.organigrama_persona WHERE fec_baja is NULL AND persona_id = '$res->persona_id'")->row();
            $ids['personas'] = $this->Derivaciones_model->personal($resi->persona_id);
            if ($consulta) {
            	$ids['idss'] = $consulta->organigrama_persona_id;
            	$this->load->view('admin/header');
		        $this->load->view('admin/menu');
		        $this->load->view('inspecciones/crear', $ids);
		        $this->load->view('admin/footer');
		        
            }else{
            	redirect(base_url());
            }
       	}else{
			redirect(base_url());
        }	
	}

	public function create(){
		if($this->session->userdata("login")){
			$datos = $this->input->post();
			if(isset($datos)){
				//OBTENER EL ID DEL USUARIO LOGUEADO
				$id = $this->session->userdata("persona_perfil_id");
	            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
	            $usu_creacion = $resi->persona_id;
	            $organigrama_persona=$this->db->query("SELECT organigrama_persona_id FROM tramite.organigrama_persona WHERE persona_id='$usu_creacion'")->row();
	            //corregir error aqui organigrama
				$organigrama_persona_id = $organigrama_persona->organigrama_persona_id;
				$tipo_documento_id = 1;
				$tipo_tramite_id = '15';
				$cite = $datos['cite'];
				$fecha = $datos['fecha'];
				$fojas = 0;
				$anexos = 0;
				$remitente = $datos['remitente'];
				$procedencia = '0';
				$referencia = '0';
				$adjunto = '--';
				$destino = $datos['destino'];
				$correlativo = $datos['correlativo'];
				$gestion = $datos['gestion'];
				$tipo_solicitante = $datos['tipo_solicitante'];
				$via_solicitud = 'Oficina';
				$solicitante_id = $datos['solicitante_id'];
				$observaciones = $datos['observaciones'];
				$requisitos='--';
				$tipo = $this->input->post('boton');
				$this->Inspecciones_model->insertar_tramite_inspecciones($organigrama_persona_id, $tipo_documento_id, $tipo_tramite_id, $cite, $fecha, $fojas, $anexos, $remitente, $procedencia, $referencia, $usu_creacion, $adjunto, $destino, $correlativo, $gestion, $tipo_solicitante, $via_solicitud, $solicitante_id, $observaciones, $requisitos, $tipo);
				$tramite = $this->db->query("SELECT * FROM tramite.tramite WHERE cite = '$cite'")->row();
				$idTramite = $tramite->tramite_id;
				
			

		
				
					
					
				redirect('Tipo_tramite/muestra_asignaciones');
					
				}
					
			
		}else{
			redirect(base_url());
        }	
	}


	public function nuevo($ida=null){
		if($this->session->userdata("login")){
			//$lista['verifica'] = $this->rol_model->verifica();
			//$lista['zona_urbana'] = $this->zona_urbana_model->index();
			$id = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $dato = $resi->persona_id;
            $res = $this->db->get_where('persona', array('persona_id' => $dato))->row();

            $data['data_act'] = $this->Inspecciones_model->get_data_act();   
            $data['data_inf'] = $this->Inspecciones_model->get_data_inf();   
            $data['asignacion_id']=$ida;
		            	$this->load->view('admin/header');
				        $this->load->view('admin/menu');
				        $this->load->view('inspecciones/nuevo', $data);
				        $this->load->view('inspecciones/footer');			
			
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

		    $zonaurb_id = $this->input->post('zonaurb_id');
		    $descripcion = $this->input->post('descripcion');
		   // var_dump($zonaurb_id);
		    $actualizar = $this->Zona_urbana_model->actualizar($zonaurb_id, $descripcion, $usu_modificacion, $fec_modificacion);
		  	redirect('Zona_urbana');
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
		    $this->Zona_urbana_model->eliminar($u, $usu_eliminacion, $fec_eliminacion);
		    redirect('Zona_urbana');
		}
		else{
			redirect(base_url());
        }	

	}

	 
	public function listado()
	{
		if($this->session->userdata("login")){
		// $this->db->order_by('tramite.derivacion.fec_creacion', 'DESC');
        $id = $this->session->userdata("persona_perfil_id");
        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
        $dato = $resi->persona_id;
		$res = $this->db->get_where('persona', array('persona_id' => $dato))->row();
		//$id_user=$resi[0]['persona_id'];
		//$data['lista'] = $this->Inspecciones_model->get_lista(); 
		$data['lista'] = $this->Inspecciones_model->get_lista();  

		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('inspecciones/lista_admin', $data);
		$this->load->view('admin/footer');
		$this->load->view('predios/index_js');
	}
	else{
		redirect(base_url());
	}
	}

	public function listado_user()
	{		
			if($this->session->userdata("login")){
			// $this->db->order_by('tramite.derivacion.fec_creacion', 'DESC');
			$id = $this->session->userdata("persona_perfil_id");
			$resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
			$dato = $resi->persona_id;
			$res = $this->db->get_where('persona', array('persona_id' => $dato))->row();			
			//obtiene el perfil del usuario para los casos 1=superadmin,,2 =inspector
			$perfil_user = $this->db->get_where('persona_perfil', array('persona_id' => $dato))->row();
			$rol_user=$perfil_user->perfil_id;
			if($rol_user==1)//rol de adm
			{
				$data['lista'] = $this->Inspecciones_model->get_lista();  
				$this->load->view('admin/header');
				$this->load->view('admin/menu');
				$this->load->view('inspecciones/lista_admin', $data);
				$this->load->view('admin/footer');
				$this->load->view('predios/index_js');
			}

			if($rol_user==7)//rol de inspector
			{
				$data['lista'] = $this->Inspecciones_model->get_lista_id($dato);  
	
			$this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('inspecciones/lista', $data);
			$this->load->view('admin/footer');
			$this->load->view('predios/index_js');
			}					
			
		}
		else{
			redirect(base_url());
		}
	}

	public function lista_asign()
	{
		if($this->session->userdata("login")){
		// $this->db->order_by('tramite.derivacion.fec_creacion', 'DESC');
        $id = $this->session->userdata("persona_perfil_id");
        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
        $dato = $resi->persona_id;
		$res = $this->db->get_where('persona', array('persona_id' => $dato))->row();
		//$id_user=$resi[0]['persona_id'];
		//$data['lista'] = $this->Inspecciones_model->get_lista(); 
		$perfil_user = $this->db->get_where('persona_perfil', array('persona_id' => $dato))->row();
		$rol_user=$perfil_user->perfil_id;

		$data['lista'] = $this->Inspecciones_model->get_lista_asign_id($dato); 
		//rol de adm
		if($rol_user==1){
			$data['lista'] = $this->Inspecciones_model->get_lista_asign(); 
		}

		$data['verifica'] = $this->Rol_model->verifica();  
		$this->db->where('perfil_id', 5);
		$inspectores = $this->db->get('persona_perfil')->result();
		$array_inspectores = array();
		foreach ($inspectores as $i) {
			array_push($array_inspectores, $i->persona_id);
		}
		// vdebug($array_inspectores, true, false, true);
		$this->db->where_in('persona_id', $array_inspectores);
		$data['inspectores'] = $this->db->get('persona')->result();
		$data['dist'] = $this->db->get('catastro.geo_distritos')->result();//todos los distritos

		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('inspecciones/lista_asign', $data);
		$this->load->view('inspecciones/footer');
		$this->load->view('predios/index_js');
	}
	else{
		redirect(base_url());
	}
	}

	public function lista_asign_id($idp=null)
	{
		if($this->session->userdata("login")){
		// $this->db->order_by('tramite.derivacion.fec_creacion', 'DESC');
        $id = $this->session->userdata("persona_perfil_id");
        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
        $dato = $resi->persona_id;
		$res = $this->db->get_where('persona', array('persona_id' => $dato))->row();
		//$id_user=$resi[0]['persona_id'];
		//$data['lista'] = $this->Inspecciones_model->get_lista(); 
		$data['lista'] = $this->Inspecciones_model->get_lista_asign_id($idp); 
		$data['verifica'] = $this->Rol_model->verifica();
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('inspecciones/lista_asignid', $data);
		$this->load->view('inspecciones/footer');
		$this->load->view('predios/index_js');
		}
		else{
			redirect(base_url());
		}
	}

	
	public function enviar_mail()
	{
		if($this->session->userdata("login")){
			$this->load->library('email');

			$this->email->from('your@example.com', 'Your Name');
			$this->email->to('rodrigosecko@gmail.com');
			$this->email->cc('another@another-example.com');
			$this->email->bcc('them@their-example.com');
			
			$this->email->subject('Email Test');
			$this->email->message('Testing the email class.');
			
			$this->email->send();
		}
		else{
			redirect(base_url());
		}
	}

	public function lista_asign_id_modal()
	{
		//$data['lista'] = $this->Inspecciones_model->get_lista_asign_id(4); 
		$data['lista'] = $this->Inspecciones_model->get_lista_asign_id(4); 
 

		$this->load->view('inspecciones/modalasignaciones', $data);
	
	}




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
                $vobo=$this->input->post('vobo')?1:0;
                $inspeccion=$this->input->post('inspeccion');
                $notificacion=$this->input->post('notificacion');  
                $asignacion_id=$this->input->post('asignacion_id');  
                if($vobo){
                    $bool=1;
                }
                else{
                    $bool=0;
                }
                $data = array(            
                    'asignacion_id' => $this->input->post('asignacion_id'), //input 
                    'tipo_actuacion_id' => $this->input->post('tipo_actuacion_id'), //input          
                    'tipo_infraccion_id' =>$this->input->post('tipo_infraccion_id'), //input        
                    'acta_inspeccion' => $asignacion_id.'1'.'.pdf', //input 
                    'acta_notificacion' => $asignacion_id.'2'.'.pdf', //input 
                    'vobo' => $vobo,                          
                );
                       
				$this->db->insert('inspeccion.inspeccion', $data);
				
				//cambiar el estado de la asignacion a activo=0 
				//la inspeccion ya fue concluida

				$data = array(
					'activo' => 0
				);
			
				$this->db->where('asignacion_id', $asignacion_id);
				$this->db->update('inspeccion.asignacion', $data);


					$config['upload_path']      = './public/assets/files/inspeccion';	               
                    $config['allowed_types']    = 'pdf';
                    $config['file_name']        = $asignacion_id.'1';
	                $config['overwrite']        = TRUE;
	                $config['max_size']         = 5048;

	                $this->load->library('upload', $config);

	                if ( ! $this->upload->do_upload('inspeccion'))
	                	{
	                        $error = array('error' => $this->upload->display_errors());

	                        //$this->load->view('crud/organigrama', $error);
	                	}
	                else
	                	{
							$data = array('upload_data' => $this->upload->data());
							$config['file_name']        = $asignacion_id.'2';
							$this->upload->initialize($config); 
							$this->load->library('upload', $config);
							if ( ! $this->upload->do_upload('notificacion'))
	                	{
	                        $error = array('error' => $this->upload->display_errors());	                        
	                	}
	                else
	                	{
	                        $data = array('upload_data' => $this->upload->data());
							redirect('prueba/lis1/');
                        }	                
            	}
                redirect(base_url().'prueba/lis1/');                  

			}
			
		}
		else{
			redirect(base_url());
        }	

	 }

	}

	