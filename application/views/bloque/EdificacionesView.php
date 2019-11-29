<link href="<?php echo base_url(); ?>public/assets/plugins/wizard/steps.css" rel="stylesheet">
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card wizard-content">

                    <div class="card-body">


                        <div class="row page-titles">
                            <div class="col-md-6 col-8 align-self-center">
                                <h4 class="card-title">Datos Edificaciones</h4>
                                <h6 class="card-subtitle">Material de Construccion</h6>
                            </div>
                            <div class="col-md-6 col-4 align-self-center">
                                <button class="btn float-right hidden-sm-down btn-success">Cod. Catastral: <?php echo $cod_catastral; ?>
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <button class="btn btn-block btn-info" type="button"><span class="btn-label">1</span> REGISTRO DEL PREDIO</button>
                            </div>

                            <div class="col-md-4">
                                <button class="btn btn-block btn-info " type="button"><span class="btn-label">2</span> REGISTRO DE BLOQUES</button>
                            </div>

                            <div class="col-md-4">
                                <button class="btn btn-block btn-outline-info waves-effect waves-light" type="button"><span class="btn-label">3</span> REGISTRO DE PROPIETARIO</button>
                            </div>
                        </div>
                        <p></p>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 60%;height:15px;" role="progressbar""> 60% 
                                </div>
                            </div>
                            <p></p>
                         <!-- Step 1 -->
                         <h2></h2>
                         <a  class=" btn btn-success" href="<?php echo site_url('Edificacion/adicionar'); ?>/<?php echo $predio_id; ?>" align="right"><i class="mdi mdi-plus"></i> Agregar Bloque</a>

                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Bloques Registrados</h4>

                                        <div class="card-body">
                                <h4 class="card-title">A basic message <small>(Click on image)</small> </h4>
                            
                            </div>


                                        <h6 class="card-subtitle">...</h6>

                                     
                                        <div class="table-responsive m-t-40">
                                            <table id="bloque_table" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Codcatastro</th>
                                                        <th>Nro de bloque</th>
                                                        <th>Nombre</th>
                                                        <th>Estado fisico</th>
                                                        <th>Año construccion</th>
                                                        <th>Altura</th>
                                                        <th>Destino</th>
                                                        <th>Uso</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($bloques as $row) { ?>
                                                    <tr>
                                                        <td scope="row"><?php echo $cod_catastral; ?></td>
                                                        <td><?php echo $row->nro_bloque; ?></td>
                                                        <td><?php echo $row->nom_bloque; ?></td>
                                                        <td><?php echo $row->estado_fisico; ?></td>
                                                        <td><?php echo $row->anio_cons; ?></td>
                                                        <td><?php echo $row->altura; ?></td>
                                                        <td><?php echo $row->desc_bloque_dest; ?></td>
                                                        <td><?php echo $row->desc_bloque_uso; ?> </td>
                                                        <td>
                                                            <a <?php echo $verifica['modificacion1'];?>="<?php echo site_url('Edificacion/update'); ?>/<?php echo $row->bloque_id; ?>/<?php echo $row->predio_id; ?>"><button type="button" class="btn btn-warning"><span class="fas fas fa-edit" aria-hidden="true"></span></button></a>

                                                            <a <?php echo $verifica['baja'];?>="<?php echo site_url('Edificacion/delete'); ?>/<?php echo $row->bloque_id; ?>/<?php echo $row->predio_id; ?>"><button type="button" class="btn btn-danger" ><span class="fas fa-trash-alt" aria-hidden="true"></span></button></a>
                                                       

                                                               <button type="submit" class="btn btn-danger remove"  >
                                                                <span class="fas fa-trash-alt" aria-hidden="true"></span>
                                                              </button>
                                                        </td>
                                                    </tr>
                                                    <?php 
                                                } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div align="right">
                                            <a class="btn btn-success" href="<?php echo site_url('Edificacion/next'); ?>/<?php echo $predio_id ?>" align="right">Siguiente</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== --> 

      
        