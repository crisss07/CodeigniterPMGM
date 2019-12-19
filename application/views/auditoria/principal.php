<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/plugins/dropify/dist/css/dropify.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/plugins/wizard/steps.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/pasos.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/plugins/sweetalert/sweetalert.css" type="text/css">


<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
<!-- vertical wizard -->
                <div class="row">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Datos de Auditoria</h3>
                                <!--<form class="needs-validation" action="Usuario/registra" method="POST">-->


                                    

                                        <div class="row">
                                            <!-- Column -->
                                            <div class="col-lg-8 col-xlg-12 col-md-7">
                                                <div class="card">
                                                    <!-- Nav tabs -->
                                                    <ul class="nav nav-tabs profile-tab" role="tablist">
                                                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#adicion" role="tab">Datos Agregados</a> </li>
                                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#modificacion" role="tab">Datos Modificados</a> </li>
                                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#eliminacion" role="tab">Datos Eliminados</a> </li>
                                                    </ul>
                                                    <!-- Tab panes -->
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="adicion" role="tabpanel">
                                                            <div class="card-body">
                                                                <h3 class="card-title">Datos Agregados</h3>
                                                                <div class="table-responsive">
                                                                     <table id="tabla_din1" class="table table-bordered table-striped" cellspacing="0" width="100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>#</th>
                                                                                <th>Entidad</th>
                                                                                <!-- <th>Acci&oacute;n</th> -->
                                                                                <th>Persona</th>
                                                                                <th>Fecha</th>
                                                                                <th>IP</th>
                                                                                <th>Dato</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                                $i = 1;
                                                                                foreach($agregar as $val1)
                                                                                {
                                                                            ?>
                                                                            <tr>
                                                                                <td><?php echo $i++ ?></td>
                                                                                <td><?php echo $val1->entidad ?></td>
                                                                                <!-- <td><?php echo $val1->accion ?></td> -->
                                                                                <td><?php echo $val1->nombres ?> <?php echo $val1->paterno ?></td>
                                                                                <td><?php echo $val1->fecha ?></td>
                                                                                <td><?php echo $val1->ip ?></td>
                                                                                <td><?php echo $val1->dato ?></td>
                                                                            </tr>
                                                                            <?php 
                                                                                }
                                                                            ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="modificacion" role="tabpanel">
                                                            <div class="card-body">
                                                                <h3 class="card-title">Datos Modificados</h3>
                                                                <div class="table-responsive">
                                                                     <table id="tabla_din2" class="table table-bordered table-striped" cellspacing="0" width="100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>#</th>
                                                                                <th>Entidad</th>
                                                                                <!-- <th>Acci&oacute;n</th> -->
                                                                                <th>Persona</th>
                                                                                <th>Fecha</th>
                                                                                <th>IP</th>
                                                                                <th>Dato Anterior</th>
                                                                                <th>Dato Nuevo</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                                $j = 1;
                                                                                foreach($modificar as $val2)
                                                                                {
                                                                            ?>
                                                                            <tr>
                                                                                <td><?php echo $j++ ?></td>
                                                                                <td><?php echo $val2->entidad ?></td>
                                                                                <!-- <td><?php echo $val2->accion ?></td> -->
                                                                                <td><?php echo $val1->nombres ?> <?php echo $val1->paterno ?></td>
                                                                                <td><?php echo $val2->fecha ?></td>
                                                                                <td><?php echo $val2->ip ?></td>
                                                                                <?php 
                                                                                    $partes = explode(" || ", $val2->dato); 
                                                                                    $inicio = $partes[0];
                                                                                    $fin = $partes[1];
                                                                                ?>
                                                                                <td><?php echo $inicio ?></td>
                                                                                <td><?php echo $fin ?></td>
                                                                            </tr>
                                                                            <?php 
                                                                                }
                                                                            ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="eliminacion" role="tabpanel">
                                                            <div class="card-body">
                                                                <h3 class="card-title">Datos Eliminados</h3>
                                                                <div class="table-responsive">
                                                                     <table id="tabla_din3" class="table table-bordered table-striped" cellspacing="0" width="100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>#</th>
                                                                                <th>Entidad</th>
                                                                                <!-- <th>Acci&oacute;n</th> -->
                                                                                <th>Persona</th>
                                                                                <th>Fecha</th>
                                                                                <th>IP</th>
                                                                                <th>Dato</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                                $k = 1;
                                                                                foreach($eliminar as $val3)
                                                                                {
                                                                            ?>
                                                                            <tr>
                                                                                <td><?php echo $k++ ?></td>
                                                                                <td><?php echo $val3->entidad ?></td>
                                                                                <!-- <td><?php echo $val3->accion ?></td> -->
                                                                                <td><?php echo $val1->nombres ?> <?php echo $val1->paterno ?></td>
                                                                                <td><?php echo $val3->fecha ?></td>
                                                                                <td><?php echo $val3->ip ?></td>
                                                                                <td><?php echo $val3->dato ?></td>
                                                                            </tr>
                                                                            <?php 
                                                                                }
                                                                            ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Column -->
                                        </div>

                                        
                                
                            </div>
                        </div>
                    </div>

                </div>
    </div>
</div>
                <!-- ============================================================== -->

<script type="text/javascript">
function buscar()
    {
        var ci = $("#ci1").val();
        var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
        var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

        $.ajax({
            url: '<?php echo base_url(); ?>Usuario/ajax_verifica/',
            type: 'GET',
            dataType: 'json',
            data: {csrfName: csrfHash, param1: ci},
            // data: {param1: cod_catastral},
            success:function(data, textStatus, jqXHR) {
                if (data.estado == 'registrado') {
                   
                    $('#nombres1').html(data.nombres);
                    $('#apellidos1').html(data.apellidos);
                    $('#nombress').val(data.nombres);
                    $('#paternos').val(data.paterno);
                    $('#maternos').val(data.materno);
                    $('#fec_nacimientos').val(data.fec_nacimiento);
                    $('#estados').val(data.estado);
                    $('#persona_idd').val(data.persona_id);
                }
                else
                {
                    
                    $('#nombres1').html(data.nombres);
                    $('#apellidos1').html(data.apellidos);
                    $('#nombress').val(data.nombres);
                    $('#paternos').val(data.paterno);
                    $('#maternos').val(data.materno);
                    $('#fec_nacimientos').val(data.fec_nacimiento);
                    $('#estados').val(data.estado);
                    
                }  

            },
            error:function(jqXHR, textStatus, errorThrown) {
                alerta_ci();
            }
        });
  }
   
</script>
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
    <script>
      $('#tabla_din2').DataTable( {
     
        "oLanguage": {
            "sUrl": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
    });
    </script>
    <script>
      $('#tabla_din3').DataTable( {
     
        "oLanguage": {
            "sUrl": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
    });
    </script>