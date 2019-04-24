<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('derivaciones/Pdf_model');
		$this->load->library('pdf');
	}

	public function index($idTramite = null)
	{
		$id = $this->session->userdata("persona_perfil_id");
	    $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
	    $usuario = $resi->persona_id;
	    $data['de'] = $this->db->get_where('persona', array('persona_id' => $usuario))->row();

		$data['tramite'] = $this->db->get_where('tramite.tramite', array('tramite_id' => $idTramite))->row();
		$this->load->view('derivaciones/RutaPDF', $data);
	}

	public function details()
	{
		
			$this->load->view('derivaciones/RutaPDF');
		
	}

	public function pdf($idTramite = null)
	{
		$id = $this->session->userdata("persona_perfil_id");
	    $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
	    $usuario = $resi->persona_id;
	    $data['de'] = $this->db->get_where('persona', array('persona_id' => $usuario))->row();
		$data['tramite'] = $this->db->get_where('tramite.tramite', array('tramite_id' => $idTramite))->row();
		

		$dompdf = new Dompdf\Dompdf();
 
        $html = $this->load->view('derivaciones/RutaPDF', $data, true);
 
        $dompdf->loadHtml($html);
 
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4');
 
        // Render the HTML as PDF
        $dompdf->render();
 
        // Get the generated PDF file contents
        $pdf = $dompdf->output();
 
        // Output the generated PDF to Browser
        $dompdf->stream("reporte.pdf", array("Attachment"=>1));
	}

}

?>
