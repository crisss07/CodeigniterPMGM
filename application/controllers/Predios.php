<?php
class Predios extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('tipopredio_model');
        $this->load->model('predio_model');
        $this->load->model("logacceso_model");
        $this->load->model("persona_model");
        $this->load->model("Ddrr_model");
        $this->load->helper('url_helper');
        $this->load->helper('vayes_helper');
        $this->load->library('cart');
        $this->load->model("rol_model");
        $this->load->library('email');
        $this->load->library('pdf');
    }

    public function index(){


		if($this->session->userdata("login"))
		{
			/*
				MultiPolygon (((459488.20600000023841858 8010750.776999999769032, 459490.36299999989569187 8010749.17150000017136335, 459492.51999999955296516 8010747.56599999964237213, 459499.95529999956488609 8010742.08910000044852495, 459503.2686999998986721 8010739.64850000012665987, 459503.75800000037997961 8010739.28799999970942736, 459505.40500000026077032 8010738.04839999973773956, 459507.05190000031143427 8010736.80860000010579824, 459507.47200000006705523 8010736.49239999987185001, 459507.89209999982267618 8010736.17609999980777502, 459507.97520000021904707 8010736.11419999971985817, 459509.86840000003576279 8010734.7028999999165535, 459509.89020000025629997 8010734.68670000042766333, 459513.8326000003144145 8010731.74789999984204769, 459515.2686999998986721 8010730.67729999963194132, 459517.77500000037252903 8010728.80900000035762787, 459519.36160000041127205 8010727.60290000028908253, 459519.45069999992847443 8010727.53519999980926514, 459519.93900000024586916 8010727.16399999987334013, 459520.73230000026524067 8010726.56099999975413084, 459522.10300000011920929 8010725.51900000032037497, 459527.56799999997019768 8010721.47699999995529652, 459533.03299999982118607 8010717.43499999959021807, 459533.44859999977052212 8010716.99710000026971102, 459535.99770000018179417 8010714.3113000001758337, 459536.03320000041276217 8010714.27390000037848949, 459536.10529999993741512 8010714.19799999985843897, 459536.11099999956786633 8010714.1919999998062849, 459536.11579999979585409 8010714.18109999969601631, 459536.30929999984800816 8010713.74129999987781048, 459536.33729999978095293 8010713.67769999988377094, 459536.6119999997317791 8010713.0530000003054738, 459537.0849999999627471 8010710.74700000043958426, 459537.07629999984055758 8010709.86230000015348196, 459537.06209999974817038 8010708.41229999996721745, 459537.0613000001758337 8010708.32930000033229589, 459537.0530000003054738 8010707.4869999997317791, 459535.22800000011920929 8010703.88599999994039536, 459526.26040000002831221 8010692.26939999964088202, 459525.82809999957680702 8010691.70940000005066395, 459524.60199999995529652 8010690.12100000027567148, 459524.03179999999701977 8010689.36230000015348196, 459521.39199999999254942 8010685.84999999962747097, 459518.98749999981373549 8010682.69369999971240759, 459517.84989999979734421 8010681.20040000043809414, 459509.90699999965727329 8010670.77400000020861626, 459507.30200000014156103 8010667.30099999997764826, 459506.58930000010877848 8010666.34009999968111515, 459504.98759999964386225 8010664.18059999961405993, 459500.53600000031292439 8010658.178999999538064, 459497.44500000029802322 8010653.93400000035762787, 459495.84289999958127737 8010651.56379999965429306, 459492.57500000018626451 8010646.72900000028312206, 459491.05599999986588955 8010644.58899999968707561, 459488.67300000041723251 8010642.66299999970942736, 459487.47400000039488077 8010641.71399999968707561, 459485.40299999993294477 8010640.96100000012665987, 459485.10030000004917383 8010640.9318000003695488, 459485.03909999970346689 8010640.9259000001475215, 459484.410500000230968 8010640.86529999971389771, 459483.49830000009387732 8010640.77740000002086163, 459483.19309999980032444 8010640.74799999967217445, 459483.13100000005215406 8010640.74199999962002039, 459483.00399999972432852 8010640.75540000014007092, 459482.74320000037550926 8010640.78299999982118607, 459481.86980000045150518 8010640.87540000025182962, 459481.13239999953657389 8010640.95330000016838312, 459480.93699999991804361 8010640.97400000039488077, 459480.86230000015348196 8010641.00820000004023314, 459480.41409999970346689 8010641.2132999999448657, 459479.8892000000923872 8010641.45349999982863665, 459479.63019999954849482 8010641.5719999996945262, 459478.92910000029951334 8010641.89290000032633543, 459477.07969999965280294 8010642.73929999954998493, 459476.99299999978393316 8010642.77900000009685755, 459474.5565999997779727 8010644.59389999974519014, 459467.61239999998360872 8010649.76669999957084656, 459465.47599999979138374 8010651.35819999966770411, 459464.8607999999076128 8010651.81639999989420176, 459464.27300000004470348 8010652.25430000014603138, 459463.60599999967962503 8010652.75109999999403954, 459463.15209999959915876 8010653.08920000027865171, 459462.48300000000745058 8010653.58760000020265579, 459461.81280000042170286 8010654.08690000046044588, 459461.14180000033229589 8010654.58669999986886978, 459460.43900000024586916 8010655.11029999982565641, 459460.29320000018924475 8010655.21889999974519014, 459459.13009999971836805 8010656.08530000038444996, 459457.11610000021755695 8010657.58550000004470348, 459456.17599999997764826 8010658.28579999972134829, 459455.47250000014901161 8010658.80979999992996454, 459454.63750000018626451 8010659.4318000003695488, 459452.97400000039488077 8010660.67100000008940697, 459450.88470000028610229 8010662.25229999981820583, 459450.45600000023841858 8010662.57679999992251396, 459449.77450000029057264 8010663.09260000009089708, 459449.11409999988973141 8010663.59240000043064356, 459447.22400000039488077 8010665.02300000004470348, 459435.87399999983608723 8010673.39400000032037497, 459434.23610000032931566 8010674.63879999984055758, 459432.37629999965429306 8010676.05209999997168779, 459432.11120000015944242 8010676.25349999964237213, 459431.62899999972432852 8010676.62000000011175871, 459428.80840000044554472 8010678.71499999985098839, 459419.88599999994039536 8010685.34200000017881393, 459418.54899999964982271 8010686.34599999990314245, 459417.38100000005215406 8010687.31400000024586916, 459417.07440000027418137 8010687.76819999981671572, 459416.72140000015497208 8010688.29100000020116568, 459416.44400000013411045 8010688.70199999958276749, 459415.7099999999627471 8010690.65000000037252903, 459415.46999999973922968 8010691.92599999997764826, 459415.59100000001490116 8010695.02500000037252903, 459416.28199999965727329 8010697.18099999986588955, 459417.46999999973922968 8010698.82299999985843897, 459418.60300000011920929 8010700.10500000044703484, 459422.91999999992549419 8010705.8113000001758337, 459428.47200000006705523 8010713.15000000037252903, 459431.74399999994784594 8010717.35699999984353781, 459442.00299999956041574 8010731.01499999966472387, 459446.31400000024586916 8010736.88599999994039536, 459446.32720000017434359 8010736.8764000004157424, 459450.75700000021606684 8010742.88100000005215406, 459451.93929999973624945 8010744.49509999994188547, 459451.94130000006407499 8010744.49770000018179417, 459452.24660000018775463 8010744.91449999995529652, 459455.63399999961256981 8010749.53899999987334013, 459455.71349999960511923 8010749.48070000018924475, 459461.83139999955892563 8010757.6590999998152256, 459462.74100000038743019 8010758.875, 459463.64099999982863665 8010760.03000000026077032, 459464.68099999986588955 8010760.97499999962747097, 459465.36060000024735928 8010761.35819999966770411, 459465.48209999967366457 8010761.42669999971985817, 459466.44400000013411045 8010761.96899999957531691, 459466.87719999998807907 8010762.10259999986737967, 459467.97620000038295984 8010762.44159999955445528, 459468.15510000009089708 8010762.49679999984800816, 459468.33399999979883432 8010762.55200000014156103, 459468.68589999992400408 8010762.57230000011622906, 459469.94660000037401915 8010762.6451000003144145, 459470.40039999969303608 8010762.57369999960064888, 459471.06439999956637621 8010762.46929999999701977, 459471.75739999953657389 8010762.36029999982565641, 459473.64950000029057264 8010761.64819999970495701, 459475.3974999999627471 8010760.50430000014603138, 459476.03490000031888485 8010760.08719999995082617, 459476.37299999967217445 8010759.86600000038743019, 459477.16789999976754189 8010759.23689999990165234, 459477.63399999961256981 8010758.86799999978393316, 459477.63260000012814999 8010758.84609999973326921, 459477.63179999962449074 8010758.83469999954104424, 459477.87719999998807907 8010758.64769999962300062, 459482.50380000006407499 8010755.12210000026971102, 459488.20600000023841858 8010750.776999999769032)))
			*/
			//insertar datos de la persona logueada en la tabla logacceso
		    $persona_perfil_id = $this->session->userdata("persona_perfil_id");
		    $usuario = $this->session->userdata("usuario");

		    $id = $this->db->query("SELECT * FROM credencial WHERE persona_perfil_id = '$persona_perfil_id' AND usuario = '$usuario'")->row();

			$credencial_id = $id->credencial_id;

			$acceso_inicio = date("Y-m-d H:i:s");

			$ip = $this->logacceso_model->ip_local();
			$this->logacceso_model->insertar_logacceso($credencial_id, $acceso_inicio, $ip);

			//sacar el perfil de la persona logueada
			$persona_perfil_id = $id->persona_perfil_id;
			$persona_perfil = $this->db->query("SELECT * FROM persona_perfil WHERE
						persona_perfil_id = '$persona_perfil_id'")->row();
			$perfil = $persona_perfil->perfil_id;


					$this->load->view('admin/header');
					$this->load->view('admin/menu');
					$this->load->view('admin/index');
					$this->load->view('admin/footer');

		}
		else{
			redirect(base_url());
		}
	}

	public function principal(){


		if($this->session->userdata("login"))
		{
			//insertar datos de la persona logueada en la tabla logacceso
		    $persona_perfil_id = $this->session->userdata("persona_perfil_id");
		    $usuario = $this->session->userdata("usuario");
		    $id = $this->db->query("SELECT * FROM credencial WHERE persona_perfil_id = '$persona_perfil_id' AND usuario = '$usuario'")->row();
			$credencial_id = $id->credencial_id;

			$acceso_inicio = date("Y-m-d H:i:s");

			$ip = $this->logacceso_model->ip_local();
			$this->logacceso_model->insertar_logacceso($credencial_id, $acceso_inicio, $ip);

			//sacar el perfil de la persona logueada

			$persona_perfil_id = $id->persona_perfil_id;
			$persona_perfil = $this->db->query("SELECT * FROM persona_perfil WHERE persona_perfil_id = '$persona_perfil_id'")->row();
			$perfil = $persona_perfil->perfil_id;

					// $this->db->select(array('catastro.predio.fec_creacion', 'catastro.predio.codcatas', 'catastro.predio.nro_inmueble', 'catastro.zona_urbana.descripcion'));
					// $this->db->join('catastro.zona_urbana', 'catastro.predio.zonaurb_id = catastro.zona_urbana.zonaurb_id');
					// $this->db->join('catastro.predio_foto', 'catastro.predio_foto.codcatas=catastro.predio.codcatas');
					$this->db->order_by('catastro.predio.fec_creacion', 'DESC');
					$query = $this->db->get('catastro.predio');
					// vdebug($this->db->last_query());
					$data['listado_predios'] = $query->result();
					$data['verifica'] = $this->rol_model->verifica();
					//var_dump($usu_creacion);

					$this->load->view('admin/header');
					$this->load->view('admin/menu');
					$this->load->view('predios/index', $data);
					$this->load->view('admin/footer');
					$this->load->view('predios/index_js');

		}
		else{
			redirect(base_url());
		}
	}

	public function registra_predio(){

		if($this->session->userdata("login")){

			if ($this->input->post()) {
				$datos = $this->input->post();
				// $data = array(
				// );
				vdebug($datos['data']['codigo_catastral']);

			}else{

				$this->db->select('tipo_predio_id, descripcion');
				$this->db->order_by('descripcion', 'ASC');
				$this->db->where('activo', 1);
				$query = $this->db->get('catastro.tipo_predio');
				
				$data['dc_tipos_predio'] = $query->result();

				$this->db->select('zonaurb_id, descripcion');
				$this->db->order_by('descripcion', 'ASC');
				$this->db->where('activo', 1);
				$query = $this->db->get('catastro.zona_urbana');
				$data['dc_zona_urbana'] = $query->result();

				// $this->db->select('via_id, codcatas');
				// $this->db->where('activo', 1);
				// $query = $this->db->get('catastro.predio_via');
				// $data['dc_predio_via'] = $query->result();

				$this->db->select('ubicacion_id, descripcion');
				$this->db->order_by('descripcion', 'ASC');
				$this->db->where('activo', 1);
				$query = $this->db->get('catastro.ubicacion');
				$data['dc_ubicacion'] = $query->result();

				$this->db->select('pendiente_id, descripcion');
				$this->db->order_by('descripcion', 'ASC');
				$this->db->where('activo', 1);
				$query = $this->db->get('catastro.pendiente');
				$data['dc_pendiente'] = $query->result();

				$this->db->select('nivel_id, descripcion');
				$this->db->order_by('descripcion', 'ASC');
				$this->db->where('activo', 1);
				$query = $this->db->get('catastro.nivel');
				$data['dc_nivel'] = $query->result();

				$this->db->select('forma_id, descripcion');
				$this->db->order_by('descripcion', 'ASC');
				$this->db->where('activo', 1);
				$query = $this->db->get('catastro.forma');
				$data['dc_forma'] = $query->result();

				$this->db->select('clase_predio_id, descripcion');
				$this->db->order_by('descripcion', 'ASC');
				$this->db->where('activo', 1);
				$query = $this->db->get('catastro.clase_predio');
				$data['dc_clase_predio'] = $query->result();

				$this->db->select('uso_suelo_id, descripcion');
				$this->db->order_by('descripcion', 'ASC');
				$this->db->where('activo', 1);
				$query = $this->db->get('catastro.uso_suelo');
				$data['dc_uso_suelo'] = $query->result();

				$this->db->select('edificio_id, descripcion');
				$this->db->order_by('descripcion', 'ASC');
				$this->db->where('activo', 1);
				$query = $this->db->get('catastro.edificio');
				$data['dc_edificio'] = $query->result();

				$this->db->select('servicio_id, descripcion');
				$this->db->order_by('descripcion', 'ASC');
				$this->db->where('activo', 1);
				$query = $this->db->get('catastro.servicio');
				$data['listado_servicios'] = $query->result();

				$this->db->select('matvia_id, descripcion');
				$this->db->order_by('descripcion', 'ASC');
				$this->db->where('activo', 1);
				$query = $this->db->get('catastro.matvia');
				$data['dc_materiales_via'] = $query->result();

				// $data['dc'] = $this->tipopredio_model->listado_combo();
				// vdebug($this->tipopredio_model->hola());

				// $data['hola'] = "Mi cuate es un Pillin";
				$con = $this->db->get('catastro.tipo_predio');
				// log_message('debug', print_r($con,TRUE));
				// vdebug($con);
				// $this->load->model('Tipopredio');
				// $tipos_predios = $this->db->query('SELECT * FROM catastro.tipo_predio');
				// $tp = $tipos_predios->result();
				// vdebug($tp);
				// die();
				// print_r($tipos_predios);die;
				// echo $tipos_predios; die;

				$this->load->view('admin/header');
				$this->load->view('admin/menu');
				// $this->load->view('predios/nuevo', $data);
				$this->load->view('predios/registra_predio', $data);
				$this->load->view('admin/footer');
				$this->load->view('predios/registra_js');
			}
		}
		else{
			redirect(base_url());
		}

	}

	public function guarda(){

		if($this->session->userdata("login")){

			//usuario que esta registrando
			$id = $this->session->userdata("persona_perfil_id");
	        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
	        $usu_creacion = $resi->persona_id;

	        // vdebug($this->input->post('calles_colindantes'));

			$datos = array();
			$datos = $this->input->post();

			// $this->db->select('foto_id', 'codcatas', 'foto_plano_ubi');
			// $query = $this->db->get('catastro.predio_foto');
			// $data['fotos'] = $query->result();

			// $this->load->view('predios/guarda', $data);

			$latitud_longitud = $this->input->post('latitud').', '.$this->input->post('longitud');

			$datos_predio = array(

				'codcatas'=>$this->input->post('codigo_catastral'),
				'codcatas_anterior'=>$this->input->post('codigo_catastral_anterior'),
				'nro_inmueble'=>$this->input->post('nro_inmueble'),
				'distrito'=>$this->input->post('distrito'),
				'manzana'=>$this->input->post('manzana'),
				'predio'=>$this->input->post('predio'),
				'latlong'=>$this->input->post('latlong'),
				// 'latlong'=>$latitud_longitud,
				'zona_econo'=>$this->input->post('zona_econo'),
				// 'via_id'=>1,
				'zonaurb_id'=>$this->input->post('zonaurb_id'),
				'nro_puerta'=>$this->input->post('nro_puerta'),
				'superficie_geo'=>$this->input->post('superficie_geo'),
				'superficie_campo'=>$this->input->post('superficie_campo'),
				'superficie_legal'=>$this->input->post('superficie_legal'),
				'ubicacion_id'=>$this->input->post('ubicacion_id'),
				'pendiente_id'=>$this->input->post('pendiente_id'),
				'nivel_id'=>$this->input->post('nivel_id'),
				'forma_id'=>$this->input->post('forma_id'),
				'frente'=>$this->input->post('frente'),
				'fondo'=>$this->input->post('fondo'),
				'tipo_predio_id'=>$this->input->post('tipo_predio_id'),
				'clase_predio_id'=>$this->input->post('clase_predio_id'),
				'uso_suelo_id'=>$this->input->post('uso_suelo_id'),
				'matriz_ph'=>$this->input->post('matriz_ph'),
				// 'matriz_ph'=>$this->input->post('matriz_ph'),
				// 'edificio_id'=>$this->input->post('edificio_id'),
				'edificio_id'=>2,
				'usu_creacion' =>$usu_creacion
			);

			$fotos = array(
				'foto_plano'=>$_FILES['foto_plano'],
				'foto_fachada'=>$_FILES['foto_fachada'],
			);

			$servicios = $this->input->post('servicios');
			$calles = $this->input->post('calles_colindantes');
			$material_via = $this->input->post('mat_via_id');

			$predio_id = $this->predio_model->guarda_predio($datos_predio, $fotos, $servicios, $calles, $material_via);

			redirect(base_url("/edificacion/nuevo/$predio_id"));

			// editamos la calle principal
			// $this->db->set('gvia_tipo', 1);
			// $this->db->where('codcatas', $this->input->post('codigo_catastral'));
			// $this->db->where('gvia_id', $this->input->post('calle_principal'));
			// $this->db->update('catastro.predio_via');
			// editamos la calle principal

			// vdebug($datos['data']['codigo_catastral']);
			// $this->db->insert('catastro.predio', $datos);

		}
		else{
			redirect(base_url());
		}
	}


	public function muestra_img(){
	if($this->session->userdata("login")){
		// $this->db->insert('catastro.predio_foto', $data_foto);
		// $this->db->select('foto_id', 'codcatas', 'foto_plano_ubi');

		$query = $this->db->get('catastro.predio_foto');
		$data['fotos'] = $query->result();

		$this->load->view('predios/muestra_img', $data);
		}
		else{
			redirect(base_url());
		}
	}

	public function nuevo($cod_catastral = null){
		
		if($this->session->userdata("login")){

		$data = $this->datos_combo();
		$data['verifica'] = $this->rol_model->verifica();
		$data['cod_catastral']= $cod_catastral;
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('predios/nuevo', $data);
		$this->load->view('admin/footer');
		$this->load->view('admin/wizard_js');
		}
		else{
			redirect(base_url());
		}
	}

	public function editar_propietario($cod_catastral = null){
		if($this->session->userdata("login")){

			$data = $this->datos_combo();
			$data = $this->Ddrr_model->datos_editar($cod_catastral); //al actualizar esto se recarga

			$this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('predios/editar_propietario', $data);
			$this->load->view('admin/footer');
			$this->load->view('admin/wizard_js');
		}
		else{
			redirect(base_url());
		}
	}


	public function certificado($predio_id = null){
		if($this->session->userdata("login")){

		// $data['predio']=$this->db->get_where('catastro.predio', array('codcatas'=>$predio_id))->result();
		$this->db->select('*');
		$this->db->from('catastro.predio');
		$this->db->where('catastro.predio.predio_id', $predio_id);
		$this->db->join('catastro.predio_foto', 'catastro.predio_foto.predio_id=catastro.predio.predio_id');
		//$this->db->join('catastro.predio_ddrr', 'catastro.predio_ddrr.codcatas=catastro.predio.codcatas');
		$data['predio'] = $this->db->get()->result();

		$data['ddrr']= $this->db->query("SELECT * FROM catastro.predio_ddrr as pd WHERE pd.predio_id = '$predio_id'")->row();
		$data['personas'] =$this->db->query("SELECT p.nombres, p.paterno, p.materno FROM catastro.predio_ddrr as pd JOIN catastro.predio_titular as pt ON pd.ddrr_id = pt.ddrr_id JOIN persona as p ON pt.persona_id=p.persona_id WHERE pt.activo=1 AND pd.predio_id = '$predio_id'")->result();

		$data['bloques'] = $this->db->query("SELECT y.bloque_id,y.predio_id,y.nro_bloque,y.nom_bloque,y.estado_fisico,y.altura,y.anio_cons,y.anio_remo,y.porcentaje_remo,y.destino_bloque_id,z.descripcion as desc_bloque_dest,y.uso_bloque_id,x.descripcion as desc_bloque_uso FROM catastro.bloque as y LEFT JOIN catastro.uso_bloque as x on x.uso_bloque_id=y.uso_bloque_id LEFT JOIN catastro.destino_bloque as z on z.destino_bloque_id=y.destino_bloque_id WHERE y.activo=1 and x.activo=1 and z.activo=1 and y.predio_id='$predio_id' order by y.nro_bloque asc")->result();

		// print_r($this->db->last_query());
		// vdebug($data);
		$this->db->where('predio_id', $predio_id);
		$data['fotos'] = $this->db->get('catastro.predio_foto')->result();

		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('predios/certificado', $data);
		$this->load->view('admin/footer');
		$this->load->view('predios/imprime_js');
		}
		else{
			redirect(base_url());
		}
	}

	public function pdf_certificado($cod_catastral = null)
	{
		$this->db->select('*');
		$this->db->from('catastro.predio');
		$this->db->where('catastro.predio.predio_id', $cod_catastral);
		$this->db->join('catastro.predio_foto', 'catastro.predio_foto.predio_id=catastro.predio.predio_id');
		//$this->db->join('catastro.predio_ddrr', 'catastro.predio_ddrr.codcatas=catastro.predio.codcatas');
		$data['predio'] = $this->db->get()->result();

		$data['ddrr']= $this->db->query("SELECT * FROM catastro.predio_ddrr as pd WHERE pd.predio_id = '$cod_catastral'")->row();
		$data['personas'] =$this->db->query("SELECT p.nombres, p.paterno, p.materno FROM catastro.predio_ddrr as pd JOIN catastro.predio_titular as pt ON pd.ddrr_id = pt.ddrr_id JOIN persona as p ON pt.persona_id=p.persona_id WHERE pt.activo=1 AND pd.predio_id = '$cod_catastral'")->result();
		

		$dompdf = new Dompdf\Dompdf();
 
        $html = $this->load->view('predios/certificado_pdf', $data, true);
 
        $dompdf->loadHtml($html);
 
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4');

        $dompdf->set_option('defaultFont', 'Verdana');
 
        // Render the HTML as PDF
        $dompdf->render();
 
        // Get the generated PDF file contents
        $pdf = $dompdf->output();
 
        // Output the generated PDF to Browser
        $dompdf->stream("reporte.pdf", array("Attachment"=>1));
	}

	public function ajax_verifica_cod_catastral(){
		if($this->session->userdata("login")){
			$cod_catastral = $this->input->get("param1");
			// $this->db->where()
			$this->db->where('predio_id', $cod_catastral);
			$verifica_cod = $this->db->get('catastro.predio');
			// print_r($cod_catastral);
			// print_r($verifica_cod->result());die;
			if ($verifica_cod->num_rows() > 0) {
				$respuesta = array('codigo'=>$cod_catastral, 'estado'=>'si');
				echo json_encode($respuesta);
			} else {
				$respuesta = array('codigo'=>$cod_catastral, 'estado'=>'no');
				echo json_encode($respuesta);
			}
		}
		else{
			redirect(base_url());
		}
	}

	public function editar($cod_catastral = null){

		if($this->session->userdata("login")){
			$data = $this->datos_combo();
			
			$this->db->where('predio_id', $cod_catastral);
			$data['predio'] = $this->db->get('catastro.predio')->result();
			// vdebug($data, true, false, true);

			$this->db->where('predio_id', $cod_catastral);
			$data['servicios'] = $this->db->get('catastro.predio_servicios')->result();

			$this->db->where('predio_id', $cod_catastral);
			$data['fotos'] = $this->db->get('catastro.predio_foto')->result();
			// vdebug($data['fotos'], true, false, true);


			// $this->db->select('catastro.predio_via.gvia_id, catastro.geo_vias.nombre, catastro.predio_via.gvia_tipo');
			// $this->db->from('catastro.predio_via');
			// $this->db->where('predio_id', $cod_catastral);
			// $this->db->join('catastro.geo_vias', 'catastro.geo_vias.gvia_id=catastro.predio_via.gvia_id');
			// $data['calles'] = $this->db->get('catastro.predio_via')->result();
			// $data['calles'] = $this->db->get()->result();
			// vdebug($calles);

			// vdebug($consulta);
			$this->load->view('admin/header');
			$this->load->view('admin/menu');
			// $this->load->view('predios/nuevo', $data);
			$this->load->view('predios/editar', $data);
			$this->load->view('admin/footer');
			$this->load->view('predios/registra_js');
		}
		else{
			redirect(base_url());
		}
	}


	private function datos_combo(){

		if($this->session->userdata("login")){

			$this->db->select('tipo_predio_id, descripcion');
			$this->db->order_by('descripcion', 'ASC');
			$query = $this->db->get('catastro.tipo_predio');
			// vdebug($this->db->last_query());
			$data['dc_tipos_predio'] = $query->result();

			$this->db->select('zonaurb_id, descripcion');
			$query = $this->db->get('catastro.zona_urbana');
			$data['dc_zona_urbana'] = $query->result();

			// $this->db->select('via_id, codcatas');
			// $query = $this->db->get('catastro.predio_via');
			// $data['dc_predio_via'] = $query->result();

			$this->db->select('ubicacion_id, descripcion');
			$query = $this->db->get('catastro.ubicacion');
			$data['dc_ubicacion'] = $query->result();

			$this->db->select('pendiente_id, descripcion');
			$query = $this->db->get('catastro.pendiente');
			$data['dc_pendiente'] = $query->result();

			$this->db->select('nivel_id, descripcion');
			$query = $this->db->get('catastro.nivel');
			$data['dc_nivel'] = $query->result();

			$this->db->select('forma_id, descripcion');
			$query = $this->db->get('catastro.forma');
			$data['dc_forma'] = $query->result();

			$this->db->select('clase_predio_id, descripcion');
			$query = $this->db->get('catastro.clase_predio');
			$data['dc_clase_predio'] = $query->result();

			$this->db->select('uso_suelo_id, descripcion');
			$query = $this->db->get('catastro.uso_suelo');
			$data['dc_uso_suelo'] = $query->result();

			$this->db->select('edificio_id, descripcion');
			$query = $this->db->get('catastro.edificio');
			$data['dc_edificio'] = $query->result();

			$this->db->select('servicio_id, descripcion');
			$query = $this->db->get('catastro.servicio');
			$data['listado_servicios'] = $query->result();

			return $data;

		}
		else{
			redirect(base_url());
		}

	}

	public function ajax_genera_codcatas(){

		$codigo = $this->input->post('codigo');
		$distrito = $this->db->query("SELECT catastro.get_dist('$codigo')")->result();
		$manzana = $this->db->query("SELECT catastro.get_manz('$codigo')")->result();
		$predio = $this->db->query("SELECT catastro.get_pred('$codigo')")->result();
		$vias = $this->db->query("SELECT catastro.sp_get_vias('$codigo')")->result();
		// vdebug($vias);
		// $vias_predio = array();
		// foreach ($vias as $key => $v) {
		// 	// echo $v->sp_get_vias."<br />";
		// 	$vias_predio[$key] = $v->sp_get_vias;
		// }
		// echo $vias_predio;

		$nuevo_predio = $predio[0]->get_pred + 1;
		if ($nuevo_predio > 1 && $nuevo_predio < 10) {
			$ceros = "000";
		}elseif ($nuevo_predio > 9 && $nuevo_predio < 100) {
			$ceros = "00";
		} else {
			$ceros = "0";
		}
		// echo $nuevo_predio;

		// echo $distrito[0]->get_dist;
		// echo $manzana[0]->get_manz;
		// echo $predio[0]->get_pred;
		$datos = array();
		$cod_catastral = $distrito[0]->get_dist.$manzana[0]->get_manz.$ceros.$nuevo_predio;
		$datos['codcatas']=$cod_catastral;
		$datos['vias']=$vias;

		echo json_encode($datos);
		// echo ($datos);
		// vdebug($distrito[0]->get_dist);
	}

	public function envia_email(){

		$this->load->library('email');

        $this->email->set_newline("\r\n");

		$config['protocol']    = 'smtp';
		// $config['smtp_host']    = 'ssl://smtp.gmail.com';
		$config['smtp_host']  = 'mail.vergarasociados.com';
		$config['smtp_port']  = '465';
		$config['smtp_timeout'] = '7';
		$config['smtp_user']    = 'cristiam@vergarasociados.com';
		$config['smtp_pass']    = '123cristiam456';
		$config['charset']    = 'utf-8';
		$config['newline']    = "\r\n";
	    $config['mailtype'] = 'text'; // or html
	    $config['validation'] = TRUE; // bool whether to validate email or not

	    $this->email->initialize($config);

	    $this->email->from('cristiam@vergarasociados.com', 'Cristiam Prueba');
	    $this->email->to('cristiamherrera@gmail.com');

	    $this->email->subject('Prueba dede codeigniter');
	    $this->email->message('Aqui el mensaje de prueba.');

	    $this->email->send();

	    echo $this->email->print_debugger();

	    // $this->load->view('email_view');
	}

	public function consulta(){
		// vdebug($consulta);
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		// $this->load->view('predios/nuevo', $data);
		$this->load->view('predios/consulta');
		$this->load->view('admin/footer');
		$this->load->view('predios/registra_js');
	}

	public function form_fusion(){

		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		// $this->load->view('predios/nuevo', $data);
		$this->load->view('predios/form_fusion');
		$this->load->view('admin/footer');
		$this->load->view('predios/registra_js');

	}

}
