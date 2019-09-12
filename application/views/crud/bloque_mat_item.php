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
                        ADMINISTRACI&Oacute;N BLOQUE GRUPO MATERIAL <?php $i=1; //echo $data['title']; ?>
                        <div class="card-body wizard-content">
                            <div class="col-lg-2 col-md-4">
                                <button <?php echo $verifica['alta']; ?> type="button" class="btn btn-block btn-lg btn-success" data-toggle="modal" data-target="#Modal_insert">Nueva Grupo Material</button>
                            </div><div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                   <table id="tabla_din1" class="table table-bordered table-striped" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                 <th>Grupo Material</th>
                                                <th>Descripci&oacute;n</th>
                                                 <th>Factor</th>
                                                <th>Acci&oacute;n</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($bloque_mat_item as $lis){
                                                $datos = $lis->mat_item_id."||".
                                                         $lis->grupo_mat_id."||".
                                                         $lis->descripcion."||".
                                                         $lis->factor;
                                            ?>
                                            <tr>
                                            <?php $lista = $this->db->get_where('catastro.bloque_grupo_mat', array('grupo_mat_id' => $lis->grupo_mat_id))->row();
                                             ?>
                                                <td><?php echo $i++;?></td>
                                                <td><?php echo $lista->descripcion;?></td>
                                                <td><?php echo $lis->descripcion;?></td>
                                                <td><?php echo $lis->factor;?></td>
                                                <td>

                                                    <button <?php echo $verifica['modificacion']; ?> type="button" class="btn btn-warning footable-edit" data-toggle="modal" data-target="#modalEdicion" onclick="agregarform('<?php echo $datos ?>')">
                                                            <span class="fas fa-pencil-alt" aria-hidden="true">
                                                            </span>
                                                    </button> 
                                                    <a <?php echo $verifica['baja'];?>="<?= base_url('bloque_mat_item/eliminar/'. $lis->mat_item_id); ?>" type="button" class="btn btn-danger footable-delete">
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
                        <h4 class="modal-title" id="exampleModalLabel1">Editar Grupo Material</h4>
                    </div>
                    <div class="modal-body">
                        <!--<form action="<?php echo base_url();?>zona_urbana/update" method="POST">-->
                        <?php echo form_open('bloque_mat_item/update', array('method'=>'POST')); ?>

                            
                            <div class="form-group">
                                <input type="text" hidden="" id="mat_item_id" name="mat_item_id">
                            </div>

                            <div class="form-group">
                                <?php $lista1 = $this->db->query("SELECT * FROM catastro.bloque_grupo_mat  WHERE activo = '1' ORDER BY grupo_mat_id ASC")->result();
                                ?>

                                <label for="recipient-name" class="control-label">Grupo Material</label>
                                 <select class="form-control custom-select"  id="grupo_mat_id" name="grupo_mat_id"  />
                                    <?php foreach ($lista1 as $liss) { ?>
                                        <option value="<?php echo $liss->grupo_mat_id; ?>"><?php echo $liss->descripcion; ?>
                                        </option>
                                   <?php } ?>
                                </select>                                    
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Descripci&oacute;n</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $lis->descripcion;?>">
                            </div>
                            
                             <div class="form-group">
                                <label for="recipient-name" class="control-label">Factor</label>
                                <input type="text" class="form-control" id="factor" name="factor" value="<?php echo $lis->factor;?>">
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
                        <h4 class="modal-title" id="exampleModalLabel1">Insertar Nueva Grupo Material</h4>
                    </div>
                    <div class="modal-body">
                        <!--<form action="<?php echo base_url();?>zona_urbana/insertar" method="POST">-->
                        <?php echo form_open('bloque_mat_item/insertar', array('method'=>'POST')); ?>

                            <div class="form-group">
                                <?php $lista1 = $this->db->query("SELECT * FROM catastro.bloque_grupo_mat  WHERE activo = '1' ORDER BY grupo_mat_id ASC")->result();
                                ?>

                                <label for="recipient-name" class="control-label">Grupo Material</label>
                                 <select class="form-control custom-select"  id="grupo_mat_id" name="grupo_mat_id" />
                                    <?php foreach ($lista1 as $liss) { ?>
                                        <option value="<?php echo $liss->grupo_mat_id; ?>"><?php echo $liss->descripcion; ?>
                                        </option>
                                   <?php } ?>
                                </select>                                    
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Descripci&oacute;n</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Factor</label>
                                <input type="text" class="form-control" id="factor" name="factor">
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
             $('#mat_item_id').val(d[0]);
              $('#grupo_mat_id').val(d[1]);
              $('#descripcion').val(d[2]);
              $('#factor').val(d[3]);
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


   