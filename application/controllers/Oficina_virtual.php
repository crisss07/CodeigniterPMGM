<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Oficina_virtual extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model("cargo_model");
        $this->load->library('session');
        $this->load->helper('url_helper');
        $this->load->helper('vayes_helper');
        $this->load->model("rol_model");
    }

    public function index(){
        if ($this->session->userdata("login")) {
        	$this->load->view('oficina/header');
            
            $this->load->view('oficina/inicio');
            $this->load->view('oficina/footer');
        }else{
            redirect(base_url());
        }
    }

    public function noticias()
    {
        if ($this->session->userdata("login")) {
            $this->load->view('oficina/header');
            
            $this->load->view('oficina/noticias');
            $this->load->view('oficina/footer');
        }else{
            redirect(base_url());
        }
    }

    public function requisitos(){
        if ($this->session->userdata("login")) {
            $datos['tramites'] = $this->db->query("SELECT tipo_tramite_id, tramite FROM tramite.tipo_tramite WHERE activo=1 ORDER BY tramite")->result();
            $this->load->view('oficina/header');
            
            $this->load->view('oficina/requisitos', $datos);
            $this->load->view('oficina/footer');
        }else{
            redirect(base_url());
        }
    }

    public function nuevo(){
        if ($this->session->userdata("login")) {    
            $datos['tramites'] = $this->db->query("SELECT tipo_tramite_id, tramite FROM tramite.tipo_tramite WHERE activo=1 ORDER BY tramite")->result();
            $this->load->view('oficina/header');
            
            $this->load->view('oficina/nuevo', $datos);
            $this->load->view('oficina/footer');
        }else{
            redirect(base_url());
        }
    }

    public function seguimiento(){
        if ($this->session->userdata("login")) {  
            $this->load->view('oficina/header');
            
            $this->load->view('oficina/seguimiento');
            $this->load->view('oficina/footer');
        }else{
            redirect(base_url());
        }
    }

    public function inspecciones(){
        if ($this->session->userdata("login")) {
            $this->load->view('oficina/header');
            
            $this->load->view('oficina/inspecciones');
            $this->load->view('oficina/footer');
        }else{
            redirect(base_url());
        }
    }

    public function servicios(){
        if ($this->session->userdata("login")) {
            $this->load->view('oficina/header');
            
            $this->load->view('oficina/servicios');
            $this->load->view('oficina/footer');
        }else{
            redirect(base_url());
        }
    }     

    public function certificado()    
    {
        date_default_timezone_set('America/La_Paz');
        set_time_limit(0);
        ini_set('memory_limit','1024M');


        $data['data_bloques'] = $this->db->query("SELECT b.*,d.descripcion,u.descripcion as uso FROM catastro.bloque b
LEFT JOIN
catastro.destino_bloque d
on b.destino_bloque_id=d.destino_bloque_id
LEFT JOIN
catastro.uso_bloque u
on b.uso_bloque_id=u.uso_bloque_id


WHERE predio_id=50 ORDER BY b.nro_bloque")->result(); 
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
        $this->load->view('oficina/certificado',$data);
        $html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->set_option('isRemoteEnabled', TRUE);  
        $this->dompdf->setPaper('letter', 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
    } 

}