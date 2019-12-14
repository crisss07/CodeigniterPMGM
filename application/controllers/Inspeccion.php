<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inspeccion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model("Inspecciones_model");
		$this->load->model("Archivos_Model");
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


    public function crear($id_tramite=null){
		if($this->session->userdata("login")){
			//$lista['verifica'] = $this->rol_model->verifica();
			//$lista['zona_urbana'] = $this->zona_urbana_model->index();
			$id = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $dato = $resi->persona_id;
            $res = $this->db->get_where('persona', array('persona_id' => $dato))->row();
            $consulta = $this->db->query("SELECT organigrama_persona_id FROM tramite.organigrama_persona WHERE fec_baja is NULL AND persona_id = '$res->persona_id'")->row();
            
            //$ids['personas'] = $this->Derivaciones_model->personal($resi->persona_id);

            //muestra la persona a asignar
            $inspector=$this->db->query("SELECT p.*, a.total from persona p
RIGHT JOIN
(SELECT k.*  FROM
			(SELECT j.persona_id,(CASE WHEN j.total IS NULL THEN 0 ELSE j.total	END) FROM 
			(SELECT d.*,b.total FROM 
			
			(SELECT g.* FROM (SELECT persona_id FROM tramite.organigrama_persona WHERE cargo_id= (SELECT cargo_id FROM tramite.cargo WHERE descripcion in ('inspector','Inspector','INSPECTOR'))) AS g INNER JOIN
				(SELECT p.persona_id FROM persona_perfil p LEFT JOIN perfil o ON p.perfil_id=o.perfil_id WHERE o.perfil='Tecnico (Inspector)' and p.activo=1  and o.activo=1 GROUP BY p.persona_id) 
				as f on g.persona_id=f.persona_id) as d
				
			LEFT JOIN
			(SELECT  A.persona_id,COUNT(A.persona_id) as total FROM inspeccion.asignacion A	WHERE A.activo=1 GROUP BY A.persona_id ORDER BY total ASC) as b
			on b.persona_id=d.persona_id ORDER BY b.total ASC) as j) as k ORDER BY k.total asc limit 1) as a
 on p.persona_id=a.persona_id")->row();
			//fin de query

			//datos del beneficiario
            	$datos_solictante=$this->db->query("SELECT t.*,p.* from tramite.tramite t
            	JOIN persona p
            	on t.solicitante_id=p.persona_id
            	WHERE tramite_id= $id_tramite")->row();			
			//nro de tramite viene del tramite previamente creado


            	$ids['nro_tramite']=$id_tramite;
            	$ids['solicitante']=$datos_solictante;
				$ids['personas'] = $inspector; 
            	$ids['idss'] = $consulta->organigrama_persona_id;
            	$this->load->view('admin/header');
		        $this->load->view('admin/menu');
		        $this->load->view('inspecciones/crear', $ids);
		        $this->load->view('inspecciones/footer');
		        
          
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
				$organigrama_persona_id = $organigrama_persona->organigrama_persona_id;

				$tramite_id = $datos['tramite_id'];
				$destino = $datos['destino'];	
				$this->Inspecciones_model->insertar_asignacion( $tramite_id,$destino);	

				//derivacion del tramite


			
				 $query = $this->db->get_where('tramite.derivacion',array('tramite_id' =>$tramite_id ,'estado'=>1 ))->row();

				 $this->db->where('derivacion_id', $query->derivacion_id);
				 $this->db->update('tramite.derivacion', array('estado'=>0));

				 $orden=$query->orden;			

				 $destino=$this->Inspecciones_model->organigrama_id( $destino);	

				  $data = array(
				  	'tramite_id'=>$tramite_id,            
				  	'fuente'=>$organigrama_persona_id,
				  	'destino'=>$destino,
				  	'estado'=>1,
				  	'cite'=>$cite_generado,
				  	'adjunto' => '--',
				  	'fecha'=>date("Y-m-d H:i:s"),
				  	'descripcion'=>$this->input->post('descripcion'),
				  	'orden' =>$orden,
				  	'usu_creacion' =>$usu_creacion,
				  );
				  $this->db->insert('tramite.derivacion', $data);
				 //fin derivacion
				redirect('Derivaciones/listado');					
				}
		}else{
			redirect(base_url());
        }	
	}


	public function nuevo($ida=null,$id_tramite=null,$tipo_tramite_id=null){
		if($this->session->userdata("login")){
			//$lista['verifica'] = $this->rol_model->verifica();
			//$lista['zona_urbana'] = $this->zona_urbana_model->index();
			$id = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $dato = $resi->persona_id;
            $res = $this->db->get_where('persona', array('persona_id' => $dato))->row();

            $data['data_act'] = $this->Inspecciones_model->get_data_act();   
            $data['data_inf'] = $this->Inspecciones_model->get_data_inf();
            $data['derivacion'] = $this->Inspecciones_model->get_next($tipo_tramite_id,$id_tramite); 
            $data['tramite_id'] = $id_tramite;
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
			if($rol_user==1 or $rol_user==7)//rol de adm
			{
				$data['lista'] = $this->Inspecciones_model->get_lista();  
				$this->load->view('admin/header');
				$this->load->view('admin/menu');
				$this->load->view('inspecciones/lista_admin', $data);
				$this->load->view('admin/footer');
				$this->load->view('predios/index_js');
			}

			if($rol_user==5)//rol de inspector
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

	public function muestra_asignaciones(){
		if($this->session->userdata("login")){
		// $this->db->order_by('tramite.derivacion.fec_creacion', 'DESC');
			$id = $this->session->userdata("persona_perfil_id");
			$resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
			$dato = $resi->persona_id;
			$res = $this->db->get_where('persona', array('persona_id' => $dato))->row();
			//$id_user=$resi[0]['persona_id'];
			//$data['lista'] = $this->inspecciones_model->get_lista(); 
			// $data['lista'] = $this->inspecciones_model->get_lista();  
			// $asignados = 
			$this->db->select('persona_id, COUNT(persona_id) as total');
			$this->db->where('activo',1);
			$this->db->group_by('persona_id'); 
			$this->db->order_by('total', 'desc'); 
			$data['asignados'] = $this->db->get('inspeccion.asignacion')->result();
			//vdebug($data['asignados'], true, false, true);
			$this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('inspecciones/muestra_asignaciones', $data);
			$this->load->view('admin/footer');
			$this->load->view('predios/index_js');
		}else{
			redirect(base_url());
		}		
	}

	public function list_asign_user(){//listado de asignaciones pendientes no concluidas  a nivel usuario
        if($this->session->userdata("login")){
        $lista['verifica'] = $this->Rol_model->verifica();
        $lista['asignacion'] = $this->Inspecciones_model->get_asign_user();
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('inspecciones/listado', $lista);
        $this->load->view('admin/footer');
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
		//vdebug($inspectores, true, false, true);
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
                //nombre de la carpeta
                $tramite_id=$this->input->post('tramite_id');
                $this->db->select('cite,remitente');              
                $cite=$this->db->get_where('tramite.tramite',array('tramite_id' =>$tramite_id))->row();
                $remitente=$cite->remitente;
                $cite=$cite->cite;


                $cite = explode("/", $cite); 
				$cite = end($cite);//numero de cite con formato 2019-00170 
                //obtencion de datos para el guardado en la base de datos           
                /*$this->db->select('archivo_id'); 
                $archivo_id=$this->db->get_where('archivo.archivo',array('nombre' =>$cite))->row();
                $archivo_id=$archivo_id->archivo_id;

                $this->db->select('archivo_id');              
                $archivo_id=$this->db->get_where('archivo.archivo',array('padre' =>$archivo_id,'nombre'=>'inspecciones'))->row();                
                $archivo_id=$archivo_id->archivo_id; // numero del archivoID  
                           
                  */
                

                $nombre_carpeta=$cite;
                $vobo=$this->input->post('vobo')?1:0;
                $inspeccion=$this->input->post('inspeccion');
                $notificacion=$this->input->post('notificacion');  
                $asignacion_id=$this->input->post('asignacion_id');
                		/*
                //guardado de los datos del archivo en la BD
				$nombre1 = $asignacion_id.'1';
				$nombre2 = $asignacion_id.'2';
				$descripcion1 = 'acta de inspeccion';
				$descripcion3 = 'acta de notificacion';
				$descripcion2 = 'del tramite ';
				$archivo_id = $archivo_id;
				$carpeta = 'pdf';
				$adjunto = 'nombre del archivo';
				$extension = 'pdf';
				$url1    = './public/assets/archivos/tramites/'.$nombre_carpeta.'/inspecciones';	 
                $this->Archivos_Model->insertardocumentoh($nombre1, $remitente, $descripcion1, $archivo_id, $carpeta, $adjunto, $extension, $url1);
                $this->Archivos_Model->insertardocumentoh($nombre2, $remitente, $descripcion3, $archivo_id, $carpeta, $adjunto, $extension, $url1);
                //fin de guardar en la BD*/

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
				//derivar al siguiente paso segun el flujo
				$this->deriva($this->input->post('tramite_id'));

				//fin de derivacion




					//$config['upload_path']      = './public/assets/archivos/'.$nombre_carpeta.'/inspeccion';	               
					$config['upload_path']      = './public/assets/archivos/inspecciones';	               
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
							redirect('Inspeccion/list_asign_user/');
                        }	                
            	}
                redirect(base_url().'Inspeccion/list_asign_user/');                  

			}
			
		}
		else{
			redirect(base_url());
        }	

	 }


	 public function deriva($id_tramite){
        
            $id = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            //id de usuario actual
            $usu_creacion = $resi->persona_id; 
            $cite_generado = '--';

        	
        
        $anio= date("Y");   
        //obteniendo el id de derivacion segun el orden maximo actual por el id tramite
      
        $query = $this->db->get_where('tramite.derivacion',array('estado' =>1 ,'tramite_id'=>$id_tramite ))->row();

        $this->db->where('derivacion_id', $query->derivacion_id);
        $this->db->update('tramite.derivacion', array('estado'=>0));
        //actualizando el estado de la derivacion
     

        $datos_organigrama_persona = $this->db->get_where(
            'tramite.organigrama_persona', 
            array(
                'persona_id'=>$usu_creacion,
                'activo'=>1
            ))->result_array();

        $data = array(
            'tramite_id'=>$id_tramite,            
            'fuente'=>$datos_organigrama_persona[0]['organigrama_persona_id'],
            'destino'=>$this->input->post('destino'),
            'estado'=>1,
            'cite'=>$cite_generado,
            'adjunto' => '--',
            'fecha'=>date("Y-m-d H:i:s"),
            'descripcion'=>$this->input->post('descripcion'),
            'orden' =>$this->input->post('orden'),
            'usu_creacion' =>$usu_creacion,
        );
        $this->db->insert('tramite.derivacion', $data);
    }

	}

	