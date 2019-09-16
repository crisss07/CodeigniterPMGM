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
    
}
     