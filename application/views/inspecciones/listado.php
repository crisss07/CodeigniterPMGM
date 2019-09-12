
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
                                    <th>PERSONA</th>
                                    <th>TIPO_ASIGNACION</th>
                                    <th>INICIO</th>
                                    <th>FIN</th>
                                    <th>ACCION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($asignacion as $asig): ?>
                                    <tr>
                                        <?php $tra = $this->db->query("SELECT t.cite
                                                                        FROM tramite.tramite t, tramite.tipo_tramite tt
                                                                        WHERE t.tramite_id = $asig->tramite_id 
                                                                        AND t.tipo_tramite_id = tt.tipo_tramite_id")->row();
                                            $tra1 = $tra->cite;
                                          ?>
                                        <td><?php echo $tra1; ?></td>
                                        <?php $var = $this->db->query("SELECT *
                                                                        FROM persona 
                                                                        WHERE persona_id = $asig->persona_id ")->row();
                                                $nombres = $var->nombres;
                                                $paterno = $var->paterno;
                                          ?>
                                        <td><?php echo $nombres; ?> <?php echo $paterno; ?></td>
                                        <?php $var1 = $this->db->query("SELECT *
                                                                        FROM inspeccion.tipo_asignacion 
                                                                        WHERE tipo_asignacion_id = $asig->tipo_asignacion_id ")->row();
                                            $tipo = $var1->tipo;
                                          ?>
                                        <td><?php echo $tipo; ?></td>
                                        <td><?php echo $asig->inicio; ?></td>
                                        <td><?php echo $asig->fin; ?></td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>inspeccion/nuevo/<?php echo $asig->asignacion_id; ?>" class="btn btn-success footable-edit">
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