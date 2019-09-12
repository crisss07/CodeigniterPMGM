<<<<<<< Updated upstream
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">ASIGNADOS</h4></h4>
                        <?php //vdebug($mis_tramites, true, false, true); ?>
                        <table id="tabla_din" class="table table-bordered table-striped" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>FECHA</th>
                                    <th>CITE</th>
                                    <th>SOLICITANTE</th>
                                    <th>TIPO DE SOLICITANTE</th>
                                    <th>OBSERVACIONES</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>FECHA</th>
                                    <th>CITE</th>
                                    <th>SOLICITANTE</th>
                                    <th>TIPO DE SOLICITANTE</th>
                                    <th>OBSERVACIONES</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach ($mis_tramites as $mt): ?>
                                    <tr>
                                        <td>
                                            <?php 
                                                $fecha_mod = explode(".", $mt->fec_creacion); 
                                                echo $fecha_mod[0]; 
                                            ?>
                                        </td>
                                        <td><?php echo $mt->cite; ?></td>
                                        <td><?php echo $mt->remitente; ?></td>
                                        <td><?php echo $mt->tipo_solicitante; ?></td>
                                        <td><?php echo $mt->observaciones; ?></td>
                                        <!-- <td><?php //echo $mt->codcatas_anterior; ?></td> -->
                                        <td>
                                            <div class="btn-group btn-group-xs" role="group">
                                               <!--  <a href="<?php //echo base_url(); ?>derivaciones/nuevo/<?php //echo $mt->tramite_id; ?>" class="btn btn-success footable-edit" title="Derivar">
                                                    <span class="fas fa-paper-plane" aria-hidden="true"></span>
                                                </a> -->
                                            
                                                <?php $valor=$this->db->query("SELECT * FROM tramite.derivacion WHERE tramite_id='$mt->tramite_id'")->row(); ?>
                                                <?php if ($valor != NULL){ ?>
                                                    <a href="<?php echo base_url();?>Tipo_tramite/seguimiento/<?php echo $mt->tramite_id;?>" class="btn btn-primary footable-edit" title="Ver">
                                                    <span class="fas fa-bars" aria-hidden="true"></span>
                                                </a>
                                                
                                                <?php }else{ ?>
                                                    <a href="<?php echo base_url(); ?>Derivaciones/nuevo/<?php echo $mt->tramite_id; ?>" class="btn btn-success footable-edit" title="Derivar">
                                                        <span class="fas fa-paper-plane" aria-hidden="true"></span>
                                                    </a>
                                                    <a href="<?php echo base_url(); ?>Tipo_tramite/ver/<?php echo $mt->tramite_id; ?>" class="btn btn-warning footable-edit" title="Editar" >
                                                    <span class="fas fa-edit" aria-hidden="true"></span></a>
                                                    <a href="<?php echo base_url(); ?>Tipo_tramite/eliminar_tramite/<?php echo $mt->tramite_id;?>" type="button" class="eliminarorganigrama btn btn-danger footable-delete" title="Eliminar" >
                                                        <span class="fas fa-trash-alt" aria-hidden="true"></span>
                                                    </a>
                                                <?php } ?>
                                                <a href="<?php echo base_url(); ?>Pdf_controller/pdf/<?php echo $mt->tramite_id; ?>" class="btn btn-info footable-edit" title="Imprimir" target='_blank'>
                                                    <span class="fas fa-print" aria-hidden="true"></span>
                                                </a>
                                                
                                                <a href="<?php echo base_url(); ?>Pdf_controller/ruta_pdf/<?php echo $mt->tramite_id; ?>" class="btn btn-success footable-edit" title="Hoja de ruta" target="_blank">
                                                    <span class="fas fa-print" aria-hidden="true"></span>
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
    $('.eliminarorganigrama').on("click", function(e) {
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