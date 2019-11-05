<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reportes_m extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("");
        $this->load->library('session');
        $this->load->helper('url_helper');
        $this->load->helper('vayes_helper');
        $this->load->model("Prueba_model");
        //QR CODE
        //$this->load->library('phpqrcode/qrlib');
        $this->load->helper('url');
        // $this->load->library('../controllers/prueba'); 
        
        //$this->load->model("rol_model");

    }

    public function index()
    {
        if ($this->session->userdata("login")) {

            redirect(base_url() );
        } else {
            redirect(base_url());
        }
    }




   

    

   

 
    public function pdftest()
    {
        if ($this->session->userdata("login")) {

        $this->load->view('user_list');
        $html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('letter', 'landscape');
        $this->dompdf->render();
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
         
        } else {
            redirect(base_url());
        }


    }

    public function pdf()
    {
        if ($this->session->userdata("login")) {

              $this->load->view('reports/rep_nocatastro');
        $html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('letter', 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
        } else {
            redirect(base_url());
        }
      
    } 

    public function pdf_nc($id=null)    
    {
        if ($this->session->userdata("login")) {
            date_default_timezone_set('America/La_Paz');

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
        if ($mes == "September") $mes = "Septiembre";
        if ($mes == "October") $mes = "Octubre";
        if ($mes == "November") $mes = "Noviembre";
        if ($mes == "December") $mes = "Diciembre";

        $data['datos_certificado'] = $this->db->query("SELECT g.*,k.*,f.*,d.* FROM tramite.informe_tecnico g
        LEFT JOIN
        (SELECT i.informe_tecnico_id,p.nombres as nom_a,p.paterno as pat_a,p.materno as mat_a from tramite.informe_tecnico i
        LEFT JOIN
        persona p
        on i.a=p.persona_id
        WHERE informe_tecnico_id=$id ) as k
        on g.informe_tecnico_id=k.informe_tecnico_id
        
        LEFT JOIN
        
        (SELECT i.informe_tecnico_id,p.nombres as nom_via,p.paterno as pat_via,p.materno as mat_via from tramite.informe_tecnico i
        LEFT JOIN
        persona p
        on i.via=p.persona_id
        WHERE informe_tecnico_id=$id) as f
        on g.informe_tecnico_id=f.informe_tecnico_id
        
        LEFT JOIN
        (SELECT i.informe_tecnico_id,p.nombres as nom_de,p.paterno as pat_de,p.materno as mat_de from tramite.informe_tecnico i
        LEFT JOIN
        persona p
        on i.de=p.persona_id
        WHERE informe_tecnico_id=$id ) as d
        on d.informe_tecnico_id=g.informe_tecnico_id
        WHERE g.informe_tecnico_id=$id")->row();   
        
        $tiempo= $this->db->query("SELECT EXTRACT(day from fecha_testimonio)as dia,EXTRACT(MONTH from fecha_testimonio)as mes,EXTRACT(YEAR from fecha_testimonio)as anio  FROM tramite.informe_tecnico 
        WHERE informe_tecnico_id=$id")->row();

        $data['dia_not']=$tiempo->dia;
        $mes_n=$tiempo->mes;

        if ($mes_n == "1") $mes_n = "Enero";
        if ($mes_n == "2") $mes_n = "Febrero";
        if ($mes_n == "3") $mes_n = "Marzo";
        if ($mes_n == "4") $mes_n = "Abril";
        if ($mes_n == "5") $mes_n = "Mayo";
        if ($mes_n == "6") $mes_n = "Junio";
        if ($mes_n == "7") $mes_n = "Julio";
        if ($mes_n == "8") $mes_n = "Agosto";
        if ($mes_n == "9") $mes_n = "Septiembre";
        if ($mes_n == "10") $mes_n = "Octubre";
        if ($mes_n == "11") $mes_n = "Noviembre";
        if ($mes_n == "12") $mes_n = "Diciembre";
        
        $data['mes_not']=$mes_n;
        $data['anio_not']=$tiempo->anio;

        $data['dia']=date('d');
        $data['dia_l']=$days_dias[date('l')];
        $data['mes']=  date('m');
        $data['mes_l']= $mes;
        $data['anio']=date('Y');   



        /*la fecha del informe*/
        $tiempos= $this->db->query("SELECT EXTRACT(day from fecha_informe)as dia,EXTRACT(MONTH from fecha_informe)as mes,EXTRACT(YEAR from fecha_informe)as anio  FROM tramite.informe_tecnico 
        WHERE informe_tecnico_id=$id")->row();

        $dia_inf=$tiempos->dia;

        $mes_i=$tiempos->mes;

        if ($mes_i == "1") $mes_i = "Enero";
        if ($mes_i == "2") $mes_i = "Febrero";
        if ($mes_i == "3") $mes_i = "Marzo";
        if ($mes_i == "4") $mes_i = "Abril";
        if ($mes_i == "5") $mes_i = "Mayo";
        if ($mes_i == "6") $mes_i = "Junio";
        if ($mes_i == "7") $mes_i = "Julio";
        if ($mes_i == "8") $mes_i = "Agosto";
        if ($mes_i == "9") $mes_i = "Septiembre";
        if ($mes_i == "10") $mes_i = "Octubre";
        if ($mes_i == "11") $mes_i = "Noviembre";
        if ($mes_i == "12") $mes_n = "Diciembre";
        
        $data['mes_inf']=$mes_i;
        $data['anio_inf']=$tiempos->anio;
    
        $data['dia_inf']=$tiempos->dia;


        /*dia literal*/
        $fecha_inf= $this->db->query("SELECT fecha_informe FROM tramite.informe_tecnico 
            WHERE informe_tecnico_id=$id")->row();
        $fecha=$fecha_inf->fecha_informe;
        $fecha = substr($fecha, 0, 10);
        $numeroDia = date('d', strtotime($fecha));
        $dia_infor = date('l', strtotime($fecha));
        $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
        $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
        $nombredia = str_replace($dias_EN, $dias_ES, $dia_infor);
        $data['dia_linf']=$nombredia;

        $this->load->view('reports/rep_nocatastro',$data);
        $html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->set_option('isRemoteEnabled', TRUE);  
        $this->dompdf->setPaper('letter', 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));

            
        } else {
            redirect(base_url());
        }


        
    }  

    public function pdf_j($id=null)    
    {
        if ($this->session->userdata("login")) {
            date_default_timezone_set('America/La_Paz');
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
        if ($mes == "September") $mes = "Septiembre";
        if ($mes == "October") $mes = "Octubre";
        if ($mes == "November") $mes = "Noviembre";
        if ($mes == "December") $mes = "Diciembre";
        $data['dia']=date('d');
        $data['dia_l']=$days_dias[date('l')];
        $data['mes']=  date('m');
        $data['mes_l']= $mes;
        $data['anio']=date('Y');         
        $dia =  $days_dias[date('l')];

        $data['datos_certificado'] = $this->db->query("SELECT g.*,k.*,f.*,d.* FROM tramite.informe_tecnico g
        LEFT JOIN
        (SELECT i.informe_tecnico_id,p.nombres as nom_a,p.paterno as pat_a,p.materno as mat_a from tramite.informe_tecnico i
        LEFT JOIN
        persona p
        on i.a=p.persona_id
        WHERE informe_tecnico_id=$id ) as k
        on g.informe_tecnico_id=k.informe_tecnico_id
        
        LEFT JOIN
        
        (SELECT i.informe_tecnico_id,p.nombres as nom_via,p.paterno as pat_via,p.materno as mat_via from tramite.informe_tecnico i
        LEFT JOIN
        persona p
        on i.via=p.persona_id
        WHERE informe_tecnico_id=$id) as f
        on g.informe_tecnico_id=f.informe_tecnico_id
        
        LEFT JOIN
        (SELECT i.informe_tecnico_id,p.nombres as nom_de,p.paterno as pat_de,p.materno as mat_de from tramite.informe_tecnico i
        LEFT JOIN
        persona p
        on i.de=p.persona_id
        WHERE informe_tecnico_id=$id) as d
        on d.informe_tecnico_id=g.informe_tecnico_id
        WHERE g.informe_tecnico_id=$id")->row();

        $tiempo= $this->db->query("SELECT EXTRACT(day from fecha_testimonio)as dia,EXTRACT(MONTH from fecha_testimonio)as mes,EXTRACT(YEAR from fecha_testimonio)as anio  FROM tramite.informe_tecnico 
        WHERE informe_tecnico_id=$id")->row();

        $data['dia_not']=$tiempo->dia;
        $mes_n=$tiempo->mes;



        if ($mes_n == "1") $mes_n = "Enero";
        if ($mes_n == "2") $mes_n = "Febrero";
        if ($mes_n == "3") $mes_n = "Marzo";
        if ($mes_n == "4") $mes_n = "Abril";
        if ($mes_n == "5") $mes_n = "Mayo";
        if ($mes_n == "6") $mes_n = "Junio";
        if ($mes_n == "7") $mes_n = "Julio";
        if ($mes_n == "8") $mes_n = "Agosto";
        if ($mes_n == "9") $mes_n = "Septiembre";
        if ($mes_n == "10") $mes_n = "Octubre";
        if ($mes_n == "11") $mes_n = "Noviembre";
        if ($mes_n == "12") $mes_n = "Diciembre";


        $data['mes_not']=$mes_n;
        $data['anio_not']=$tiempo->anio;



        /*la fecha del informe*/
        $tiempos= $this->db->query("SELECT EXTRACT(day from fecha_informe)as dia,EXTRACT(MONTH from fecha_informe)as mes,EXTRACT(YEAR from fecha_informe)as anio  FROM tramite.informe_tecnico 
        WHERE informe_tecnico_id=$id")->row();

        $dia_inf=$tiempos->dia;

        $mes_i=$tiempos->mes;

        if ($mes_i == "1") $mes_i = "Enero";
        if ($mes_i == "2") $mes_i = "Febrero";
        if ($mes_i == "3") $mes_i = "Marzo";
        if ($mes_i == "4") $mes_i = "Abril";
        if ($mes_i == "5") $mes_i = "Mayo";
        if ($mes_i == "6") $mes_i = "Junio";
        if ($mes_i == "7") $mes_i = "Julio";
        if ($mes_i == "8") $mes_i = "Agosto";
        if ($mes_i == "9") $mes_i = "Septiembre";
        if ($mes_i == "10") $mes_i = "Octubre";
        if ($mes_i == "11") $mes_i = "Noviembre";
        if ($mes_i == "12") $mes_n = "Diciembre";
        
        $data['mes_inf']=$mes_i;
        $data['anio_inf']=$tiempos->anio;
    
        $data['dia_inf']=$tiempos->dia;


        /*dia literal*/
        $fecha_inf= $this->db->query("SELECT fecha_informe FROM tramite.informe_tecnico 
            WHERE informe_tecnico_id=$id")->row();
        $fecha=$fecha_inf->fecha_informe;
        $fecha = substr($fecha, 0, 10);
        $numeroDia = date('d', strtotime($fecha));
        $dia_infor = date('l', strtotime($fecha));
        $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
        $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
        $nombredia = str_replace($dias_EN, $dias_ES, $dia_infor);
        $data['dia_linf']=$nombredia;



        $this->load->view('reports/rep_jurisdiccion',$data);
        $html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->set_option('isRemoteEnabled', TRUE);  
        $this->dompdf->setPaper('letter', 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));

            
        } else {
            redirect(base_url());
        }

        
    } 
    
    public function pdf_sup($id=null)    
    {
        if ($this->session->userdata("login")) {
            date_default_timezone_set('America/La_Paz');

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
        if ($mes == "September") $mes = "Septiembre";
        if ($mes == "October") $mes = "Octubre";
        if ($mes == "November") $mes = "Noviembre";
        if ($mes == "December") $mes = "Diciembre";

        $data['datos_certificado'] = $this->db->query("SELECT g.*,k.*,f.*,d.* FROM tramite.informe_tecnico g
        LEFT JOIN
        (SELECT i.informe_tecnico_id,p.nombres as nom_a,p.paterno as pat_a,p.materno as mat_a from tramite.informe_tecnico i
        LEFT JOIN
        persona p
        on i.a=p.persona_id
        WHERE informe_tecnico_id=$id ) as k
        on g.informe_tecnico_id=k.informe_tecnico_id
        
        LEFT JOIN
        
        (SELECT i.informe_tecnico_id,p.nombres as nom_via,p.paterno as pat_via,p.materno as mat_via from tramite.informe_tecnico i
        LEFT JOIN
        persona p
        on i.via=p.persona_id
        WHERE informe_tecnico_id=$id) as f
        on g.informe_tecnico_id=f.informe_tecnico_id
        
        LEFT JOIN
        (SELECT i.informe_tecnico_id,p.nombres as nom_de,p.paterno as pat_de,p.materno as mat_de from tramite.informe_tecnico i
        LEFT JOIN
        persona p
        on i.de=p.persona_id
        WHERE informe_tecnico_id=$id ) as d
        on d.informe_tecnico_id=g.informe_tecnico_id
        WHERE g.informe_tecnico_id=$id")->row();   
        
        $tiempo= $this->db->query("SELECT EXTRACT(day from fecha_testimonio)as dia,EXTRACT(MONTH from fecha_testimonio)as mes,EXTRACT(YEAR from fecha_testimonio)as anio  FROM tramite.informe_tecnico 
        WHERE informe_tecnico_id=$id")->row();

        $data['dia_not']=$tiempo->dia;
        $mes_n=$tiempo->mes;
       


          if ($mes_n == "1") $mes_n = "Enero";
        if ($mes_n == "2") $mes_n = "Febrero";
        if ($mes_n == "3") $mes_n = "Marzo";
        if ($mes_n == "4") $mes_n = "Abril";
        if ($mes_n == "5") $mes_n = "Mayo";
        if ($mes_n == "6") $mes_n = "Junio";
        if ($mes_n == "7") $mes_n = "Julio";
        if ($mes_n == "8") $mes_n = "Agosto";
        if ($mes_n == "9") $mes_n = "Septiembre";
        if ($mes_n == "10") $mes_n = "Octubre";
        if ($mes_n == "11") $mes_n = "Noviembre";
        if ($mes_n == "12") $mes_n = "Diciembre";

        
        $data['mes_not']=$mes_n;
        $data['anio_not']=$tiempo->anio;


        
        $data['dia']=date('d');
        $data['dia_l']=$days_dias[date('l')];
        $data['mes']=  date('m');
        $data['mes_l']= $mes;
        $data['anio']=date('Y');         
        $dia =  $days_dias[date('l')];



        /*la fecha del informe*/
        $tiempos= $this->db->query("SELECT EXTRACT(day from fecha_informe)as dia,EXTRACT(MONTH from fecha_informe)as mes,EXTRACT(YEAR from fecha_informe)as anio  FROM tramite.informe_tecnico 
        WHERE informe_tecnico_id=$id")->row();

        $dia_inf=$tiempos->dia;

        $mes_i=$tiempos->mes;

        if ($mes_i == "1") $mes_i = "Enero";
        if ($mes_i == "2") $mes_i = "Febrero";
        if ($mes_i == "3") $mes_i = "Marzo";
        if ($mes_i == "4") $mes_i = "Abril";
        if ($mes_i == "5") $mes_i = "Mayo";
        if ($mes_i == "6") $mes_i = "Junio";
        if ($mes_i == "7") $mes_i = "Julio";
        if ($mes_i == "8") $mes_i = "Agosto";
        if ($mes_i == "9") $mes_i = "Septiembre";
        if ($mes_i == "10") $mes_i = "Octubre";
        if ($mes_i == "11") $mes_i = "Noviembre";
        if ($mes_i == "12") $mes_n = "Diciembre";
        
        $data['mes_inf']=$mes_i;
        $data['anio_inf']=$tiempos->anio;
    
        $data['dia_inf']=$tiempos->dia;


        /*dia literal*/
        $fecha_inf= $this->db->query("SELECT fecha_informe FROM tramite.informe_tecnico 
            WHERE informe_tecnico_id=$id")->row();
        $fecha=$fecha_inf->fecha_informe;
        $fecha = substr($fecha, 0, 10);
        $numeroDia = date('d', strtotime($fecha));
        $dia_infor = date('l', strtotime($fecha));
        $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
        $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
        $nombredia = str_replace($dias_EN, $dias_ES, $dia_infor);
        $data['dia_linf']=$nombredia;



        $this->load->view('reports/rep_superficie',$data);
        $html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->set_option('isRemoteEnabled', TRUE);  
        $this->dompdf->setPaper('letter', 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));

            
        } else {
            redirect(base_url());
        }
        
    } 

    public function pdf_urb($id=null)    
    {
        if ($this->session->userdata("login")) {
            date_default_timezone_set('America/La_Paz');

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
        if ($mes == "September") $mes = "Septiembre";
        if ($mes == "October") $mes = "Octubre";
        if ($mes == "November") $mes = "Noviembre";
        if ($mes == "December") $mes = "Diciembre";

        $data['datos_certificado'] = $this->db->query("SELECT g.*,k.*,f.*,d.* FROM tramite.informe_tecnico g
        LEFT JOIN
        (SELECT i.informe_tecnico_id,p.nombres as nom_a,p.paterno as pat_a,p.materno as mat_a from tramite.informe_tecnico i
        LEFT JOIN
        persona p
        on i.a=p.persona_id
        WHERE informe_tecnico_id=$id ) as k
        on g.informe_tecnico_id=k.informe_tecnico_id
        
        LEFT JOIN
        
        (SELECT i.informe_tecnico_id,p.nombres as nom_via,p.paterno as pat_via,p.materno as mat_via from tramite.informe_tecnico i
        LEFT JOIN
        persona p
        on i.via=p.persona_id
        WHERE informe_tecnico_id=$id) as f
        on g.informe_tecnico_id=f.informe_tecnico_id
        
        LEFT JOIN
        (SELECT i.informe_tecnico_id,p.nombres as nom_de,p.paterno as pat_de,p.materno as mat_de from tramite.informe_tecnico i
        LEFT JOIN
        persona p
        on i.de=p.persona_id
        WHERE informe_tecnico_id=$id ) as d
        on d.informe_tecnico_id=g.informe_tecnico_id
        WHERE g.informe_tecnico_id=$id")->row();   
        
        $tiempo= $this->db->query("SELECT EXTRACT(day from fecha_testimonio)as dia,EXTRACT(MONTH from fecha_testimonio)as mes,EXTRACT(YEAR from fecha_testimonio)as anio  FROM tramite.informe_tecnico 
        WHERE informe_tecnico_id=$id")->row();

        $data['dia_not']=$tiempo->dia;
        $mes_n=$tiempo->mes;
       


          if ($mes_n == "1") $mes_n = "Enero";
        if ($mes_n == "2") $mes_n = "Febrero";
        if ($mes_n == "3") $mes_n = "Marzo";
        if ($mes_n == "4") $mes_n = "Abril";
        if ($mes_n == "5") $mes_n = "Mayo";
        if ($mes_n == "6") $mes_n = "Junio";
        if ($mes_n == "7") $mes_n = "Julio";
        if ($mes_n == "8") $mes_n = "Agosto";
        if ($mes_n == "9") $mes_n = "Septiembre";
        if ($mes_n == "10") $mes_n = "Octubre";
        if ($mes_n == "11") $mes_n = "Noviembre";
        if ($mes_n == "12") $mes_n = "Diciembre";

        
        $data['mes_not']=$mes_n;
        $data['anio_not']=$tiempo->anio;


        
        $data['dia']=date('d');
        $data['dia_l']=$days_dias[date('l')];
        $data['mes']=  date('m');
        $data['mes_l']= $mes;
        $data['anio']=date('Y');         
        $dia =  $days_dias[date('l')];

           /*la fecha del informe*/
        $tiempos= $this->db->query("SELECT EXTRACT(day from fecha_informe)as dia,EXTRACT(MONTH from fecha_informe)as mes,EXTRACT(YEAR from fecha_informe)as anio  FROM tramite.informe_tecnico 
        WHERE informe_tecnico_id=$id")->row();

        $dia_inf=$tiempos->dia;

        $mes_i=$tiempos->mes;

        if ($mes_i == "1") $mes_i = "Enero";
        if ($mes_i == "2") $mes_i = "Febrero";
        if ($mes_i == "3") $mes_i = "Marzo";
        if ($mes_i == "4") $mes_i = "Abril";
        if ($mes_i == "5") $mes_i = "Mayo";
        if ($mes_i == "6") $mes_i = "Junio";
        if ($mes_i == "7") $mes_i = "Julio";
        if ($mes_i == "8") $mes_i = "Agosto";
        if ($mes_i == "9") $mes_i = "Septiembre";
        if ($mes_i == "10") $mes_i = "Octubre";
        if ($mes_i == "11") $mes_i = "Noviembre";
        if ($mes_i == "12") $mes_n = "Diciembre";
        
        $data['mes_inf']=$mes_i;
        $data['anio_inf']=$tiempos->anio;
    
        $data['dia_inf']=$tiempos->dia;


        /*dia literal*/
        $fecha_inf= $this->db->query("SELECT fecha_informe FROM tramite.informe_tecnico 
            WHERE informe_tecnico_id=$id")->row();
        $fecha=$fecha_inf->fecha_informe;
        $fecha = substr($fecha, 0, 10);
        $numeroDia = date('d', strtotime($fecha));
        $dia_infor = date('l', strtotime($fecha));
        $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
        $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
        $nombredia = str_replace($dias_EN, $dias_ES, $dia_infor);
        $data['dia_linf']=$nombredia;



        $this->load->view('reports/rep_urbana',$data);
        $html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->set_option('isRemoteEnabled', TRUE);  
        $this->dompdf->setPaper('letter', 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));

            
        } else {
            redirect(base_url());
        }
        
    } 





    public function html($id=null)
    {
        if ($this->session->userdata("login")) {
            date_default_timezone_set('America/La_Paz');

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
        if ($mes == "September") $mes = "Septiembre";
        if ($mes == "October") $mes = "Octubre";
        if ($mes == "November") $mes = "Noviembre";
        if ($mes == "December") $mes = "Diciembre";

        $data['datos_certificado'] = $this->db->query("SELECT g.*,k.*,f.*,d.* FROM tramite.informe_tecnico g
        LEFT JOIN
        (SELECT i.informe_tecnico_id,p.nombres as nom_a,p.paterno as pat_a,p.materno as mat_a from tramite.informe_tecnico i
        LEFT JOIN
        persona p
        on i.a=p.persona_id
        WHERE informe_tecnico_id=$id ) as k
        on g.informe_tecnico_id=k.informe_tecnico_id
        
        LEFT JOIN
        
        (SELECT i.informe_tecnico_id,p.nombres as nom_via,p.paterno as pat_via,p.materno as mat_via from tramite.informe_tecnico i
        LEFT JOIN
        persona p
        on i.via=p.persona_id
        WHERE informe_tecnico_id=$id) as f
        on g.informe_tecnico_id=f.informe_tecnico_id
        
        LEFT JOIN
        (SELECT i.informe_tecnico_id,p.nombres as nom_de,p.paterno as pat_de,p.materno as mat_de from tramite.informe_tecnico i
        LEFT JOIN
        persona p
        on i.de=p.persona_id
        WHERE informe_tecnico_id=$id ) as d
        on d.informe_tecnico_id=g.informe_tecnico_id
        WHERE g.informe_tecnico_id=$id")->row();   
        
        $tiempo= $this->db->query("SELECT EXTRACT(day from fecha_testimonio)as dia,EXTRACT(MONTH from fecha_testimonio)as mes,EXTRACT(YEAR from fecha_testimonio)as anio  FROM tramite.informe_tecnico 
        WHERE informe_tecnico_id=$id")->row();

        $data['dia_not']=$tiempo->dia;
        $mes_n=$tiempo->mes;

        if ($mes_n == "1") $mes_n = "Enero";
        if ($mes_n == "2") $mes_n = "Febrero";
        if ($mes_n == "3") $mes_n = "Marzo";
        if ($mes_n == "4") $mes_n = "Abril";
        if ($mes_n == "5") $mes_n = "Mayo";
        if ($mes_n == "6") $mes_n = "Junio";
        if ($mes_n == "7") $mes_n = "Julio";
        if ($mes_n == "8") $mes_n = "Agosto";
        if ($mes_n == "9") $mes_n = "Septiembre";
        if ($mes_n == "10") $mes_n = "Octubre";
        if ($mes_n == "11") $mes_n = "Noviembre";
        if ($mes_n == "12") $mes_n = "Diciembre";
        
        $data['mes_not']=$mes_n;
        $data['anio_not']=$tiempo->anio;

        $data['dia']=date('d');
        $data['dia_l']=$days_dias[date('l')];
        $data['mes']=  date('m');
        $data['mes_l']= $mes;
        $data['anio']=date('Y');   



        /*la fecha del informe*/
        $tiempos= $this->db->query("SELECT EXTRACT(day from fecha_informe)as dia,EXTRACT(MONTH from fecha_informe)as mes,EXTRACT(YEAR from fecha_informe)as anio  FROM tramite.informe_tecnico 
        WHERE informe_tecnico_id=$id")->row();

        $dia_inf=$tiempos->dia;

        $mes_i=$tiempos->mes;

        if ($mes_i == "1") $mes_i = "Enero";
        if ($mes_i == "2") $mes_i = "Febrero";
        if ($mes_i == "3") $mes_i = "Marzo";
        if ($mes_i == "4") $mes_i = "Abril";
        if ($mes_i == "5") $mes_i = "Mayo";
        if ($mes_i == "6") $mes_i = "Junio";
        if ($mes_i == "7") $mes_i = "Julio";
        if ($mes_i == "8") $mes_i = "Agosto";
        if ($mes_i == "9") $mes_i = "Septiembre";
        if ($mes_i == "10") $mes_i = "Octubre";
        if ($mes_i == "11") $mes_i = "Noviembre";
        if ($mes_i == "12") $mes_n = "Diciembre";
        
        $data['mes_inf']=$mes_i;
        $data['anio_inf']=$tiempos->anio;
    
        $data['dia_inf']=$tiempos->dia;


        /*dia literal*/
         $fecha_inf= $this->db->query("SELECT fecha_informe FROM tramite.informe_tecnico 
        WHERE informe_tecnico_id=$id")->row();

         $fecha=$fecha_inf->fecha_informe;

          $fecha = substr($fecha, 0, 10);
  $numeroDia = date('d', strtotime($fecha));
  $dia_infor = date('l', strtotime($fecha));
  $mes = date('F', strtotime($fecha));
  $anio = date('Y', strtotime($fecha));
  $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
  $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
  $nombredia = str_replace($dias_EN, $dias_ES, $dia_infor);
$meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
  $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
  $nombreMes = str_replace($meses_EN, $meses_ES, $mes);

           
          $data['dia_linf']=$nombredia;
        $this->load->view('reports/rep_nocatastro',$data);    

            
        } else {
            redirect(base_url());
        }


            
    }  

    public function proforma($id=null)    
    {
       
        // var_dump($id);

        date_default_timezone_set('America/La_Paz');

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
        if ($mes == "September") $mes = "Septiembre";
        if ($mes == "October") $mes = "Octubre";
        if ($mes == "November") $mes = "Noviembre";
        if ($mes == "December") $mes = "Diciembre";

        $data['dia']=date('d');
        $data['dia_l']=$days_dias[date('l')];
        $data['mes']=  date('m');
        $data['mes_l']= $mes;
        $data['anio']=date('Y');   

        $data['proforma'] = $this->db->query("SELECT * FROM tramite.proforma WHERE proforma_id = '$id'")->row();
        $total = $this->db->query("SELECT * FROM tramite.proforma WHERE proforma_id = '$id'")->row();


        //fecha informe

        $tiempo = $this->db->query("SELECT  EXTRACT(day from fecha_proforma)as dia,EXTRACT(MONTH from fecha_proforma)as mes,EXTRACT(YEAR from fecha_proforma)as anio FROM tramite.proforma WHERE proforma_id = '$id'")->row();

        $data['dia_not']=$tiempo->dia;
        $mes_n=$tiempo->mes;

        if ($mes_n == "1") $mes_n = "Enero";
        if ($mes_n == "2") $mes_n = "Febrero";
        if ($mes_n == "3") $mes_n = "Marzo";
        if ($mes_n == "4") $mes_n = "Abril";
        if ($mes_n == "5") $mes_n = "Mayo";
        if ($mes_n == "6") $mes_n = "Junio";
        if ($mes_n == "7") $mes_n = "Julio";
        if ($mes_n == "8") $mes_n = "Agosto";
        if ($mes_n == "9") $mes_n = "Septiembre";
        if ($mes_n == "10") $mes_n = "Octubre";
        if ($mes_n == "11") $mes_n = "Noviembre";
        if ($mes_n == "12") $mes_n = "Diciembre";

         $data['mes_not']=$mes_n;
        $data['anio_not']=$tiempo->anio;
        //$data['dia_not_l']=$days_dias[$tiempo->dia];

          /*dia literal*/
         $fecha_inf= $this->db->query("SELECT * FROM tramite.proforma WHERE proforma_id = $id")->row();

         $fecha=$fecha_inf->fecha_proforma;

          $fecha = substr($fecha, 0, 10);
          $numeroDia = date('d', strtotime($fecha));
          $dia_infor = date('l', strtotime($fecha));
          $mes = date('F', strtotime($fecha));
          $anio = date('Y', strtotime($fecha));
          $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
          $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
          $nombredia = str_replace($dias_EN, $dias_ES, $dia_infor);
          $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
          $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
          $nombreMes = str_replace($meses_EN, $meses_ES, $mes);

           
          $data['dia_not_l']=$nombredia;

        //fin de fecha

     
        // var_dump($hoy);
        // $hoy['hoyy'] = date('d,m,Y');
        
        $supertotal = $this->valorEnLetras($total->total);
        // var_dump($supertotal);
        $data['totales'] = $supertotal;
        // echo $totales;

        //rubros
        $rubro = $this->db->query("SELECT r.*,t.* FROM tramite.proforma_rubro r
LEFT JOIN
tramite.rubros t
on r.rubros_id=t.rubros_id WHERE r.proforma_id = '$id'")->result();
        $data['rubros'] = $rubro;
        $this->load->view('reports/rep_proforma',$data);
        $html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->set_option('isRemoteEnabled', TRUE);  
        $this->dompdf->setPaper('letter', 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));

    } 


    function valorEnLetras($x)
    {
    if ($x<0) { $signo = "menos ";}
    else      { $signo = "";}
    $x = abs ($x);
    $C1 = $x;

    $G6 = floor($x/(1000000));  // 7 y mas

    $E7 = floor($x/(100000));
    $G7 = $E7-$G6*10;   // 6

    $E8 = floor($x/1000);
    $G8 = $E8-$E7*100;   // 5 y 4

    $E9 = floor($x/100);
    $G9 = $E9-$E8*10;  //  3

    $E10 = floor($x);
    $G10 = $E10-$E9*100;  // 2 y 1


    $G11 = round(($x-$E10)*100,0);  // Decimales
    //////////////////////
    $H6 = $this->Prueba_model->unidades($G6);

    if($G7==1 AND $G8==0) { $H7 = "Cien "; }
    else {    $H7 = $this->Prueba_model->decenas($G7); }

    $H8 = $this->Prueba_model->unidades($G8);

    if($G9==1 AND $G10==0) { $H9 = "Cien "; }
    else {    $H9 = $this->Prueba_model->decenas($G9); }

    $H10 = $this->Prueba_model->unidades($G10);

    if($G11 < 10) { $H11 = "0".$G11; }
    else { $H11 = $G11; }

    /////////////////////////////
        if($G6==0) { $I6=" "; }
    elseif($G6==1) { $I6="Millón "; }
             else { $I6="Millones "; }
             
    if ($G8==0 AND $G7==0) { $I8=" "; }
             else { $I8="Mil "; }
             
    $I10 = "Pesos ";
    $I11 = "/100 BOLIVIANOS ";
    // $C3 = $signo.$H6.$I6.$H7.$H8.$I8.$H9.$H10.$I10.$H11.$I11;
    $C3 = $signo.$H6.$I6.$H7.$H8.$I8.$H9.$H10.$H11.$I11;
    $str = strtoupper($C3);
    // echo $str;
    return $str; //Retornar el resultado

    }
 



}
