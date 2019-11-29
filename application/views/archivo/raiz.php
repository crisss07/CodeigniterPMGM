<!--alerts CSS -->
<link href="<?php echo base_url(); ?>public/assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
<!-- Bootstrap Core CSS -->
<link href="<?php echo base_url(); ?>public/assets/plugins/bootstrap-switch/bootstrap-switch.min.css" rel="stylesheet">

<style type="text/css">
    #izquierda{
        text-align: center;
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
                        <h4 class="card-title">Archivos</h4>
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                          </button>
                          <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                            <a class="navbar-brand" href="#"><button type="button" class="btn btn-dark btn-circle btn-xl" data-toggle="modal" data-target="#modalAdicion"><i class="fas fa-folder-open"></i> </button> Crear Carpeta </a>
                            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            </ul>
                            <!-- <form class="form-inline my-2 my-lg-0"> -->
                            <?php echo form_open('archivo/buscar', array('method'=>'POST', 'class'=>'form-inline my-2 my-lg-0')); ?>
                              <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search" name="buscador" id="buscador">
                              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                            </form>
                          </div>
                        </nav>

                        

                            <div class="row el-element-overlay">
                                    <?php foreach ($predios as $pre) {
                                        $imagen = 'public/assets/images/archivo/'.$pre->carpeta.'.jpg';
                                        $datos = $pre->raiz_id."||".
                                                 $pre->nombre."||".
                                                 $pre->descripcion1."||".
                                                 $pre->descripcion2."||".
                                                 $pre->carpeta;


                                    ?>
                                        
                                        <div class="col-lg-4 col-md-6">
                                            <div class="card">
                                                <div class="el-card-item card card-body">
                                                    <div class="row">
                                                        <div class="el-card-avatar el-overlay-1 col-md-4 col-lg-3 text-center"> <img src="<?php echo base_url(); ?><?php echo $imagen; ?>" alt="user" class="img-circle img-responsive">
                                                            <div class="el-overlay">
                                                                <ul class="el-info">
                                                                    <!--  -->
                                                                    <li><a class="btn default btn-outline image-popup-vertical-fit" href="<?= base_url('archivo/ingresarraiz/'. $pre->raiz_id); ?>"><i class="icon-login"></i></a></li>
                                                                    <li><a class="btn default btn-outline" href="javascript:void(0);" data-toggle="modal" data-target="#modalEdicion" onclick="agregarform('<?php echo $datos ?>')"><i class="icon-pencil"></i></a></li>
                                                                    <li><a class="btn default btn-outline" href="<?= base_url('archivo/eliminarraiz/'. $pre->raiz_id); ?>" alt="alert" class="img-responsive model_img" id="sa-params11" onclick="alerta('<?php echo $pre->raiz_id ?>')"><i class="icon-trash"></i></a></li>
                                                                    <li><a class="btn default btn-outline image-popup-vertical-fit" href="<?= base_url('archivo/ingresar/'. $pre->raiz_id); ?>"><i class="icon-share-alt"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8 col-lg-9">
                                                            <h4 class="mb-0"><?php echo $pre->nombre;  ?></h4> 
                                                            <small>Nombre del Propietario:  <?php echo $pre->descripcion1; ?></small>
                                                            <br>
                                                            <small>C.I. del Propietario:  <?php echo $pre->descripcion2; ?></small>
                                                            <address>
                                                                795 Folsom Ave, Suite 600 San Francisco, CADGE 94107
                                                            </address>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>   
                            </div>

                            <div id="modalEdicion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        
                                        <div class="modal-body">
                                           <?php echo form_open('archivo/updateraiz', array('method'=>'POST')); ?>

                                                <div class="form-group">
                                                    <input type="text" hidden="" id="raiz_id" name="raiz_id">
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Nombre: </label>
                                                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="control-label">Nombre del Propietario: </label>
                                                    <textarea class="form-control" id="descripcion1" name="descripcion1" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="control-label">C.I. del Propietario: </label>
                                                    <textarea class="form-control" id="descripcion2" name="descripcion2" required></textarea>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Tipo de Carpeta</label>
                                                        <select class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" id="carpeta" name="carpeta">
                                                            <option value="carpeta">Carpeta<img src="<?php echo base_url(); ?>public/assets/images/archivo/carpeta_llena.jpg"></option>
                                                            <option value="carpeta_llena">Carpeta Llena<img src="<?php echo base_url(); ?>public/assets/images/archivo/carpeta_llena.jpg"></option>
                                                            <option value="carpeta_vacia">Carpeta Vacia<img src="<?php echo base_url(); ?>public/assets/images/archivo/carpeta_vacia.jpg"></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                                </div>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <div id="modalAdicion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        
                                        <div class="modal-body">
                                           <?php echo form_open('archivo/insertarraiz', array('method'=>'POST')); ?>
                                                
                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Nombre: </label>
                                                    <input type="text" class="form-control" id="nombree" name="nombre" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="control-label">Nombre del Propietario: </label>
                                                    <textarea class="form-control" id="descripcion1" name="descripcion1" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="control-label">C.I. del Propietario: </label>
                                                    <textarea class="form-control" id="descripcion2" name="descripcion2" required></textarea>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Tipo de Carpeta</label>
                                                        <select class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" id="carpeta" name="carpeta">
                                                            <option value="carpeta">Carpeta</option>
                                                            <option value="carpeta_llena">Carpeta Llena</option>
                                                            <option value="carpeta_vacia">Carpeta Vacia</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                                </div>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                        



                        <!-- <div class="card-body wizard-content">
                                 <div class="row">

                                    <?php foreach ($predios as $pre) {
                                    ?>
                                    <div class="col-md-6 col-lg-6 col-xlg-4">
                                        <div class="card card-body">
                                            <div class="row">
                                                <div class="col-md-4 col-lg-3 text-center">
                                                    <a href="<?= base_url('archivo/ingresar/'. $pre->raiz_id); ?>"><img src="<?php echo base_url(); ?>public/assets/images/users/carpeta.jpg" alt="user" class="img-circle img-responsive"></a>
                                                </div>
                                                <div class="col-md-8 col-lg-9">
                                                    <h4 class="mb-0"><?php echo $pre->nombre;  ?></h4> 
                                                    <small>Nombre del Propietario:  <?php echo $pre->descripcion1; ?></small>
                                                    <small>C.I. del Propietario:  <?php echo $pre->descripcion2; ?></small>
                                                    <address>
                                                        795 Folsom Ave, Suite 600 San Francisco, CADGE 94107
                                                    </address>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php } ?>

                                  
                                </div>

                           

                            
                        </div> -->

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
              $('#raiz_id').val(d[0]);
              $('#nombre').val(d[1]);
              $('#descripcion1').val(d[2]);
              $('#descripcion2').val(d[3]);
              $('#carpeta').val(d[4]);
        }

    </script>

     <!-- Sweet-Alert  -->
    <script src="<?php echo base_url(); ?>public/assets/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/plugins/sweetalert/jquery.sweet-alert.custom.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url(); ?>public/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>

<!-- bt-switch -->

    <script src="<?php echo base_url(); ?>public/assets/plugins/bootstrap-switch/bootstrap-switch.min.js"></script>
    <script type="text/javascript">
            function ver_boton(id)
            {
                alert(id);

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
   <!--  <script type="text/javascript">
        function alerta(id)
        {
            swal({   
            title: "¿Estás seguro?",   
            text: "¡No podrá recuperar este archivo!",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "¡Si, elimínalo!",   
            cancelButtonText: "No, ¡cancela plx!",   
            closeOnConfirm: false,   
            closeOnCancel: false 
        }, function(isConfirm){   
            if (isConfirm) {     

 
                swal("¡Eliminado!", "Su archivo imaginario ha sido eliminado.", "success");   
            } else {     
                swal("Cancelado", "Tu archivo está seguro :)", "error");   
            } 
            });
        }

       
    </script> -->
   <!--  <script type="text/javascript">
        function alerta(id)
        {
            swal({   
            title: "¿Estás seguro?",   
            text: "¡No podrá recuperar este archivo!",   
            type: "warning",   
            showCancelButton: true,   <
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "¡Si, elimínalo!",   
            cancelButtonText: "No, ¡cancela plx!",   
            closeOnConfirm: false,   
            closeOnCancel: false 
        }, function(){   
                $.ajax({
                    url: '<?php echo base_url() ?>tipo_tramite/eliminarr/',
                    type: 'post',
                    data: {id:id},
                        success:function(){
                            swal("¡Eliminado!", "Su archivo imaginario ha sido eliminado.", "success"); 
                        },
                        error:function(){
                            swal("Cancelado", "Tu archivo está seguro :)", "error"); 
                        }
                });
            });
        }

       
    </script> -->



    <!-- <script type="text/javascript">

            Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.value) {
            Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
            )
          }
        })
    </script> -->
    