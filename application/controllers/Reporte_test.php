<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

// usamos los espacios de nombres para el paquete de PhpSpreadsheet 

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Reporte_test extends CI_Controller {
// Creamos nuestro constructor en este caso para cargar algún modelo
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Tipopredio_model');
		$this->load->model("Logacceso_model");
		$this->load->model("Persona_model");
		$this->load->model("Derivaciones_model");
		$this->load->model("Ddrr_model");
		$this->load->helper('url_helper');
		$this->load->helper('vayes_helper');
		$this->load->library('cart');
		 $this->load->model("Tools_model");
		$this->load->model("Rol_model");
		$this->load->library('email');


	}

	public function index(){
		$this->load->view('welcome_message');
	}

// NUESTRO ARCHIVO EN PDF
	public function pdf(){
		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',16);
		$pdf->Cell(40,10,'¡Hola, Mundo!');
		$pdf->Output('hola_mudo.pdf', 'I');
	}

// NUESTRO ARCHIVO EN EXCEL
	public function excel(){
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Hello World !');
		$writer = new Xlsx($spreadsheet);
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="hello world.xlsx"');
		header('Cache-Control: max-age=0');
		$writer->save('php://output');
	}

// NUESTRO ARCHIVO EN WORD
	public function word(){
		$phpWord = new \PhpOffice\PhpWord\PhpWord();

		$section = $phpWord->addSection();

		$section->addText('"Learn from yesterday, live for today, hope for tomorrow. '
			. 'The important thing is not to stop questioning." '
			. '(Albert Einstein)');

		$section->addText('Great achievement is usually born of great sacrifice, '
			. 'and is never the result of selfishness. (Napoleon Hill)',
			array('name' => 'Tahoma', 'size' => 10));

		$fontStyleName = 'oneUserDefinedStyle';
		$phpWord->addFontStyle($fontStyleName,
			array('name' => 'Tahoma', 'size' => 10, 'color' => '1B2232', 'bold' => true));

		$section->addText('"The greatest accomplishment is not in never falling, '
			. 'but in rising again after you fall." '
			. '(Vince Lombardi)',
			$fontStyleName);

		$fontStyle = new \PhpOffice\PhpWord\Style\Font();
		$fontStyle->setBold(true);
		$fontStyle->setName('Tahoma');
		$fontStyle->setSize(13);
		$myTextElement = $section->addText('"Believe you can and you\'re halfway there." (Theodor Roosevelt)');
		$myTextElement->setFontStyle($fontStyle);

		$file = 'HelloWorld.docx';
		header("Content-Description: File Transfer");
		header('Content-Disposition: attachment; filename="' . $file . '"');
		header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
		header('Content-Transfer-Encoding: binary');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Expires: 0');
		$xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
		$xmlWriter->save("php://output");
	}

// archivo word con imagenes

	public function word_img(){
		$phpWord = new \PhpOffice\PhpWord\PhpWord();

		$section = $phpWord->addSection();
//encabezado
		$header = $section->addHeader();
		$header->addImage(base_url().'public/assets/images/phpword/header.png',array('width' => 520));
//tipo fuente
		$fontStyle = new \PhpOffice\PhpWord\Style\Font();
		$fontStyle->setBold(true);
		$fontStyle->setName('Arial');
		$fontStyle->setSize(12);
//titulo
		$titulo = $section->addText('"INFORME <w:br/> INF/MOPSV/VMVU/PMGM  Nº 0467/2019 I/2019-03036
			" '
			. '(Albert Einstein)');

		$titulo->setFontStyle($fontStyle);

		$section->addImage('https://images-na.ssl-images-amazon.com/images/I/61NRsJeymIL._SL1500_.jpg',array('width' => 150));

		$section->addText('Great achievement is usually born of great sacrifice, '
			. 'and is never the result of selfishness. (Napoleon Hill)',
			array('name' => 'Tahoma', 'size' => 10));

		$fontStyleName = 'oneUserDefinedStyle';
		$phpWord->addFontStyle($fontStyleName,
			array('name' => 'Tahoma', 'size' => 10, 'color' => '1B2232', 'bold' => true));

		$section->addText('"The greatest accomplishment is not in never falling, '
			. 'but in rising again after you fall." '
			. '(Vince Lombardi)',
			$fontStyleName);


		$myTextElement = $section->addText('"Believe you can and you\'re halfway there." (Theodor Roosevelt)');
		$myTextElement->setFontStyle($fontStyle);



		$file = 'HelloWorld.docx';
		header("Content-Description: File Transfer");
		header('Content-Disposition: attachment; filename="' . $file . '"');
		header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
		header('Content-Transfer-Encoding: binary');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Expires: 0');
		$xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
		$xmlWriter->save("php://output");
	}


	public function www(){
		$phpWord = new \PhpOffice\PhpWord\PhpWord();
		$section = $phpWord->addSection();

		$section->addImage('https://images-na.ssl-images-amazon.com/images/I/61NRsJeymIL._SL1500_.jpg',array('width' => 450));
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment;filename="test.docx"');
		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
		$objWriter->save('php://output');
	}

//acta de inspeccion

	public function word_insp($id_tramite=null){

		if($this->session->userdata("login")){
			$id = $this->session->userdata("persona_perfil_id");
	        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $usu_actual = $resi->persona_id;

            $datos_persona= $this->Tools_model->persona_datos($usu_actual);
            $datos_cargo= $this->Tools_model->persona_cargo($usu_actual);

            $datos_a=$this->Tools_model->get_a();
            $datos_via=$this->Tools_model->get_via();
            $nro_tramite=$this->Tools_model->nro_tramite(230);


			//obtenemos datos(nombres,fecha,actual) para el informe
			$days_dias = array(
				'Monday'=>'Lunes',
				'Tuesday'=>'Martes',
				'Wednesday'=>'Miércoles',
				'Thursday'=>'Jueves',
				'Friday'=>'Viernes',
				'Saturday'=>'Sábado',
				'Sunday'=>'Domingo'
			);
			$mes=date('F');

			if ($mes == "January") $mes = "Enero";
			if ($mes == "February") $mes = "Febrero";
			if ($mes == "March") $mes = "Marzo";
			if ($mes == "April") $mes = "Abril";
			if ($mes == "May") $mes = "Mayo";
			if ($mes == "June") $mes = "Junio";
			if ($mes == "July") $mes = "Julio";
			if ($mes == "August") $mes = "Agosto";
			if ($mes == "September") $mes = "Septiembre";
			if ($mes == "October") $mes = "Octubre";
			if ($mes == "November") $mes = "Noviembre";
			if ($mes == "December") $mes = "Diciembre";
			$dia_num=date('d');
			$dia_l=$days_dias[date('l')];
			$mes_num=  date('m');
			$mes_l= $mes;
			$anio=date('Y');  

			//$fecha= ' FECHA: 	'.$dia_l.', .'.$dia.' de '.$mes_l.' de '.$anio;
			$fechados=" 	FECHA:".$dia_l." , ".$dia_num;




			$phpWord = new \PhpOffice\PhpWord\PhpWord();
			$section = $phpWord->addSection();
//encabezado
			$header = $section->addHeader();
			$header->addImage(base_url().'public/assets/images/phpword/header.png',array('width' => 520));

//titulo
			$section->addText("INFORME <w:br/> ".$nro_tramite->cite,array('bold' => true), array('align' => 'center'));

			$section->addText("	A	 :	".$datos_a->nombres." ".$datos_a->paterno." ".$datos_a->materno, array('bold' => false), array('align' => 'left'));
			$section->addText("			".$datos_a->cargo, array('bold' => true), array('align' => 'left'));

			$section->addText("	VIA	 : 	".$datos_via->nombres." ".$datos_via->paterno." ".$datos_via->materno, array('bold' => false), array('align' => 'left'));
			$section->addText("			".$datos_via->cargo, array('bold' => true,'size' => 8), array('align' => 'left'));

			$section->addText("	DE	 : 	".$datos_persona->nombres." ".$datos_persona->paterno." ".$datos_persona->materno, array('bold' => false), array('align' => 'left'));
			$section->addText('			'.$datos_cargo->descripcion, array('bold' => true), array('align' => 'left'));

			$section->addText('	REF  	: 	Informe de Inspección', array('bold' => false,'spaceAfter' => 0), array('align' => 'left'));

			$section->addText("	FECHA:  	".$dia_l.", ".$dia_num." de ".$mes_l." de ".$anio."" , array('bold' => false), array('align' => 'left'));
			//$section->addText($fechados, array('bold' => false), array('align' => 'left'));


			$lineStyle = array('weight' => 1, 'width' => 440, 'height' => 0, 'color' => 000000);
			$section->addLine($lineStyle);

		//pie de pagina
			$footer = $section->addFooter();
			$footer->addText('www.oopp.gob.bo',array('bold' => true,'size' => 8), array('align' => 'center'));
			$footer->addText('Av. Mariscal Santa Cruz, Esq. Calle Oruro, Edif. Centro de Comunicaciones La Paz, 5º piso',array('bold' => true,'size' => 8), array('align' => 'center'));
			$footer->addText('teléfonos: (591) -2- 2119999 – 2156600',array('bold' => true,'size' => 8), array('align' => 'center'));


			$file = 'Acta de Inspección.docx';
			header("Content-Description: File Transfer");
			header('Content-Disposition: attachment; filename="' . $file . '"');
			header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
			header('Content-Transfer-Encoding: binary');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header('Expires: 0');
			$xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
			$xmlWriter->save("php://output");

		}
		else{
			redirect(base_url());
		}







	}

//acta de notificacion Acta de notificacion

	public function word_not(){
		if($this->session->userdata("login")){

			$id = $this->session->userdata("persona_perfil_id");
	        $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $usu_actual = $resi->persona_id;

            $datos_persona= $this->Tools_model->persona_datos($usu_actual);
            $datos_cargo= $this->Tools_model->persona_cargo($usu_actual);

            $datos_a=$this->Tools_model->get_a();
            $datos_via=$this->Tools_model->get_via();
            $nro_tramite=$this->Tools_model->nro_tramite(230);


			//obtenemos datos(nombres,fecha,actual) para el informe
			$days_dias = array(
				'Monday'=>'Lunes',
				'Tuesday'=>'Martes',
				'Wednesday'=>'Miércoles',
				'Thursday'=>'Jueves',
				'Friday'=>'Viernes',
				'Saturday'=>'Sábado',
				'Sunday'=>'Domingo'
			);
			$mes=date('F');

			if ($mes == "January") $mes = "Enero";
			if ($mes == "February") $mes = "Febrero";
			if ($mes == "March") $mes = "Marzo";
			if ($mes == "April") $mes = "Abril";
			if ($mes == "May") $mes = "Mayo";
			if ($mes == "June") $mes = "Junio";
			if ($mes == "July") $mes = "Julio";
			if ($mes == "August") $mes = "Agosto";
			if ($mes == "September") $mes = "Septiembre";
			if ($mes == "October") $mes = "Octubre";
			if ($mes == "November") $mes = "Noviembre";
			if ($mes == "December") $mes = "Diciembre";
			$dia_num=date('d');
			$dia_l=$days_dias[date('l')];
			$mes_num=  date('m');
			$mes_l= $mes;
			$anio=date('Y');  

			//$fecha= ' FECHA: 	'.$dia_l.', .'.$dia.' de '.$mes_l.' de '.$anio;
			$fechados=" 	FECHA:".$dia_l." , ".$dia_num;




			$phpWord = new \PhpOffice\PhpWord\PhpWord();
			$section = $phpWord->addSection();
//encabezado
			$header = $section->addHeader();
			$header->addImage(base_url().'public/assets/images/phpword/header.png',array('width' => 520));

//titulo
			$section->addText("INFORME <w:br/> ".$nro_tramite->cite,array('bold' => true), array('align' => 'center'));

			$section->addText("	A	 :	".$datos_a->nombres." ".$datos_a->paterno." ".$datos_a->materno, array('bold' => false), array('align' => 'left'));
			$section->addText("			".$datos_a->cargo, array('bold' => true), array('align' => 'left'));

			$section->addText("	VIA	 : 	".$datos_via->nombres." ".$datos_via->paterno." ".$datos_via->materno, array('bold' => false), array('align' => 'left'));
			$section->addText("			".$datos_via->cargo, array('bold' => true,'size' => 8), array('align' => 'left'));

			$section->addText("	DE	 : 	".$datos_persona->nombres." ".$datos_persona->paterno." ".$datos_persona->materno, array('bold' => false), array('align' => 'left'));
			$section->addText('			'.$datos_cargo->descripcion, array('bold' => true), array('align' => 'left'));

			$section->addText('	REF  	: 	Informe de Notificacion', array('bold' => false,'spaceAfter' => 0), array('align' => 'left'));

			$section->addText("	FECHA:  	".$dia_l.", ".$dia_num." de ".$mes_l." de ".$anio."" , array('bold' => false), array('align' => 'left'));
			//$section->addText($fechados, array('bold' => false), array('align' => 'left'));


			$lineStyle = array('weight' => 1, 'width' => 440, 'height' => 0, 'color' => 000000);
			$section->addLine($lineStyle);

		//pie de pagina
			$footer = $section->addFooter();
			$footer->addText('www.oopp.gob.bo',array('bold' => true,'size' => 8), array('align' => 'center'));
			$footer->addText('Av. Mariscal Santa Cruz, Esq. Calle Oruro, Edif. Centro de Comunicaciones La Paz, 5º piso',array('bold' => true,'size' => 8), array('align' => 'center'));
			$footer->addText('teléfonos: (591) -2- 2119999 – 2156600',array('bold' => true,'size' => 8), array('align' => 'center'));


			$file = 'Acta de notificacion.docx';
			header("Content-Description: File Transfer");
			header('Content-Disposition: attachment; filename="' . $file . '"');
			header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
			header('Content-Transfer-Encoding: binary');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header('Expires: 0');
			$xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
			$xmlWriter->save("php://output");


		}
		else{
			redirect(base_url());
		}





	}




}

?>