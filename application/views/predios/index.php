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
                        <h4 class="card-title">LISTADO PREDIOS</h4>
                        <?php //vdebug($listado_predios, true, false, true); ?>
                        <table id="tabla_din" class="table table-bordered table-striped" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>FECHA REGISTRO</th>
                                    <th>COD CATASTRAL</th>
                                    <th>GEOCODIGO</th>
                                    <th>DIRECCION</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>FECHA REGISTRO</th>
                                    <th>COD CATASTRAL</th>
                                    <th>GEOCODIGO</th>
                                    <th>DIRECCION</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $contador = 1; ?>
                                <?php foreach ($listado_predios as $lp): ?>
                                    <tr>
                                        <td><?php echo $contador++; ?></td>
                                        <td>
                                            <?php 
                                                $fecha_mod = explode(".", $lp['fec_creacion']); 
                                                echo $fecha_mod[0]; 
                                            ?>
                                        </td>
                                        <td><?php echo $lp['codcatas']; ?></td>
                                        <td><?php echo $lp['geocodigo']; ?></td>
                                        <td>
                                            <?php 
                                                $this->db->where('direccion_id', $lp['direccion_id']);
                                                $query = $this->db->get('catastro.direccion')->result_array();
                                                // print_r($query);
                                                // vdebug($query, false, false, true);
                                            ?>
                                            <?php //echo $lp['codcatas']; ?></td>
                                        <!-- <td><?php // echo $lp->nro_inmueble; ?></td>
                                        <td><?php // echo $lp->distrito; ?></td>
                                        <td><?php // echo $lp->manzana; ?></td>
                                        <td><?php // echo $lp->predio; ?></td> -->
                                        <td>
                                            <div class="btn-group btn-group-xs" role="group">
                                                <?php if ($lp['activo'] == 1): ?>
                                                    <a <?php echo $verifica['modificacion1'];?>="<?php echo base_url(); ?>predios/editar/<?php echo $lp['predio_id']; ?>" class="btn btn-warning footable-edit">
                                                        <span class="fas fas fa-edit" aria-hidden="true"></span>
                                                    </a>
                                                <?php elseif($lp['activo'] == 2): ?>
                                                    <a <?php echo $verifica['modificacion1'];?>="<?php echo base_url(); ?>edificacion/nuevo/<?php echo $lp['predio_id']; ?>" class="btn btn-primary footable-edit">
                                                        <span class="fas fas fa-edit" aria-hidden="true"></span>
                                                    </a>
                                                    
                                                <?php else: ?>
                                                    <a <?php echo $verifica['modificacion1'];?>="<?php echo base_url(); ?>predios/editar_propietario/<?php echo $lp->predio_id; ?>" class="btn btn-success footable-edit">
                                                        <span class="fas fas fa-edit" aria-hidden="true"></span>
                                                    </a>
                                                <?php endif ?>

                                                <a <?php echo $verifica['imprimir'];?>="<?php echo base_url(); ?>predios/certificado/<?php echo $lp['predio_id']; ?>" class="btn btn-success footable-edit">
                                                    <span class="fas fas fa-print" aria-hidden="true"></span>
                                                </a> 

                                                <a href="<?php echo base_url(); ?>predios/form_fusion" class="btn btn-dark footable-edit" title="Fusionar" >
                                                    <span class="fas fas fa-object-group" aria-hidden="true"></span>
                                                </a> 
                                                
                                                <a href="<?php echo base_url(); ?>predios/form_fusion" class="btn btn-primary footable-edit" title="Particionar" >
                                                    <span class="fas fas fa-object-ungroup" aria-hidden="true"></span>
                                                </a> 

                                                <a <?php echo $verifica['imprimir'];?>="<?php echo base_url(); ?>Reporteseicu/certificacion_bloques/<?php echo $lp['predio_id']; ?>" class="btn btn-info footable-edit" title="CERTIFICACION CATASTRAL" target="_blank">
                                                    <span class="fas fas fa-print" aria-hidden="true"></span>
                                                </a> 

                                                <a <?php echo $verifica['imprimir'];?>="<?php echo base_url(); ?>Reporteseicu/certificacion/<?php echo $lp['predio_id']; ?>" class="btn btn-warning footable-edit" title="CERTIFICACION TECNICA"  target="_blank">
                                                    <span class="fas fas fa-print" aria-hidden="true"></span>
                                                </a> 

                                                <a <?php echo $verifica['baja'];?>="" type="button" class="btn btn-danger footable-delete">
                                                    <span class="fas fa-trash-alt" aria-hidden="true"></span>
                                                </a>
                                            </div>
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