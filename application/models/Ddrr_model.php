<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ddrr_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function insertarDDRR($predio_id, $nro_matricula_folio, $nro_folio, $fecha_folio, $superficie_legal, $nom_notario, $nro_testimonio, $fecha_testimonio, $partida, $partida_computarizada, $foja, $libro, $fecha_reg_libro, $datos, $usu_creacion)
	{
		$array = array(
			'predio_id' => $predio_id,
			'nro_matricula_folio' => $nro_matricula_folio,
			'nro_folio' => $nro_folio,
			'fecha_folio' => $fecha_folio,
			'superficie_legal' => $superficie_legal,
			'nom_notario' => $nom_notario,
			'nro_testimonio' => $nro_testimonio,
			'fecha_testimonio' => $fecha_testimonio,
			'partida' => $partida,
			'partida_computarizada' => $partida_computarizada,
			'foja' => $foja,
			'libro' => $libro,
			'fecha_reg_libro' => $fecha_reg_libro,
			'usu_creacion' => $usu_creacion
			);
		$this->db->insert('catastro.predio_ddrr', $array);
		$ddrr_id = $this->db->query("select ddrr_id from catastro.predio_ddrr order by ddrr_id desc limit 1")->row();
		foreach ($datos as $items)
		{
			list($persona_id,$titular_id) = explode("-",$items['id']);
			$array = array(
				'ddrr_id' => (int)$ddrr_id->ddrr_id,
				'porcen_parti' => $items['qty'],
				'persona_id' => $persona_id, 
				'usu_creacion' => $usu_creacion
			);
			$this->db->insert('catastro.predio_titular', $array);
		}
		$query = $this->db->query("UPDATE catastro.predio SET activo = 3 WHERE predio_id='$predio_id'");
	}

	


	public function datos_editar($cod_catastral)
	{
		$this->cart->destroy();
		$data = $this->db->query("SELECT * FROM catastro.predio_ddrr WHERE predio_id = '$cod_catastral'")->row();
		$ddrr_id = $data->ddrr_id;

		$carrito = $this->db->query("SELECT p.*, pd.porcen_parti, pd.titular_id FROM catastro.predio_titular as pd INNER JOIN persona as p ON pd.persona_id = p.persona_id where pd.ddrr_id = '$ddrr_id' and pd.activo = 1")->result();

		// $carrito = $this->db->query("SELECT p.*, pd.porcen_parti FROM catastro.predio_titular as pd INNER JOIN persona as p ON pd.persona_id = p.persona_id where ddrr_id = '$ddrr_id'")->row();
		foreach ($carrito as $row => $cdata) {
			$dato = array(
				'id'      => $cdata->persona_id.'-'.$cdata->titular_id,
				'name'    => $cdata->nombres.' '.$cdata->paterno.' '.$cdata->materno,
				'qty'     => $cdata->porcen_parti,
				'price'   => $cdata->ci
			);
			$this->cart->insert($dato);
		}
		return $data;
	}

	public function modificar_ddrr($ddrr_id, $predio_id, $nro_matricula_folio, $nro_folio, $fecha_folio, $superficie_legal, $nom_notario, $nro_testimonio, $fecha_testimonio, $partida, $partida_computarizada, $foja, $libro, $fecha_reg_libro, $datos, $usu_modificacion, $fec_modificacion)
	{
		$array = array(
			'predio_id' => $predio_id,
			'nro_matricula_folio' => $nro_matricula_folio,
			'nro_folio' => $nro_folio,
			'fecha_folio' => $fecha_folio,
			'superficie_legal' => $superficie_legal,
			'nom_notario' => $nom_notario,
			'nro_testimonio' => $nro_testimonio,
			'fecha_testimonio' => $fecha_testimonio,
			'partida' => $partida,
			'partida_computarizada' => $partida_computarizada,
			'foja' => $foja,
			'libro' => $libro,
			'fecha_reg_libro' => $fecha_reg_libro,
			'usu_modificacion' => $usu_modificacion,
			'fec_modificacion' => $fec_modificacion
			);

		$this->db->where('ddrr_id', $ddrr_id);
        $this->db->update('catastro.predio_ddrr', $array);
        
	}
}