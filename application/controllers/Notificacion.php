<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notificacion extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Edificacion_model");
        $this->load->model("Audit_model");
        $this->load->model("Auditoria_model");
        $this->load->library('session');
        $this->load->model('Tipopredio_model');
        $this->load->model("Logacceso_model");
        $this->load->helper('url_helper');
        $this->load->helper('vayes_helper');
        $this->load->model("Rol_model");
        $this->load->library('pdf');
    }

    public function index()
    {
        if ($this->session->userdata("login")) {
            redirect(base_url());
        } else {
            redirect(base_url());
        }
    }

    //vista para mandar las notificaciones
    public function crear($predio_id = null)
    {
        if ($this->session->userdata("login")) {
            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('notificacion/nuevo');            
            $this->load->view('admin/footer');       
        } else {
            redirect(base_url());
        }
    }    

    //api firebase para el envio de notificaciones
    function enviar() {

    $titulo  = $this->input->post('titulo');
    $asunto = $this->input->post('asunto');
    $message = $this->input->post('mensaje');

    //$message='hola desde la api';
    $id='elyxM-oxmk8:APA91bGz5dedfzsawG8TjBeKs60EpKkvPaF0WJhZN2nY7yOier2Kvceqd5Z5gS5N53rackn0X-0YQcX3qPG6pkuUp89aizxw6FffAyAHK5vXKW0WrXTi3EcKuUw6h5mRvG7vj-S5ofEe';

    $url = 'https://fcm.googleapis.com/fcm/send';

    $fields = array (
            'registration_ids' => array (
                    $id
            ),
            'data' => array (
                    "message" => $message
            ),
            'notification' => array (
                    //"body" => 'hola desde la api al fin',
                    //"title"=> 'Noticias'
                    "body" => $asunto,
                    "title"=> $titulo
            )
           
    );
    $fields = json_encode ( $fields );

    $headers = array (
            'Authorization: key=' . "AAAAo6_vglo:APA91bG9EBa0wNKocbraZ3Zf_yYnYgAob3hNEdlLbAGKZ4YtR5SftvUgOUaUDIJK1IQ0SCzga1bYmTwPNqIPgF7cLh6x04v-pSsC7i9ZdYsk9NQgTF0Q5VZ0f_W965JkLI9PdbQvojUc",
            'Content-Type: application/json'
    );

    $ch = curl_init ();
    curl_setopt ( $ch, CURLOPT_URL, $url );
    curl_setopt ( $ch, CURLOPT_POST, true );
    curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
    curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );

    $result = curl_exec ( $ch );
    echo $result;
    //var_dump($result);
    //exit();
    curl_close ( $ch );
        redirect(base_url());
    }

}
     