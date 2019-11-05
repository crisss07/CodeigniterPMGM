<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prueba_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	
public function unidades($u)
{
    if ($u==0)  {$ru = " ";}
elseif ($u==1)  {$ru = "Un ";}
elseif ($u==2)  {$ru = "Dos ";}
elseif ($u==3)  {$ru = "Tres ";}
elseif ($u==4)  {$ru = "Cuatro ";}
elseif ($u==5)  {$ru = "Cinco ";}
elseif ($u==6)  {$ru = "Seis ";}
elseif ($u==7)  {$ru = "Siete ";}
elseif ($u==8)  {$ru = "Ocho ";}
elseif ($u==9)  {$ru = "Nueve ";}
elseif ($u==10) {$ru = "Diez ";}

elseif ($u==11) {$ru = "Once ";}
elseif ($u==12) {$ru = "Doce ";}
elseif ($u==13) {$ru = "Trece ";}
elseif ($u==14) {$ru = "Catorce ";}
elseif ($u==15) {$ru = "Quince ";}
elseif ($u==16) {$ru = "Dieciseis ";}
elseif ($u==17) {$ru = "Decisiete ";}
elseif ($u==18) {$ru = "Dieciocho ";}
elseif ($u==19) {$ru = "Diecinueve ";}
elseif ($u==20) {$ru = "Veinte ";}

elseif ($u==21) {$ru = "Veintiun ";}
elseif ($u==22) {$ru = "Veintidos ";}
elseif ($u==23) {$ru = "Veintitres ";}
elseif ($u==24) {$ru = "Veinticuatro ";}
elseif ($u==25) {$ru = "Veinticinco ";}
elseif ($u==26) {$ru = "Veintiseis ";}
elseif ($u==27) {$ru = "Veintisiente ";}
elseif ($u==28) {$ru = "Veintiocho ";}
elseif ($u==29) {$ru = "Veintinueve ";}
elseif ($u==30) {$ru = "Treinta ";}

elseif ($u==31) {$ru = "Treintayun ";}
elseif ($u==32) {$ru = "Treintaydos ";}
elseif ($u==33) {$ru = "Treintaytres ";}
elseif ($u==34) {$ru = "Treintaycuatro ";}
elseif ($u==35) {$ru = "Treintaycinco ";}
elseif ($u==36) {$ru = "Treintayseis ";}
elseif ($u==37) {$ru = "Treintaysiete ";}
elseif ($u==38) {$ru = "Treintayocho ";}
elseif ($u==39) {$ru = "Treintaynueve ";}
elseif ($u==40) {$ru = "Cuarenta ";}

elseif ($u==41) {$ru = "Cuarentayun ";}
elseif ($u==42) {$ru = "Cuarentaydos ";}
elseif ($u==43) {$ru = "Cuarentaytres ";}
elseif ($u==44) {$ru = "Cuarentaycuatro ";}
elseif ($u==45) {$ru = "Cuarentaycinco ";}
elseif ($u==46) {$ru = "Cuarentayseis ";}
elseif ($u==47) {$ru = "Cuarentaysiete ";}
elseif ($u==48) {$ru = "Cuarentayocho ";}
elseif ($u==49) {$ru = "Cuarentaynueve ";}
elseif ($u==50) {$ru = "Cincuenta ";}

elseif ($u==51) {$ru = "Cincuentayun ";}
elseif ($u==52) {$ru = "Cincuentaydos ";}
elseif ($u==53) {$ru = "Cincuentaytres ";}
elseif ($u==54) {$ru = "Cincuentaycuatro ";}
elseif ($u==55) {$ru = "Cincuentaycinco ";}
elseif ($u==56) {$ru = "Cincuentayseis ";}
elseif ($u==57) {$ru = "Cincuentaysiete ";}
elseif ($u==58) {$ru = "Cincuentayocho ";}
elseif ($u==59) {$ru = "Cincuentaynueve ";}
elseif ($u==60) {$ru = "Sesenta ";}

elseif ($u==61) {$ru = "Sesentayun ";}
elseif ($u==62) {$ru = "Sesentaydos ";}
elseif ($u==63) {$ru = "Sesentaytres ";}
elseif ($u==64) {$ru = "Sesentaycuatro ";}
elseif ($u==65) {$ru = "Sesentaycinco ";}
elseif ($u==66) {$ru = "Sesentayseis ";}
elseif ($u==67) {$ru = "Sesentaysiete ";}
elseif ($u==68) {$ru = "Sesentayocho ";}
elseif ($u==69) {$ru = "Sesentaynueve ";}
elseif ($u==70) {$ru = "Setenta ";}

elseif ($u==71) {$ru = "Setentayun ";}
elseif ($u==72) {$ru = "Setentaydos ";}
elseif ($u==73) {$ru = "Setentaytres ";}
elseif ($u==74) {$ru = "Setentaycuatro ";}
elseif ($u==75) {$ru = "Setentaycinco ";}
elseif ($u==76) {$ru = "Setentayseis ";}
elseif ($u==77) {$ru = "Setentaysiete ";}
elseif ($u==78) {$ru = "Setentayocho ";}
elseif ($u==79) {$ru = "Setentaynueve ";}
elseif ($u==80) {$ru = "Ochenta ";}

elseif ($u==81) {$ru = "Ochentayun ";}
elseif ($u==82) {$ru = "Ochentaydos ";}
elseif ($u==83) {$ru = "Ochentaytres ";}
elseif ($u==84) {$ru = "Ochentaycuatro ";}
elseif ($u==85) {$ru = "Ochentaycinco ";}
elseif ($u==86) {$ru = "Ochentayseis ";}
elseif ($u==87) {$ru = "Ochentaysiete ";}
elseif ($u==88) {$ru = "Ochentayocho ";}
elseif ($u==89) {$ru = "Ochentaynueve ";}
elseif ($u==90) {$ru = "Noventa ";}

elseif ($u==91) {$ru = "Noventayun ";}
elseif ($u==92) {$ru = "Noventaydos ";}
elseif ($u==93) {$ru = "Noventaytres ";}
elseif ($u==94) {$ru = "Noventaycuatro ";}
elseif ($u==95) {$ru = "Noventaycinco ";}
elseif ($u==96) {$ru = "Noventayseis ";}
elseif ($u==97) {$ru = "Noventaysiete ";}
elseif ($u==98) {$ru = "Noventayocho ";}
else            {$ru = "Noventaynueve ";}
return $ru; //Retornar el resultado
}

public function decenas($d)
{
    if ($d==0)  {$rd = "";}
elseif ($d==1)  {$rd = "Ciento ";}
elseif ($d==2)  {$rd = "Doscientos ";}
elseif ($d==3)  {$rd = "Trescientos ";}
elseif ($d==4)  {$rd = "Cuatrocientos ";}
elseif ($d==5)  {$rd = "Quinientos ";}
elseif ($d==6)  {$rd = "Seiscientos ";}
elseif ($d==7)  {$rd = "Setecientos ";}
elseif ($d==8)  {$rd = "Ochocientos ";}
else            {$rd = "Novecientos ";}
return $rd; //Retornar el resultado
} 

  
}