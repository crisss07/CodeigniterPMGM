<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class Restserver extends CI_Controller{

    use REST_Controller {
        REST_Controller::__construct as private __resTraitConstruct;
    }

    public function test_get(){
        $this->load->model("Edificacion_model");
        //$array = array("Hola","Mundo","Codeigniter");
        //$this->response($this->Edificacion_model->get_Bloque());
        //$this->response($array);

        if(!$this->get('id'))
        {
            $this->response(NULL, 400);
        }
 
        $user = $this->Edificacion_model->get_Bloque( $this->get('id') );
         
        if($user)
        {
            $this->response($user, 200); // 200 being the HTTP response code
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    }

    public function asinglist_get(){
        $id = $this->get('id');
        $this->load->model("ApiRest_model");
        //$array = array("Hola","Mundo","Codeigniter");
        //$this->response($this->Edificacion_model->get_Bloque());
        //$this->response($array);       
        $user = array('respuesta' => $this->ApiRest_model->get_asign_list($id));
        if($user)
        {
            $this->response( $user, 200); // 200 being the HTTP response code
        } 
        else
        {
            $this->response(NULL, 404);
        }
    }

      public function tramites_get(){
        $this->load->model("ApiRest_model");
        //$array = array("Hola","Mundo","Codeigniter");
        //$this->response($this->Edificacion_model->get_Bloque());
        //$this->response($array);       
        $user = array('respuesta' => $this->ApiRest_model->getGrupos());
        if($user)
        {
            $this->response( $user, 200); // 200 being the HTTP response code
        } 
        else
        {
            $this->response(NULL, 404);
        }
    }
    
      public function subgrupos_get(){
        $id = $this->get('id');
        $token = $this->get('token');
        $this->load->model("ApiRest_model");




        $user = array('respuesta' => $this->ApiRest_model->getSubgrupos($id));
        if($user)
        {
            $this->response( $user, 200); // 200 being the HTTP response code
        } 
        else
        {
            $this->response(NULL, 404);
        }
    }

    public function listramite_get(){
        $this->load->model("ApiRest_model");
        $token = $this->get('token');

        $user = array('respuesta' => $this->ApiRest_model->getlistadotramite());        
        if($user)
        {
            $this->response( $user, 200); // 200 being the HTTP response code
        } 
        else
        {
            $this->response(NULL, 404);
        }
    }

    public function listarequisitos_get(){
        $id = $this->get('id');
        $this->load->model("ApiRest_model");
        //$array = array("Hola","Mundo","Codeigniter");
        //$this->response($this->Edificacion_model->get_Bloque());
        //$this->response($array);       
        $user = array('respuesta' => $this->ApiRest_model->getRequisitos($id));
         //$user = $this->ApiRest_model->getdata( 7);
        if($user)
        {
            $this->response( $user, 200); // 200 being the HTTP response code
        } 
        else
        {
            $this->response(NULL, 404);
        }
    }


    public function users_post()
    {
        $message = [            
            'name' => $this->post('name'),
            'email' => $this->post('email'),
            'message' => $this->post('message')
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

    public function derivacion_get(){
        $id = $this->get('id');
        $token = $this->get('token');
        $this->load->model("ApiRest_model");


 
        $message = array('mensaje' => 'Acceso denegado');
        $datos_nulos = array('estado' => 'asd','mensaje'=>'No se encontraron datos');



        if($this->ApiRest_model->verify_token($token)){
            $user = array('estado' => $this->ApiRest_model->derivacion($id),'mensaje'=>'Datos encontrados ','bool'=>'TRUE');

            if(!$this->ApiRest_model->derivacion($id)){
                $user = array('estado' => '','mensaje'=>'No se encontraron datos','bool'=>'FALSE');
            }
            if($user)
            {
                $this->response( $user, 200); // 200 being the HTTP response code
            } 
            else
            {
               
                $this->response($message, 404);
            }

        }
        else{
            $this->response($message, 404);
        }                      
    }

    public function derivacionst_get(){
        $id = $this->get('id');
        $token = $this->get('token');
        $this->load->model("ApiRest_model");
 
        $message = array('mensaje' => 'Acceso denegado');
        $datos_nulos = array('estado' => 'asd','mensaje'=>'No se encontraron datos');
       
            $user = array('estado' => $this->ApiRest_model->derivacion($id),'mensaje'=>'Datos encontrados ','bool'=>'TRUE');
            if(!$this->ApiRest_model->derivacion($id)){
                $user = array('estado' => $this->ApiRest_model->derivacion($id),'mensaje'=>'No se encontraron datos','bool'=>'FALSE');
            }
            if($user)
            {
                $this->response( $user, 200); // 200 being the HTTP response code
            } 
            else
            {
               
                $this->response($message, 404);
            }

       
              
        
    }


    public function logueo_get()
    {
        $username = $this->get('username');
        $password = $this->get('password');  

      
        //$username = 'adm';
        //$password = 'adm';
        $this->load->model("ApiRest_model");
        $user = array('respuesta' => $this->ApiRest_model->data_login($username,md5($password)),'mensaje'=>'Datos encontrados ','bool'=>'TRUE','usuario'=>$username,'password'=>$password);
        if(!$this->ApiRest_model->data_login($username,md5($password))){
                $user = array('respuesta' =>  $this->ApiRest_model->data_login($username,md5($password)),'mensaje'=>'No se encontraron datos','bool'=>'FALSE','password'=>$password,'usuario'=>$username);
            }
         
        if($user)
        {
            $this->response( $user, 200); // 200 being the HTTP response code
        } 
        else
        {
            $this->response(NULL, 404);
        }
    }


    
}
     