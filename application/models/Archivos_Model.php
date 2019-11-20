<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Archivos_Model extends CI_Model {

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
			'padre' => 0,
			'nombre' =>$nombre,
			'descripcion1' =>$descripcion1,
			'descripcion2' =>$descripcion2,
			'carpeta' =>$carpeta,
			'nivel' => 1,
			'activo' => 1
			);
		$this->db->insert('archivo.archivo', $array);
	}

	public function actualizarraiz($archivo_id, $nombre, $descripcion1, $descripcion2, $carpeta)
    {
        $data = array(
            'nombre' => $nombre,
            'descripcion1' => $descripcion1,
			'descripcion2' => $descripcion2,
            'carpeta' => $carpeta
        );
        $this->db->where('archivo_id', $archivo_id);
        return $this->db->update('archivo.archivo', $data);
    }



	public function eliminarraiz($id)
	{
		$data = array(
            'activo' => 0
        );
        $this->db->where('archivo_id', $id);
        return $this->db->update('archivo.archivo', $data);
    }

    // MODELOS PARA EL HIJO

    public function insertarhijo($nombre, $descripcion1, $descripcion2, $carpeta, $padre)
	{	
		
		$array = array(
			'nombre' =>$nombre,
			'descripcion1' =>$descripcion1,
			'descripcion2' =>$descripcion2,
			'carpeta' =>$carpeta,
			'padre' =>$padre,
			'activo' => 1
			);
		$this->db->insert('archivo.archivo', $array);
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

	public function insertardocumentoh($nombre, $descripcion1, $descripcion2, $archivo_id, $carpeta, $adjunto, $extension, $url1)
	{	
		
		$array = array(
			'nombre' =>$nombre,
			'descripcion1' =>$descripcion1,
			'descripcion2' =>$descripcion2,
			'archivo_id' =>$archivo_id,
			'carpeta' =>$carpeta,
			'adjunto' =>$adjunto,
			'extension' =>$extension,
			'url' =>$url1,
			'activo' => '1',
			);

		// var_dump($array);
		$this->db->insert('archivo.documentos', $array);
	}

	public function actualizardocumento($documentos_id, $nombre, $descripcion1, $descripcion2, $adjunto)
    {
        $data = array(
            'nombre' => $nombre,
            'descripcion1' => $descripcion1,
			'descripcion2' => $descripcion2,
			'adjunto' => $adjunto
        );
        $this->db->where('documentos_id', $documentos_id);
        return $this->db->update('archivo.documentos', $data);
    }



	public function eliminardocumento($id)
	{
		$data = array(
            'activo' => 0
        );
        $this->db->where('documentos_id', $id);
        return $this->db->update('archivo.documentos', $data);
    }
   
}
