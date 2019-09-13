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
                        <h4 class="card-title">LISTADO DE USUARIOS</h4>
                        <?php $i=1; //echo $data['title']; ?>
                        <div class="card-body wizard-content">
                            

                            <div class="col-lg-2 col-md-4">
                                
                                 

                                    <!--<button <?php echo $verifica['alta']; ?> type="button" class="btn btn-block btn-lg btn-success" data-toggle="modal" data-target="#Modal_insert">Nueva Zona Urbana</button>-->

                            </div><div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                     <table id="tabla_din1" class="table table-bordered table-striped" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nombres</th>
                                                <th>Usuario</th>
                                                <th>Perfil</th>
                                                <th>Rol</th>
                                                <th>Estado</th>
                                                <th>Men&uacute;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($usuario as $lis){
                                                //$datos = $lis->zonaurb_id."||".
                                                  //       $lis->descripcion;
                                            ?>
                                            <tr>
                                                <td><?php echo $i++;?></td>
                                                <td><?php echo $lis->nombres;?> <?php echo $lis->paterno;?></td>
                                                <td><?php echo $lis->usuario;?></td>
                                                <td><?php echo $lis->perfil;?></td>
                                                <td><?php echo $lis->rol;?></td>
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
                                                    <a <?php echo $verifica['baja'];?>="<?= base_url('usuario/activo/'. $lis->credencial_id); ?>" type="button" class="btn btn-<?php echo $color ?>"><?php echo $mensaje ?>
                                                        
                                                    </a>  

                                                </td>
                                                <td>
                                                    <a <?php echo $verifica['baja'];?>="<?= base_url('usuario/asignar/'. $lis->credencial_id); ?>" type="button" class="btn btn-info button">
                                                        <span disabled class="fas fa-tasks" aria-hidden="true">
                                                        </span>
                                                    </a>
                                                     <!-- <a <?php echo $verifica['baja'];?>="<?= base_url('usuario/asignar/'. $lis->credencial_id); ?>" type="button" class="btn btn-info button">
                                                        <span disabled class="fas fa-pencil-alt" aria-hidden="true">
                                                        </span>
                                                    </a>    -->                                                 
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
              $('#zonaurb_id').val(d[0]);
              $('#descripcion').val(d[1]);
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
    