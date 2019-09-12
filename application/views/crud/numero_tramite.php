<!--alerts CSS -->
<link href="<?php echo base_url(); ?>public/assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">

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
                        ADMINISTRACI&Oacute;N N&Uacute;MERO TRAMITE <?php $i=1; //echo $data['title']; ?>
                        <div class="card-body wizard-content">

                            <div class="col-lg-2 col-md-4">

                                
                                <button <?php echo $verifica['alta']; ?> type="button" class="btn btn-block btn-lg btn-success" data-toggle="modal" data-target="#Modal_insert">Nuevo N&uacute;mero Tramite</button>
                            </div><div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tabla_din1" class="table table-bordered table-striped" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tipo</th>
                                                <th>Gesti&iacute;n</th>
                                                <th>Correlativo</th>
                                                <th>Observaciones</th>
                                                <th>Estado</th>
                                                <th>Acci&oacute;n</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($numero_tramite as $lis){
                                                $datos = $lis->numero_tramite_id."||".
                                                         $lis->tipo."||".
                                                         $lis->gestion."||".
                                                         $lis->correlativo."||".
                                                         $lis->observaciones;
                                            ?>
                                            <tr>
                                                <td><?php echo $i++;?></td>
                                                <td><?php echo $lis->tipo;?></td>
                                                <td><?php echo $lis->gestion;?></td>
                                                <td><?php echo $lis->correlativo;?></td>
                                                <td><?php echo $lis->observaciones;?></td>
                                                <td>
                                                    <?php if ($lis->activo == '1') {

                                                        $var = '1';
                                                        $color = 'success';
                                                        $mensaje = 'Activo';
                                                    } 
                                                    else
                                                    {
                                                        $var = '0';
                                                        $color = 'danger';
                                                        $mensaje = 'Inactivo';
                                                    }

                                                    ?>
                                                    <a <?php echo $verifica['baja'];?>="<?= base_url('numero_tramite/activo/'. $lis->numero_tramite_id); ?>" type="button" class="btn btn-<?php echo $color ?>"><?php echo $mensaje ?>
                                                        
                                                    </a>  

                                                </td>
                                                <td>
                                                    <button <?php echo $verifica['modificacion']; ?> type="button" class="btn btn-warning footable-edit" data-toggle="modal" data-target="#modalEdicion" onclick="agregarform('<?php echo $datos ?>')">
                                                            <span class="fas fa-pencil-alt" aria-hidden="true">
                                                            </span>
                                                    </button> 
                                                    
                                                    
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
                        <h4 class="modal-title" id="exampleModalLabel1">Editar N&uacute;mero Tramite</h4>
                    </div>
                    <div class="modal-body">
                        <!--<form action="<?php echo base_url();?>zona_urbana/update" method="POST">-->
                        <?php echo form_open('numero_tramite/update', array('method'=>'POST')); ?>

                            
                            <div class="form-group">
                                <input type="text" hidden="" id="numero_tramite_id" name="numero_tramite_id">
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Tipo</label>
                                <input type="text" class="form-control" id="tipo" name="tipo" value="<?php echo $lis->tipo;?>">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Gesti&oacute;n</label>
                                <input type="text" class="form-control" id="gestion" name="gestion" value="<?php echo $lis->gestion;?>">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Correlativo</label>
                                <input type="text" class="form-control" id="correlativo" name="correlativo" value="<?php echo $lis->correlativo;?>">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Observaciones</label>
                                <input type="text" class="form-control" id="observaciones" name="observaciones" value="<?php echo $lis->observaciones;?>">
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
                        <h4 class="modal-title" id="exampleModalLabel1">Insertar Numero Tramite</h4>
                    </div>
                    <div class="modal-body">
                        <!--<form action="<?php echo base_url();?>zona_urbana/insertar" method="POST">-->
                        <?php echo form_open('numero_tramite/insertar', array('method'=>'POST')); ?>

                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Tipo</label>
                                <input type="text" class="form-control" id="recipient-name1" name="tipo">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Gesti&oacute;n</label>
                                <input type="text" class="form-control" id="recipient-name1" name="gestion">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Correlativo</label>
                                <input type="text" class="form-control" id="recipient-name1" name="correlativo">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Observaciones</label>
                                <input type="text" class="form-control" id="recipient-name1" name="observaciones">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>public/assets/plugins/edit/ubicacionscript.js"></script>

    <script>
        function agregarform(datos)
        {
             d=datos.split('||');
              $('#numero_tramite_id').val(d[0]);
              $('#tipo').val(d[1]);
              $('#gestion').val(d[2]);
              $('#correlativo').val(d[3]);
              $('#observaciones').val(d[4]);
        }

    </script>

     <!-- Sweet-Alert  -->
    <script src="<?php echo base_url(); ?>public/assets/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/plugins/sweetalert/jquery.sweet-alert.custom.js"></script>
    <!-- ============================================================== -->
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
   