<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Certificacion Tecnica</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }

        body {

            margin: 15pt 15pt 15pt 15pt;

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
            line-height:13px;
            
        }
        tfoot tr td {
            font-weight: bold;
            font-size: x-small;

        }
        table, th, td {
      
        }
        .salto {
          border-collapse: collapse;
          border-right: 1px solid white;
          border-left: 1px solid white;

        }

          .salto_v {
          border-collapse: collapse;
          border-bottom: 1px solid white;
          border-top: 1px solid white;
          
        }

    .salto_m {
          border-collapse: collapse;
          border-bottom: 1px solid white;
          border-top: 1px solid white;
          border-right:  1px solid white;
          
        }



        td
        {
            height:5px;
        }

        .invoice table {
            margin: 0px;
        }

        .invoice h3 {
            margin-left: 15px;
        }

        .information {
            background-color: #CCDFC6;
            color: #000000;
            line-height:7px;
        }

        .information .logo {
            margin: 5px;
        }

        .information table {
            padding: 2px;
        }

        .glosa {
            font-size: 10px;
            line-height:14px;
        }

        .columnas {
            font-size: 14px;
            line-height:14px;
        }

        .titulos_tabla {
            font-size: 12px;
            line-height:14px;
        }

        .pie_pagina {
            font-size: 10px;
            line-height:14px;
        }
        .titulo {
            font-size: 12px;
            line-height:14px;
            font-weight: bold;
        }

        .titulo_dos {
            font-size: 32px;
            line-height:16px;
            font-weight: bold;
        }

         .titulo_tres {
            font-size: 22px;
            line-height:16px;
            font-weight: bold;
        }
        .encabezado {
            background-color: #CCDFC6;
            color: #000000;
            line-height:7px;
        }
        .encabezado .logo {
            margin: 2px;
        }
        .encabezado table {
            padding: 2px;

        }

          .bordes {
          border-collapse: collapse;
          border-bottom: 1px solid white;
          border-top: 1px solid white;
          border-right:  1px solid white;          
        }


          .no_bordes {   
          border: 0px ;          
        }
    </style>


</head>
<body>
    <div class="encabezado">
        <table width="100%" class="no_bordes" >
            <tr class="no_bordes" >
                  <td align="left" class="no_bordes" >
              <b > GOBIERNO AUTONOMO MUNICIPAL “EL TORNO”</b>
              <br>
              Tramite No 321456, <br>
                <b> Certificacion de Datos Tecnicos No. 1245/2019 </b>
          </td>
                <td align="left" style="width: 20%;" class="no_bordes">             
                 <img src="<?php echo base_url(); ?>public/assets/images/reportes/tornologo.png" alt="Logo" width="66" class="logo"/>
             </td>
    </tr>
</table>
</div>

<div class="invoice">  
<br> 
  <table width="100%">     
      <tr >   
      <td align="justify"  class="titulo" height="0">
        Solicitado por:  <br>
        Mediante memorial de <br>  
        Matricula: <br>
        

      </td>  
       <td align="justify"  class="titulo" height="0">
        RUDDY HERNAN YUCRA MASIAS con C.l. Nº 9341120 CBBA<br>
        fecha 06/02/2018  <br>
        3.01.1.01.0060862 <br>
      

      </td>   
  </tr>  
</table> 

  <table width="100%">     
      <tr >   
      <td align="left"  class="titulo" height="0"> 
        Propietario (s): 
      </td>  
       <td align="left"  class="titulo" height="0">  
        <?php foreach ($propietarios as $rowd){
        echo $rowd->nombres_pro; ?>
        <br>
        <?php   } ?>
      </td> 
       <td align="left"  class="titulo" height="0">  
        <?php foreach ($propietarios as $rowd){
        echo 'CI: '.$rowd->ci; ?>
        <br>
        <?php   } ?>
      </td> 
  </tr>  
</table>


<br>     

  <table width="100%">     
      <tr >   
      <td align="center"  class="titulo_dos" height="0">
    CERTIFICACIÓN TÉCNICA        
      </td>    
  </tr>  
       <tr >   
      <td align="center"  class="titulo" height="0">
    DE CONFORMIDAD A LA LEY Nº 247/2012 Y LEY DE MODIFICACIONES 803/2016
      </td>    
  </tr>
</table> 
<br>

 <table width="100%">     
      <tr >   
      <td align="left"  class="titulo" height="0">
        Verificado el sistema informático de Registro Catastral, el Archivo documentado del Registro Catastral y planos de acuerdo a lo solicitado, se informa:
      </td>    
  </tr>  
       <tr >   
      <td align="center"  class="titulo_tres" height="0" >
  LA INEXISTENCIA DE REGISTRO CATASTRAL UBICADO EN:
      </td>    
  </tr>
</table>
<br>

 <table width="100%">     
      <tr >   
      <td align="justify"  class="titulo" height="0">
        Distrito Nº: <?php echo $datos_predio->distrito; ?>
      </td>  
         <td align="justify"  class="titulo" height="0">
      Manzana : <?php echo $datos_predio->manzana; ?>
      </td>
        <td align="justify"  class="titulo" height="0">
      Zona: CENTRAL 
      </td>
       
       <td align="justify"  class="titulo" height="0">
        Nº de puerta: <?php echo $datos_predio->nro_puerta; ?>
      </td> 
  </tr>  
       <tr >   
      <td align="justify"  class="titulo" height="0">
        Predio:    <?php echo $datos_predio->predio; ?>
      </td>  
       <td align="justify"  class="titulo" height="0">
        Lote: Nº24
      </td>   
        <td align="justify"  class="titulo" height="0">
        Calle : INNOMINADA
      </td>
        <td align="justify"  class="titulo" height="0">
      Urbanizacion: LOMA PAMPA
      </td>
  </tr>
</table>


<br>
 <table width="100%">     
      <tr >   
      <td align="center"  class="titulo_tres" height="0">
       CÓDIGO CATASTRAL:    
      </td>  
        <td align="left"  class="titulo_tres" height="0">
 
         <?php echo $datos_predio->distrito.'-'.$datos_predio->manzana.'-'.$datos_predio->predio; ?>
      </td>  
  </tr>
</table>
<br>
 <table width="100%">     
      <tr >   
      <td align="justify"  class="titulo" height="0">
    Según plano de -URBANIZACION-. aprobado en fecha 16/04/2015 mediante R.M. N9 338/2014 de 21/10/2014 se tiene la siguiente información:
      </td>  
  </tr>
</table>


<br>
 <table width="100%">     
      <tr >   
      <td align="center"  class="titulo" height="0" width="50%">
          <img src="<?php echo base_url(); ?>public/assets/images/reportes/predio.png" alt="Logo" width="350"  class="logo"/>
      </td>  
      <td align="justify"  class="titulo" height="0">
        <u> DATOS TECNICOS</u>  <p>
          RELACION DE SUPERFICIES<p>
          Sup. Geografica: <?php echo $datos_predio->superficie_geo ?> m2 <p>
          Sup. Legal: <?php echo $datos_predio->superficie_legal ?> m2 <p>
            <br>
        UBICACION<p>
           <?php echo $datos_predio->desc_ubi ?><p>
       <p>
            <p>
           
      </td>  
  </tr>
</table>


 <table width="100%">     
      <tr >   
      <td align="justify"  class="titulo" height="0">
      <u>CROQUIS DE UBICACION DEL PREDIO  </u>  
      </td>  
        <td align="justify"  class="titulo" height="0">
   
      </td>  
  </tr>
</table>

<br>
 <table width="100%">     
      <tr >   
      <td align="justify"  class="titulo" height="0">
      NOTA.- Se aclara, que la manzana S-968 pertenece a la codificación ANTIGUA, actualmente corresponde a la manzana <?php echo $datos_predio->manzana; ?> de acuerdo al Plano General del Área Urbana de El Torno aprobado según Ley Municipal 0159/2016 del 2/09/2016.
      <p></p>
      <br> La presente certificación no define el derecho Propietario.
        es cuanto se certifica para fines consiguientes.
      </td>       
  </tr>
</table>



</div>


<div class="information" style="position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 80%;" class="pie_pagina">
     
             GOBIERNO AUTÓNOMO MUNICIPAL DE EL TORNO<br>
             DEPARTAMENTO DE SERVICIOS CATASTRALES<br>
             Telf.: 591H-4258030 Int: 4363 / Pasaje Sucre s/n 
         
                
             
            </td>            
        </tr>
    </table>
</div>
</body>
</html>