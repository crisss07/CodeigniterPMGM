<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inspeccion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model("inspecciones_model");
		$this->load->model("rol_model");
        $this->load->helper('vayes_helper');
        $this->load->helper(array('form', 'url'));
    }
    
    public function index()
	{
		if($this->session->userdata("login")){
			redirect(base_url()."inspecciones/nuevo");
		}
		else{
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

            $data['data_act'] = $this->inspecciones_model->get_data_act();   
            $data['data_inf'] = $this->inspecciones_model->get_data_inf();   
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

		    $actualizar = $this->zona_urbana_model->actualizar($zonaurb_id, $descripcion, $usu_modificacion, $fec_modificacion);
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
		    $this->zona_urbana_model->eliminar($u, $usu_eliminacion, $fec_eliminacion);
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
		//$data['lista'] = $this->inspecciones_model->get_lista(); 
		$data['lista'] = $this->inspecciones_model->get_lista();  

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
			//$id_user=$resi[0]['persona_id'];
			//$data['lista'] = $this->inspecciones_model->get_lista(); 
			$data['lista'] = $this->inspecciones_model->get_lista_id($dato);  
	
			$this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('inspecciones/lista', $data);
			$this->load->view('admin/footer');
			$this->load->view('predios/index_js');
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
		//$data['lista'] = $this->inspecciones_model->get_lista(); 
		$data['lista'] = $this->inspecciones_model->get_lista_asign(); 
		$data['verifica'] = $this->rol_model->verifica();   

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
							redirect('inspeccion/listado/');
                        }
	                
            	}
                    
                ///
                redirect(base_url().'inspeccion/listado/');                  

			}
			
		}
		else{
			redirect(base_url());
        }	

	 }

	}

	