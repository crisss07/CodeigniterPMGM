

<!DOCTYPE html>
<html>
<head>
    <title>Reporte</title>
    <style>
table, td {
  border: 1px solid black;
  border-collapse: collapse;
  padding: 5px;
}
td {
  padding: 5px;
  text-align: left;    
  font-size: 14px;
}

.otro {
  border: 1px solid black;
  padding: 5px;
  border-spacing: 15px;
}
</style>
</head>
<body>
    <div>
        <div>
          <p>
          	<img src="<?php echo base_url().'public/assets/images/logo.png' ;?>" style=" float: left; height: 80px; width: 130px;"> 
          </p>
        </div>
        <div >
          <table style="padding-top: 30px; padding-left: 500px; width: 700px;">
            <tr>
              <td>HOJA DE RUTA INTERNA</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
          </table>

        </div>

       
        <div>
          <!-- <h3 style="text-align: center;">CITE : <?php echo $tramite->cite; ?></h3>
          <br>
          <div style="text-align: left; padding-left: 70px;">A &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp; &nbsp; &nbsp;  <?php echo $tramite->remitente; ?> </div>
          <br>
          <div style="text-align: left; padding-left: 70px;">DE &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp; &nbsp; &nbsp; <?php echo $de->nombres; ?> <?php echo $de->paterno; ?> <?php echo $de->materno; ?> </div>
          <br>
          <div style="text-align: left; padding-left: 70px;">REF. &nbsp; &nbsp; &nbsp; : &nbsp; &nbsp; &nbsp; <?php echo $tramite->referencia; ?></div>
          <br>
          <div style="text-align: left; padding-left: 70px;">FECHA : &nbsp; &nbsp; &nbsp; <?php echo $tramite->fecha; ?></div>
          <br> -->
          <hr style="clear: both;">
        
        <table style="width:100% ">
          <tr>
            <td colspan="7">PROCEDENCIA: <b style="padding-left: 1px;"> <?php echo $tramite->procedencia; ?> </b> </td>
            <td style="text-align: center;" colspan="3">CITE ORIGINAL: <br> <b> <?php echo $tramite->cite; ?> </b> </td>
          </tr>
          <tr>
            <td colspan="8">REMITENTE: <?php echo $tramite->remitente; ?><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>cargo</b></td>
            <?php
              $dato = $tramite->fecha;
              $fecha = date('d-m-Y',strtotime($dato));
              $hora = date('H:i:s',strtotime($dato));
             ?>
            <td colspan="2">FECHA: <?php echo $fecha; ?><br> HORA: <?php echo $hora; ?></td>
          </tr>
          <tr>
            <td colspan="10">DESTINATARIO:</td>
          </tr>
          <tr>
            <td  colspan="10">REFERENCIA: <?php echo $tramite->referencia; ?> </td>
          </tr>
          <tr>
             <td colspan="4">PROCESO: </td>
             <td colspan="5">ADJUNTO: <?php echo $tramite->anexos; ?></td>
             <td colspan="1">HOJAS: <?php echo $tramite->fojas; ?></td>
          </tr>
        </table>

        <table style="width:100%">
          <tr>
            <td colspan="1">Proveido N°: 1</td>
            <td colspan="1">A:</td>
            <td colspan="14"></td>
          </tr>
          <tr>
            <td style="font-size: 5px;">ATENCION URGENTE</td>
            <td></td>
            <td style="font-size: 5px;">ELABORAR INFORME</td>
            <td></td>
            <td style="font-size: 5px;">ELABORAR RESPUESTA</td>
            <td></td>
            <td style="font-size: 5px;">PARA SU CONSIDERACION</td>
            <td></td>
            <td style="font-size: 5px;">PARA SU CONOCIMIENTO</td>
            <td></td>
            <td style="font-size: 5px;">PARA VoBo</td>
            <td></td>
            <td style="font-size: 5px;">ARCHIVAR</td>
            <td></td>
            <td style="font-size: 5px;">OTRO</td>
            <td></td>
          </tr>
          <tr>
            <td rowspan="8" colspan="10">&nbsp;</td>
            <td rowspan="8" colspan="6">&nbsp;</td>
          </tr>
          <tr></tr>
          <tr></tr>
          <tr></tr>
          <tr></tr>
          <tr></tr>
          <tr></tr>
          <tr></tr>
          <tr>
            <td colspan="2">Adjunto</td>
            <td colspan="8"></td>
            <td colspan="2">Hora</td>
            <td colspan="4"></td>
          </tr>
        </table>

        <br>

        <table style="width:100%">
          <tr>
            <td colspan="1">Proveido N°: 2</td>
            <td colspan="1">A:</td>
            <td colspan="14"></td>
          </tr>
          <tr>
            <td style="font-size: 5px;">ATENCION URGENTE</td>
            <td></td>
            <td style="font-size: 5px;">ELABORAR INFORME</td>
            <td></td>
            <td style="font-size: 5px;">ELABORAR RESPUESTA</td>
            <td></td>
            <td style="font-size: 5px;">PARA SU CONSIDERACION</td>
            <td></td>
            <td style="font-size: 5px;">PARA SU CONOCIMIENTO</td>
            <td></td>
            <td style="font-size: 5px;">PARA VoBo</td>
            <td></td>
            <td style="font-size: 5px;">ARCHIVAR</td>
            <td></td>
            <td style="font-size: 5px;">OTRO</td>
            <td></td>
          </tr>
          <tr>
            <td rowspan="8" colspan="10">&nbsp;</td>
            <td rowspan="8" colspan="6">&nbsp;</td>
          </tr>
          <tr></tr>
          <tr></tr>
          <tr></tr>
          <tr></tr>
          <tr></tr>
          <tr></tr>
          <tr></tr>
          <tr>
            <td colspan="2">Adjunto</td>
            <td colspan="8"></td>
            <td colspan="2">Hora</td>
            <td colspan="4"></td>
          </tr>
        </table>

        <br>
      
         <table style="width:100%">
          <tr>
            <td colspan="1">Proveido N°: 3</td>
            <td colspan="1">A:</td>
            <td colspan="14"></td>
          </tr>
          <tr>
            <td style="font-size: 5px;">ATENCION URGENTE</td>
            <td></td>
            <td style="font-size: 5px;">ELABORAR INFORME</td>
            <td></td>
            <td style="font-size: 5px;">ELABORAR RESPUESTA</td>
            <td></td>
            <td style="font-size: 5px;">PARA SU CONSIDERACION</td>
            <td></td>
            <td style="font-size: 5px;">PARA SU CONOCIMIENTO</td>
            <td></td>
            <td style="font-size: 5px;">PARA VoBo</td>
            <td></td>
            <td style="font-size: 5px;">ARCHIVAR</td>
            <td></td>
            <td style="font-size: 5px;">OTRO</td>
            <td></td>
          </tr>
          <tr>
            <td rowspan="8" colspan="10">&nbsp;</td>
            <td rowspan="8" colspan="6">&nbsp;</td>
          </tr>
          <tr></tr>
          <tr></tr>
          <tr></tr>
          <tr></tr>
          <tr></tr>
          <tr></tr>
          <tr></tr>
          <tr>
            <td colspan="2">Adjunto</td>
            <td colspan="8"></td>
            <td colspan="2">Hora</td>
            <td colspan="4"></td>
          </tr>
        </table> 
       
       

    </div>
</body>
</html>
        </div>