<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
 
// usamos los espacios de nombres para el paquete de PhpSpreadsheet 
 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
 
class Reporte_test extends CI_Controller {
// Creamos nuestro constructor en este caso para cargar algún modelo
public function __construct() {
parent::__construct();
// $this->load->model('alumno_model');
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

public function word_insp(){
$phpWord = new \PhpOffice\PhpWord\PhpWord();
 
$section = $phpWord->addSection();
//encabezado
$header = $section->addHeader();
$header->addImage(base_url().'public/assets/images/phpword/header.png',array('width' => 520));

//titulo
$section->addText('INFORME <w:br/> GAM-TOR/2019-00150',array('bold' => true), array('align' => 'center'));

$section->addText('	A	 :	Ernesto Marconi Ripa', array('bold' => false), array('align' => 'left'));
$section->addText('			COORDINADOR GENERAL a.i.', array('bold' => true), array('align' => 'left'));

$section->addText('	VIA	 : 	Edwin Yujra', array('bold' => false), array('align' => 'left'));
$section->addText('			RESPONSABLE DE DESARROLLO DE SISTEMAS Y BASE DE DATOS - UEP', array('bold' => true,'size' => 8), array('align' => 'left'));

$section->addText('	DE	 : 	Elmer Rodrigo Secko Flores', array('bold' => false), array('align' => 'left'));
$section->addText('			Apoyo Técnico en Desarrollo de Sistemas III', array('bold' => true), array('align' => 'left'));

$section->addText('	REF  	: 	Informe de Inspección', array('bold' => false,'spaceAfter' => 0), array('align' => 'left'));

$section->addText('	FECHA: 	Lunes, 4 de noviembre de 2019 ', array('bold' => false), array('align' => 'left'));


$lineStyle = array('weight' => 1, 'width' => 440, 'height' => 0, 'color' => 000000);
$section->addLine($lineStyle);


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

//acta de notificacion

public function word_not(){
$phpWord = new \PhpOffice\PhpWord\PhpWord();
 
$section = $phpWord->addSection();
//encabezado
$header = $section->addHeader();
$header->addImage(base_url().'public/assets/images/phpword/header.png',array('width' => 520));

//titulo
$section->addText('INFORME <w:br/> GAM-TOR/2019-00150',array('bold' => true), array('align' => 'center'));

$section->addText('	A	 :	Ernesto Marconi Ripa', array('bold' => false), array('align' => 'left'));
$section->addText('			COORDINADOR GENERAL a.i.', array('bold' => true), array('align' => 'left'));

$section->addText('	VIA	 : 	Edwin Yujra', array('bold' => false), array('align' => 'left'));
$section->addText('			RESPONSABLE DE DESARROLLO DE SISTEMAS Y BASE DE DATOS - UEP', array('bold' => true,'size' => 8), array('align' => 'left'));

$section->addText('	DE	 : 	Elmer Rodrigo Secko Flores', array('bold' => false), array('align' => 'left'));
$section->addText('			Apoyo Técnico en Desarrollo de Sistemas III', array('bold' => true), array('align' => 'left'));

$section->addText('	REF  	: 	Acta de notificacion', array('bold' => false,'spaceAfter' => 0), array('align' => 'left'));

$section->addText('	FECHA: 	Lunes, 4 de noviembre de 2019 ', array('bold' => false), array('align' => 'left'));


$lineStyle = array('weight' => 1, 'width' => 440, 'height' => 0, 'color' => 000000);
$section->addLine($lineStyle);


$footer = $section->addFooter();
$footer->addText('www.oopp.gob.bo',array('bold' => true,'size' => 8), array('align' => 'center'));
$footer->addText('Av. Mariscal Santa Cruz, Esq. Calle Oruro, Edif. Centro de Comunicaciones La Paz, 5º piso',array('bold' => true,'size' => 8), array('align' => 'center'));
$footer->addText('teléfonos: (591) -2- 2119999 – 2156600',array('bold' => true,'size' => 8), array('align' => 'center'));

 
$file = 'Acta de Notificacion.docx';
header("Content-Description: File Transfer");
header('Content-Disposition: attachment; filename="' . $file . '"');
header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
header('Content-Transfer-Encoding: binary');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Expires: 0');
$xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$xmlWriter->save("php://output");
}


}

 ?>