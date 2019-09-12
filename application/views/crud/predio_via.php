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
                        ADMINISTRACI&Oacute;N DE V&Iacute;A <?php $i=1; //echo $data['title']; ?>
                        <div class="card-body wizard-content">

                            <div class="col-lg-2 col-md-4">


                                <button <?php echo $verifica['alta']; ?> type="button" class="btn btn-block btn-lg btn-success" data-toggle="modal" data-target="#Modal_insert">Nueva V&iacute;a</button>
                            </div><div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tabla_din1" class="table table-bordered table-striped" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Codigo  Catastral</th>
                                                <th>Objectid Via</th>
                                                <th>Material Via</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($predio_via as $lis){
                                                $datos = $lis->via_id."||".
                                                         $lis->codcatas."||".
                                                         $lis->objectid_via."||".
                                                         $lis->matvia_id;
                                            ?>
                                            <tr>
                                            <?php $lista = $this->db->get_where('catastro.matvia', array('matvia_id' => $lis->matvia_id))->row();
                                             ?>
                                                <td><?php echo $i++;?></td>
                                                <td><?php echo $lis->codcatas;?></td>
                                                <td><?php echo $lis->objectid_via;?></td>
                                                <td><?php echo $lista->descripcion;?></td>
                                                <td>

                                                    <button <?php echo $verifica['modificacion']; ?> type="button" class="btn btn-warning footable-edit" data-toggle="modal" data-target="#modalEdicion" onclick="agregarform('<?php echo $datos ?>')">
                                                            <span class="fas fa-pencil-alt" aria-hidden="true">
                                                            </span>
                                                    </button> 
                                                    <a <?php echo $verifica['baja'];?>="<?= base_url('predio_via/eliminar/'. $lis->via_id); ?>" type="button" class="btn btn-danger footable-delete">
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
                        <h4 class="modal-title" id="exampleModalLabel1">Editar V&iacute;a</h4>
                    </div>
                    <div class="modal-body">
                        <!--<form action="<?php echo base_url();?>zona_urbana/editar" method="POST">-->
                        <?php echo form_open('predio_via/update', array('method'=>'POST')); ?>

                            <div class="form-group">
                                <input type="text" hidden="" id="via_id" name="via_id">
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="control-label">C&oacute;digo Catrastal</label>
                                <input type="text" class="form-control" id="codcatas" name="codcatas" value="<?php echo $lis->codcatas;?>">
                            </div>

                             <div class="form-group">
                                <label for="recipient-name" class="control-label">Objeto V&iacute;a</label>
                                <input type="text" class="form-control" id="objectid_via" name="objectid_via" value="<?php echo $lis->objectid_via;?>">
                            </div>

                            <div class="form-group">
                                <?php $lista1 = $this->db->query("SELECT * FROM catastro.matvia  WHERE activo = '1' ORDER BY matvia_id ASC")->result();
                                ?>

                                <label for="recipient-name" class="control-label">Material V&iacute;a</label>
                                 <select class="form-control custom-select"  id="matvia_id" name="matvia_id"  />
                                    <?php foreach ($lista1 as $liss) { ?>
                                        <option value="<?php echo $liss->matvia_id; ?>"><?php echo $liss->descripcion; ?>
                                        </option>
                                   <?php } ?>
                                </select>                                    
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
                        <h4 class="modal-title" id="exampleModalLabel1">Insertar Nueva Zona Urbana</h4>
                    </div>
                    <div class="modal-body">
                        <!--<form action="<?php echo base_url();?>zona_urbana/insertar" method="POST">-->
                        <?php echo form_open('predio_via/insertar', array('method'=>'POST')); ?>

                            <div class="form-group">
                                <label for="recipient-name" class="control-label">C&oacute;digo Catrastal</label>
                                <input type="text" class="form-control" id="codcatas" name="codcatas">
                            </div>

                             <div class="form-group">
                                <label for="recipient-name" class="control-label">Objeto V&iacute;a</label>
                                <input type="text" class="form-control" id="objectid_via" name="objectid_via">
                            </div>

                            <div class="form-group">
                                <?php $lista1 = $this->db->query("SELECT * FROM catastro.matvia  WHERE activo = '1' ORDER BY matvia_id ASC")->result();
                                ?>

                                <label for="recipient-name" class="control-label">Material V&iacute;a</label>
                                 <select class="form-control custom-select"  id="matvia_id" name="matvia_id"  />
                                    <?php foreach ($lista1 as $liss) { ?>
                                        <option value="<?php echo $liss->matvia_id; ?>"><?php echo $liss->descripcion; ?>
                                        </option>
                                   <?php } ?>
                                </select>                                    
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
                 $('#via_id').val(d[0]);
                  $('#codcatas').val(d[1]);
                  $('#objectid_via').val(d[2]);
                  $('#matvia_id').val(d[3]);
            }

        </script>

   
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
   