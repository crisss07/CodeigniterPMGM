<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Archivo_model extends CI_Model {

	public $variable;

	
	public function __construct()
	{
		parent::__construct();
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

	// MODELOS PARA LA RAIZ

	 public function insertarraiz($nombre, $descripcion1, $descripcion2, $carpeta)
	{	
		
		$array = array(
			'nombre' =>$nombre,
			'descripcion1' =>$descripcion1,
			'descripcion2' =>$descripcion2,
			'carpeta' =>$carpeta,
			'activo' => 1
			);
		$this->db->insert('archivo.raiz', $array);
	}

	public function actualizarraiz($raiz_id, $nombre, $descripcion1, $descripcion2, $carpeta)
    {
        $data = array(
            'nombre' => $nombre,
            'descripcion1' => $descripcion1,
			'descripcion2' => $descripcion2,
            'carpeta' => $carpeta
        );
        $this->db->where('raiz_id', $raiz_id);
        return $this->db->update('archivo.raiz', $data);
    }



	public function eliminarraiz($id)
	{
		$data = array(
            'activo' => 0
        );
        $this->db->where('raiz_id', $id);
        return $this->db->update('archivo.raiz', $data);
    }

    // MODELOS PARA EL HIJO

    public function insertarhijo($nombre, $descripcion1, $descripcion2, $tipo, $raiz_id)
	{	
		
		$array = array(
			'nombre' =>$nombre,
			'descripcion1' =>$descripcion1,
			'descripcion2' =>$descripcion2,
			'tipo' =>$tipo,
			'raiz_id' =>$raiz_id,
			'activo' => 1
			);
		$this->db->insert('archivo.hijo', $array);
	}

	public function actualizarhijo($hijo_id, $nombre, $descripcion1, $descripcion2, $tipo)
    {
        $data = array(
            'nombre' => $nombre,
            'descripcion1' => $descripcion1,
			'descripcion2' => $descripcion2,
            'tipo' => $tipo
        );
        $this->db->where('hijo_id', $hijo_id);
        return $this->db->update('archivo.hijo', $data);
    }



	public function eliminarhijo($id)
	{
		$data = array(
            'activo' => 0
        );
        $this->db->where('hijo_id', $id);
        return $this->db->update('archivo.hijo', $data);
    }

    public function insertardocumento($nombre, $descripcion1, $descripcion2, $raiz_id, $carpeta, $adjunto, $extension, $url)
	{	
		
		$array = array(
			'nombre' =>$nombre,
			'descripcion1' =>$descripcion1,
			'descripcion2' =>$descripcion2,
			'raiz_id' =>$raiz_id,
			'carpeta' =>$carpeta,
			'adjunto' =>$adjunto,
			'extension' =>$extension,
			'url' =>$url,
			'activo' => '1',
			);

		// var_dump($array);
		$this->db->insert('archivo.documento', $array);
	}

	public function insertardocumentoh($nombre, $descripcion1, $descripcion2, $hijo_id, $carpeta, $adjunto, $extension, $url)
	{	
		
		$array = array(
			'nombre' =>$nombre,
			'descripcion1' =>$descripcion1,
			'descripcion2' =>$descripcion2,
			'hijo_id' =>$hijo_id,
			'carpeta' =>$carpeta,
			'adjunto' =>$adjunto,
			'extension' =>$extension,
			'url' =>$url,
			'activo' => '1',
			);

		// var_dump($array);
		$this->db->insert('archivo.documento', $array);
	}

	public function actualizardocumento($documento_id, $nombre, $descripcion1, $descripcion2, $adjunto, $url)
    {
        $data = array(
            'nombre' => $nombre,
            'descripcion1' => $descripcion1,
			'descripcion2' => $descripcion2,
			'adjunto' => $adjunto,
			'url' => $url
        );
        $this->db->where('documento_id', $documento_id);
        return $this->db->update('archivo.documento', $data);
    }



	public function eliminardocumento($id)
	{
		$data = array(
            'activo' => 0
        );
        $this->db->where('documento_id', $id);
        return $this->db->update('archivo.documento', $data);
    }
   
}
