
<style type="text/css">
    #izquierda{
        padding-left: 10px;
        float:left;
    }
    
    #derecha{
        padding-left: 10px;
        float:left;
    }
</style>

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
                <div class="card">
                    <div class="card-body">
                        ADMINISTRACI&Oacute;N DEL NIVEL <?php $i=1; //echo $data['title']; ?>
                        <div class="card-body wizard-content">
                            <div class="col-lg-2 col-md-4">
                                <button <?php echo $verifica['alta']; ?> type="button" class="btn btn-block btn-lg btn-success" data-toggle="modal" data-target="#Modal_insert">Nuevo Nivel</button>
                            </div><div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                   <table id="tabla_din1" class="table table-bordered table-striped" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Descripci&oacute;n</th>
                                                <th>Alias</th>
                                                <th>Coeficiente</th>
                                                <th>Acci&oacute;n</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($nivel as $lis){
                                                 $datos = $lis->nivel_id."||".
                                                         $lis->descripcion."||".
                                                         $lis->alias."||".
                                                         $lis->coeficiente;
                                            ?>
                                            <tr>
                                                <td><?php echo $i++;?></td>
                                                <td><?php echo $lis->descripcion;?></td>
                                                <td><?php echo $lis->alias;?></td>
                                                <td><?php echo $lis->coeficiente;?></td>
                                                
                                                <td>

                                                    <button <?php echo $verifica['modificacion']; ?> type="button" class="btn btn-warning footable-edit" data-toggle="modal" data-target="#modalEdicion" onclick="agregarform('<?php echo $datos ?>')">
                                                            <span class="fas fa-pencil-alt" aria-hidden="true">
                                                            </span>
                                                    </button> 
                                                    <a <?php echo $verifica['baja'];?>="<?= base_url('nivel/eliminar/'. $lis->nivel_id); ?>" type="button" class="btn btn-danger footable-delete">
                                                        <span class="fas fa-trash-alt" aria-hidden="true">
                                                        </span>
                                                    </a>


                                                </td>
                                            </tr>
                                        <?php 
                                         }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                            <div class="col-lg-6">
                        
                    </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

              
        <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Editar Ubicaci&oacute;n</h4>
                    </div>
                    <div class="modal-body">
                        <!--<form action="<?php echo base_url();?>nivel/update" method="POST">-->
                        <?php echo form_open('nivel/update', array('method'=>'POST')); ?>
                            <div class="form-group">
                                <input type="text" hidden="" id="nivel_id" name="nivel_id">
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Descripci&oacute;n</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Alias</label>
                                <input type="text" class="form-control" id="alias" name="alias" >
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Coeficiente</label>
                                <input type="integer" class="form-control" id="coeficiente" name="coeficiente">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="modal fade" id="Modal_insert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Insertar Nueva Ubicaci&oacute;n</h4>
                    </div>
                    <div class="modal-body">
                        <!--<form action="<?php echo base_url();?>nivel/insertar" method="POST">-->
                        <?php echo form_open('nivel/insertar', array('method'=>'POST')); ?> 
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Descripci&oacute;n</label>
                                <input type="text" class="form-control" id="recipient-name1" name="descripcion">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Alias</label>
                                <input type="text" class="form-control" id="recipient-name1" name="alias">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Coeficiente</label>
                                <input type="integer" class="form-control" id="recipient-name1" name="coeficiente">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
       


        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <script>
        function agregarform(datos)
        {
             d=datos.split('||');
              $('#nivel_id').val(d[0]);
              $('#descripcion').val(d[1]);
              $('#alias').val(d[2]);
              $('#coeficiente').val(d[3]);
        }

    </script>


      <!-- Style switcher -->
    <!-- ============================================================== -->

    <script src="<?php echo base_url(); ?>public/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <!-- This is data table -->
    <script src="<?php echo base_url(); ?>public/assets/plugins/datatables/datatables.min.js"></script>
        <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script>
      $('#tabla_din1').DataTable( {
     
        "oLanguage": {
            "sUrl": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
    });
    </script>