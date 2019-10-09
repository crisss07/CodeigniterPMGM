<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Proforma de Pago</title>

    <style type="text/css">
       /*#id{
        text-align: right;
       }*/
      
    </style>



</head>
<body>

<div>
    <div>
       <div>
                    <div>
                        <div>
                            
                            <div>
                                <!-- <form action="#"> -->
                                    <?php echo form_open('tipo_tramite/insertar', array('method'=>'POST', 'id'=>'insertar')); ?>
                                    <div>
                                        <table width="100%">
                                            <tr>
                                                <td align="left" style="width: 15%; text-align: center;">
                                                                  
                                                </td>
                                                <td align="center" style="width: 70%; text-align: center; font-family:1Arial;">
                                                    <h3 id="indice" style="font-size: 11px; height: 7px;"><b>GOBIERNO AUTONOMO MUNICIPAL DE MECAPACA</b></h3>
                                                    <h3 align="center" style="font-size: 11px; height: 7px; font-family:1Calibri;">SECRETARIA MUNICIPAL DEL DEPARTAMENTO T&Eacute;CNICO</h3>
                                                    <h3 align="center" style="font-size: 11px; height: 10px; font-family:1Calibri;">UNIDAD DE CATASTRO Y CARTOGRAF&Iacute;A</h3>
                                                    <h3 align="center" style="font-size: 11px; height: 5px; font-family:1Calibri;"><b>PROFORMA DE PAGO</b></h3>
                                                </td>
                                                <td align="right" style="width: 15%; text-align: center;">
                                                    <img align="right" src="<?php echo base_url(); ?>public/assets/images/reportes/logo.png" alt="Logo" width="96" class="logo"/>
                                                </td>
                                            </tr>

                                        </table>
                                       
                                        <div>

                                        <table width="100%">
                                            <tr >
                                                <td align="left" style="width: 10%; text-align: center;">

                                                </td>
                                                <td align="center" style="width: 15%; text-align: center; ">
                                                     <div style="font-size: 11px; height: 8px;">
                                                        <label></label>
                                                        <input type="text" size="10" value="<?php echo $proforma->cite ?>">
                                                    </div>
                                                </td>
                                                <td align="left" style="width: 10%; text-align: center; text-align: right; ">
                                                    <div id="fecha_proforma" style="height: 7px;">
                                                        <div>
                                                            <label> de fecha</label>
                                                            
                                                        </div>
                                                    </div>
                                                </td>
                                                <td align="right" style="width: 65%; text-align: center;">
                                                    <div style="font-size: 10px; height: 6px;">
                                                        <input type="text" name="fecha_proforma" size="40" value="<?php echo $dia_not_l.', '.$dia_not.' de '.$mes_not.' de '.$anio_not; ?> ">
                                                    </div>
                                                </td>
                                            </tr>

                                        </table>
                                            <!--/span-->
                                        </div>

                                        <table width="100%">
                                            <tr>
                                                <td align="left" style="width: 28%;">
                                                    <h3 style="font-size: 11px; height: 2px;"><b>RUBRO 1</b></h3>         
                                                </td>
                                                <td align="left" style="width: 72%;">
                                                    <h3 style="font-size: 11px; height: 2px;"><b>IDENTIFICACI&Oacute;N DEL PROPIETARIO</b></h3>
                                                </td>
                                            </tr>
                                        </table>

                                        <table width="100%">
                                            <tr>
                                                <td align="right" style="width: 28%;">
                                                    <div style="font-size: 11px; height: 5px; text-align: right;">
                                                        <label>DATOS PERSONALES</label>
                                                    </div>     
                                                </td>
                                                <td align="center" style="width: 72%;">
                                                    <div style="font-size: 11px; height: 15px; ">
                                                        <input type="text" name="propietario1" size="40" value="<?php echo $proforma->propietario1 ?>">
                                                    </div>
                                                </td>
                                               
                                            </tr>

                                        </table>
                                        

                                        <table width="100%">
                                            <tr>
                                                <td align="left" style="width: 28%; height: 7px;">

                                                </td>
                                                <td align="center" style="width: 72%;">
                                                    <div style="font-size: 11px; height: 7px;">
                                                        <input type="text" name="propietario2" size="40" value="<?php echo $proforma->propietario2 ?>">
                                                    </div>
                                                </td>
                                               
                                            </tr>

                                        </table>

                                        <table width="100%">
                                            <tr>
                                                <td align="left" style="width: 28%;">
                                                    <h3 style="font-size: 11px; height: 5px;"><b>RUBRO 2</b></h3>         
                                                </td>
                                                <td align="left" style="width: 72%;">
                                                    <h3 style="font-size: 11px; height: 5px;"><b>IDENTIFICACI&Oacute;N DEL TERRENO</b></h3>
                                                </td>
                                            </tr>
                                        </table>

                                        <table width="100%">
                                            <tr>
                                                <td align="left" style="width: 28%;">
                                                    <div class="col-lg-11 col-md-12">
                                                        <div class="form-group row" style="font-size: 11px; height: 15px; text-align: right;">
                                                            <label class="control-label text-right col-md-12">UBICACI&Oacute;N</label>
                                                            
                                                        </div>
                                                    </div>            
                                                </td>
                                                <td align="center" style="width: 72%;">
                                                    <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                                        <input type="text" class="form-control" id="ubicacion" size="55" name="ubicacion" value="<?php echo $proforma->ubicacion ?>">
                                                    </div>
                                                </td>
                                                
                                            </tr>

                                       </table>


                                       <table width="100%">
                                            <tr>
                                                <td align="left" style="width: 20%;">
                                                    <div class="col-lg-11 col-md-12">
                                                        <div class="form-group row" style="font-size: 11px; height: 15px; text-align: right;">
                                                            <label class="control-label text-right col-md-3">LOTE</label>
                                                            
                                                        </div>
                                                    </div>            
                                                </td>
                                                <td align="center" style="width: 15%;">
                                                    <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                                         <input type="text" class="form-control" id="lote" name="lote" size="10" value="<?php echo $proforma->lote ?>">
                                                    </div>
                                                </td>

                                                <td align="center" style="width: 13%;">
                                                    <div class="col-lg-11 col-md-12">
                                                        <div class="form-group row" style="font-size: 11px; height: 15px;text-align: right;">
                                                            <label class="control-label text-right col-md-3">SUPERFICIE TOTAL</label>
                                                            
                                                        </div>
                                                    </div>            
                                                </td>
                                                <td align="center" style="width: 8%;">
                                                    <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                                        <input type="text" id="superficie_total" name="superficie_total" size="8" value="<?php echo $proforma->superficie_total ?>">
                                                    </div>
                                                </td>
                                                <td align="left" style="width: 15%;">
                                                    <div style="float: left;">
                                                        m&sup2;
                                                    </div>
                                                </td>
                                                
                                            </tr>

                                       </table>

                                       <table width="100%">
                                            <tr>
                                                <td align="left" style="width: 20%;;">
                                                    <div class="col-lg-11 col-md-12">
                                                        <div class="form-group row" style="font-size: 11px; height: 15px; text-align: right;">
                                                            <label class="control-label text-right col-md-3">MANZANO</label>
                                                        </div>
                                                    </div>            
                                                </td>
                                                <td align="center" style="width: 15%;">
                                                    <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                                        <input type="text" class="form-control" id="manzano" name="manzano" size="10" value="<?php echo $proforma->manzano ?>">
                                                    </div>
                                                </td>

                                                <td align="center" style="width: 13%;">
                                                    <div class="col-lg-11 col-md-12">
                                                        <div class="form-group row" style="font-size: 11px; height: 15px; text-align: right;">
                                                            <label class="control-label text-right col-md-3">URBANIZACI&Oacute;N</label>
                                                            
                                                        </div>
                                                    </div>            
                                                </td>
                                                <td align="center" style="width: 23%;">
                                                    <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                                        <input type="text" id="superficie_total" name="superficie_total" size="18" value="<?php echo $proforma->urbanizacion ?>">
                                                    </div>
                                                </td>
                                                
                                                
                                            </tr>

                                       </table>

                                       <table width="100%">
                                            <tr>
                                                <td align="left" style="width: 28%;">
                                                    <div style="font-size: 11px; height: 15px; text-align: right;">
                                                        <label>JURISDICCI&Oacute;N</label>
                                                    </div>     
                                                </td>
                                                <td align="center" style="width: 72%;">
                                                    <div style="font-size: 11px; height: 15px; ">
                                                        <input type="text" id="jurisdicion" name="jurisdicion" size="55" value="<?php echo $proforma->jurisdicion ?>">
                                                    </div>
                                                </td>
                                               
                                            </tr>

                                        </table>

                                        <table width="100%">
                                            <tr>
                                                <td align="left" style="width: 20%;">
                                                    <div class="col-lg-11 col-md-12">
                                                        <div class="form-group row" style="font-size: 11px; height: 15px; text-align: right;">
                                                            <label class="control-label text-right col-md-5">SECCI&Oacute;N MUNICIPAL</label>
                                                        </div>
                                                    </div>            
                                                </td>
                                                <td align="center" style="width: 13%;">
                                                    <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                                        <input type="text" class="form-control" id="seccion_municipal" name="seccion_municipal" size="17" value="<?php echo $proforma->seccion_municipal ?>">
                                                    </div>
                                                </td>

                                                <td align="center" style="width: 12%;">
                                                    <div class="col-lg-11 col-md-12">
                                                        <div class="form-group row" style="font-size: 11px; height: 15px; text-align: right;">
                                                           <label class="control-label text-right col-md-4">PROVINCIA</label>
                                                        </div>
                                                    </div>            
                                                </td>
                                                <td align="center" style="width: 26%;">
                                                    <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                                        <input type="text" id="provincia" name="provincia" size="17.5" value="<?php echo $proforma->provincia ?>">
                                                    </div>
                                                </td>
                                                
                                                
                                            </tr>

                                       </table>

                                       <!-- desde aqui -->

                                       <table width="100%">
                                            <tr>
                                                <td align="left" style="width: 20%;;">
                                                    <div class="col-lg-11 col-md-12">
                                                        <div class="form-group row" style="font-size: 11px; height: 15px; text-align: right;">
                                                            <label class="control-label text-right col-md-3">DEPARTAMENTO</label>
                                                        </div>
                                                    </div>            
                                                </td>
                                                <td align="center" style="width: 15%;">
                                                    <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                                        <input type="text" class="form-control" id="departamento" name="departamento" size="10" value="<?php echo $proforma->departamento ?>">
                                                    </div>
                                                </td>

                                                <td align="center" style="width: 13%;">
                                                    <div class="col-lg-11 col-md-12">
                                                        <div class="form-group row" style="font-size: 11px; height: 15px; text-align: right;">
                                                            <label class="control-label text-right col-md-3">CODIGO CATASTRAL</label>
                                                            
                                                        </div>
                                                    </div>            
                                                </td>
                                                <td align="center" style="width: 23%;">
                                                    <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                                        <input type="text" id="codigo_catastral" name="codigo_catastral" size="18" value="<?php echo $proforma->codigo_catastral ?>">
                                                    </div>
                                                </td>
                                                
                                                
                                            </tr>

                                       </table>

                                       <table width="100%">
                                            <tr>
                                                <td align="left" style="width: 20%;">
                                                    <div class="col-lg-11 col-md-12">
                                                        <div class="form-group row" style="font-size: 11px; height: 15px; text-align: right;">
                                                            <label class="control-label text-right col-md-3">FECHA</label>
                                                        </div>
                                                    </div>            
                                                </td>
                                                <td align="center" style="width: 15%; ">
                                                    <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                                        <input type="text" class="form-control" id="fecha" name="fecha" size="10" value="<?php echo $proforma->fecha ?>">
                                                    </div>
                                                </td>

                                                <td align="center" style="width: 13%; ">
                                                    <div class="col-lg-11 col-md-12">
                                                        <div class="form-group row" style="font-size: 11px; height: 15px; ">
                                                            <label>MATRICULA FOLIO REAL</label>
                                                            
                                                        </div>
                                                    </div>            
                                                </td>
                                                <td align="center" style="width: 23%; ">
                                                    <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                                        <input type="text" id="matricula_folio_real" name="matricula_folio_real" size="18" value="<?php echo $proforma->matricula_folio_real ?>">
                                                    </div>
                                                </td>
                                                
                                                
                                            </tr>

                                       </table>

                                       <table width="100%">
                                            <tr>
                                                <td align="left" style="width: 20%;;">
                                                    <div class="col-lg-11 col-md-12">
                                                        <div class="form-group row" style="font-size: 11px; height: 7px; text-align: right;">
                                                            <label class="control-label text-right col-md-3">VALIDO POR</label>
                                                        </div>
                                                    </div>            
                                                </td>
                                                <td align="center" style="width: 15%;">
                                                    <div class="col-md-9" style="font-size: 11px; height: 7px;">
                                                        <input type="text" class="form-control" id="valido_por" name="valido_por" size="10" value="<?php echo $proforma->valido_por ?>">
                                                    </div>
                                                </td>

                                                <td align="center" style="width: 13%;">
                                                    <div class="col-lg-11 col-md-12">
                                                        <div class="form-group row" style="font-size: 11px; height: 7px; text-align: right;">
                                                            <label class="control-label text-right col-md-3">USO DEL PREDIO</label>
                                                            
                                                        </div>
                                                    </div>            
                                                </td>
                                                <td align="center" style="width: 23%;">
                                                    <div class="col-md-9" style="font-size: 11px; height: 7px;">
                                                        <input type="text" id="uso_predio" name="uso_predio" size="18" value="<?php echo $proforma->uso_predio ?>">
                                                    </div>
                                                </td>
                                                
                                                
                                            </tr>

                                       </table>

                                       <!-- hasta aqui -->

                                       <table width="100%">
                                            <tr>
                                                <td align="left" style="width: 28%;">
                                                    <h3 style="font-size: 11px; height: 5px;"><b>RUBRO 3</b></h3>         
                                                </td>
                                                <td align="left" style="width: 72%;">
                                                    <h3 style="font-size: 11px; height: 5px;"><b>INFORMACI&Oacute;N</b></h3>
                                                </td>
                                            </tr>
                                        </table>

                                        <table width="100%">
                                            <tr>
                                                <td align="left" style="width: 28%;">
                                                    <div class="col-lg-11 col-md-12">
                                                        <div class="form-group row" style="font-size: 11px; height: 15px; text-align: right;">
                                                            <label class="control-label text-right col-md-12">TIPO DE TRAMITE</label>
                                                            
                                                        </div>
                                                    </div>            
                                                </td>
                                                <td align="center" style="width: 72%;">
                                                    <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                                        <input type="text" class="form-control" id="tipo_tramite" size="55" name="tipo_tramite" value="<?php echo $proforma->tipo_tramite ?>">
                                                    </div>
                                                </td>
                                                
                                            </tr>

                                       </table>

                                       <table width="100%">
                                            <tr>
                                                <td align="left" style="width: 18%;">
                                                    <div class="col-lg-11 col-md-12">
                                                        <div class="form-group row" style="font-size: 11px; height: 15px; text-align: right;">
                                                            <label class="control-label text-right col-md-5">A</label>
                                                        </div>
                                                    </div>            
                                                </td>
                                                <td align="center" style="width: 12%;">
                                                    <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                                        <input type="text" class="form-control" id="a" name="a" size="25" value="<?php echo $proforma->a ?>">
                                                    </div>
                                                </td>

                                                <td align="center" style="width: 8%;">
                                                    <div class="col-lg-11 col-md-12">
                                                        <div class="form-group row" style="font-size: 11px; height: 15px; text-align: right;">
                                                           <label class="control-label text-right col-md-4">CI.</label>
                                                        </div>
                                                    </div>            
                                                </td>
                                                <td align="center" style="width: 26%;">
                                                    <div class="col-md-9" style="font-size: 11px; height: 15px;">
                                                        <input type="text" class="form-control" id="ci" name="ci" size="10" value="<?php echo $proforma->ci ?>">
                                                    </div>
                                                </td>
                                                
                                                
                                                
                                            </tr>

                                       </table>

                                       <table width="100%">
                                            <tr>
                                                <td align="left" style="width: 28%;">
                                                    <div style="font-size: 11px; height: 5px; text-align: right;">
                                                        <label>METROS CONSTRUIDOS</label>
                                                    </div>     
                                                </td>
                                                <td align="center" style="width: 15%;">
                                                    <div style="font-size: 11px; height: 15px; ">
                                                        <input type="text" name="metros_construidos" size="10" value="<?php echo $proforma->metros_construidos ?>">
                                                    </div>
                                                </td>
                                                <td align="center" style="width: 57%;">
                                                    <div style="float: left;">
                                                        m&sup2;
                                                    </div>
                                                </td>
                                               
                                            </tr>

                                        </table>
                                        <?php $i=4;?>
                                        <?php foreach ($rubros as $valor) { ?>
                                         <table width="100%">
                                            <tr>
                                                <td align="left" style="width: 100%;">
                                                    <div class="form-group row" style="font-size: 11px; line-height: 5px;">
                                                        <label class="control-label text-right col-md-3"><b><?php echo 'RUBRO '.$i; ?></b></label>
                                                    </div>     
                                                </td>
                                            </tr>
                                        </table>

                                        <table width="100%">
                                            <tr>
                                                <td align="left" style="width: 70%;">
                                                    <div class="form-group row" style="font-size: 11px; line-height: 5px;">
                                                        <label class="control-label text-right col-md-3"><?php echo strtoupper($valor->rubro) ?></label>
                                                    </div>  
                                                </td>
                                                <td align="left" style="width: 70%;">
                                                    <div class="form-group row" style="font-size: 11px; line-height: 5px;">
                                                        <label class="control-label text-right col-md-3">...........................................................................................  Bs.</label>
                                                    </div>  
                                                </td>
                                                <td align="center" style="width: 30%;">
                                                    <div class="col-md-3" style="font-size: 11px; line-height: 10px;">
                                                        <input type="text" class="form-control" id="linea_nivel" name="linea_nivel" value="<?php echo $valor->total ?>">
                                                    </div> 
                                                </td>
                                               
                                            </tr>

                                        </table>
                                        <?php $i++;?>

                                            
                                       <?php 
                                                } ?>



                                       
                                         
                                        
                                            
                                  
                                         
                                        <table width="100%">
                                            <tr>
                                                <td align="left" style="width: 5%;">
                                                   
                                                </td>
                                                <td align="left" style="width: 18.5%; height: 1">
                                                      <div class="form-group row" style="font-size: 71%; ">
                                                        <label class="control-label text-right col-md-3"><b>TOTAL A PAGAR POR SERVICIOS TECNICOS PRESTADOS Bs.</b></label>
                                                    </div>    
                                                </td>
                                                <td align="center" style="width: 10%; height: 15px;">
                                                    <div class="col-md-3" style="font-size: 11px; line-height: 10px;">
                                                        <input type="text" class="form-control" id="total" name="total" value="<?php echo $proforma->total ?>">
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                        <table width="100%">
                                            <tr>
                                                <td align="left" style="width: 50%;">
                                                   
                                                </td>
                                                <td align="left" style="width: 50%; ">
                                                      <div class="form-group row" style="font-size: 71%; ">
                                                        <label class="control-label text-right col-md-3"><?php echo $totales; ?></label>
                                                    </div>    
                                                </td>
                                            </tr>
                                        </table>
                                        <table width="100%">
                                            <tr>
                                                <td align="left" style="width: 70%;">
                                                   
                                                </td>
                                                <td align="left" style="width: 30%; ">
                                                      <div class="form-group row" style="font-size: 71%; line-height: 5px;">
                                                        <label class="control-label text-right col-md-3"><?php echo $dia_l.', '.$dia.' de '.$mes_l.' de '.$anio; ?> </label>
                                                    </div>    
                                                </td>
                                            </tr>
                                        </table>
                                        <table width="100%">
                                            <tr>
                                                <td align="center" style="width: 33%;">
                                                   <div class="form-group row" style="font-size: 71%; line-height: 70px;">
                                                        <label class="control-label text-right col-md-3">INTERESADO</label>
                                                    </div>   
                                                </td>
                                                <td align="center" style="width: 33%; height: 15px;">
                                                    <div class="form-group row" style="font-size: 71%; line-height: 70px;">
                                                        <label class="control-label text-right col-md-3">U. CATRASTO-CART.</label>
                                                    </div>    
                                                </td>
                                                <td align="center" style="width: 33%; height: 15px;">
                                                      <div class="form-group row" style="font-size: 71%; line-height: 70px;">
                                                        <label class="control-label text-right col-md-3">SECRT. MUN. DEP. TECNICO</label>
                                                    </div>    
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</div>
</body>
</html>



