<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Oficina_virtual extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model("Cargo_model");
        $this->load->library('session');
        $this->load->helper('url_helper');
        $this->load->helper('vayes_helper');
        $this->load->model("Rol_model");
        $this->load->model("Tramite_model");
        $this->load->model("Oficina_virtual_model");
    }

    public function index(){
        if ($this->session->userdata("login")) {
            $id = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $dato = $resi->persona_id;
            $data['nombre']=$this->db->query("SELECT nombres||' '||paterno||' '||materno nombre FROM public.persona WHERE persona_id='$dato'")->row();
        	$data['logueado']= "si";

        }else{
            $data['logueado']= "no";
        }
        $this->load->view('oficina/header', $data);
        $this->load->view('oficina/inicio');
        $this->load->view('oficina/footer');
        
    }

    public function noticias(){
        // if ($this->session->userdata("login")) {
            $datos['noticias'] = $this->Oficina_virtual_model->noticias_oficina_virtual();
            $this->load->view('oficina/header');
            $this->load->view('oficina/noticias',$datos);
            $this->load->view('oficina/footer');
        // }else{
        //     redirect(base_url());
        // }
    }

    public function requisitos(){
        if ($this->session->userdata("login")) {
            $id = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $dato = $resi->persona_id;
            $data['nombre']=$this->db->query("SELECT nombres||' '||paterno||' '||materno nombre FROM public.persona WHERE persona_id='$dato'")->row();
            $data['logueado']= "si";
        }else{
            $data['logueado']= "no";
        }
        $datos['tramites'] = $this->db->query("SELECT * FROM tramite.tipo_tramite WHERE activo=1 ORDER BY tramite")->result();
        $this->load->view('oficina/header', $data);
        $this->load->view('oficina/requisitos', $datos);
        $this->load->view('oficina/footer');
    }

    public function servicios(){
        if ($this->session->userdata("login")) {
            $id = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $dato = $resi->persona_id;
            $data['nombre']=$this->db->query("SELECT nombres||' '||paterno||' '||materno nombre FROM public.persona WHERE persona_id='$dato'")->row();
            $data['logueado']= "si";
        }else{
            $data['logueado']= "no";
        }
        $this->load->view('oficina/header', $data);
        $this->load->view('oficina/servicios');
        $this->load->view('oficina/footer');
    }

    public function nuevo(){
        if ($this->session->userdata("login")) {   
            $id = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $dato = $resi->persona_id;
            $data['nombre']=$this->db->query("SELECT nombres||' '||paterno||' '||materno nombre FROM public.persona WHERE persona_id='$dato'")->row();
            $data['logueado']= "si"; 
            $datos['tramites'] = $this->db->query("SELECT tipo_tramite_id, tramite FROM tramite.tipo_tramite WHERE activo=1 ORDER BY tramite")->result();
            $this->load->view('oficina/header', $data);
            $this->load->view('oficina/nuevo', $datos);
            $this->load->view('oficina/footer');
        }else{
            redirect(base_url());
        }
    }

    public function seguimiento(){
        if ($this->session->userdata("login")) {  
            $id = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $dato = $resi->persona_id;
            $data['nombre']=$this->db->query("SELECT nombres||' '||paterno||' '||materno nombre FROM public.persona WHERE persona_id='$dato'")->row();
            $data['logueado']= "si";

        }else{
            $data['logueado']= "no";
        }
            $this->load->view('oficina/header', $data);
            $this->load->view('oficina/seguimiento');
            $this->load->view('oficina/footer');
    }

    public function inspecciones(){
        if ($this->session->userdata("login")) {
            $id = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $dato = $resi->persona_id;
            $data['nombre']=$this->db->query("SELECT nombres||' '||paterno||' '||materno nombre FROM public.persona WHERE persona_id='$dato'")->row();
            $data['logueado']= "si";
        }else{
            $data['logueado']= "no";
        }
        $datos['lista']=$this->db->query("SELECT per.nombres||' '||per.paterno||' '||per.materno as nombre, asig.inicio, tt.tramite, ta.tipo FROM inspeccion.asignacion asig JOIN public.persona per ON asig.persona_id=per.persona_id JOIN tramite.tramite tra ON asig.tramite_id=tra.tramite_id JOIN tramite.tipo_tramite tt ON tra.tipo_tramite_id=tt.tipo_tramite_id JOIN inspeccion.tipo_asignacion ta ON asig.tipo_asignacion_id=ta.tipo_asignacion_id WHERE asig.activo=1")->result();
        $this->load->view('oficina/header', $data);
        $this->load->view('oficina/inspecciones', $datos);
        $this->load->view('oficina/footer');
    }     

    public function certificado(){
        date_default_timezone_set('America/La_Paz');
        set_time_limit(0);
        ini_set('memory_limit','1024M');

        $data['data_bloques'] = $this->db->query("SELECT b.*,d.descripcion,u.descripcion as uso FROM catastro.bloque b LEFT JOIN catastro.destino_bloque d ON b.destino_bloque_id=d.destino_bloque_id LEFT JOIN catastro.uso_bloque u ON b.uso_bloque_id=u.uso_bloque_id WHERE predio_id=50 ORDER BY b.nro_bloque")->result(); 
        $data['data_grupos'] = $this->db->query("SELECT * FROM catastro.bloque_grupo_mat where activo=1")->result_array(); 
        $data['num_grupos'] = $this->db->query("SELECT count(grupo_mat_id) as total from catastro.bloque_grupo_mat where activo=1 ")->row();
        $data['num_bloques'] = $this->db->query("SELECT count(grupo_mat_id) as total from catastro.bloque_mat_item where activo=1  ")->row();

        // Define key-value array
        $days_dias = array(
            'Monday'=>'Lunes',
            'Tuesday'=>'Martes',
            'Wednesday'=>'Miércoles',
            'Thursday'=>'Jueves',
            'Friday'=>'Viernes',
            'Saturday'=>'Sábado',
            'Sunday'=>'Domingo'
        );
        $mes=date('F');
        if ($mes == "January") $mes = "Enero";
        if ($mes == "February") $mes = "Febrero";
        if ($mes == "March") $mes = "Marzo";
        if ($mes == "April") $mes = "Abril";
        if ($mes == "May") $mes = "Mayo";
        if ($mes == "June") $mes = "Junio";
        if ($mes == "July") $mes = "Julio";
        if ($mes == "August") $mes = "Agosto";
        if ($mes == "September") $mes = "Setiembre";
        if ($mes == "October") $mes = "Octubre";
        if ($mes == "November") $mes = "Noviembre";
        if ($mes == "December") $mes = "Diciembre";        
        $data['dia']=date('d');
        $data['dia_l']=$days_dias[date('l')];
        $data['mes']=  date('m');
        $data['mes_l']= $mes;
        $data['anio']=date('Y');         
        $dia =  $days_dias[date('l')];

        // Generar codigo qr
        $key = "";
        $caracteres = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        //aquí podemos incluir incluso caracteres especiales pero cuidado con las ‘ y “ y algunos otros
        $length = 5;
        $max = strlen($caracteres) - 1;
        for ($i=0;$i<$length;$i++) {
            $key .= substr($caracteres, rand(0, $max), 1);
        }        
        $this->load->library('ciqrcode');
        $params['data'] = "Codigo catastral: 00-34-125-024-0-00-000-000   Propietario: HERNAN YUCRA MASIAS localhost/CodeigniterPMGM/oficina_virtual/certificacion/".$key ;
        $params['level'] = 'A';
        $params['size'] = 6;
        $params['savename'] = FCPATH . "public/assets/images/oficina/codigos/qr_2.png";
        $this->ciqrcode->generate($params);

        $data['img'] = "qr_2.png";
        //fin generar codigo qr
        $this->load->view('oficina/certificado',$data);
        $html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->set_option('isRemoteEnabled', TRUE);  
        $this->dompdf->setPaper('letter', 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream("certificado.pdf", array("Attachment"=>0));
    } 

    
    public function certificacion($clave=NULL){
        if ($this->session->userdata("login")) {
            $datos['tramites'] = $this->db->query("SELECT tipo_tramite_id, tramite FROM tramite.tipo_tramite WHERE activo=1 ORDER BY tramite")->result();
            $this->load->view('oficina/header');
            
            $this->load->view('oficina/certificacion');
            //$this->load->view('oficina/footer');
        }else{
            redirect(base_url());
        }
    }

    public function tramite_nuevo(){
        if($this->session->userdata("login")){
            $datos = $this->input->post();
            if(isset($datos)){
                //OBTENER EL ID DEL USUARIO LOGUEADO
                $id = $this->session->userdata("persona_perfil_id");
                $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
                $usu_creacion = $resi->persona_id;
                //corregir error aqui organigrama
                $organigrama_persona_id = 1;
                $tipo_documento_id = 1;
                $tipo_tramite_id = $datos['tipo_tramite_id'];
                $cite = $datos['cite'];
                $fecha = $datos['fecha'];
                $fojas = 0;
                $anexos = 0;
                $remitente = $datos['remitente'];
                $procedencia = '0';
                $referencia = '0';
                //$adjunto = $datos['cite_sin'];
                //$destino = $datos['destino'];
                $correlativo = $datos['correlativo'];
                $gestion = $datos['gestion'];
                $tipo_solicitante = $datos['tipo_solicitante'];
                $via_solicitud = 'Virtual';
                $solicitante_id = $datos['solicitante_id'];
                //$observaciones = $datos['observaciones'];
                //$requisitos=$datos['requisitos'];
                //$tipo = $this->input->post('boton');
                $this->Tramite_model->insertar_tramite_virtual($organigrama_persona_id, $tipo_documento_id, $tipo_tramite_id, $cite, $fecha, $fojas, $anexos, $remitente, $procedencia, $referencia, $usu_creacion, $correlativo, $gestion, $tipo_solicitante, $via_solicitud, $solicitante_id);
            }
            redirect(base_url().'oficina_virtual');
        }else{
            redirect(base_url());
        }   
    }

    public function verificar_usuario($clave){
        $clave="7016042";
        $usuario = $this->Oficina_virtual->verificar_usuario($clave);
        echo "El resultado es";
        print_r($usuario);
    }

    /* CODIGO DE TRAMITE */
    public function seguimiento_tramite(){
        if($this->session->userdata("login")){
            $this->load->view('oficina/header');
            $this->load->view('oficina/buscar');
            $this->load->view('oficina/footer');
        }else{
            redirect(base_url());
        }        
    }

    public function buscar_tramite(){
        $idTramite = $_GET['codigo_tramite']; 
        if($this->session->userdata("login")){
            $data['flujo'] = $this->db->get_where('tramite.derivacion', array('tramite_id'=>$idTramite))->result_array();
            $id       = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $usu_creacion = $resi->persona_id;
            $data['tramite'] = $this->db->get_where('tramite.tramite', array('tramite_id' => $idTramite))->row();
            $data['tipo_tramite']= $this->db->query("SELECT tt.tramite FROM tramite.tramite tr JOIN tramite.tipo_tramite tt ON tr.tipo_tramite_id=tt.tipo_tramite_id  WHERE tr.tramite_id = '$idTramite'")->row();
            $data['requisitos']= $this->db->query("SELECT tt.descripcion FROM tramite.tramite_requisito tr JOIN tramite.requisito tt ON tr.requisito_id=tt.requisito_id  WHERE tr.tramite_id = '$idTramite'")->result();
            $data['cedula']=$this->db->query("SELECT cp.ci FROM tramite.tramite tr JOIN public.persona cp ON tr.solicitante_id=cp.persona_id  WHERE tr.tramite_id = '$idTramite'")->row();
            $this->load->view('oficina/header', $data);
            $this->load->view('oficina/seguimiento',$data);
            $this->load->view('oficina/footer');
        }else{
            redirect(base_url());
        }
    }

    public function visualizar_predio(){
        $id_usuario = "3856156";
        $data = $this->Oficina_virtual_model->coordenadas_predio($id_usuario);
        $id_predio = $data[0];
        $numero = $id_predio['predio_id'];
        $titular = $id_predio['nombres']." ".$id_predio['paterno']." ".$id_predio['materno'];
        $direccion = $id_predio['direccion'];
        $data["predio_id"] = $numero;
        $data['titular'] =  $titular;
        $data['direccion'] =  $direccion;
        $this->load->view('oficina/header');
        $this->load->view('oficina/visualizar_predio', $data);
        $this->load->view('oficina/footer');
    }

    public function ver_noticia($noticias_id){
         if ($this->session->userdata("login")) {
            $id = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $dato = $resi->persona_id;
            $data['nombre']=$this->db->query("SELECT nombres||' '||paterno||' '||materno nombre FROM public.persona WHERE persona_id='$dato'")->row();
            $data['logueado']= "si";

        }else{
            $data['logueado']= "no";
        }

        $datos['noticias'] = $this->db->get_where('noticias', array('noticias_id' => $noticias_id))->row();

        $this->load->view('oficina/header');
        $this->load->view('oficina/ver_noticia', $datos);
        $this->load->view('oficina/footer');
    }

    public function almacenar_noticia(){

        $id_tramite = $this->Oficina_virtual_model->numero_noticias() + 1;
        if ($_FILES['archivo_seleccionado']['name']<>""){
            $nombre_imagen = $_FILES['archivo_seleccionado']['name'];
            $ruta="./public/assets/images/noticias/".$_FILES['archivo_seleccionado']['name'];
            move_uploaded_file($_FILES['archivo_seleccionado']['tmp_name'], $ruta);
            $imagen_nombre = $nombre_imagen;
        }else{
            $imagen_nombre = "nohayimagen.png";
        }
        $data = array(
            'noticias_id'   =>  $id_tramite,              
            'titulo'        =>  $organigrama_id=$this->input->post('titulo'), //input 
            'contenido'     =>  $organigrama_id=$this->input->post('contenido'), //input          
            'adjunto'       =>  $imagen_nombre, //input
            'activo'        =>  1, //input                                                       
        );
        $this->Oficina_virtual_model->almacenar_noticias($data);
        redirect('Oficina_virtual/noticias'); 
    }

    public function modificar_noticia(){
       $id= $this->input->get('noticia_id'); 
    //    echo "la noticia a modificar es: ".$id;
    //    $noticia  = $this->Oficina_virtual_model->buscar_noticia($id);
    //  print_r($noticia);
        $data['noticia']  = $this->Oficina_virtual_model->buscar_noticia($id);
        $this->load->view('oficina/header');
        $this->load->view('oficina/modificar_noticia', $data);
        $this->load->view('oficina/footer');
    }

    public function actualizar_noticia(){
        $imagen_nombre="";
        if ($_FILES['archivo_seleccionado']['name']<>""){
                $nombre_imagen = $_FILES['archivo_seleccionado']['name'];
                $ruta="./public/assets/images/noticias/".$_FILES['archivo_seleccionado']['name'];
                move_uploaded_file($_FILES['archivo_seleccionado']['tmp_name'], $ruta);
                $imagen_nombre = $nombre_imagen;
        }else{
            $imagen_nombre = $this->input->post('nombre_imagen_noticia');
        }
            $data = array(                
                'titulo'    => $this->input->post('titulo'), //input 
                'contenido' => $this->input->post('contenido'), //input          
                'adjunto' => $imagen_nombre, //input                                                       
            );
        $noticia_id =  $this->input->post('noticia_id');    
        $this->Oficina_virtual_model->actualizar_noticia($noticia_id, $data);
        redirect('Oficina_virtual/noticias');      
    }

    public function estado_noticia(){
        $tramite_id=$this->input->get('noticia_id');
        $estado=$this->input->get('estado');
        if ($estado=="1") {
        	$estado_noticia=0;
        }elseif ($estado=="0") {
        	$estado_noticia=1; 
        }
        $data = array(                
            'activo'    => $estado_noticia,                                                   
        );
        $this->Oficina_virtual_model->estado_noticia($tramite_id, $data);
        redirect('Oficina_virtual/noticias');
    }

    public function listar_tramites(){
        // codigo que me permite obtener el flujo de tramite sin repetir los pasos que se agregan agregarr un nuevo perfil de la persona
        $lista_tramites = $this->Oficina_virtual_model->listar_tramites();
        $flujo_tramite = [];       
        $proceso = [];
        foreach ($lista_tramites as $dato){
            $id_tramite = $dato["tipo_tramite_id"];
            $flujos_tramite      =      $this->Oficina_virtual_model->numero_flujo($id_tramite);
            foreach ($flujos_tramite as $orden_flujo) {              
                $orden             =   $orden_flujo["orden"];           
                $proceso     =   $this->Oficina_virtual_model->proceso_flujo($id_tramite, $orden);        
                array_push($flujo_tramite, $proceso);
            }
        }
        // $f=$this->Oficina_virtual_model->flujo_tramite();
        // echo "<pre>";print_r($f);echo "<pre>"."<br>";
        // echo "<pre>";
        // print_r($flujo_tramite);        
        // echo "</pre>";
        $data['flujo']       = $flujo_tramite;
        $data['tramites']    = $this->Oficina_virtual_model->listar_tramites();
        $data['requisitos']  = $this->Oficina_virtual_model->listar_requisitos();
        $this->load->view('oficina/header');
        $this->load->view('oficina/requisitos',$data);
         $this->load->view('oficina/footer');

    }
    

}
