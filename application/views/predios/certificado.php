<style type="text/css">
    @media print {
        .left-sidebar {display: none;}
    }
</style>
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body printableArea">
                <?php //vdebug($predio); ?>
                    <!-- <h3><b>INVOICE</b> <span class="float-right">#5669626</span></h3> -->
                    <!-- <hr> -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="float-left">
                                <address>
                                    <!-- <h3> &nbsp;<b class="text-danger">Monster Admin</b></h3> -->
                                    <!-- <b class="text-muted ml-1">La Paz, 28 de febrero de 2019</b> -->
                                        La Paz, 12 de julio de 2019
                                        <br/> Tramite No 321456,
                                        <br/> <b>Certificacion de Datos Tecnicos No. 1245/2019</b>
                                        <br/> Matricula: <?php //echo $ddrr->nro_matricula_folio ?>

                                        <br/> Propietario(s): 
                                        <?php $cont=1 ?>
                                        <?php foreach ($personas as $propietarios) {
                                            if ($cont>1) {
                                                echo ' , '; 
                                            }
                                            echo $propietarios->nombres; echo " ";  echo $propietarios->paterno; echo " "; echo $propietarios->materno;
                                             $cont=$cont+1;
                                        } ?>
                                                      
                                </address>
                            </div>
                            <!-- <div class="float-right text-right">
                                <address>
                                    <h3>To,</h3>
                                    <h4 class="font-bold">Gaala & Sons,</h4>
                                    <p class="text-muted ml-4">E 104, Dharti-2,
                                        <br/> Nr' Viswakarma Temple,
                                        <br/> Talaja Road,
                                        <br/> Bhavnagar - 364002</p>
                                    <p class="mt-4"><b>Invoice Date :</b> <i class="fa fa-calendar"></i> 23rd Jan 2019</p>
                                    <p><b>Due Date :</b> <i class="fa fa-calendar"></i> 25th Jan 2019</p>
                                </address>
                            </div> -->
                        </div>
                    </div>

                    <div class="row" style="text-align: center;">
                        <div class="col-md-12">
                            <b class="text-black" style="font-size: 45pt;">CERTIFICACION TECNICA</b>
                            <br /> DE CONFORMIDAD A LA LEY NO 247/2012 Y LEY DE MODIFICACIONES 803/2016
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            Verificando el sistema informatico de Registro Catastral, el Archivo documentado del Registro Catastral y planos de acuerdo a lo solicitado, se informa.
                            <br /><b class="text-black" style="font-size: 24pt;">LA EXISTENCIA DE REGISTRO CATASTRAL UBICADO EN:</b>
                        </div>
                    </div>

                    <table class="table">
                        <tr>
                            <td>
                                Distrito No: <b><?php echo $predio[0]->distrito; ?></b>
                                <br />Predio: <b><?php echo $predio[0]->predio; ?></b>
                                
                            </td>
                            <td>
                                Sub Distrito No: <b>34</b>
                                <br />Lote No: <b>34</b>
                            </td>
                            <td>
                                Zona: <b>CENTRAL</b>
                                <br>Calle: <b>Innominada</b>
                            </td>
                            <td>
                                Manzana Act: <b>125</b>
                                <br />Organizacion: <b>LOMA PAMPA</b>
                            </td>
                        </tr>
                    </table>

                    <div class="row" style="text-align: center;">
                        <div class="col-md-12">
                            <div class="text-black" style="font-size: 28pt;">CODIGO CATASTRAL:  <?php print_r($predio[0]->codcatas); ?></div>
                        </div>
                    </div>
                    <?php $fotof = $fotos[0]->foto_fachada; ?>
                    <?php $fotop = $fotos[0]->foto_plano_ubi; ?>

                    Segun plan de URBANIZACION aprobado en fecha 16/05/2018 mediante R.M. No. 338/2014 de 21/10/2014 se tiene la siguiente informacion:
                    <table class="d-print-table">
                        <tr>
                            <td style="width: 610px;">
                                <img src="<?php echo base_url("/public/assets/files/predios/$fotop"); ?>" style="width: 610px;">
                                <?php
                                    // $foto_bytea_ubi = pg_unescape_bytea($predio[0]->foto_plano_ubi); 
                                    // $foto_64_ubi = base64_encode($foto_bytea_ubi);
                                ?>
                                <?php //echo "<img src='data:image/jpeg;base64, $foto_64_ubi' width='350px' />"; ?>

                                <br />CROQUIS DEL PREDIO
                                <br />
                                <?php 
                                    // $foto_bytea_fachada = pg_unescape_bytea($predio[0]->foto_fachada); 
                                    // $foto_64_fachada = base64_encode($foto_bytea_fachada);
                                ?>
                                <?php //echo "<img src='data:image/jpeg;base64, $foto_64_fachada' width='350px' />"; ?>
                                <img src="<?php echo base_url("/public/assets/files/predios/$fotof"); ?>" style="width: 610px;">
                                <br />FOTO DE FACHADA
                            </td>
                            <td>
                                <div class="text-black" style="font-size: 18pt; text-decoration: underline;">DATOS TECNICOS</div>
                                <br />RELACION SUPERFICIES
                                <div class="row">
                                    <div class="col-md-6">
                                        Sup Lote No 24
                                    </div>
                                    <div class="col-md-6">
                                        200.00 m
                                    </div>
                                </div>
                                <P>&nbsp;</P>
                                <div class="text-black" style="font-size: 18pt; text-decoration: underline;">LIMITES COLINDANTES</div>
                                <div class="row">
                                    <div class="col-md-6">Norte</div>
                                    <div class="col-md-6">200.00 m</div>
                                </div>
                            </td>
                        </tr>
                    </table>

                    <div class="row" ">
                        <div class="col-md-5">
                        
                        <div class="text-black" style="font-size: 18pt; text-decoration: underline;">DATOS DE BLOQUES
                        </div>            


                    <table class="table table-responsive ">
                                                <thead>
                                                    <tr>
                                                       
                                                        <th><small><i><b>Nro</i></small></th>
                                                        <th> <small><i><b> Nombre</i></small></th>
                                                        <th><small><i><b> Estado fisico</i></small></th>
                                                        <th><small><i><b> Año construccion</i></small></th>                                                     
                                                        <th><small><i><b> Destino</i></small></th>
                                                        <th><small><i><b> Uso</i></small></th>                                                       
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($bloques as $row) { ?>
                                                    <tr>
                                                     
                                                        <td><small><i><?php echo $row->nro_bloque; ?></i></small></td>
                                                        <td><small><i><?php echo $row->nom_bloque; ?></i></small></td>
                                                        <td><small><i><?php echo $row->estado_fisico; ?></i></small></td>
                                                        <td><small><i><?php echo $row->anio_cons; ?></i></small></td>                                                       
                                                        <td><small><i><?php echo $row->desc_bloque_dest; ?></i></small></td>
                                                        <td><small><i><?php echo $row->desc_bloque_uso; ?></i></small> </td>                                                        
                                                    </tr>
                                                    <?php 
                                                } ?>
                                                </tbody>
                                            </table>
                           
                        </div>
                    </div>
                            


               

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            Nota: Se aclara que la manzana S-6985 a la codificacion ANTIGUA, actualemente corresponde a la manzana 125 de acuerdo al Plano General del Area Urbana de La Paz aprobado segun ley Municipal 0159/2016 del 02/09/2016.
                            <br />La presente certificacion no define derecho propietario
                            <br />En cuanto se certifica para fines consiguientes
                        </div>
                    </div>
                    
                    <div class="row">

                        <div class="col-md-12">
                            
                        </div>

                        <div class="col-md-12">
                            <div class="clearfix"></div>
                            <hr>
                            <div class="text-right d-print-none">
                                <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Impresion</span> </button>
                                <a href="<?php echo base_url(); ?>Predios/pdf_certificado/<?php echo $predio[0]->codcatas; ?>" class="btn btn-warning footable-edit" title="Imprimir" >
                                    <span class="fas fa-print" aria-hidden="true"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
</div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->