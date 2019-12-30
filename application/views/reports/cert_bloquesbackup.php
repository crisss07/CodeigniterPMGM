<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CERTIFICACION  CATASTRAL</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }

        body {

            /*margin: 15pt 15pt 15pt 15pt;*/
            background-image: url('<?php echo base_url(); ?>public/assets/images/reportes/menbrete_reporte.png');

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
          margin-top: 0px;
            margin-left: 80px;
            margin-right:  60px;
            margin-bottom: 0px;
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
            font-size: 10px;
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
    </style>


</head>
<body>
   <!-- <div class="encabezado">

              <table width="100%" class="bordes">
            <tr class="bordes">
                  <td align="left" class="bordes">
              <b > GOBIERNO AUTONOMO MUNICIPAL “EL TORNO”</b>
              <br>
              Tramite No 321456, <br>
                <b> Certificacion de Datos Tecnicos No. 1245/2019 </b>
          </td>
                <td align="left" style="width: 15%;" class="bordes">             
                 <img src="<?php echo base_url(); ?>public/assets/images/reportes/tornologo.png" alt="Logo" width="66" class="logo"/>
             </td>
    </tr>
</table>
</div>-->
<div >
    <br><br><br><br><br><br>

</div>
<div class="invoice">  
    <br>
          <table width="100%" >
           <tr >   
      <td align="center"  class="titulo_tres" height="0">
       CERTIFICADO CATASTRAL:    
      </td>  
   
  </tr>
</table>
<br>
 <table width="100%">     
      <tr >   
      <td align="left"  class="titulo_tres" height="0">
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
      <td align="left"  class="titulo" height="0">
       PROPIETARIOS: <br>

       <?php foreach ($propietarios as $keys) {
        echo $keys->nombres_pro;
        ?>
        <br>
       <?php  } ?>
        <p>       
        NOMBRE DE VIA <br>
        <?php echo $datos_predio->calle ?><br><p>
        <br>       
      </td> 
        <td align="left"  class="titulo" height="0">        
     CI:<br>
        <?php foreach ($propietarios as $k) {
        echo $k->ci;
        ?>
        <br>
       <?php  } ?>
        <br>
        N° <br>
        <?php echo $datos_predio->nro_inmueble ?> <br><p>  
        <br>

      </td>

        <td align="center"  class="titulo_tres" height="0"  width="35%">
          VISTA FOTOGRAFICA <br>
      <img src="<?php echo base_url(); ?><?php echo $foto_fachada; ?>" alt="Logo" width="200"  class="logo"/>
      </td>  
  </tr>

</table>

 


<br>

 <table width="100%">     
      <tr >   
      <td align="center"  class="titulo" height="0" width="50%">
          <img src="<?php echo base_url(); ?><?php echo $foto_plano_ubi; ?>" alt="Logo" width="300"  class="logo"/>
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
<br>     

  <table width="100%">     
      <tr >   
      <td align="center"  class="titulo_tres" height="0">
    CONSTRUCCIONES     
      </td>    
  </tr>  

</table> 
<br>

     <table width="100%" >
        <thead>
            <tr>
              
                <th>numero</th> 
                <th>nombre</th>
                <th>estado</th>
                <th>altura</th>
                <th>destino</th>
                <th>uso</th>
   
            </tr>
        </thead>
        <tbody>            
            <?php foreach ($data_bloques as $row) { ?>
                <tr>                    
             
                    <td><?php echo $row->nro_bloque; ?></td>                                                      
                    <td><?php echo $row->nom_bloque; ?></td> 
                   
                    <td><?php echo $row->estado_fisico_des; ?></td>    
                     <td><?php echo $row->altura; ?></td> 
                         <td><?php echo $row->descripcion; ?></td> 
                             <td><?php echo $row->uso; ?></td> 
                     
                </tr>
                <?php 
            } ?>
        </tbody>
    </table>




<br>
 <table width="100%">     
      <tr >   
      <td align="justify"  class="titulo" height="0">
      NOTA.- La presente certificación no define el derecho Propietario.
        es cuanto se certifica para fines consiguientes.
      </td>       
  </tr>
</table>



</div>

<!--
<div class="information" style="position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 80%;" class="pie_pagina">
     
             GOBIERNO AUTÓNOMO MUNICIPAL DE EL TORNO<br>
             DEPARTAMENTO DE SERVICIOS CATASTRALES<br>
             Telf.: 591-4258030 Int: 4363 / Pasaje Sucre s/n 
         
                
             
            </td>            
        </tr>
    </table>
</div>-->

</body>
</html>