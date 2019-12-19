
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
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">INSPECCIONES ASIGNADAS</h4></h4>

                        <?php //vdebug($mis_tramites, true, false, true); ?>
                        <table id="tabla_din" class="table table-bordered table-striped" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>TRAMITE</th>
                                    <th>SOLICITANTE</th>
                                    <th>DIRECCION</th>
                                    <th>TIPO_ASIGNACION</th>
                                    <th>INICIO</th>
                                    <th>FIN</th>
                                    <th>ACCION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($asignacion as $asig): ?>
                                    <tr>                                       
                                        <td><?php echo $asig->cite; ?></td>                                    
                                        <td><?php echo $asig->nombres.' '.$asig->paterno.' '.$asig->materno;?></td>  
                                        <td><?php echo $asig->direccion; ?></td>                                    
                                        <td><?php echo $asig->tipo; ?></td>
                                        <td><?php echo $asig->inicio; ?></td>
                                        <td><?php echo $asig->fin; ?></td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>Reporteseicu/ficha_tecnica" class="btn btn-info " title="Registrar Predio" target=_blank>
                                                    <span class="fas fa-file-pdf" aria-hidden="true"></span>
                                            </a> 
                                            <a href="<?php echo base_url(); ?>Predios/registra_predio" class="btn btn-info " title="Registrar Predio">
                                                    <span class="fas fa-external-link-alt" aria-hidden="true"></span>
                                            </a> 
                                            <a href="<?php echo base_url(); ?>inspeccion/nuevo/<?php echo $asig->asignacion_id;?>/<?php echo $asig->tramite_id; ?>/<?php echo $asig->tipo_tramite_id; ?>" title="Concluir Inspecion" class="btn btn-success footable-edit">
                                                    <span class="fas fa-paper-plane" aria-hidden="true"></span>
                                            </a>
                                                                                       
                                        </td>

                                    </tr>    
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ==============================================================