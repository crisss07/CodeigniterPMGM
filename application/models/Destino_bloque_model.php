<<<<<<< Updated upstream
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Destino_bloque_model extends CI_Model {

	public $variable;
	
	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$lista = $this->db->query("SELECT * FROM catastro.destino_bloque WHERE activo = '1' ORDER BY destino_bloque_id ASC")->result();

		if ($lista > 0) {
			return $lista;
		}
		else{
			return false;
		}
		
	}

	public function insertar_destino_bloque($descripcion, $alias, $coeficiente, $usu_creacion)
	{	
		
		$array = array(
			'descripcion' =>$descripcion,
			'alias' =>$alias,
			'coeficiente' =>$coeficiente,
			'usu_creacion' =>$usu_creacion
			);
		$this->db->insert('catastro.destino_bloque', $array);
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
        $this->db->where('destino_bloque_id', $id);
        return $this->db->update('catastro.destino_bloque', $data);
    }

    public function actualizar($destino_bloque_id, $descripcion, $alias, $coeficiente, $usu_modificacion, $fec_modificacion)
    {
        $data = array(
            'descripcion' => $descripcion,
            'alias' => $alias,
            'coeficiente' => $coeficiente,
            'usu_modificacion' => $usu_modificacion,
            'fec_modificacion' => $fec_modificacion
        );
        $this->db->where('destino_bloque_id', $destino_bloque_id);
        return $this->db->update('catastro.destino_bloque', $data);
    }
}
=======
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class destino_bloque_model extends CI_Model {

	public $variable;
	
	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$lista = $this->db->query("SELECT * FROM catastro.destino_bloque WHERE activo = '1' ORDER BY destino_bloque_id ASC")->result();

		if ($lista > 0) {
			return $lista;
		}
		else{
			return false;
		}
		
	}

	public function insertar_destino_bloque($descripcion, $alias, $coeficiente, $usu_creacion)
	{	
		
		$array = array(
			'descripcion' =>$descripcion,
			'alias' =>$alias,
			'coeficiente' =>$coeficiente,
			'usu_creacion' =>$usu_creacion
			);
		$this->db->insert('catastro.destino_bloque', $array);
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
        $this->db->where('destino_bloque_id', $id);
        return $this->db->update('catastro.destino_bloque', $data);
    }

    public function actualizar($destino_bloque_id, $descripcion, $alias, $coeficiente, $usu_modificacion, $fec_modificacion)
    {
        $data = array(
            'descripcion' => $descripcion,
            'alias' => $alias,
            'coeficiente' => $coeficiente,
            'usu_modificacion' => $usu_modificacion,
            'fec_modificacion' => $fec_modificacion
        );
        $this->db->where('destino_bloque_id', $destino_bloque_id);
        return $this->db->update('catastro.destino_bloque', $data);
    }
}
>>>>>>> Stashed changes
