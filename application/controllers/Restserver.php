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

    public function menu_get(){
        $this->load->model("ApiRest_model");
        //$array = array("Hola","Mundo","Codeigniter");
        //$this->response($this->Edificacion_model->get_Bloque());
        //$this->response($array);       
        $user = array('respuesta' => $this->ApiRest_model->getdata( 7));
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
        $this->load->model("ApiRest_model");
        //$array = array("Hola","Mundo","Codeigniter");
        //$this->response($this->Edificacion_model->get_Bloque());
        //$this->response($array);       
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
        //$array = array("Hola","Mundo","Codeigniter");
        //$this->response($this->Edificacion_model->get_Bloque());
        //$this->response($array);       
        $user = array('respuesta' => $this->ApiRest_model->getlistadotramite());
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
    
}
     