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
                                                $datos = $lis->credencial_id."||".
                                                         $lis->nombres."||".
                                                         $lis->paterno."||".
                                                         $lis->materno."||".
                                                         $lis->ci."||".
                                                         $lis->fec_nacimiento."||".
                                                         $lis->perfil."||".
                                                         $lis->rol."||".
                                                         $lis->contrasenia."||".
                                                         $lis->persona_perfil_id."||".
                                                         $lis->usuario;
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
                                                    <a <?php echo $verifica['baja'];?>="<?= base_url('Usuario/activo/'. $lis->credencial_id); ?>" type="button" class="btn btn-<?php echo $color ?>"><?php echo $mensaje ?>
                                                        
                                                    </a>  

                                                </td>
                                                <td>
                                                    <a <?php echo $verifica['baja'];?>="<?= base_url('Usuario/asignar/'. $lis->credencial_id); ?>" type="button" class="btn btn-info button">
                                                        <span disabled class="fas fa-tasks" aria-hidden="true">
                                                        </span>
                                                    </a>
                                                     <a <?php echo $verifica['baja'];?>="<?= base_url('Usuario/asignar/'. $lis->credencial_id); ?>" type="button" class="btn btn-warning button" data-toggle="modal" data-target="#modalEdicion" onclick="agregarform('<?php echo $datos ?>')">
                                                        <span disabled class="fas fa-pencil-alt" aria-hidden="true">
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
                        <h4 class="modal-title" id="exampleModalLabel1">Editar Perfil de Usuario</h4>
                    </div>
                    <div class="modal-body">
                        <!--<form action="<?php echo base_url();?>zona_urbana/update" method="POST">-->
                        <?php echo form_open('Usuario/modifica', array('method'=>'POST', 'id'=>'editar')); ?>

                            
                            <div class="form-group">
                                <input type="text" hidden="" id="credencial_ids" name="credencial_id">
                            </div>

                            <div class="form-group">
                                <input type="text" hidden="" id="persona_perfil_ids" name="persona_perfil_id">
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Nombre de Usuario</label>
                                <input type="text" class="form-control" id="usuarios" name="usuario" value="<?php echo $lis->usuario;?>" >
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Contrase&ntilde;a</label>
                                <input type="text" class="form-control" id="contrasenias" name="contrasenia" value="<?php echo $lis->contrasenia;?>" >
                            </div>
                            <div class="form-group">

                                <?php
                                     $lista = $this->db->query("SELECT * FROM public.perfil  WHERE activo = '1' ORDER BY perfil_id ASC")->result();
                                ?>      

                                <label for="recipient-name" class="control-label">Perfil</label>
                                <!-- <input type="text" class="form-control" id="perfils" name="perfil_id" > -->
                                <select class="form-control custom-select" id="perfil_id" name="perfil_id" />
                                    <?php foreach ($lista as $liss) { ?>
                                        <option value="<?php echo $liss->perfil_id; ?>"><?php echo $liss->perfil; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                           

                            <div class="form-group">

                                 <?php $lista1 = $this->db->query("SELECT * FROM public.rol  WHERE activo = '1' ORDER BY rol_id ASC")->result();
                                ?>

                                <label for="recipient-name" class="control-label">Rol</label>
                                <!-- <input type="text" class="form-control" id="rols" name="rol" value="<?php echo $lis->rol;?>"> -->
                                <select class="form-control custom-select"  id="rol_id" name="rol_id" />
                                         <option value="0">Seleccione un Rol
                                        </option>
                                       <?php foreach ($lista1 as $liss1) { ?>
                                        <option value="<?php echo $liss1->rol_id; ?>"><?php echo $liss1->rol; ?>
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
              $('#credencial_ids').val(d[0]);
              $('#nombress').val(d[1]);
              $('#paternos').val(d[2]);
              $('#maternos').val(d[3]);
              $('#cis').val(d[4]);
              $('#fec_nacimientos').val(d[5]);
              $('#perfils').val(d[6]);
              $('#rols').val(d[7]);
              $('#contrasenias').val(d[8]);
              $('#persona_perfil_ids').val(d[9]);
              $('#usuarios').val(d[10]);
           
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
    