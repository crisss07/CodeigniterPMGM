<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_tramite extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model("Tramite_model");
		$this->load->model("Derivaciones_model");
		$this->load->model("Rol_model");
		$this->load->model("Persona_model");
        $this->load->helper('vayes_helper');
        $this->load->helper(array('form', 'url'));
        $this->load->library('pdf');
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
            $ids['personas'] = $this->Derivaciones_model->personal($resi->persona_id);
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

					$id = $this->db->query("SELECT * FROM archivo.raiz WHERE nombre like '$citee'")->row();
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
				}else{
					$config['upload_path']      = './public/assets/images/tramites';
					$config['file_name']        = $adjunto;
					$config['allowed_types']    = 'pdf';
					$config['overwrite']        = TRUE;
					$config['max_size']         = 2048;
				}
				// HASTA AQUI
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('adjunto')){
					$error = array('error' => $this->upload->display_errors());
					//redirect(base_url());
					redirect(base_url().'tipo_tramite/listado');
					//$this->load->view('crud/organigrama', $error);
				}else{
					$tipo_tramite = $this->db->query("SELECT tramite FROM tramite.tipo_tramite WHERE tipo_tramite_id = '$tipo_tramite_id'")->row();
					$data = array('upload_data' => $this->upload->data());
					if($tipo_tramite->tramite == 'Inspeccion'){
						redirect('Derivaciones/inspectores/'.$idTramite);
					}
				}
				$this->session->set_flashdata('in', $idTramite);	
			}
			redirect(base_url().'tipo_tramite/listado');
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
		$this->db->order_by('tramite.tramite.fec_creacion', 'ASC');
		$query = $this->db->get('tramite.tramite');
		
		$data['mis_tramites'] = $query->result();
		$data['verifica'] = $this->Rol_model->verifica();
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
	        $data['tipo_tramite']= $this->db->query("SELECT tt.tramite, tt.tipo_tramite_id FROM tramite.tramite tr JOIN tramite.tipo_tramite tt ON tr.tipo_tramite_id=tt.tipo_tramite_id  WHERE tr.tramite_id = '$idTramite'")->row();
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

            $requisitos=$this->input->post('requisitos');
            foreach ($requisitos as $key => $value) {
            	$requi=array(
					'requisito_id'=>$value,
					'tramite_id'=>$idTramite,
					'fecha'=>$fecha,
					'usu_creacion'=>$usu_creacion,
				);
				$this->db->insert('tramite.tramite_requisito', $requi);
            }
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
	 
	

	/*public function ajax_verifica1_ante(){
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

		$respuesta['derivacion'] = $this->db->query("SELECT nombres|| ' '|| paterno||' '||' '||materno as nombre, unidad, descripcion, organigrama_persona_id FROM tramite.vista_organigrama_persona_cargo WHERE organigrama_persona_id in (SELECT organigrama_persona_id FROM tramite.flujo WHERE tipo_tramite_id='".$tramite_id."' AND orden = (SELECT min(orden) FROM tramite.flujo WHERE tipo_tramite_id='".$tramite_id."'));")->result();

		//var_dump($respuesta['datos']);
		//$respuesta['derivacion']= $valores;

		// $busca_derivacion = $this->db->select('derivacion_id, tramite_id, fuente, destino, orden')->where('tramite_id', $tramite_id)->order_by('derivacion_id',"desc")->limit(1)->get('tramite.derivacion')->row_array();
		// if ($busca_derivacion) {
		// 	$siguiente = $busca_derivacion['orden']+1;
		// 	$siguiente_persona = $this->db->get_where('tramite.flujo', array('tipo_tramite_id'=>$tramite_id, 'orden'=>$siguiente))->row_array();	
		// 	if ($siguiente_persona) {
		// 		$organigrama_persona = $this->db->get_where('tramite.organigrama_persona', array('organigrama_persona_id'=>$siguiente_persona['organigrama_persona_id']))->row_array();	

		// 		$persona = $this->db->select('tramite.organigrama_persona.organigrama_persona_id, persona.nombres, persona.paterno, persona.materno, tramite.cargo.descripcion');
		// 			$this->db->from('tramite.organigrama_persona');
		// 			$this->db->join('persona', 'tramite.organigrama_persona.persona_id = persona.persona_id');
		// 			$this->db->join('tramite.cargo', 'tramite.organigrama_persona.cargo_id = cargo.cargo_id');
		// 			$this->db->where('organigrama_persona_id', $organigrama_persona['organigrama_persona_id']);
		// 			$q = $this->db->get()->result_array();
		// 		// vdebug($q, true, false, true);
				
		// 		$respuesta['persona_derivacion'] = $q;
		// 	} else {
		// 		// no tiene configuracion
		// 		$respuesta['persona_derivacion'] = '';
		// 	}
			
		// } else {
		// 	// no tiene derivacion

		// 	$flujo = $this->db->get_where('tramite.flujo', array('tipo_tramite_id'=>$tramite_id))->row_array();	
		// 	$organigrama_persona = $this->db->get_where('tramite.organigrama_persona', array('organigrama_persona_id'=>$flujo['organigrama_persona_id']))->row_array();	
		// 	// vdebug($organigrama_persona, true, false, true);

		// 		$persona = $this->db->select('tramite.organigrama_persona.organigrama_persona_id, persona.nombres, persona.paterno, persona.materno, tramite.cargo.descripcion');
		// 			$this->db->from('tramite.organigrama_persona');
		// 			$this->db->join('persona', 'tramite.organigrama_persona.persona_id = persona.persona_id');
		// 			$this->db->join('tramite.cargo', 'tramite.organigrama_persona.cargo_id = cargo.cargo_id');
		// 			$this->db->where('organigrama_persona_id', $organigrama_persona['organigrama_persona_id']);
		// 			$q = $this->db->get()->result_array();
		// 		// vdebug($q, true, false, true);
				
		// 	$respuesta['persona_derivacion'] = $q;

			
		//}
		// $respuesta['persona_derivacion'] = $this->db->get_where('tramite.flujo', array('tipo_tramite_id'=>$ci))->result_array();
		echo json_encode($respuesta);
	}

	//**************************************INFORME TECNICO*****************************************************

	public function informe_tecnico(){
		if($this->session->userdata("login")){
			$id = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $datos['de'] = $this->Derivaciones_model->encontrado($resi->persona_id);
            $datos['personas'] = $this->Derivaciones_model->personal($resi->persona_id);
			$this->load->view('admin/header');
	        $this->load->view('admin/menu');
	        $this->load->view('tramites/informe_tecnico', $datos);
	        $this->load->view('admin/footer');
	        $this->load->view('predios/index_js');
		}
		else{
			redirect(base_url());
        }
	}

	public function verificarCedula(){
		$ci = $this->input->get("param1");
		$verifica_cod = $this->Persona_model->buscaci($ci);
		if ($verifica_cod) {
			$respuesta = array('ci'=>$ci, 'nombres'=>$verifica_cod->nombres.' '.$verifica_cod->paterno.' '.$verifica_cod->materno, 'persona_id'=>$verifica_cod->persona_id, 'estado'=>'si');
			echo json_encode($respuesta);
		}else{
			$respuesta = array('ci'=>$ci, 'estado'=>'no');
			echo json_encode($respuesta);
		}	
	}

	public function guardar_informe(){
		if($this->session->userdata("login")){
			$id = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $dato = $resi->persona_id;
            $res = $this->db->get_where('persona', array('persona_id' => $dato))->row();
            $consulta = $this->db->query("SELECT organigrama_persona_id FROM tramite.organigrama_persona WHERE fec_baja is NULL AND persona_id='$res->persona_id'")->row();
            $fec = date("Y-m-d"); 
            $array = array(
				'cite' => $this->input->post('cite'),
				'a' =>$this->input->post('a'),
				'via' => $this->input->post('via'),
				'de' => $consulta->organigrama_persona_id,
				'fecha_informe' => $fec,
				'solicitante1' => $this->input->post('solicitante1'),
				'ci1' => $this->input->post('ci1'),
				'tipo_tramite_id' => $this->input->post('tipo_tramite_id'),
				'ubicacion' =>$this->input->post('ubicacion'),
				'lote' =>$this->input->post('lote'),
				'urbanizacion' =>$this->input->post('urbanizacion'),
				'manzana' => $this->input->post('manzana'),
				'comunidad'=>$this->input->post('comunidad'),
				'superficie_testimonio'=>$this->input->post('superficie_testimonio'),
				'superficie_medicion'=>$this->input->post('superficie_medicion'),
				'nro_folio'=> $this->input->post('nro_folio'),
				'nro_testimonio'=> $this->input->post('nro_testimonio'),
				'notaria'=>$this->input->post('notaria'),
				'fecha_testimonio'=> $this->input->post('fecha_testimonio'),
				'notario'=> $this->input->post('notario'),
				'impuestos'=> $this->input->post('impuestos'),
				'observaciones'=>$this->input->post('observaciones'),
				'procesador'=>$this->input->post('procesador'),
				'nro_tramite'=>$this->input->post('nro_tramite'),
				'solicitante2'=>$this->input->post('solicitante2'),
				'ci2'=>$this->input->post('ci2'),
				'fecha_solicitud'=>$this->input->post('fecha_solicitud'),
				'glosa'=>$this->input->post('glosa'),
				'usu_creacion'=>$dato
			);
            $this->db->insert('tramite.informe_tecnico', $array);
            $cite=$this->input->post('cite');
            
			redirect('tipo_tramite/lista');
		}else{
			redirect(base_url());
        }
	}

	public function lista(){
		if($this->session->userdata("login")){
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
			// $this->db->where('de', $fuente);
			// $this->db->where('activo', 1);
			// $this->db->order_by('fec_creacion', 'DESC');
			// $query = $this->db->get('tramite.informe_tecnico');
			// vdebug($query, false, false, true);
			$data['mis_tramites'] = $this->db->query("SELECT * FROM tramite.informe_tecnico WHERE de='$fuente' AND activo=1 ORDER BY fec_creacion DESC")->result();
			//$data['verifica'] = $this->rol_model->verifica();
			//var_dump($usu_creacion);

			$this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('tramites/lista_informes', $data);
			$this->load->view('admin/footer');
			$this->load->view('predios/index_js');
		}else{
			redirect(base_url());
        }
	}

	public function pdf_informe($idTramite = null){
		if($this->session->userdata("login")){
			$id = $this->session->userdata("persona_perfil_id");
		    $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
		    $usuario = $resi->persona_id;
		    $data['a'] = $this->db->query("SELECT ca.descripcion cargo, pe.nombres||' '|| pe.paterno||' '||pe.materno as nombre FROM tramite.informe_tecnico it JOIN tramite.organigrama_persona op ON op.organigrama_persona_id = it.a JOIN tramite.cargo ca ON op.cargo_id=ca.cargo_id JOIN persona pe ON op.persona_id= pe.persona_id 
				WHERE it.informe_tecnico_id = '$idTramite'")->row();
		    $data['via'] = $this->db->query("SELECT ca.descripcion cargo, (pe.nombres||' '||pe.paterno||' '||pe.materno) nombre FROM tramite.informe_tecnico it JOIN tramite.organigrama_persona op ON op.organigrama_persona_id = it.via JOIN tramite.cargo ca ON op.cargo_id=ca.cargo_id JOIN persona pe ON op.persona_id= pe.persona_id
				WHERE it.informe_tecnico_id = '$idTramite'")->row();
		    $data['de'] = $this->db->get_where('persona', array('persona_id' => $usuario))->row();
		    $tramite = $this->db->get_where('tramite.informe_tecnico', array('informe_tecnico_id' => $idTramite))->row();
		   	$data['cargo']=$this->db->query("SELECT ca.descripcion FROM tramite.organigrama_persona op JOIN tramite.cargo ca ON op.cargo_id=ca.cargo_id WHERE op.persona_id = '$usuario' AND op.activo=1")->row();
			$data['tramite'] = $tramite; 
			$data['procesador'] = $this->db->query("SELECT ca.descripcion cargo, (pe.nombres||' '||pe.paterno||' '||pe.materno) nombre FROM tramite.informe_tecnico it JOIN tramite.organigrama_persona op ON op.organigrama_persona_id = it.procesador JOIN tramite.cargo ca ON op.cargo_id=ca.cargo_id JOIN persona pe ON op.persona_id= pe.persona_id
				WHERE it.informe_tecnico_id = '$idTramite'")->row();
			$data['tipo_tramite']=$this->db->query("SELECT tt.tramite FROM tramite.informe_tecnico it JOIN tramite.tipo_tramite tt ON it.tipo_tramite_id=tt.tipo_tramite_id WHERE it.informe_tecnico_id='$idTramite'")->row();

			//$data['propietarios']=$this->db->query("SELECT per.nombres||' '||per.paterno||' '||per.materno as nombre, inp.persona_id, per.ci FROM tramite.informe_persona inp JOIN public.persona per ON inp.persona_id=per.persona_id WHERE  tipo='Propietario' AND informe_tecnico_id='$idTramite'")->row();
			
			if($data['tipo_tramite']->tramite == 'Transferencia'){
				$data['vendedor']=$this->db->query("SELECT per.nombres||' '||per.paterno||' '||per.materno as nombre, inp.persona_id, per.ci FROM tramite.informe_persona inp JOIN public.persona per ON inp.persona_id=per.persona_id WHERE  tipo='Vendedor' AND informe_tecnico_id='$idTramite'")->row();
				//var_dump('entro');
			}

			$dompdf = new Dompdf\Dompdf();
			$this->load->view('tramites/informe_tecnico_pdf', $data);
	        
	        // Get output html
	        $html = $this->output->get_output();
	        
	        // Load HTML content
	        $dompdf->loadHtml($html);
	        $dompdf->set_option('isRemoteEnabled', TRUE);
	        
	        // (Optional) Setup the paper size and orientation
	        $dompdf->setPaper('A4');
	        
	        // Render the HTML as PDF
	        $dompdf->render();
	        
	        // Output the generated PDF (1 = download and 0 = preview)
	        $dompdf->stream("Informe tecnico.pdf", array("Attachment"=>0));
		}else{
			redirect(base_url());
        }
	}

	public function editar_informe($idTramite = null){
		if($this->session->userdata("login")){
			$id = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $datos['personas'] = $this->Derivaciones_model->personal($resi->persona_id);
            $datos['tramites'] = $this->db->query("SELECT * FROM tramite.informe_tecnico WHERE informe_tecnico_id='$idTramite'")->row();
            $valor=(int)$datos['tramites']->a;
            $a=$this->db->query("SELECT persona_id FROM tramite.organigrama_persona WHERE organigrama_persona_id = '$valor'")->row();	          
            $datos['a']=$this->Derivaciones_model->encontrado($a->persona_id);
            $valor=(int)$datos['tramites']->via;
            $via=$this->db->query("SELECT persona_id FROM tramite.organigrama_persona WHERE organigrama_persona_id = '$valor'")->row();
            $datos['via']=$this->Derivaciones_model->encontrado($via->persona_id);
            $valor=(int)$datos['tramites']->procesador;
            $procesador=$this->db->query("SELECT persona_id FROM tramite.organigrama_persona WHERE organigrama_persona_id = '$valor'")->row();
            $datos['procesador']=$this->Derivaciones_model->encontrado($procesador->persona_id);
			$this->load->view('admin/header');
	        $this->load->view('admin/menu');
	        $this->load->view('tramites/editar_informe', $datos);
	        $this->load->view('admin/footer');
	        $this->load->view('predios/index_js');
		}else{
			redirect(base_url());
        }
	}
	public function guardar_edicion(){
		if($this->session->userdata("login")){
			$id = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $dato = $resi->persona_id;
            $res = $this->db->get_where('persona', array('persona_id' => $dato))->row();
            $consulta = $this->db->query("SELECT organigrama_persona_id FROM tramite.organigrama_persona WHERE fec_baja is NULL AND persona_id = '$res->persona_id'")->row();
            $informe =$this->input->post('informe_id'); 
            $array = array(
				'cite' => $this->input->post('cite'),
				'a' =>$this->input->post('a'),
				'via' => $this->input->post('via'),
				'nro_tramite' =>$this->input->post('nro_tramite'),
				'procesador'=>$this->input->post('procesador'),
				'fecha_solicitud'=>$this->input->post('fecha_solicitud'),
				'solicitante' => $this->input->post('solicitante'),
				'ci' => $this->input->post('ci'),
				'solicitante2' => $this->input->post('solicitante2'),
				'ci2' => $this->input->post('ci2'),
				'tipo_tramite_id' => $this->input->post('tipo_tramite_id'),
				'ubicacion' =>$this->input->post('ubicacion'),
				'lote' =>$this->input->post('lote'),
				'urbanizacion' =>$this->input->post('urbanizacion'),
				'manzana' => $this->input->post('manzana'),
				'comunidad'=>$this->input->post('comunidad'),
				'superficie_testimonio'=>$this->input->post('superficie_testimonio'),
				'superficie_medicion'=>$this->input->post('superficie_medicion'),
				'nro_folio'=> $this->input->post('nro_folio'),
				'nro_testimonio'=> $this->input->post('nro_testimonio'),
				'notaria'=>$this->input->post('notaria'),
				'fecha_testimonio'=> $this->input->post('fecha_testimonio'),
				'notario'=> $this->input->post('notario'),
				'impuestos'=> $this->input->post('impuestos'),
				'observaciones'=>$this->input->post('observaciones'),
				'glosa'=>$this->input->post('glosa'),
				'usu_modificacion' => $dato,
				'fec_modificacion' => date("Y-m-d H:i:s") 
			);
			$this->db->where('informe_tecnico_id', $informe);
        	$this->db->update('tramite.informe_tecnico', $array);
            //$this->db->insert('tramite.informe_tecnico', $array);
			redirect('tipo_tramite/lista');
		}else{
			redirect(base_url());
        }
	}

	public function eliminar_informe($idTramite = NULL){
		if($this->session->userdata("login")){
		 	//OBTENER EL ID DEL USUARIO LOGUEADO
			$id = $this->session->userdata("persona_perfil_id");
	        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
	        $usu_eliminacion = $resi->persona_id;
	        $fec_eliminacion = date("Y-m-d H:i:s"); 

		    $data = array(
	            'activo' => 0,
	            'usu_eliminacion' => $usu_eliminacion,
	            'fec_eliminacion' => $fec_eliminacion
	        );
	        $this->db->where('informe_tecnico_id', $idTramite);
	        $this->db->update('tramite.informe_tecnico', $data);
	        redirect('tipo_tramite/lista');
		}else{
			redirect(base_url());
        }	
	}

	public function nueva_proforma($informe_tecnico_id = null)
	{
		$informe = $this->db->get_where('tramite.informe_tecnico', array('informe_tecnico_id'=>$informe_tecnico_id))->row_array();
		$tramite = $this->db->get_where('tramite.tramite', array('tramite_id'=>$informe['tipo_tramite_id']))->row_array();
		$rubros = $this->db->get('tramite.rubros')->result_array();
		$data['informe']=$informe;
		$data['tramite']=$tramite;
		$data['rubros']=$rubros;

		// vdebug($tramite, true, false, true);
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('tramites/nueva_proforma', $data);
		$this->load->view('admin/footer');
		$this->load->view('predios/index_js');
		
	}

	public function consulta_proforma($id=null){

		if($this->input->post()){
			$datos = $this->input->post();	
			$cite = $datos['cite'];	
		}else{
			$cite=0;
		}
		if($id!=null){
			$cite = $id;
		}
		// var_dump($cite);
		$valores['proformas'] = $this->db->query("SELECT *
									FROM tramite.proforma
									WHERE cite ='$cite'")->result();
		if ($valores) {

			// var_dump($valores);
			$valores['cite'] = $cite;
			$this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('tramites/proforma_prueba', $valores);
			$this->load->view('admin/footer');
			$this->load->view('predios/index_js');
		}
		else{

			$valor1['proforma1'] = $this->db->query("SELECT *
											FROM tramite.informe_tecnico
											WHERE cite ='$cite'")->row();
		}
	}

	public function insertar()
	{
		if($this->session->userdata("login")){
			//vdebug($this->input->post(), true, false, false, true);
			$datos = $this->input->post();
			if(isset($datos))
			{
				//OBTENER EL ID DEL USUARIO LOGUEADO
				$id = $this->session->userdata("persona_perfil_id");
	            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
	            $usu_creacion = $resi->persona_id;

				$cite = $datos['cite'];
				$fecha_proforma = $datos['fecha_proforma'];
				// $propietario1 = $datos['propietario1'];
				// $propietario2 = $datos['propietario2'];
				$ubicacion = $datos['ubicacion'];
				$lote = $datos['lote'];
				$superficie_total = $datos['superficie_total'];
				$manzano = $datos['manzano'];
				$urbanizacion = $datos['urbanizacion'];
				$jurisdicion = $datos['jurisdicion'];
				$seccion_municipal = $datos['seccion_municipal'];
				$provincia = $datos['provincia'];
				$departamento = $datos['departamento'];
				$codigo_catastral = $datos['codigo_catastral'];
				$fecha = $datos['fecha'];
				$matricula_folio_real = $datos['matricula_folio_real'];
				$valido_por = $datos['valido_por'];
				$uso_predio = $datos['uso_predio'];
				$tipo_tramite = $datos['tipo_tramite'];
				$a = $datos['a'];
				// $ci = $datos['ci'];
				$metros_construidos = $datos['metros_construidos'];
				$total_pro = $datos['total'];
				$informe_tecnico_id = $datos['informe_tecnico_id'];

				$this->tramite_model->insertar_proforma($cite, $fecha_proforma, $ubicacion, $lote, $superficie_total, $manzano, $urbanizacion, $jurisdicion, $seccion_municipal, $provincia, $departamento, $codigo_catastral, $fecha, $matricula_folio_real, $valido_por, $uso_predio, $tipo_tramite, $a, $metros_construidos, $total_pro, $informe_tecnico_id);

				// HASTA AQUI SE GUARDA LOS DATOS EN LA TABLA PROFORMA DE PAGO


				// $linea_nivel = $datos['linea_nivel'];
				// $autorizacion_cerco = $datos['autorizacion_cerco'];
				// $aprobacion_plano = $datos['aprobacion_plano'];
				// $visado_plano = $datos['visado_plano'];
				// $fotocopia_plano = $datos['fotocopia_plano'];
				// $resolucion = $datos['resolucion'];
				// $certificacion = $datos['certificacion'];
				// $aprobacion_contruccion = $datos['aprobacion_contruccion'];
				// $total = $datos['total'];

				//captura de datos para la tabla bloque_piso

				$proforma_id = $this->db->query("SELECT  * FROM tramite.proforma WHERE activo=1 ORDER BY proforma_id desc LIMIT 1 ")->row();


	            $cont = 0;
	            $costo_total = $this->input->post('costo_total');
	            $superficie = $this->input->post('superficie');
	            $costo = $this->input->post('costo');	  
	            $rubros_id = $this->input->post('rubros_ids');          
	            for ($j = 0; $j < count($costo_total); $j++) {
	                $proforma_rubro = array(	                
	                'superficie' => $superficie[$j],
	                'costo' => $costo[$j],
	                'total' => $costo_total[$j],
	                'rubros_id'=>$rubros_id[$j],	
	                'proforma_id'=>  $proforma_id->proforma_id          
	               
	            );
	                $this->db->insert('tramite.proforma_rubro', $proforma_rubro);
	            }

	            //fin de insertar datos en tabla bloque_piso




				
				redirect('tipo_tramite/consulta_proforma/'.$cite);

			}
		}
		else{
			redirect(base_url());
        }	

	 }



	 public function ajax_verifica(){
		$cite = $this->input->get("param1");
		var_dump('hola');
		// $this->db->where()
		//$this->db->where('ci', $ci);
		$verifica_cod = $this->tramite_model->buscaci($ci);
		var_dump($verifica_cod);
		// print_r($ci);
		//  print_r($verifica_cod->result());die;
		// if (count($verifica_cod) > 0) {
		if ($verifica_cod) {
			$respuesta = array('ci'=>$ci, 'nombres' => $verifica_cod->nombres, 'paterno' => $verifica_cod->paterno, 'materno' => $verifica_cod->materno, 'fec_nacimiento'=>$verifica_cod->fecha, 'persona_id'=>$verifica_cod->persona_id, 'direccion' =>$verifica_cod->direccion, 'email'=>$verifica_cod->email, 'telefono_fijo'=>$verifica_cod->telefono_fijo, 'telefono_celular'=>$verifica_cod->telefono_celular, 'estado'=>'si');
			echo json_encode($respuesta);
		}else{
			$TOKEN = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJhNzAzYTlhZjcxZDY0NDMzOWJiNDM3ODEyYjIwODY0MyJ9.KAXS_8G3BznwFBR0dLZHfVQc2LkZI5fiTK6TN-meAZ4';
			//configura la solicitud, también se puede usar CURLOPT_URL
			
			//echo "<br>--->".$paramnumero;
			//echo "<br>--->".$paramfecha;
			// antiguo URL
			$CURL = curl_init('https://ws.agetic.gob.bo/segip/v2/personas/'.$ci);
			// nuevo URL
			//$CURL = curl_init('https://ws.agetic.gob.bo/segip/v3/personas/'.$paramnumero.'?fechaNacimiento='.$paramfecha);
			// Devuelve los datos / resultados como una cadena en lugar de datos sin procesar
			curl_setopt($CURL, CURLOPT_RETURNTRANSFER, true);
			// Una buena práctica para que la gente sepa quién está accediendo a sus servidores. Ver https://en.wikipedia.org/wiki/User_agent
			//curl_setopt($CURL, CURLOPT_USERAGENT, 'YourScript/0.1 (contact@email)');
			// Establezca sus encabezados de autenticación
			curl_setopt($CURL, CURLOPT_HTTPHEADER, array(
			    'Content-Type: application/json',
			    'Authorization: Bearer '.$TOKEN
			));
			
			// Obtener datos / resultados codificados Ver CURLOPT_RETURNTRANSFER
			$dataSEGIP = curl_exec($CURL);
			// Obtener información sobre la solicitud
			$infoSEGIP = curl_getinfo($CURL);
			// Cierre el recurso curl para liberar recursos del sistema
			curl_close($CURL);

			$arraySEGIPN0 = json_decode($dataSEGIP, true);
			$arraySEGIPN1 = $arraySEGIPN0['ConsultaDatoPersonaEnJsonResult'];
			$arraySEGIPN2 = $arraySEGIPN1['DatosPersonaEnFormatoJson'];
			$datos_persona = json_decode($arraySEGIPN2, true);
			$caso = $arraySEGIPN1['CodigoRespuesta'];
			if ($caso == 2) {
				$respuesta = array('ci'=>$ci, 'nombres' =>$datos_persona['Nombres'], 'paterno' =>$datos_persona['PrimerApellido'], 'materno' =>$datos_persona['SegundoApellido'], 'fec_nacimiento'=>$datos_persona['FechaNacimiento'], 'estado'=>'segip');
				echo json_encode($respuesta);
			}else{
				$respuesta = array('ci'=>$ci, 'estado'=>'no');
				echo json_encode($respuesta);
			}
				
		}	
	}

//***************************************FIN DE INFORME TECNICO***********************************************




}
