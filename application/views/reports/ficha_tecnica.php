<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ficha Tecnica</title>

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
            font-size: 10px;
            line-height:14px;

             border-collapse: collapse;
          border: 1px solid black; 
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

            border-collapse: collapse;
          border: 1px solid black;
        }

         .titulo_blanco {
            font-size: 10px;
            line-height:14px;
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

        .bordes_tabla {   
         border-collapse: collapse;
          border: 1px solid black;   
        }


    </style>


</head>
<body>

    <div class="encabezado ">
        <table width="100%" border="0">
            <tr border="0">
                <td align="left" style="width: 20%;" border="0">             
                 <img src="<?php echo base_url(); ?>public/assets/images/reportes/tornologo.png" alt="Logo" width="66" class="logo"/>
             </td>
             <td align="center" >
              <b > GOBIERNO AUTONOMO MUNICIPAL “EL TORNO”</b>
              <br>
              <u>FICHA TECNICA </u>    
          </td>
          <td align="right" style="width: 20%;" border="0">
            FECHA   &nbsp;&nbsp;&nbsp;&nbsp;/  &nbsp;&nbsp;&nbsp;&nbsp; /20   &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
        </td>
    </tr>
</table>
</div>

<div class="invoice">        
  <table width="100%" class="bordes_tabla">
        


                       <tr >   
      <td align="justify"  class="titulo " height="0">
        BLOQUES DEL PREDIO  
  
      </td>
      <td align="justify" class="columnas " height="0"> 

      </td>
      <td align="justify"  class="columnas " height="0">          
      </td>
      <td align="justify" class="columnas " height="0">          
      </td>
      <td align="justify"  class="salto_v" height="0">          
      </td>
      <td align="justify"  class="titulo" height="0">  

    BLOQUES DEL PREDIO
      </td>
      <td align="justify"  class="columnas " height="0">          
      </td>
      <td align="justify"  class="columnas" height="0">         
      </td>
      <td align="justify" class="columnas" height="0">          
      </td>
      <td align="justify"  class="columnas" height="0">          
      </td>
  </tr>  


           <?php 
       $total = $num_grupos->total;
       $total = $total/2;
       for ($i = 0; $i < 6; $i++) {   $k=6; ?>   


        
                       <tr >   
      <td align="justify"  class="titulo" height="0">
    <?php print_r($data_grupos[$i]['descripcion']); 
     ?> 
      </td>
      <td align="justify" class="columnas" height="0">          
      </td>
      <td align="justify"  class="columnas" height="0">          
      </td>
      <td align="justify" class="columnas" height="0">          
      </td>
      <td align="justify"  class="salto_v" height="0">          
      </td>
      <td align="justify"  class="titulo" height="0">  

    <?php print_r($data_grupos[$k+$i]['descripcion']); ?> 
      </td>
      <td align="justify"  class="columnas" height="0">          
      </td>
      <td align="justify"  class="columnas" height="0">         
      </td>
      <td align="justify" class="columnas" height="0">          
      </td>
      <td align="justify"  class="columnas" height="0">          
      </td>
  </tr>   

 



        <?php 
       $totalg = $num_bloques->total;
       $totalg = $totalg-1;
       for ($j = 0; $j <= $totalg ; $j++) { ?>

        <?php if($data_grupos[$i]['grupo_mat_id'] == $data_bloques[$j]['grupo_mat_id']){ ?>

                       <tr >   
      <td align="justify"  class="columnas" height="0">
    <?php print_r($data_bloques[$j]['descripcion']); 
     ?> 
      </td>
      <td align="justify" class="columnas" height="0">          
      </td>
      <td align="justify"  class="columnas" height="0">          
      </td>
      <td align="justify" class="columnas" height="0">          
      </td>
      <td align="justify"  class="salto_v" height="0">          
      </td>

      <td align="justify"  class="columnas" height="0">  
    <?php print_r($data_bloques[$j]['descripcion']); ?> 
      </td>
      <td align="justify"  class="columnas" height="0">          
      </td>
      <td align="justify"  class="columnas" height="0">         
      </td>
      <td align="justify" class="columnas" height="0">          
      </td>
      <td align="justify"  class="columnas" height="0">          
      </td>
  </tr>
        <?php } ?>

           
       <?php } ?>


        <?php if($i<5){ ?>

      <tr >   
      <td align="justify"  class="salto" height="0">
 &nbsp;&nbsp;&nbsp;&nbsp;
      </td>
      <td align="justify" class="salto" height="0">          
      </td>
      <td align="justify"  class="salto" height="0">          
      </td>
      <td align="justify" class="salto" height="0">          
      </td>
      <td align="justify"  class="salto_m" height="0">          
      </td
      <td align="justify"  class="salto" height="0"> 
      </td>
      <td align="justify"  class="salto" height="0">          
      </td>
      <td align="justify"  class="salto" height="0">         
      </td>
      <td align="justify" class="salto" height="0">          
      </td>
      <td align="justify"  class="salto" height="0">          
      </td>
  </tr> 
<?php } ?>
 
   <?php } ?> <!-- fin ciclo for -->




</table> 
<br>

<table width="100%">
    <tr >   
      <td align="center"  class="titulo_blanco" height="0">
       EN MI CALIDAD DE SUJETO PASIVO Y/O TERCERO RESPONSABLE, DECLARO QUE LA INFORMACION PROPORCIONADA FIEL Y EXACTAMENTE REFLEJE LA VERDAD,
        POR LO QUE JURO LA EXACTITUD DE LA PRESENTE DECLARACION

      </td>   
  </tr>
</table> 
<br>

<table width="100%">        
                       <tr >   
      <td align="left"  class="titulo" height="0">
         PROPIETARIO:
      </td>   
       <td align="left"  class="titulo" height="0">
        INSPECTOR: 
      </td>   
  </tr>  
                        <tr >   
      <td align="left"  class="titulo" height="0">
     Nombre completo: 
      </td>   
       <td align="left"  class="titulo" height="0">
 Nombre completo:
      </td>   
  </tr> 
                        <tr >   
      <td align="left"  class="titulo" height="0">
         Firma: 
      </td>   
       <td align="left"  class="titulo" height="0">
    Firma:  
      </td>   
  </tr> 
                          <tr >   
      <td align="left"  class="titulo" height="0">
         C.I.
      </td>   
       <td align="left"  class="titulo" height="0">
 C.I.
      </td>   
  </tr>
</table> 


</div>

<div class="information" style="position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 80%;" class="pie_pagina">
                GOBIERNO AUTONOMO MUNICIPAL “EL TORNO”
                <br>
                DEPARTAMENTO DE CATASTRO
                <br>
                Telf.: (591)-XXXXXXXX
                
             
            </td>            
        </tr>
    </table>
</div>
</body>
</html>