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
            background-color: #D8D8D8;   
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
            background-color: #D8D8D8;
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




        #watermark {
                 position: fixed;
    top: 50%;
    width: 100%;
    text-align: center;
    opacity: .100;
    transform: rotate(-20deg);
    transform-origin: 50% 50%;
    z-index: -1000;
    font-size: 80px;
            }

            .gris{
			   -webkit-filter: grayscale(1); /* Webkit */
    filter: gray; /* IE6-9 */
    filter: grayscale(1); /* W3C */
			}
    </style>


</head>
<body>
	<!-- <div id="watermark">
            SIN VALOR LEGAL
        </div> -->
    <div class="encabezado">

              <table width="100%" class="bordes">
            <tr class="bordes">
                  <td align="left" class="bordes">
              <b > GOBIERNO AUTONOMO MUNICIPAL “EL TORNO”</b>
              <br>
              Tramite No 321456, <br>
                <b> Certificacion de Datos Tecnicos No. 1245/2019 </b>
          </td>
                <td align="left" style="width: 15%;" class="bordes">             
                 <img style="filter: grayscale(100%);" src="<?php echo base_url(); ?>public/assets/images/reportes/tornologo.png" alt="Logo" width="66" class="logo gris"/>
             </td>
    </tr>
</table>
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
      00-34-125-024-0-00-000-000
      </td>  
  </tr>
</table>
<br>

 <table width="100%">     
      <tr >   
      <td align="left"  class="titulo" height="0">
       PROPIETARIOS <br>
       HERNAN YUCRA MASIAS <br> <p>
       
        NOMBRE DE VIA <br>
        Calle San jose <br><p>

        USO DEL INMUEBLE   <br>
        Particular<br><p>
        ESTADO DEL INMUEBLE <br>
        BUENO
       
      </td>  
        <td align="left"  class="titulo" height="0">
  
   
        CONDICION DEL TITULAR <br>
       PROPIETARIO UNICO <br> <p>
       Nro <br>
       59<br> <p>

        &nbsp; <br>
       &nbsp;<br> <p>
         &nbsp; <br>
       &nbsp;

       

      </td> 
        <td align="left"  class="titulo" height="0">
            &nbsp; <br>
     CI <br>
       9341120 CBBA  <br><p>
       &nbsp; <br>
       &nbsp; <br>
       &nbsp;<br> <p>
      
       &nbsp; <br>
       &nbsp;<br> <p>
         &nbsp; <br>
       &nbsp;

      </td>
        <td align="center"  class="titulo_tres" height="0"  width="35%">
          VISTA FOTOGRAFICA <br>
      <img  src="<?php echo base_url(); ?>public/assets/images/reportes/fachada.jpg" alt="Logo" width="350"  class="logo" style="filter: grayscale(100%);" />
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
                   
                    <td><?php echo $row->estado_fisico; ?></td>    
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
        


  

    <tr>     
      <td align="left"  class="titulo" height="0">
       OBSERVACIONES:<br>
     
      </td> 
        <td align="center"  class="titulo_tres" height="0"  width="60%"  rowspan="3">
          PLANO CATASTRAL <br>
      <img src="<?php echo base_url(); ?>public/assets/images/reportes/predio.png" alt="Logo" width="350"  class="logo"/>
      </td>  
  </tr>

      <tr>     
      <td align="left"  class="titulo" height="0">
       SE EXPIDE EL SIGUIENTE CERTIFICADO A SOLICITUD DE: <br>   
       HERNAN YUCRA MASIAS <br>   
      </td> 
  
  </tr>
        <tr>     
      <td align="center"  class="titulo" height="0">
       FIRMA Y SELLO<br>

      </td> 
  
  </tr>


</table>





<br>
 <table width="100%">     
      <tr >   
      <td align="justify"  class="titulo" height="0">
      NOTA.- Se aclara, que la manzana S-968 pertenece a la codificación ANTIGUA, actualmente corresponde a la manzana 125 de acuerdo al Plano General del Área Urbana de Cbba aprobado según Ley Municipal 0159/2016 del 2/09/2016 La presente certificación no define el derecho Propietario.
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
             Telf.: (591H-4258030 Int: 4363 / Pasaje Sucre s/n 
         
                
             
            </td>   
             <td align="right" style="width: 80%;" class="pie_pagina">
     
           
           <img style="width: 70px; height: 70px;" class="box-center" src="<?php echo base_url() . "public/assets/images/oficina/codigos/" . $img ?>" />
                
             
            </td>           
        </tr>
    </table>
</div>
 
</body>
</html>