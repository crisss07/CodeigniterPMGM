<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">ASIGNADOS</h4></h4>
                        <table id="tabla_din" class="table table-bordered table-striped" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>FECHA</th>
                                    <th>CITE</th>
                                    <th>NUMERO DE TRAMITE</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>FECHA</th>
                                    <th>CITE</th>
                                    <th>NUMERO DE TRAMITE</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach ($mis_tramites as $mt): ?>
                                    <tr>
                                        <td>
                                            <!-- <?php 
                                                $fecha_mod //= explode(".", $mt->fec_creacion); 
                                                //echo $fecha_mod[0]; 
                                            ?> -->
                                            <?php echo $mt->fecha_informe	; ?>
                                        </td>
                                        <td><?php echo $mt->cite; ?></td>
                                        <td><?php echo $mt->nro_tramite; ?></td>	
                                        <td>
                                            <div class="btn-group btn-group-xs" role="group">                                                
                                                <a href="<?php echo base_url();?>reportes_m/pdf_nc/<?php echo $mt->informe_tecnico_id;?>" class="btn btn-success footable-edit" title="Certificado de no catastro" target="_blank">
                                                    <span class="fas fa-print" aria-hidden="true"></span>
                                                </a>
                                                <a href="<?php echo base_url();?>reportes_m/pdf_j/<?php echo $mt->informe_tecnico_id;?>" class="btn btn-warning footable-edit" title="certificado de jurisdiccion" target="_blank">
                                                    <span class="fas fa-print" aria-hidden="true"></span>
                                                </a>
                                                <a href="<?php echo base_url();?>reportes_m/pdf_sup/<?php echo $mt->informe_tecnico_id;?>" class="btn btn-info footable-edit" title="certificado de superficie" target="_blank">
                                                    <span class="fas fa-print" aria-hidden="true"></span>
                                                </a>
                                                <a href="<?php echo base_url();?>reportes_m/pdf_urb/<?php echo $mt->informe_tecnico_id;?>" class="btn btn-primary footable-edit" title="certificado de area urbana" target="_blank">
                                                    <span class="fas fa-print" aria-hidden="true"></span>
                                                </a>
                                                <a href="<?php echo base_url();?>tipo_tramite/editar_informe/<?php echo $mt->informe_tecnico_id;?>" class="btn btn-warning footable-edit" title="certificado de area urbana">
                                                    <span class="fas fa-edit" aria-hidden="true"></span>
                                                </a>
                                                <a href="<?php echo base_url();?>tipo_tramite/eliminar_informe/<?php echo $mt->informe_tecnico_id;?>" class="eliminarInforme btn btn-danger footable-delete" title="Eliminar informe" >
                                                    <span class="fas fa-trash-alt" aria-hidden="true"></span>
                                                </a>
                                                <a href="<?php echo base_url(); ?>tipo_tramite/pdf_informe/<?php echo $mt->informe_tecnico_id; ?>" class="btn btn-success footable-edit" title="Hoja de ruta" target="_blank">
                                                    <span class="fas fa-print" aria-hidden="true"></span>
                                                </a>
                                                <a href="<?php echo base_url(); ?>tipo_tramite/nueva_proforma/<?php echo $mt->informe_tecnico_id; ?>" class="btn btn-dark footable-edit" title="Proforma de Pago" target="_blank">
                                                    <span class="fas fa-address-card" aria-hidden="true"></span>
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
<script src="<?php echo base_url(); ?>public/assets/plugins/sweetalert/sweetalert.min.js"></script>
<script type="text/javascript">
    $('.eliminarInforme').on("click", function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        Swal({
        title: 'Está seguro?',
        text: "No podrá recuperar una vez sea eliminado!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: "No, Cancelar!",
        confirmButtonText: 'Si, Eliminarlo!'
        }).then((result) => {
            if (result.value) {
                window.location.replace(url);
                swal("Eliminado!", "Su información ha sido eliminado!", "success");
            }else{
                swal("Cancelado", "Su información está a salvo! :)", "error");
            }
        });
    });
</script>