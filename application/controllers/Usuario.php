<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model("Usuario_model");
		$this->load->model("rol_model");
		$this->load->model("tramite/OrganigramaP_model");
		$this->load->model("Auditoria_Model");
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
			$lista['usuario'] = $this->Usuario_model->index();

			// var_dump($lista['usuario']);
			

			$this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('usuarios/listar', $lista);
			$this->load->view('admin/footer');
		}
		else{
			redirect(base_url());
		}
		
	}

	public function usuarioo(){

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

	public function usuario(){

		if($this->session->userdata("login")){
			$lista['datos'] = $this->OrganigramaP_model->lista();
			$lista['personas'] = $this->OrganigramaP_model->persona();
			$lista['organigramas'] = $this->OrganigramaP_model->organigrama();
			$lista['cargos'] = $this->OrganigramaP_model->cargo();
			$this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('usuarios/usuariosss', $lista);
			$this->load->view('admin/footer');
			$this->load->view('predios/registra_js');
		}
		else{
			redirect(base_url());
		}
		
	}

	
	public function ajax_verifica(){
		$ci = $this->input->get("param1");
		
		$persona = $this->db->get_where('persona', array('ci' => $ci))->row();
		

		if ($persona) {
			$apellidos = $persona->paterno.' '.$persona->materno;
			$respuesta = array( 'persona_id'=>$persona->persona_id, 'nombres'=>$persona->nombres, 'paterno'=>$persona->paterno, 'materno'=>$persona->materno, 'ci'=>$ci, 'fec_nacimiento'=>$persona->fec_nacimiento, 'estado'=>'registrado' ,'apellidos'=>$apellidos);
			echo json_encode($respuesta);
		}
		else{
		
			$TOKEN = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJhNzAzYTlhZjcxZDY0NDMzOWJiNDM3ODEyYjIwODY0MyJ9.KAXS_8G3BznwFBR0dLZHfVQc2LkZI5fiTK6TN-meAZ4';
			$CURL = curl_init('https://ws.agetic.gob.bo/segip/v2/personas/'.$ci);
			
			curl_setopt($CURL, CURLOPT_RETURNTRANSFER, true);
			
			curl_setopt($CURL, CURLOPT_HTTPHEADER, array(
			    'Content-Type: application/json',
			    'Authorization: Bearer '.$TOKEN
			));
			
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

			// $fecha = $datos_persona['FechaNacimiento'];
			// $partes_c = explode("/", $fecha); 
			// $dia_c = $partes_c[0];
			// $mes_c = $partes_c[1];
			// $ano_c = $partes_c[2];
			// $fec_nacimiento_c = $ano_c.'-'.$mes_c.'-'.$dia_c;

			$fecha = $datos_persona['FechaNacimiento'];
			$dia_c = substr($fecha, 0, -8);  // devuelve "cde"
			$mes_c = substr($fecha, 3, -5);  // devuelve "cde"
			$ano_c = substr($fecha, 6);
			// $fec_nacimiento = $ano.'-'.$mes.'-'.$dia;
			$fec_nacimiento_c = $ano_c.'-'.$mes_c.'-'.$dia_c;
			$apellidos = $datos_persona['PrimerApellido'].' '.$datos_persona['SegundoApellido'];

			
			$respuesta = array('ci'=>$ci, 'nombres' =>$datos_persona['Nombres'], 'paterno' =>$datos_persona['PrimerApellido'], 'materno' =>$datos_persona['SegundoApellido'], 'fec_nacimiento'=>$fec_nacimiento_c, 'estado'=>'segip', 'apellidos'=>$apellidos);
			echo json_encode($respuesta);
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

		$idd = $this->db->get_where('persona', array('ci' => '9112739'))->row();

		var_dump($idd->persona_id);
	}

	public function do_upload()
	{
		if($this->session->userdata("login")){
			$id = $this->session->userdata("persona_perfil_id");
		    $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
		    $usu_creacion = $resi->persona_id;

			$datos = $this->input->post();

			 //var_dump($datos);
			 //exit();
			
			$estado = $datos['estados'];
			if ($estado == 'registrado') {
				
				// INSERTAR OFICINA , CARGO, FECHA DE ALTA
				$organigrama_id = $datos['organigrama_id'];
				$persona_id = $datos['persona_id'];
				$fec_alta = $datos['fec_alta'];
				$cargo_id = $datos['cargo_id'];
				
				$this->OrganigramaP_model->insertarOrganigrama($organigrama_id, $persona_id, $fec_alta, $usu_creacion, $cargo_id);
				// HASTA AQUI

				// INSERTAR PERFIL
				$perfil_id = $datos['perfil_id'];
				$this->Usuario_model->insertar_persona_perfil($persona_id, $perfil_id);
				// HASTA AQUI

				// SACAR EL ULTIMO REGISTRO DE PERSONA PERFIL
				$perfil_id = $this->db->query("SELECT MAX(persona_perfil_id) as max FROM persona_perfil")->row();

				// INSERTAR EL ROL USUARIO Y CONTRASEÑA
				$persona_perfil_id = $perfil_id->max;
				$rol_id = $datos['rol_id'];
				$usuario = $datos['usuario'];
				$contrasenia = $datos['contrasenia'];
				$pass_cifrado = md5($contrasenia);
				$avartar = $persona_perfil_id.$rol_id.$usuario.'.jpg';
				
				// HASTA AQUI

				// PARA SUBIR IMAGEN DE USUARIO
				$concatenado = './public/assets/images/users';

				$config['upload_path']      = $concatenado;
				$config['file_name']        = $avartar;
				$config['allowed_types']    = '*';
				$config['overwrite']        = TRUE;
				$config['max_size']         = 10000;

				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('adjunto'))
					{
						
						// INSERTAR EL ROL USUARIO Y CONTRASEÑA
						$avartar1 = 'perfil.jpg';
						$this->Usuario_model->insertar_credencial($persona_perfil_id, $rol_id, $usuario, $pass_cifrado, $avartar1);
						
					}
				else
					{
						$this->Usuario_model->insertar_credencial($persona_perfil_id, $rol_id, $usuario, $pass_cifrado, $avartar);
						//AUDITORIA INSERTAR
						$tabla = 'public.credencial';
						$ultimoId = $this->db->query("SELECT MAX(credencial_id) as max FROM public.credencial")->row();
						$datac = $this->db->get_where('public.credencial', array('credencial_id' => $ultimoId->max))->row();
						$this->Auditoria_Model->auditoria_insertar(json_encode($datac), $tabla);
					}
					
			}
			else{

				// INSERTAR UNA NUEVA PERSONA QUE NO SE ENCUENTRA EN LA BASE DE DATOS
				$nombres = $datos['nombress'];
				$paterno = $datos['paternos'];
				$materno = $datos['maternos'];
				$ci = $datos['ci'];
				$fec_nacimiento = $datos['fec_nacimientos'];
				$this->Usuario_model->insertar_usuario($nombres, $paterno, $materno, $ci, $fec_nacimiento);

				//AUDITORIA INSERTAR
				$tabla = 'public.persona';
				$ultimoId = $this->db->query("SELECT MAX(persona_id) as max FROM public.persona")->row();
				$data1 = $this->db->get_where('public.persona', array('persona_id' => $ultimoId->max))->row();
				$this->Auditoria_Model->auditoria_insertar(json_encode($data1), $tabla);


				$id = $this->db->get_where('persona', array('ci' => $ci))->row();
				 // HASTA AQUI
				// $id = $this->db->query("SELECT * FROM persona WHERE ci = '$ci'")->row();

				// INSERTAR OFICINA , CARGO, FECHA DE ALTA
				$organigrama_id = $datos['organigrama_id'];
				$persona_id = $id->persona_id;
				$fec_alta = $datos['fec_alta'];
				$cargo_id = $datos['cargo_id'];
				
				$this->OrganigramaP_model->insertarOrganigrama($organigrama_id, $persona_id, $fec_alta, $usu_creacion, $cargo_id);
				// HASTA AQUI

				// INSERTAR PERFIL
				$perfil_id = $datos['perfil_id'];
				$this->Usuario_model->insertar_persona_perfil($persona_id, $perfil_id);
				// HASTA AQUI

				// SACAR EL ULTIMO REGISTRO DE PERSONA PERFIL
				$perfil_id = $this->db->query("SELECT MAX(persona_perfil_id) as max FROM persona_perfil")->row();

				// INSERTAR EL ROL USUARIO Y CONTRASEÑA
				$persona_perfil_id = $perfil_id->max;
				$rol_id = $datos['rol_id'];
				$usuario = $datos['usuario'];
				$contrasenia = $datos['contrasenia'];
				$pass_cifrado = md5($contrasenia);
				$avartar = $persona_perfil_id.$rol_id.$usuario.'.jpg';
				
				// HASTA AQUI

				// PARA SUBIR IMAGEN DE USUARIO
				$concatenado = './public/assets/images/users';

				$config['upload_path']      = $concatenado;
				$config['file_name']        = $avartar;
				$config['allowed_types']    = 'jpg';
				$config['overwrite']        = TRUE;
				$config['max_size']         = 10000;

				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('adjunto'))
					{
						
						// INSERTAR EL ROL USUARIO Y CONTRASEÑA
						$avartar1 = 'perfil.jpg';
						$this->Usuario_model->insertar_credencial($persona_perfil_id, $rol_id, $usuario, $pass_cifrado, $avartar1);
						
					}
				else
					{
						// INSERTAR EL ROL USUARIO Y CONTRASEÑA
						$this->Usuario_model->insertar_credencial($persona_perfil_id, $rol_id, $usuario, $pass_cifrado, $avartar);
						//AUDITORIA INSERTAR
						$tabla = 'public.credencial';
						$ultimoId = $this->db->query("SELECT MAX(credencial_id) as max FROM public.credencial")->row();
						$datac = $this->db->get_where('public.credencial', array('credencial_id' => $ultimoId->max))->row();
						$this->Auditoria_Model->auditoria_insertar(json_encode($datac), $tabla);
						
					}

			}

			redirect('Usuario/listar');
			
		 }
		else{
			redirect(base_url());
		}

	 }

	 public function abc()
	 {

	 	
	 	$perfil_menu = $this->db->query("SELECT DISTINCT pm.*
										FROM credencial c, persona_perfil pp, perfil_menu pm
										WHERE c.credencial_id = '44'
										AND c.persona_perfil_id = pp.persona_perfil_id
										AND pp.perfil_id = pm.perfil_id
										ORDER BY pm.menu_id")->result();
		
		foreach ($perfil_menu as $valor) {
			
			echo $valor->menu_id;
			echo ',';
		}


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

	public function asignar_perfil_menu()
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
				$lista['perfil_id'] =  $this->uri->segment(3);
				
				$this->load->view('admin/header');
				$this->load->view('admin/menu');
				$this->load->view('perfil/crear_menu_perfil', $lista);
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


	public function modifica()     
	{   
		if($this->session->userdata("login")){

			// $datos = $this->input->post();
			// var_dump($datos);
			// OBTENER EL ID DEL USUARIO LOGUEADO
			$id = $this->session->userdata("persona_perfil_id");
	        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
	        $usu_modificacion = $resi->persona_id;
	        $fec_modificacion = date("Y-m-d H:i:s"); 

		    $credencial_id = $this->input->post('credencial_id');
		    $persona_perfil_id = $this->input->post('persona_perfil_id');
		    $perfil_id = $this->input->post('perfil_id');
		    $rol_id = $this->input->post('rol_id');
		    $usuario = $this->input->post('usuario');
		    $contrasenia = $this->input->post('contrasenia');
 
		    $cre_id = $this->db->query("SELECT *
		    							FROM public.credencial
		    							WHERE credencial_id = '$credencial_id'")->row();
		    $pass = $cre_id->contrasenia;
		    if ($contrasenia == $pass) {
		    	$actualizar = $this->Usuario_model->actualizar_usuario($credencial_id, $persona_perfil_id, $perfil_id, $rol_id, $usuario, $contrasenia);

		    }
		    else
		    {
		    	$pass_cif = md5($contrasenia);
		    	$actualizar = $this->Usuario_model->actualizar_usuario($credencial_id, $persona_perfil_id, $perfil_id, $rol_id, $usuario, $pass_cif);

		    }

		    // var_dump($actualizar);
		  	redirect('usuario/listar');
		}
		else{
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



	