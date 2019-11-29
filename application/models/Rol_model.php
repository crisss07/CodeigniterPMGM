<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rol_model extends CI_Model {

	public $variable;
	
	public function __construct()
	{
		parent::__construct();
		
	}


	public function index()
	{
		$lista = $this->db->query("SELECT * FROM rol  WHERE activo = '1' ORDER BY rol_id ASC")->result();

		if ($lista > 0) {
			return $lista;
		}
		else{
			return false;
		}
	}

	public function verifica()
	{
		$id = $this->session->userdata("persona_perfil_id");
        $rol = $this->db->query("SELECT c.*, r.*
                    FROM credencial c, rol r
                    WHERE c.persona_perfil_id = '$id'
                    AND c.rol_id = r.rol_id")->row();
     
        

        	if ($rol->rol == 'Todo') {
                    $array = array(
					'alta' =>'',
					'alta1' =>'href',
					'baja' =>'href',
					'modificacion' =>'',
					'modificacion1' =>'href',
					'imprimir' =>'href',
					'nada' =>''
					);
					return $array;
                }
                elseif ($rol->rol == 'Alta') {
                	$array = array(
						'alta' =>'',
						'alta1' =>'href',
						'baja' =>'name',
						'modificacion' =>'disabled',
						'modificacion1' =>'name',
						'imprimir' =>'name',
						'nada' =>'disabled'
						);
						return $array;
                }
                elseif ($rol->rol == 'Baja') {
                	$array = array(
						'alta' =>'disabled',
						'alta1' =>'name',
						'baja' =>'href',
						'modificacion' =>'disabled',
						'modificacion1' =>'name',
						'imprimir' =>'name',
						'nada' =>'disabled'
						);
						return $array;
                }
                elseif ($rol->rol == 'Modificacion') {
                	$array = array(
						'alta' =>'disabled',
						'alta1' =>'name',
						'baja' =>'name',
						'modificacion' =>'',
						'modificacion1' =>'href',
						'imprimir' =>'name',
						'nada' =>'disabled'
						);
						return $array;
                }
                elseif ($rol->rol == 'Imprimir') {
                	$array = array(
						'alta' =>'disabled',
						'alta1' =>'name',
						'baja' =>'name',
						'modificacion' =>'disabled',
						'modificacion1' =>'name',
						'imprimir' =>'href',
						'nada' =>'disabled'
						);
						return $array;
                }
                elseif ($rol->rol == 'Nada') {
                	$array = array(
						'alta' =>'disabled',
						'alta1' =>'name',
						'baja' =>'name',
						'modificacion' =>'disabled',
						'modificacion1' =>'name',
						'imprimir' =>'name',
						'nada' =>'disabled'
						);
						return $array;
                }
                
                
	}

	public function insertar_rol($rol, $usu_creacion)
	{	
		
		$array = array(
			'rol' =>$rol,
			'usu_creacion' =>$usu_creacion
			);
		$this->db->insert('rol', $array);
	}


	public function login($usuario, $contrasenia)
	{
		$this->db->where('usuario', $usuario);
		$this->db->where('contrasenia', $contrasenia);
		
		$resultado = $this->db->get("credencial");

		if ($resultado->num_rows() > 0) {
			return $resultado->row();
		}
		else{
			return false;
		}

	}


	public function eliminar($id, $usu_eliminacion, $fec_eliminacion)
	{
		$data = array(
            'activo' => 0,
            'usu_eliminacion' => $usu_eliminacion,
            'fec_eliminacion' => $fec_eliminacion
        );
        $this->db->where('rol_id', $id);
        return $this->db->update('rol', $data);
    }

    public function actualizar($rol_id, $rol, $usu_modificacion, $fec_modificacion)
    {
        $data = array(
            'rol' => $rol,
            'usu_modificacion' => $usu_modificacion,
            'fec_modificacion' => $fec_modificacion
        );
        $this->db->where('rol_id', $rol_id);
        return $this->db->update('rol', $data);
    }
}
