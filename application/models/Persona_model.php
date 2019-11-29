<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persona_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function insertarUsuario($nombres, $paterno, $materno, $ci, $fec_nacimiento, $usu_creacion, $direccion, $email, $telefono_fijo, $telefono_celular){	
		$array = array(
			'nombres' =>$nombres,
			'paterno' =>$paterno,
			'materno' =>$materno,
			'ci' =>$ci,
			'fec_nacimiento' =>$fec_nacimiento,
			'usu_creacion' =>$usu_creacion,
			'direccion' => $direccion,
			'email' => $email,
			'telefono_fijo' => $telefono_fijo,
			'telefono_celular' => $telefono_celular
			);
		$this->db->insert('persona', $array);
	}

	public function insertarUsuarioPredio($nombres, $paterno, $materno, $ci, $fec_nacimiento, $usu_creacion, $direccion, $email, $telefono_fijo, $telefono_celular, $tipo_persona_id){	
		$array = array(
			'nombres' =>$nombres,
			'paterno' =>$paterno,
			'materno' =>$materno,
			'ci' =>$ci,
			'fec_nacimiento' =>$fec_nacimiento,
			'usu_creacion' =>$usu_creacion,
			'direccion' => $direccion,
			'email' => $email,
			'telefono_fijo' => $telefono_fijo,
			'telefono_celular' => $telefono_celular
			);
		$this->db->insert('persona', $array);
        $persona_id = $this->db->insert_id();
		$array1 = array(
			'persona_id' => $persona_id,
			'tipo_persona_id' => $tipo_persona_id
		);
		$this->db->insert('persona_tipo_persona', $array1);
	}

	public function existeci($ci){
		$this->db->where('ci',$ci);
		$reg = $this->db->get('persona');
      if($reg->num_rows()>0) {
          return false;
      }else{
				return true;
			}
	}

	public function consulta($ci){
		$this->db->where('ci',$ci);
		$reg = $this->db->get('persona')->row();
		return $reg;
	}

	public function buscaci( $ci ){
		$con = $this->db->query("SELECT to_char(fec_nacimiento, 'DD-MM-YYYY') as fecha, * FROM persona WHERE ci = '".$ci."'");
	    if($con)
	        return $con->row();
	    else
	    	return null;
	 }

    public function actualizar($persona_id, $nombres, $paterno, $materno, $ci, $fec_nacimiento){
        $data = array(
            'nombres' => $nombres,
            'paterno' => $paterno,
            'materno' => $materno,
            'ci' => $ci,
            'fec_nacimiento' => $fec_nacimiento
        );
        $this->db->where('persona_id', $persona_id);
        return $this->db->update('public.persona', $data);
    }
}