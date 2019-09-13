<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_tramite extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model("Tramite_model");
		$this->load->model("Derivaciones_model");
		$this->load->model("rol_model");
        $this->load->helper('vayes_helper');
        $this->load->helper(array('form', 'url'));
	}

	public function index(){
		if($this->session->userdata("login")){
			redirect(base_url()."tipo_tramite/tipo_tramite");
		}else{
			redirect(base_url());
        }	
	}

//++++++++++++++++++++++++CREAR TRAMITE++++++++++++++++++++++++++++++++
	public function tipo_tramite(){
		if($this->session->userdata("login")){
			//$lista['verifica'] = $this->rol_model->verifica();
			//$lista['zona_urbana'] = $this->zona_urbana_model->index();
			$id = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $dato = $resi->persona_id;
            $res = $this->db->get_where('persona', array('persona_id' => $dato))->row();
            $consulta = $this->db->query("SELECT organigrama_persona_id FROM tramite.organigrama_persona WHERE fec_baja is NULL AND persona_id = '$res->persona_id'")->row();
            $ids['personas'] = $this->derivaciones_model->personal($resi->persona_id);
            if ($consulta) {
            	$ids['idss'] = $consulta->organigrama_persona_id;
            	$this->load->view('admin/header');
		        $this->load->view('admin/menu');
		        $this->load->view('tramites/tramite', $ids);
		        $this->load->view('admin/footer');
		        
            }else{
            	redirect(base_url()."prueba/sin_permisos");
            }
       	}else{
			redirect(base_url());
        }	
	}

	public function do_upload(){
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
				$tipo_tramite_id = $datos['tipo_tramite_id'];
				$cite = $datos['cite'];
				$fecha = $datos['fecha'];
				$fojas = 0;
				$anexos = 0;
				$remitente = $datos['remitente'];
				$procedencia = '0';
				$referencia = '0';
				$adjunto = $datos['cite_sin'];
				$destino = $datos['destino'];
				$correlativo = $datos['correlativo'];
				$gestion = $datos['gestion'];
				$tipo_solicitante = $datos['tipo_solicitante'];
				$via_solicitud = 'Oficina';
				$solicitante_id = $datos['solicitante_id'];
				$observaciones = $datos['observaciones'];
				$requisitos=$datos['requisitos'];
				$tipo = $this->input->post('boton');
				$this->Tramite_model->insertar_tramite_nuevo($organigrama_persona_id, $tipo_documento_id, $tipo_tramite_id, $cite, $fecha, $fojas, $anexos, $remitente, $procedencia, $referencia, $usu_creacion, $adjunto, $destino, $correlativo, $gestion, $tipo_solicitante, $via_solicitud, $solicitante_id, $observaciones, $requisitos, $tipo);
				$tramite = $this->db->query("SELECT * FROM tramite.tramite WHERE cite = '$cite'")->row();
				$idTramite = $tramite->tramite_id;

				//COMIENZO PARA CREAR CARPETA PARA EL ARCHIVO DIGITAL
				if ($tipo_tramite_id === '1') {

					$partes = explode("/", $cite); 
					$citee = end($partes); 

					$car = FCPATH.'public/assets/archivos/'.$citee;
							if (!file_exists($car)) {
					    		mkdir($car, 0777, true);

					    		$nombre = $citee;
								$array = array(
								'nombre' =>$nombre,
								'descripcion1' =>'descripcion1',
								'descripcion2' =>'descripcion2',
								'activo' =>1,
								'carpeta' => 'carpeta'
								);
								$vari = $this->db->insert('archivo.raiz', $array);
						}
					$config['upload_path']      = './public/assets/archivos/'.$citee;
					$config['file_name']        = $adjunto;
					$config['allowed_types']    = 'pdf';
					$config['overwrite']        = TRUE;
					$config['max_size']         = 2048;

					$id = $this->db->query("SELECT *
											FROM archivo.raiz
											WHERE nombre like '$citee'")->row();
					$raiz_id = $id->raiz_id;
					$url = './public/assets/archivos/'.$citee.'/'.$adjunto;

					$array = array(
								'nombre' =>$adjunto,
								'descripcion1' =>'descripcion1',
								'descripcion2' =>'descripcion2',
								'raiz_id' =>$raiz_id,
								'carpeta' =>'pdf',
								'adjunto' =>$adjunto,
								'extension' =>'pdf',
								'url' =>$url,
								'activo' => '1',
								);

							// var_dump($array);
					$this->db->insert('archivo.documento', $array);

				}
				else
				{
					$config['upload_path']      = './public/assets/images/tramites';
					$config['file_name']        = $adjunto;
					$config['allowed_types']    = 'pdf';
					$config['overwrite']        = TRUE;
					$config['max_size']         = 2048;

				}
						
				// HASTA AQUI
				
				

				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('adjunto')){
					$error = array('error' => $this->upload->display_errors());
					redirect(base_url());
					//$this->load->view('crud/organigrama', $error);
				}else{
					$tipo_tramite = $this->db->query("SELECT tramite FROM tramite.tipo_tramite WHERE tipo_tramite_id = '$tipo_tramite_id'")->row();
					$data = array('upload_data' => $this->upload->data());
					if($tipo_tramite->tramite == 'Inspeccion'){
						redirect('Derivaciones/inspectores/'.$idTramite);
					}else{
						// redirect('Derivaciones/nuevo/'.$idTramite);
						redirect('Tipo_tramite/listado');
					}
				}
				$this->session->set_flashdata('in', $idTramite);	
			}
		}else{
			redirect(base_url());
        }	
	}
//++++++++++++++++++++FIN DE CREAR TRAMITE++++++++++++++++++++++++++++++++++++++++

//+++++++++++++++++++LISTA DE TRAMITES++++++++++++++++++++++++++++++++++++++++++++
	public function listado(){
		// $this->db->order_by('tramite.derivacion.fec_creacion', 'DESC');
		$perfil_persona = $this->session->userdata('persona_perfil_id');
		$datos_persona_perfil = $this->db->get_where('persona_perfil', array('persona_perfil_id'=>$perfil_persona))->result_array();
		// vdebug($datos_persona_perfil, false, false, true);
		$datos_organigrama_persona = $this->db->get_where('tramite.organigrama_persona', 
		    array(
		        'persona_id'=>$datos_persona_perfil[0]['persona_id'],
		        'activo'=>1
		    ))->result_array();

		// vdebug($datos_organigrama_persona, false, false, true);
		$fuente = $datos_organigrama_persona[0]['organigrama_persona_id'];
		// vdebug($datos_organigrama_persona, true, false, true);
		$this->db->where('tramite.tramite.organigrama_persona_id', $fuente);
		$this->db->where('tramite.activo', 1);
		$this->db->order_by('tramite.tramite.fec_creacion', 'DESC');
		$query = $this->db->get('tramite.tramite');
		// vdebug($query, false, false, true);
		$data['mis_tramites'] = $query->result();
		$data['verifica'] = $this->rol_model->verifica();
		//var_dump($usu_creacion);
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('tramites/listado', $data);
		$this->load->view('admin/footer');
		$this->load->view('predios/index_js');
	}

	public function ver($idTramite = null){
		if($this->session->userdata("login")){
			$data['flujo'] = $this->db->get_where('tramite.derivacion', array('tramite_id'=>$idTramite))->result_array();
	        //usuario que esta registrando
	        $id = $this->session->userdata("persona_perfil_id");
	        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
	        $usu_creacion = $resi->persona_id;

	        $data['tramite'] = $this->db->get_where('tramite.tramite', array('tramite_id' => $idTramite))->row();
	        $data['tipo_tramite']= $this->db->query("SELECT tt.tramite FROM tramite.tramite tr JOIN tramite.tipo_tramite tt ON tr.tipo_tramite_id=tt.tipo_tramite_id  WHERE tr.tramite_id = '$idTramite'")->row();
	        $data['requisitos']= $this->db->query("SELECT tt.descripcion FROM tramite.tramite_requisito tr JOIN tramite.requisito tt ON tr.requisito_id=tt.requisito_id  WHERE tr.tramite_id = '$idTramite'")->result();
	        $data['cedula']=$this->db->query("SELECT cp.ci FROM tramite.tramite tr JOIN public.persona cp ON tr.solicitante_id=cp.persona_id  WHERE tr.tramite_id = '$idTramite'")->row();
	        $this->load->view('admin/header');
	        $this->load->view('admin/menu');
	        $this->load->view('tramites/editar', $data);
	        $this->load->view('admin/footer');
	        $this->load->view('predios/index_js');
		}else{
			redirect(base_url());
        }	
	}

	public function editar(){
        if($this->session->userdata("login")){
            $id = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $usu_creacion = $resi->persona_id;
            $idTramite = $this->input->post('id_tramite');
            $data = array(
                'tipo_solicitante'=>$this->input->post('tipo_solicitante'),
                'solicitante_id'=>$this->input->post('solicitante_id'),
                'remitente'=>$this->input->post('remitente'),
                'observaciones'=>$this->input->post('observaciones'),
                'usu_modificacion' => $usu_creacion,
                'fec_modificacion'=>date("Y-m-d H:i:s"),
            );
            $this->db->where('tramite_id', $idTramite);
            $this->db->update('tramite.tramite', $data);
            redirect(base_url().'tipo_tramite/listado');
        }else{
            redirect(base_url());
        }
    }
//++++++++++++++++++++++++FIN DE LISTA DE TRAMITES+++++++++++++++++++++++++++++++

//++++++++++++++++++++++++BUSQUEDA DE TRAMITES+++++++++++++++++++++++++++++++++++
	public function busqueda(){
		if($this->session->userdata("login")){
			$valores['cite']=NULL;
		 	$valores['fecha']=NULL;
		 	$valores['remitente']=NULL;
		 	$valores['encontrados']=NULL;
		    $this->load->view('admin/header');
			$this->load->view('admin/menu');	
			$this->load->view('tramites/busqueda', $valores);
			$this->load->view('admin/footer');
			$this->load->view('predios/index_js');
		}else{
			redirect(base_url());
        }
	}

	public function encontrados(){
		if($this->session->userdata("login")){
		 	$cite = $this->input->post('cite');
		 	$fecha = $this->input->post('fecha');  
		 	$remitente = $this->input->post('remitente');
		 	if($cite != NULL){
		 		if($fecha != NULL){
		 			if($remitente != NULL){
		 				$encontrados= $this->db->query("SELECT * FROM tramite.tramite WHERE cite like('%$cite%') AND DATE(fecha) = '$fecha' AND remitente like('%$remitente%')")->result();
		 			}else{
		 				$encontrados= $this->db->query("SELECT * FROM tramite.tramite WHERE cite like('%$cite%') AND DATE(fecha) = '$fecha' ")->result();
		 			}
		 		}else{
		 			if($remitente != NULL){
		 				$encontrados= $this->db->query("SELECT * FROM tramite.tramite WHERE cite like('%$cite%') AND remitente like('%$remitente%')")->result();
		 			}else{
		 				$encontrados= $this->db->query("SELECT * FROM tramite.tramite WHERE cite like('%$cite%') ")->result();
		 			}
		 		}
		 	}else{
		 		if($fecha != NULL){
			 		if($remitente != NULL){
			 			$encontrados= $this->db->query("SELECT * FROM tramite.tramite WHERE DATE(fecha) = '$fecha' AND remitente like('%$remitente%')")->result();
			 		}else{
			 			$encontrados= $this->db->query("SELECT * FROM tramite.tramite WHERE  DATE(fecha) = '$fecha' ")->result();
			 		}
			 	}else{
			 		if($remitente != NULL){
			 			$encontrados= $this->db->query("SELECT * FROM tramite.tramite WHERE remitente like('%$remitente%')")->result();
			 		}else{
			 			$encontrados= NULL;
			 		}
			 	}
			 }
		 	$valores['cite']=$cite;
		 	$valores['fecha']=$fecha;
		 	$valores['remitente']=$remitente;
		 	$valores['encontrados']=$encontrados;
		    $this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('tramites/busqueda', $valores);
			$this->load->view('admin/footer');
			$this->load->view('predios/index_js');
		}else{
			redirect(base_url());
        }
	}

//++++++++++++++++++++++FIN DE BUSQUEDA DE TRAMITES++++++++++++++++++++++++++++++++

//+++++++++++++++++++++++SEGUIMIENTO DE TRAMITES+++++++++++++++++++++++++++++++++
	public function seguimiento($idTramite = null){
		if($this->session->userdata("login")){
            $data['flujo'] = $this->db->get_where('tramite.derivacion', array('tramite_id'=>$idTramite))->result_array();
            //usuario que esta registrando
            $id = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $usu_creacion = $resi->persona_id;

            $data['tramite'] = $this->db->get_where('tramite.tramite', array('tramite_id' => $idTramite))->row();
            $data['tipo_tramite']= $this->db->query("SELECT tt.tramite FROM tramite.tramite tr JOIN tramite.tipo_tramite tt ON tr.tipo_tramite_id=tt.tipo_tramite_id  WHERE tr.tramite_id = '$idTramite'")->row();
            $data['requisitos']= $this->db->query("SELECT tt.descripcion FROM tramite.tramite_requisito tr JOIN tramite.requisito tt ON tr.requisito_id=tt.requisito_id  WHERE tr.tramite_id = '$idTramite'")->result();
            $data['cedula']=$this->db->query("SELECT cp.ci FROM tramite.tramite tr JOIN public.persona cp ON tr.solicitante_id=cp.persona_id  WHERE tr.tramite_id = '$idTramite'")->row();
            $this->load->view('admin/header');
	        $this->load->view('admin/menu');
	        $this->load->view('tramites/seguimiento', $data);
	        $this->load->view('admin/footer');
	        $this->load->view('predios/index_js');
        }else{
            redirect(base_url());
        }   
		// $data['flujo'] = $this->db->get_where('tramite.derivacion', array('tramite_id'=>$idTramite))->result_array();
  //       //usuario que esta registrando
  //       $id = $this->session->userdata("persona_perfil_id");
  //       $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
  //       $usu_creacion = $resi->persona_id;

  //       $data['tramite'] = $this->db->get_where('tramite.tramite', array('tramite_id' => $idTramite))->row();

  //       $this->load->view('admin/header');
  //       $this->load->view('admin/menu');
  //       $this->load->view('tramites/seguimiento', $data);
  //       $this->load->view('admin/footer');
  //       $this->load->view('predios/index_js');
	}
//+++++++++++++++++++++++FIN DE SEGUIMIENTO DE TRAMITES+++++++++++++++++++++++++

//+++++++++++++++++++++++ELIMINAR TRAMITE++++++++++++++++++++++++++++++++++++++
	public function eliminar_tramite($idTramite = null){
		if($this->session->userdata("login")){
            $id = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $usu_creacion = $resi->persona_id;
            $data = array(
                'activo' => 0,
                'usu_eliminacion' => $usu_creacion,
                'fec_eliminacion' => date("Y-m-d H:i:s")
                
            );
            $this->db->where('tramite_id', $idTramite);
            $this->db->where('activo', 1);
            $this->db->update('tramite.tramite', $data);
            redirect(base_url().'tipo_tramite/listado');
        }else{
            redirect(base_url());
        }
	}
//++++++++++++++++++++++FIN DE ELIMINAR TRAMITE++++++++++++++++++++++++++++++++



		
	public function update(){   
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
		}else{
			redirect(base_url());
        }	
	}
	public function eliminar(){
		if($this->session->userdata("login")){
		 	//OBTENER EL ID DEL USUARIO LOGUEADO
			$id = $this->session->userdata("persona_perfil_id");
	        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
	        $usu_eliminacion = $resi->persona_id;
	        $fec_eliminacion = date("Y-m-d H:i:s"); 

		    $u = $this->uri->segment(3);
		    $this->zona_urbana_model->eliminar($u, $usu_eliminacion, $fec_eliminacion);
		    redirect('Zona_urbana');
		}else{
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

	/*public function ajax_verifica1(){
		$ci = $this->input->get("param1");
		// $this->db->where()
		//$this->db->where('ci', $ci);
		$respuesta = $this->db->query("SELECT requisito_id, descripcion FROM tramite.requisito WHERE tipo_tramite_id = '".$ci."'")->result();
		//var_dump($respuesta);
		// echo json_encode($respuesta);
		// $respuesta = array('ci'=>$ci, 'nombres' =>$datos_persona['Nombres'], 'paterno' =>$datos_persona['PrimerApellido'], 'materno' =>$datos_persona['SegundoApellido'], 'fec_nacimiento'=>$datos_persona['FechaNacimiento'], 'estado'=>'segip');
		// echo json_encode($respuesta);
		
		// $respuesta = array('ci'=>$ci, 'estado'=>'no');
		echo json_encode($respuesta);
	}*/

	public function ajax_verifica1(){

		$tramite_id = $this->input->get("param1");
		$respuesta['persona'] = $this->db->query("SELECT requisito_id, descripcion FROM tramite.requisito WHERE tipo_tramite_id = '".$tramite_id."'")->result();

		$busca_derivacion = $this->db->select('derivacion_id, tramite_id, fuente, destino, orden')->where('tramite_id', $tramite_id)->order_by('derivacion_id',"desc")->limit(1)->get('tramite.derivacion')->row_array();
		if ($busca_derivacion) {
			$siguiente = $busca_derivacion['orden']+1;
			$siguiente_persona = $this->db->get_where('tramite.flujo', array('tipo_tramite_id'=>$tramite_id, 'orden'=>$siguiente))->row_array();	
			if ($siguiente_persona) {
				$organigrama_persona = $this->db->get_where('tramite.organigrama_persona', array('organigrama_persona_id'=>$siguiente_persona['organigrama_persona_id']))->row_array();	

				$persona = $this->db->select('tramite.organigrama_persona.organigrama_persona_id, persona.nombres, persona.paterno, persona.materno, tramite.cargo.descripcion');
					$this->db->from('tramite.organigrama_persona');
					$this->db->join('persona', 'tramite.organigrama_persona.persona_id = persona.persona_id');
					$this->db->join('tramite.cargo', 'tramite.organigrama_persona.cargo_id = cargo.cargo_id');
					$this->db->where('organigrama_persona_id', $organigrama_persona['organigrama_persona_id']);
					$q = $this->db->get()->result_array();
				// vdebug($q, true, false, true);
				
				$respuesta['persona_derivacion'] = $q;
			} else {
				// no tiene configuracion
				$respuesta['persona_derivacion'] = '';
			}
			
		} else {
			// no tiene derivacion
			$respuesta['persona_derivacion'] = '';
		}
		// $respuesta['persona_derivacion'] = $this->db->get_where('tramite.flujo', array('tipo_tramite_id'=>$ci))->result_array();
		echo json_encode($respuesta);
	}

}
