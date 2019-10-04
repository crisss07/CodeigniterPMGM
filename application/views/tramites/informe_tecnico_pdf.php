<!doctype html>
<html lang="es">
	<head>
	    <meta charset="UTF-8">
	    <title>Informe tecnico</title>
	    <style type="text/css">
	       .orden{
	       		padding-bottom: -5px;
	       		padding-top: -10px;
	       }
	    </style>
	</head>
	<body>
		<div>
            <table width="100%">
                <tr>
                    <td align="left" style="width: 15%; text-align: center;"></td>
                    <td align="center" style="width: 70%; text-align: center; font-family:1Arial;">
                        <h3 id="indice" style="font-size: 11px; height: 7px;"><b>GOBIERNO AUTONOMO MUNICIPAL DE MECAPACA</b></h3>
                        <h3 align="center" style="font-size: 11px; height: 7px; font-family:1Calibri;">SECRETARIA MUNICIPAL DEL DEPARTAMENTO T&Eacute;CNICO</h3>
                        <h3 align="center" style="font-size: 11px; height: 10px; font-family:1Calibri;">UNIDAD DE CATASTRO Y CARTOGRAF&Iacute;A</h3>
                        <h3 align="center" style="font-size: 20px; height: 5px; font-family:1Calibri;"><b>INFORME TECNICO</b></h3>
                    </td>
                    <td align="right" style="width: 15%; text-align: center;">
                        <img align="right" src="<?php echo base_url(); ?>public/assets/images/reportes/logo.png" alt="Logo" width="96" class="logo"/>
                    </td>
                </tr>
            </table>       
            <div>
            	<table width="100%">
                    <tr>
                        <td align="center" style="width: 13%;">
                            <div class="col-lg-11 col-md-12">
                                <div class="form-group row" style="font-size: 11px; height: 15px;text-align: right;">
                                    <label class="control-label text-right col-md-3">CITE : GAMM-SMDT-TEC-N°</label>
                                    
                                </div>
                            </div>            
                        </td>
                        <td align="center" style="width: 8%;">
                            <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                <input type="text" id="superficie_total" name="superficie_total" size="8" value="<?php echo $tramite->cite; ?>">
                            </div>
                        </td>                                       
                    </tr>
               	</table>
            	<table width="100%">
                    <tr>
                        <td align="left" style="width: 25%;">
                            <div class="col-lg-11 col-md-12">
                                <div class="form-group row" style="font-size: 11px; height: 15px; text-align: right;">
                                    <label class="control-label text-right col-md-3">A : </label>
                                    
                                </div>
                            </div>            
                        </td>
                        <td align="left" style="width: 75%;">
                            <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                 <input type="text" class="form-control" id="lote" name="lote" size="40" value="<?php echo $a->nombre; ?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="width: 20%;">
                            <div class="col-lg-11 col-md-12">
                                <div class="form-group row" style="font-size: 11px; height: 15px; text-align: right;">
                                    <label class="control-label text-right col-md-3"></label>
                                    
                                </div>
                            </div>            
                        </td>
                        <td align="left" style="width: 15%;">
                            <div class="col-md-9" style="font-size: 11px; height: 15px;">
                            	<b><?php echo $a->cargo; ?></b>
                            </div>
                        </td>
                    </tr>
                    
                    <tr>
                        <td align="left" style="width: 40%;">
                            <div class="col-lg-11 col-md-12">
                                <div class="form-group row" style="font-size: 11px; height: 15px; text-align: right;">
                                    <label class="control-label text-right col-md-3">VIA : </label>
                                    
                                </div>
                            </div>            
                        </td>
                        <td align="left" style="width: 60%;">
                            <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                 <input type="text" class="form-control" id="lote" name="lote" size="40" value="<?php echo $via->nombre; ?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="width: 20%;">
                            <div class="col-lg-11 col-md-12">
                                <div class="form-group row" style="font-size: 11px; height: 15px; text-align: right;">
                                    <label class="control-label text-right col-md-3"></label>
                                    
                                </div>
                            </div>            
                        </td>
                        <td align="left" style="width: 15%;">
                            <div class="col-md-9" style="font-size: 11px; height: 15px;">
                            	<b><?php echo $via->cargo; ?></b>
                            </div>
                        </td>
                    </tr>
                   
                   <tr>
                        <td align="left" style="width: 40%;">
                            <div class="col-lg-11 col-md-12">
                                <div class="form-group row" style="font-size: 11px; height: 15px; text-align: right;">
                                    <label class="control-label text-right col-md-3">DE : </label>
                                    
                                </div>
                            </div>            
                        </td>
                        <td align="left" style="width: 60%;">
                            <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                 <input type="text" class="form-control" id="lote" name="lote" size="40" value="<?php echo $de->nombres; ?> <?php echo $de->paterno; ?> <?php echo $de->materno; ?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="width: 20%;">
                            <div class="col-lg-11 col-md-12">
                                <div class="form-group row" style="font-size: 11px; height: 15px; text-align: right;">
                                    <label class="control-label text-right col-md-3"></label>
                                    
                                </div>
                            </div>            
                        </td>
                        <td align="left" style="width: 15%;">
                            <div class="col-md-9" style="font-size: 11px; height: 15px;">
                            	<b><?php echo $cargo->descripcion; ?></b>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td align="left" style="width: 40%;">
                            <div class="col-lg-11 col-md-12">
                                <div class="form-group row" style="font-size: 11px; height: 15px; text-align: right;">
                                    <label class="control-label text-right col-md-3">REFERENCIA : </label>
                                    
                                </div>
                            </div>            
                        </td>
                        <td align="left" style="width: 60%;">
                            <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                 <input type="text" class="form-control" id="lote" name="lote" size="40" value="Tramite <?php echo $tramite->nro_tramite; ?>">
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td align="left" style="width: 40%;">
                            <div class="col-lg-11 col-md-12">
                                <div class="form-group row" style="font-size: 11px; height: 15px; text-align: right;">
                                    <label class="control-label text-right col-md-3">FECHA : </label>
                                    
                                </div>
                            </div>            
                        </td>
                        <?php setlocale(LC_TIME, "spanish");
                            $mi_fecha = str_replace("/", "-", $tramite->fecha_informe);           
                            $Nueva_Fecha = date("d-m-Y", strtotime($mi_fecha));             
                            $Mes_Anyo = strftime("%A, %d de %B de %Y", strtotime($Nueva_Fecha));?>
                        <td align="left" style="width: 60%;">
                            <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                 <input type="text" class="form-control" id="lote" name="lote" size="40" value="<?php echo $Mes_Anyo; ?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="width: 40%;">
                            <div class="col-lg-11 col-md-12">
                                <div class="form-group row" style="font-size: 11px; height: 15px; text-align: right;">
                                    <label class="control-label text-right col-md-3">PROCESADOR : </label>
                                    
                                </div>
                            </div>            
                        </td>
                        <td align="left" style="width: 60%;">
                            <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                 <input type="text" class="form-control" id="lote" name="lote" size="40" value="<?php echo $procesador->cargo; ?>	 <?php echo $procesador->nombre; ?>">
                            </div>
                        </td>
                    </tr>
                </table>
         	    <table width="100%">
                    <tr>
                        <td align="left" style="width: 28%;">
                            <h3 style="font-size: 11px; height: 5px;"><b><u>ANTECEDENTES</u></b></h3>
                        </td>
                    </tr>
                </table>                                
               	<table width="100%">
                    <tr>
                        <td align="left" style="width: 20%;">
                            <div class="col-lg-11 col-md-12">
                                <div class="form-group row" style="font-size: 11px; height: 15px; text-align: right;">
                                    <label class="control-label text-right col-md-3">GAMM : </label>
                                    
                                </div>
                            </div>            
                        </td>
                        <td align="center" style="width: 15%;">
                            <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                 <input type="text" class="form-control" id="lote" name="lote" size="10" value="<?php echo $tramite->nro_tramite; ?>">
                            </div>
                        </td>

                        <td align="center" style="width: 13%;">
                            <div class="col-lg-11 col-md-12">
                                <div class="form-group row" style="font-size: 11px; height: 15px;text-align: right;">
                                    <label class="control-label text-right col-md-3">DE FECHA :</label>
                                    
                                </div>
                            </div>            
                        </td>
                        <?php $fecha_nueva = str_replace("/", "-", $tramite->fecha_solicitud);           
                            $fecha_t = date("d-m-Y", strtotime($fecha_nueva));             
                            $fecha_mod = strftime("%A, %d de %B de %Y", strtotime($fecha_t)); ?>
                        <td align="center" style="width: 30%;">
                            <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                <input type="text" id="superficie_total" name="superficie_total" size="28" value="<?php echo $fecha_mod; ?>">
                            </div>
                        </td>                                        
                    </tr>
               	</table>
               	<table width="100%">
                    <tr>
                        <td align="left" style="width: 20%;">
                            <div class="col-lg-11 col-md-12">
                                <div class="form-group row" style="font-size: 11px; height: 15px; text-align: right;">
                                    <label class="control-label text-right col-md-3">SOLICITANTE : </label>
                                    
                                </div>
                            </div>            
                        </td>
                        <td align="center" style="width: 15%;">
                            <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                 <input type="text" class="form-control" id="lote" name="lote" size="30" value=" <?php echo $propietarios->nombre ?>">
                            </div>
                        </td>

                        <td align="center" style="width: 13%;">
                            <div class="col-lg-11 col-md-12">
                                <div class="form-group row" style="font-size: 11px; height: 15px;text-align: right;">
                                    <label class="control-label text-right col-md-3">CI :</label>
                                    
                                </div>
                            </div>            
                        </td>
                        <td align="center" style="width: 30%;">
                            <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                <input type="text" id="superficie_total" name="superficie_total" size="12" value="<?php echo $propietarios->ci ?>">
                            </div>
                        </td>                                        
                    </tr>
                    <!-- <tr>
                        <td align="left" style="width: 20%;">
                            <div class="col-lg-11 col-md-12">
                                <div class="form-group row" style="font-size: 11px; height: 15px; text-align: right;">
                                    <label class="control-label text-right col-md-3"></label>
                                    
                                </div>
                            </div>            
                        </td>
                        <td align="center" style="width: 15%;">
                            <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                 <input type="text" class="form-control" id="lote" name="lote" size="30" value=" ">
                            </div>
                        </td>

                        <td align="center" style="width: 13%;">
                            <div class="col-lg-11 col-md-12">
                                <div class="form-group row" style="font-size: 11px; height: 15px;text-align: right;">
                                    <label class="control-label text-right col-md-3">CI :</label>
                                    
                                </div>
                            </div>            
                        </td>
                        <td align="center" style="width: 30%;">
                            <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                <input type="text" id="superficie_total" name="superficie_total" size="12" value=" ">
                            </div>
                        </td>                                        
                    </tr> -->
               	</table>
               	 <table width="100%">
                    <tr>
                        <td align="left" style="width: 28%;">
                            <div style="font-size: 11px; height: 15px; text-align: right;">
                                <label>OBJETO DE TRAMITE : </label>
                            </div>     
                        </td>
                        <td align="center" style="width: 72%;">
                            <div style="font-size: 11px; height: 15px; ">
                                <input type="text" id="jurisdicion" name="jurisdicion" size="55" value="<?php echo $tipo_tramite->tramite ?>">
                            </div>
                        </td>
                       
                    </tr>
                    <tr>
                        <td align="left" style="width: 28%;">
                            <div style="font-size: 11px; height: 15px; text-align: right;">
                                <label>UBICACION : </label>
                            </div>     
                        </td>
                        <td align="center" style="width: 72%;">
                            <div style="font-size: 11px; height: 15px; ">
                                <input type="text" id="jurisdicion" name="jurisdicion" size="55" value="<?php echo $tramite->ubicacion ?>">
                            </div>
                        </td>
                       
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td align="left" style="width: 25%;">
                            <div class="col-lg-11 col-md-12">
                                <div class="form-group row" style="font-size: 11px; height: 15px; text-align: right;">
                                    <label class="control-label text-right col-md-3">LOTE : </label>
                                    
                                </div>
                            </div>            
                        </td>
                        <td align="center" style="width: 15%;">
                            <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                 <input type="text" class="form-control" id="lote" name="lote" size="12" value=" <?php echo $tramite->lote ?>">
                            </div>
                        </td>

                        <td align="center" style="width: 25%;">
                            <div class="col-lg-11 col-md-12">
                                <div class="form-group row" style="font-size: 11px; height: 15px;text-align: right;">
                                    <label class="control-label text-right col-md-3">URBANIZACION :</label>
                                    
                                </div>
                            </div>            
                        </td>
                        <td align="center" style="width: 30%;">
                            <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                <input type="text" id="superficie_total" name="superficie_total" size="12" value="<?php echo $tramite->urbanizacion ?>">
                            </div>
                        </td>                                        
                    </tr>
                    <tr>
                        <td align="left" style="width: 20%;">
                            <div class="col-lg-11 col-md-12">
                                <div class="form-group row" style="font-size: 11px; height: 15px; text-align: right;">
                                    <label class="control-label text-right col-md-3">MANZANO : </label>
                                    
                                </div>
                            </div>            
                        </td>
                        <td align="center" style="width: 15%;">
                            <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                 <input type="text" class="form-control" id="lote" name="lote" size="12" value="<?php echo $tramite->manzana ?>">
                            </div>
                        </td>

                        <td align="center" style="width: 13%;">
                            <div class="col-lg-11 col-md-12">
                                <div class="form-group row" style="font-size: 11px; height: 15px;text-align: right;">
                                    <label class="control-label text-right col-md-3">COMUNIDAD : </label>
                                    
                                </div>
                            </div>            
                        </td>
                        <td align="center" style="width: 30%;">
                            <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                <input type="text" id="superficie_total" name="superficie_total" size="12" value="<?php echo $tramite->comunidad ?>">
                            </div>
                        </td>                                        
                    </tr>
                    <tr>
                        <td align="left" style="width: 20%;">
                            <div class="col-lg-11 col-md-12">
                                <div class="form-group row" style="font-size: 11px; height: 15px; text-align: right;">
                                    <label class="control-label text-right col-md-3">SUPERFICIE SEGUN TESTIMONIO : </label>
                                    
                                </div>
                            </div>            
                        </td>
                        <td align="center" style="width: 15%;">
                            <div class="col-md-6" style="font-size: 11px; height: 15px;">
                                 <input type="text" class="form-control" id="lote" name="lote" size="12" value="<?php echo $tramite->superficie_testimonio ?> m2">
                            </div>
                        </td>

                        <td align="left" style="width: 20%;">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group row" style="font-size: 11px; height: 15px; text-align: right;">
                                    <label class="control-label text-right col-md-3">SUPERFICIE SEGUN MEDICION : </label>
                                    
                                </div>
                            </div>            
                        </td>
                        <td align="center" style="width: 30%;">
                            <div class="col-md-6" style="font-size: 11px; height: 15px;">
                                <input type="text" id="superficie_total" name="superficie_total" size="12" value="<?php echo $tramite->superficie_medicion ?> m2">
                            </div>
                        </td>                                        
                    </tr>
               	</table>
               	<table width="100%">
                    <tr>
                        <td align="left" style="width: 28%;">
                            <h3 style="font-size: 11px; height: 5px;"><b><u>DOCUMENTACION PRESENTADA</u></b></h3>
                        </td>
                    </tr>
                </table>
                <table class="orden" width="100%">
                    <tr>
                        <td align="left" style="width: 28%;">
                            <h3 style="font-size: 11px; height: 5px;"><b>CARNET DE IDENTIDAD</b></h3>         
                        </td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td align="left" style="width: 20%;">
                            <div class="col-lg-11 col-md-12">
                                <div class="form-group row" style="font-size: 11px; height: 15px; text-align: right;">
                                    <label class="control-label text-right col-md-3">A FAVOR DE : </label>
                                    
                                </div>
                            </div>            
                        </td>
                        <td align="center" style="width: 15%;">
                            <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                 <input type="text" class="form-control" id="lote" name="lote" size="30" value=" <?php echo $propietarios->nombre ?>">
                            </div>
                        </td>

                        <td align="center" style="width: 13%;">
                            <div class="col-lg-11 col-md-12">
                                <div class="form-group row" style="font-size: 11px; height: 15px;text-align: right;">
                                    <label class="control-label text-right col-md-3">CI :</label>
                                    
                                </div>
                            </div>            
                        </td>
                        <td align="center" style="width: 30%;">
                            <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                <input type="text" id="superficie_total" name="superficie_total" size="12" value="<?php echo $propietarios->ci ?>">
                            </div>
                        </td>                                        
                    </tr>
                    
                    <!-- <tr>
                        <td align="left" style="width: 20%;">
                            <div class="col-lg-11 col-md-12">
                                <div class="form-group row" style="font-size: 11px; height: 15px; text-align: right;">
                                    <label class="control-label text-right col-md-3"></label>
                                    
                                </div>
                            </div>            
                        </td>
                        <td align="center" style="width: 15%;">
                            <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                 <input type="text" class="form-control" id="lote" name="lote" size="30" value=" <?php echo $vendedor->nombre ?> ">
                            </div>
                        </td>

                        <td align="center" style="width: 13%;">
                            <div class="col-lg-11 col-md-12">
                                <div class="form-group row" style="font-size: 11px; height: 15px;text-align: right;">
                                    <label class="control-label text-right col-md-3">CI :</label>
                                    
                                </div>
                            </div>            
                        </td>
                        <td align="center" style="width: 30%;">
                            <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                <input type="text" id="superficie_total" name="superficie_total" size="12" value="<?php echo $vendedor->ci ?>">
                            </div>
                        </td>                                        
                    </tr>  -->
                    
               	</table>
               	<table class="orden" width="100%">
                    <tr>
                        <td align="left" style="width: 28%;">
                            <h3 style="font-size: 11px; height: 5px;"><b>FOLIO</b></h3>         
                        </td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td align="left" style="width: 20%;">
                            <div class="col-lg-11 col-md-12">
                                <div class="form-group row" style="font-size: 11px; height: 15px; text-align: right;">
                                    <label class="control-label text-right col-md-3">N° : </label>
                                    
                                </div>
                            </div>            
                        </td>
                        <td align="center" style="width: 15%;">
                            <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                 <input type="text" class="form-control" id="lote" name="lote" size="10" value="<?php echo $tramite->nro_folio?>">
                            </div>
                        </td>

                        <td align="center" style="width: 13%;">
                            <div class="col-lg-11 col-md-12">
                                <div class="form-group row" style="font-size: 11px; height: 15px;text-align: right;">
                                    <label class="control-label text-right col-md-3">SUPERFICIE :</label>
                                    
                                </div>
                            </div>            
                        </td>
                        <td align="center" style="width: 30%;">
                            <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                <input type="text" id="superficie_total" name="superficie_total" size="12" value="<?php echo $tramite->superficie_testimonio ?> m2">
                            </div>
                        </td>                                        
                    </tr>
               	</table>
               	<table width="100%">
                    <tr>
                        <td align="left" style="width: 20%;">
                            <div class="col-lg-11 col-md-12">
                                <div class="form-group row" style="font-size: 11px; height: 15px; text-align: right;">
                                    <label class="control-label text-right col-md-3">A FAVOR DE : </label>
                                    
                                </div>
                            </div>            
                        </td>
                        <td align="center" style="width: 15%;">
                            <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                 <input type="text" class="form-control" id="lote" name="lote" size="30" value=" <?php echo $propietarios->nombre ?>">
                            </div>
                        </td>

                        <td align="center" style="width: 13%;">
                            <div class="col-lg-11 col-md-12">
                                <div class="form-group row" style="font-size: 11px; height: 15px;text-align: right;">
                                    <label class="control-label text-right col-md-3">CI :</label>
                                    
                                </div>
                            </div>            
                        </td>
                        <td align="center" style="width: 30%;">
                            <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                <input type="text" id="superficie_total" name="superficie_total" size="12" value="<?php echo $propietarios->ci ?>">
                            </div>
                        </td>                                        
                    </tr>
                    <!-- <tr>
                        <td align="left" style="width: 20%;">
                            <div class="col-lg-11 col-md-12">
                                <div class="form-group row" style="font-size: 11px; height: 15px; text-align: right;">
                                    <label class="control-label text-right col-md-3"></label>
                                    
                                </div>
                            </div>            
                        </td>
                        <td align="center" style="width: 15%;">
                            <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                 <input type="text" class="form-control" id="lote" name="lote" size="30" value="<?php //echo $tramite->solicitante2 ?>">
                            </div>
                        </td>

                        <td align="center" style="width: 13%;">
                            <div class="col-lg-11 col-md-12">
                                <div class="form-group row" style="font-size: 11px; height: 15px;text-align: right;">
                                    <label class="control-label text-right col-md-3">CI :</label>
                                    
                                </div>
                            </div>            
                        </td>
                        <td align="center" style="width: 30%;">
                            <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                <input type="text" id="superficie_total" name="superficie_total" size="12" value="<?php //echo $tramite->ci2 ?>">
                            </div>
                        </td>                                        
                    </tr> -->
               	</table>
               	<table class="orden" width="100%">
                    <tr>
                        <td align="left" style="width: 28%;">
                            <h3 style="font-size: 11px; height: 5px;"><b>TESTIMONIO DE PROPIEDAD</b></h3>         
                        </td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td align="left" style="width: 20%;">
                            <div class="col-lg-11 col-md-12">
                                <div class="form-group row" style="font-size: 11px; height: 15px; text-align: right;">
                                    <label class="control-label text-right col-md-3">N° : </label>
                                    
                                </div>
                            </div>            
                        </td>
                        <td align="center" style="width: 15%;">
                            <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                 <input type="text" class="form-control" id="lote" name="lote" size="10" value="<?php echo $tramite->nro_testimonio ?>">
                            </div>
                        </td>

                        <td align="center" style="width: 13%;">
                            <div class="col-lg-11 col-md-12">
                                <div class="form-group row" style="font-size: 11px; height: 15px;text-align: right;">
                                    <label class="control-label text-right col-md-3">NOTARIA N° :</label>
                                    
                                </div>
                            </div>            
                        </td>
                        <td align="center" style="width: 30%;">
                            <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                <input type="text" id="superficie_total" name="superficie_total" size="12" value="<?php echo $tramite->notaria ?>">
                            </div>
                        </td>      
                        <td align="center" style="width: 13%;">
                            <div class="col-lg-11 col-md-12">
                                <div class="form-group row" style="font-size: 11px; height: 15px;text-align: right;">
                                    <label class="control-label text-right col-md-3">FECHA :</label>
                                    
                                </div>
                            </div>            
                        </td>
                        <?php $fecha_test = date("d-m-Y",strtotime($tramite->fecha_testimonio)); ?>
                        <td align="center" style="width: 30%;">
                            <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                <input type="text" id="superficie_total" name="superficie_total" size="12" value="<?php echo $fecha_test; ?>">
                            </div>
                        </td>                                   
                    </tr>
               	</table>
               	<table width="100%">
               		<tr>
                        <td align="left" style="width: 28%;">
                            <div style="font-size: 11px; height: 15px; text-align: right;">
                                <label>NOTARIO DR(A) : </label>
                            </div>     
                        </td>
                        <td align="center" style="width: 72%;">
                            <div style="font-size: 11px; height: 15px; ">
                                <input type="text" id="jurisdicion" name="jurisdicion" size="55" value="<?php echo $tramite->notario ?>">
                            </div>
                        </td>
                       
                    </tr>
                    <tr>
                        <td align="left" style="width: 28%;">
                            <div style="font-size: 11px; height: 15px; text-align: right;">
                                <label>
                                A FAVOR DE : </label>
                            </div>     
                        </td>
                        <td align="center" style="width: 72%;">
                            <div style="font-size: 11px; height: 15px; ">
                                <input type="text" id="jurisdicion" name="jurisdicion" size="55" value="<?php echo $propietarios->nombre ?>">
                            </div>
                        </td>
                       
                    </tr>
                    <!-- <tr>
                        <td align="left" style="width: 28%;">
                            <div style="font-size: 11px; height: 15px; text-align: right;">
                                <label></label>
                            </div>     
                        </td>
                        <td align="center" style="width: 72%;">
                            <div style="font-size: 11px; height: 15px; ">
                                <input type="text" id="jurisdicion" name="jurisdicion" size="55" value="<?php echo $tramite->solicitante2 ?>">
                            </div>
                        </td>
                       
                    </tr> -->
                </table>
                <table width="100%">
                    <tr>
                        <td align="left" style="width: 28%;">
                            <h3 style="font-size: 11px; height: 5px;"><b><u>CARACTERISTICAS DE LA PROPIEDAD</u></b></h3>
                        </td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td align="left" style="width: 23%;">
                            <div class="col-lg-11 col-md-12">
                                <div class="form-group row" style="font-size: 11px; height: 15px; text-align: right;">
                                    <label class="control-label text-right col-md-3">SUPERFICIE SEGUN TESTIMONIO : </label>
                                    
                                </div>
                            </div>            
                        </td>
                        <td align="center" style="width: 15%;">
                            <div class="col-md-6" style="font-size: 11px; height: 15px;">
                                 <input type="text" class="form-control" id="lote" name="lote" size="12" value="<?php echo $tramite->superficie_testimonio ?> m2">
                            </div>
                        </td>

                        <td align="left" style="width: 23%;">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group row" style="font-size: 11px; height: 15px; text-align: right;">
                                    <label class="control-label text-right col-md-3">SUPERFICIE SEGUN MEDICION : </label>
                                    
                                </div>
                            </div>            
                        </td>
                        <td align="center" style="width: 18%;">
                            <div class="col-md-6" style="font-size: 11px; height: 15px;">
                                <input type="text" id="superficie_total" name="superficie_total" size="12" value="<?php echo $tramite->superficie_medicion ?> m2">
                            </div>
                        </td>                                        
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td align="left" style="width: 28%;">
                            <h3 style="font-size: 11px; height: 5px;"><b>IMPUESTOS</b></h3>         
                        </td>
                        <td align="center" style="width: 72%;">
                            <div style="font-size: 11px; height: 15px; ">
                                <input type="text" id="jurisdicion" name="jurisdicion" size="55" value="<?php echo $tramite->impuestos ?>">
                            </div>
                        </td>
                    </tr>
                </table>
             	<table width="100%">
                    <tr>
                        <td align="left" style="width: 28%;">
                            <h3 style="font-size: 11px; height: 5px;"><b>OBSERVACIONES</b></h3>         
                        </td>
                        <td align="center" style="width: 72%;">
                            <div style="font-size: 11px; height: 15px; ">
                                <input type="text" id="jurisdicion" name="jurisdicion" size="55" value="<?php echo $tramite->observaciones ?>">
                            </div>
                        </td>
                    </tr>
                </table>

                <table width="100%">
                    <tr>
                        <td align="center" style="width: 33%; height: 15px;">
                            <div class="form-group row" style="font-size: 71%; line-height: 70px;">
                                <label class="control-label text-right col-md-3">U. CATRASTO-CART.</label>
                            </div>    
                        </td>
                     
                    </tr>
                </table>
            </div>                                                               
		</div>
	</body>
</html>