<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Certificado de Area Urbana</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }

        body {
           
           background-image: url('<?php echo base_url(); ?>public/assets/images/reportes/menbrete.png');
           background-repeat: no-repeat; 
        }

        * {
            font-family: Verdana, Arial, sans-serif;
        }

        a {
            color: #fff;
            text-decoration: none;
        }

        table {
            font-size: 13px;
            line-height:14px;
            
            
        }

       

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .invoice table {
            margin: 80px;
        }

        .invoice h3 {
            margin-left: 15px;
        }

        .information {
            background-color: #60A7A6;
            color: #FFF;
            line-height:7px;
        }

        .information .logo {
            margin: 5px;
        }

        .information table {
            padding: 10px;
        }

        .glosa {
            font-size: 10px;
            line-height:14px;
        }

        .pie_pagina {
            font-size: 10px;
            line-height:14px;
        }
        .titulo {
            font-size: 13px;
            line-height:18px;
            
            
        }

      
    </style>


</head>
<body>
<br><br><br>
<div>
 
</div>







<div class="invoice">

        
  
    <table width="100%">
        <tr>
            <td align="justify" style="" class="glosa">
            <img src="<?php echo base_url(); ?>public/assets/images/reportes/certificacion.png" alt="Logo" width="200" class="logo"/>  					
					<p></p>
            GAMM-SMDT-P.C.C.-CERT-Nº 0991/2019					

            </td> 
            <td style="width: 45%;">
            <img src="<?php echo base_url(); ?>public/assets/images/reportes/blank.png" alt="Logo" width="96" class="logo"/>
            </td>      
       
          <td align="justify" style="width: 100%;" class="glosa">
          El suscrito Secretario Municipal del Departamento Técnico y la Unidad de Catastro y Cartografía del Gobierno Autónomo Municipal de Mecapaca, en cuanto pueden y el derecho les permite.										
          </td>
        </tr>
  </table>

      <table width="100%">
        <tr>
            <td align="justify" class="fuente_tabla">
            <u><h4 align="center">EXCLUSIVAMENTE PARA VIA INFORMATIVA DE DERECHOS REALES</h4></u>
            Que la solicitud presentada por:
         																	
	        <p align="center"><?php echo strtoupper ($datos_certificado->solicitante); ?> con CI.	<?php echo $datos_certificado->ci.'.'; ?>	          </p>
	        <p>por el que solicita Certificación de <b>AREA RURAL</b> de su propiedad, predio de terreno, ubicado en:	          </p>
	        <p> <center><b><?php echo strtoupper( $datos_certificado->ubicacion); ?></b></center></p>
	        <p align="justify"> MECAPACA, PROVINCIA MURILLO, DEPARTAMENTO DE LA PAZ, con la superficie de <?php echo $datos_certificado->superficie_testimonio; ?> m² según documento, y
            				<?php echo $datos_certificado->superficie_medicion; ?>		m²	según medición.</p>
          
         
	        <p> <b><u>SE CERTIFICA:</u> </b>    </p>
	        <p><img src="<?php echo base_url(); ?>public/assets/images/reportes/blank.png" alt="Logo" width="26" class="logo"/>
            Que según el informe técnico Nº	<?php echo $datos_certificado->cite; ?> expedido por el Arq. <?php echo ucfirst (strtolower($datos_certificado->nom_de)).' '. ucfirst (strtolower($datos_certificado->pat_de)).' '.ucfirst (strtolower($datos_certificado->mat_de)); ?>, Técnico de 
            la Unidad de Catastro y Cartografía del Gobierno Autónomo Municipal de Mecapaca, se infiere que el
             TERRENO, se encuentra ubicado en: 				<b><?php echo strtoupper( $datos_certificado->ubicacion); ?></b>			</p>
         
	        <p align="center"> <b>  <img src="<?php echo base_url(); ?>public/assets/images/reportes/blank.png" alt="Logo" width="26" /> •  QUE LA PROPIEDAD EN CUESTION SE ENCUENTRA EN AREA RURAL CORRESPONDIENTE AL GOBIERNO AUTONOMO MUNICIPAL DE MECAPACA.</b> </p>
          
	        <p><img src="<?php echo base_url(); ?>public/assets/images/reportes/blank.png" alt="Logo" width="26" class="logo"/>
            Por lo que PROCEDE LA CERTIFICACION del mismo, para vía informativa de Derechos Reales.</p>
         
	        <p><img src="<?php echo base_url(); ?>public/assets/images/reportes/blank.png" alt="Logo" width="26" class="logo"/>
            Téngase presente que el Gobierno Autónomo Municipal de Mecapaca, en sujeción estricta a sus atribuciones 
            conferidas por ley,<b> NO OTORGA DERECHO PROPIETARIO ALGUNO</b>, remitiéndose estrictamente al tenor de la presente certificación,
             OTORGADA EN BASE A INFORMACION TECNICO LEGAL PRESENTADA.</p>
        
	        <p><img src="<?php echo base_url(); ?>public/assets/images/reportes/blank.png" alt="Logo" width="26" class="logo"/>
            Es cuanto certificamos en honor a la verdad para fines consiguientes del interesado.																	
	          <p><img src="<?php echo base_url(); ?>public/assets/images/reportes/blank.png" alt="Logo" width="26" class="logo"/>
              Es dado en el Palacio Consistorial de Mecapaca el día: <?php echo $dia_l.', '.$dia.' de '.$mes_l.' de '.$anio; ?>  							
              </p>
        
            <br>  
           </td>
       
    </tr>
        <tr>
        <td align="justify" width="5%" class="glosa">
       
             Arq. <?php echo ucfirst (strtolower($datos_certificado->nom_de)).' '.ucfirst (strtolower($datos_certificado->pat_de)).' '.ucfirst (strtolower($datos_certificado->mat_de)); ?>
       
          <br >
          G.A.M.M.- P.C.C.</td>
        </tr>
  </table>

  

 
</div>


</body>
</html>