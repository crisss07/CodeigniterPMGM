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
                        <h4 class="card-title">ASIGNADOS</h4></h4>
                        <?php //vdebug($mis_tramites, true, false, true); ?>
                        <table id="bandeja_entrada" class="table table-bordered table-striped" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>FECHA REGISTRO</th>
                                    <th>CITE</th>
                                    <th>REMITENTE</th>
                                    <th>REFERENCIA</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>FECHA REGISTRO</th>
                                    <th>CITE</th>
                                    <th>REMITENTE</th>
                                    <th>REFERENCIA</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach ($mis_tramites as $key => $mt): ?>
                                  <tr>
                                    <td><?php echo ++$key; ?> <?php //echo $mt->derivacion_id; ?></td>
                                    <td>
                                      <?php 
                                          $fecha_mod = explode(".", $mt->fec_creacion); 
                                          echo $fecha_mod[0]; 
                                      ?>
                                    </td>
                                    <td><?php echo $mt->cite; ?></td>
                                    <td>
                                        <?php 
                                            // echo $mt->fuente; 
                                            $organigrama_persona = $this->db->get_where('tramite.organigrama_persona', array('organigrama_persona_id'=>$mt->fuente))->result_array();
                                            $persona = $this->db->get_where('persona', array('persona_id'=>$organigrama_persona[0]['persona_id']))->result_array();
                                            // vdebug($persona, false, false, true);
                                            echo $persona[0]['nombres'].'&nbsp;';
                                            echo $persona[0]['paterno'].'&nbsp;';
                                            echo $persona[0]['materno'].'&nbsp;';
                                        ?>
                                    </td>
                                    <!-- <td><?php //echo $mt->codcatas_anterior; ?></td> -->
                                    <td><?php echo $mt->descripcion; ?></td>
                                    <td>
                                        <div class="btn-group btn-group-xs" role="group">
                                            <a href="<?php echo base_url(); ?>derivaciones/nuevo/<?php echo $mt->tramite_id; ?>" class="btn btn-success footable-edit" title="Derivar">
                                              <span class="fas fa-paper-plane" aria-hidden="true"></span>
                                            </a>
                                            <a href="<?php echo base_url();?>derivaciones/archivar/<?php echo $mt->tramite_id;?>" class="btn btn-warning footable-edit" title="Archivar">
                                                <span class="fas fa-archive" aria-hidden="true"></span>
                                            </a>
                                            <a href="<?php echo base_url(); ?>derivaciones/ver/<?php echo $mt->tramite_id; ?>" class="btn btn-primary footable-edit" title="Seguimiento">
                                                <span class="fas fa-bars" aria-hidden="true"></span>
                                            </a>
                                            <!-- <a href="#" type="button" class="btn btn-danger footable-delete" title="Eliminar">
                                                <span class="fas fa-trash-alt" aria-hidden="true"></span>
                                            </a> -->
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
<!-- ============================================================== -->

<!-- This is data table -->
<script src="<?php echo base_url(); ?>public/assets/plugins/datatables/datatables.min.js"></script>
    <!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>

<script type="text/javascript">
       $(function() {
           // $('#bandeja_entrada').DataTable();
           $('#bandeja_entrada').DataTable({
               "oLanguage": {
                   "sUrl": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
               },
           });
           $(document).ready(function() {
               var table = $('#bandeja_entrada_a').DataTable({
                   "columnDefs": [{
                       "visible": false,
                       "targets": 2
                   }],
                   "order": [
                       [2, 'asc']
                   ],
                   "displayLength": 25,
                   "drawCallback": function(settings) {
                       var api = this.api();
                       var rows = api.rows({
                           page: 'current'
                       }).nodes();
                       var last = null;
                       api.column(2, {
                           page: 'current'
                       }).data().each(function(group, i) {
                           if (last !== group) {
                               $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                               last = group;
                           }
                       });
                   }
               });
               // Order by the grouping
               $('#example tbody').on('click', 'tr.group', function() {
                   var currentOrder = table.order()[0];
                   if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                       table.order([2, 'desc']).draw();
                   } else {
                       table.order([2, 'asc']).draw();
                   }
               });
           });
       });
       $('#example23').DataTable({
           dom: 'Bfrtip',
           buttons: [
               'copy', 'csv', 'excel', 'pdf', 'print'
           ]
       });
       $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');
</script>