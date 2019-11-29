

<!DOCTYPE html>
<html>
<head>
    <title>Reporte</title>
    
    
</style>
</head>
<body>
    <div>
        <div>
          <p>
          	<img src="<?php echo base_url().'public/assets/images/logo.png' ;?>" style=" float: left; height: 80px; width: 130px;">
            <img src="<?php echo base_url().'public/assets/images/pmgm.jpg' ;?>"  style=" float: right; height: 80px; width: 130px;">
            
<center>            <h5 style="padding-top: 10px;">ESTADO PLURINACIONAL DE BOLIVIA <br>MINISTERIO DE OBRAS PUBLICAS, SERVICIOS Y VIVIENDA <br>VICEMINSTERIO DE VIVIENDA Y URBANISMO </h5></center>
					
          </p>

        </div>
       
         
          <h3 style="text-align: center;">CITE : <?php echo $tramite->cite; ?></h3>
          <br>
          <div style="text-align: left; padding-left: 70px;">A &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp; &nbsp; &nbsp;  <?php echo $tramite->remitente; ?> </div>
          <br>
          <div style="text-align: left; padding-left: 70px;">DE &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp; &nbsp; &nbsp; <?php echo $de->nombres; ?> <?php echo $de->paterno; ?> <?php echo $de->materno; ?> </div>
          <br>
          <div style="text-align: left; padding-left: 70px;">REF. &nbsp; &nbsp; &nbsp; : &nbsp; &nbsp; &nbsp; <?php echo $tramite->referencia; ?></div>
          <br>
          <div style="text-align: left; padding-left: 70px;">FECHA : &nbsp; &nbsp; &nbsp; <?php echo $tramite->fecha; ?></div>
          <br>
          <hr style="clear: both;">
                    
       
       

    </div>
</body>
</html>
        </div>