<!--alerts CSS -->
<link href="<?php echo base_url(); ?>public/assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">

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
                   <div class="col-lg-9 col-md-12">
                        <div class="card">
                            <div class="card-body pb-0">
                                <h4 class="card-title">Administraci&oacute;n del Men&uacute;</h4>
                                <h6 class="card-subtitle">Use default tab with class <code>customtab</code></h6>
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs customtab2" role="tablist">
                                    <?php foreach ($primer as $pri) {
                                        
                                     ?>
                                    <li class="nav-item"> <a class="nav-link" onclick="datos('<?php echo $pri->menu_id ?>')" data-toggle="tab" href="#<?php echo $pri->menu_id ?>" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down"><?php echo $pri->descripcion ?></span></a> </li>
                                    <!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile7" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Profile</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages7" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Messages</span></a> </li> -->
                                   <?php } ?>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content" id="aqui">
                                    
                                    <div class="tab-pane active" id="<?php echo '2'; ?>" role="tabpanel">

                                        <?php $segundo = $this->db->query("SELECT *
                                                                            FROM public.menu
                                                                            WHERE padre = 2
                                                                            AND nivel = 2
                                                                            Order by orden")->result(); 
                                        ?>
                                        
                                        <ul class="nav nav-tabs customtab2" role="tablist">
                                            <?php foreach ($segundo as $seg) {
                                            ?>
                                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#<?php echo $seg->menu_id ?>" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down"> <?php echo $seg->descripcion ?></span></a> </li>
                                             <?php } ?>
                                        </ul>
                                       
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="card">
                            <div class="card-body pb-0">
                                <h4 class="card-title">Customtab2 Tab</h4>
                                <h6 class="card-subtitle">Use default tab with class <code>customtab</code></h6>
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs customtab2" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home7" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Home</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile7" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Profile</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages7" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Messages</span></a> </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home7" role="tabpanel">
                                        <div class="p-3">
                                            <h3>Best Clean Tab ever</h3>
                                            <h4>you can use it with the small code</h4>
                                            <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a.</p>
                                        </div>
                                    </div>
                                    <div class="tab-pane  p-3" id="profile7" role="tabpanel">
                                        
                                        <ul class="nav nav-tabs customtab2" role="tablist">
                                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home71" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Home</span></a> </li>
                                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile71" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Profile</span></a> </li>
                                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages71" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Messages</span></a> </li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="home71" role="tabpanel">
                                                <div class="p-3">
                                                    <h3>Best Clean Tab ever</h3>
                                                    <h4>you can use it with the small code</h4>
                                                    <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a.</p>
                                                </div>
                                            </div>
                                            <div class="tab-pane  p-3" id="profile71" role="tabpanel">2</div>
                                            <div class="tab-pane p-3" id="messages71" role="tabpanel">3</div>
                                        </div>

                                    </div>
                                    <div class="tab-pane p-3" id="messages7" role="tabpanel">3</div>
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
    <script>
        function datos(menu_id)
        {
             var valor1 =  '<div class="tab-pane active" id="' + menu_id + '" role="tabpanel">';
             $("#aqui").html(valor1);
        }
    </script>
    <script>
      


    function buscar(id)
    {
        var ci = id;
        
        $.ajax({
            url: '<?php echo base_url(); ?>Administrador_Persona/consulta/',
            type: 'GET',
            dataType: 'json',
            data: {param1: ci},
            // data: {param1: cod_catastral},
            success:function(data, textStatus, jqXHR) {

                var valor = '<tr>' +
                            '<th scope="row">' + 'Ingresos liquidos mensuales' + '</th>' +
                            '<td align="right">' + data.ingreso_beneficiario + '</td>' +
                            '</tr>'+
                            '<tr>' +
                            '<th scope="row">' + 'Ingresos liquidos mensuales conyugue' + '</th>' +
                            '<td align="right">' + data.ingreso_conyugue + '</td>' +
                            '</tr>'+
                            '<tr>' +
                            '<th scope="row">' + 'Ingresos padre beneficiario' + '</th>' +
                            '<td align="right">' + data.ipb + '</td>' +
                            '</tr>'+
                            '<tr>' +
                            '<th scope="row">' + 'Ingresos madre beneficiario' + '</th>' +
                            '<td align="right">' + data.imb + '</td>' +
                            '</tr>'+
                            '<tr>' +
                            '<th scope="row">' + 'Ingresos padre conyugue' + '</th>' +
                            '<td align="right">' + data.ipc + '</td>' +
                            '</tr>'+
                            '<tr>' +
                            '<th scope="row">' + 'Ingresos madre conyugue' + '</th>' +
                            '<td align="right">' + data.imc + '</td>' +
                            '</tr>'+
                            '<tr>' +
                            '<th scope="row">' + 'Total' + '</th>' +
                            '<td align="right">' + data.monto_total + '</td>' +
                            '</tr>' +
                            '<tr>' +
                            '<th scope="row">' + 'Tasa de interes' + '</th>' +
                            '<td align="right">' + '5.5%' + '</td>' +
                            '</tr>' +
                            '<tr>' +
                            '<th scope="row">' + 'Plazo' + '</th>' +
                            '<td align="right">' + '25 ańos' + '</td>' +
                            '</tr>';
                          $("#tabla_1").html(valor);

                var valor1 = '<tr>' +
                            '<td>' + 1 + '</td>' +
                            '<td>' + data.descripcion + '</td>' +
                            '<td>' + data.ciudad + '</td>' +
                            '<td>' + data.valor + '</td>' +
                            '<td>' + data.cuota_mensual + '</td>' +
                            '<td>' + data.sueldo_prom + '</td>' +
                            '</tr>';
                          $("#tabla_2").html(valor1);

            },
            error:function(jqXHR, textStatus, errorThrown) {
                alert('no nada');
            }
        });
    }

</script>

<!--
    <script type="text/javascript">
        $(document).ready(function () {
            $('#insertar').submit(function (e) {
                e.preventDefault();
                //captura todos los valores que tiene el formulario es decir todos los input que esten en ese formulario...
                var datos=$(this).serialize();
                 
                 setTimeout('document.location.reload()',2000);
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url();?>zona_urbana/insertar",
                    data:datos,

                    success:function(data){
                        swal(
                            'Buen Trabajo',
                            'Insertaste Correctamente el Registro.',
                            'success'
                        );
                        
                        //imprimo el resultado en el div mensaje que procesa ajax
                       // $("#mensaje").html(data);                    
                    }
                });
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#footable-delete').submit(function (e) {
                e.preventDefault();
                //captura todos los valores que tiene el formulario es decir todos los input que esten en ese formulario...
                var datos=$(this).serialize();
                 /*swal(
                 'Titulo del Mensaje',
                 'Mensaje',
                 'Tipo de mesaje'
                 );*/
                 setTimeout('document.location.reload()',2000);
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url();?>zona_urbana/insertar",
                    data:datos,

                    success:function(data){
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
                            });
                        
                        //imprimo el resultado en el div mensaje que procesa ajax
                       // $("#mensaje").html(data);                    
                    }
                });
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#editar').submit(function (e) {
                e.preventDefault();
                //captura todos los valores que tiene el formulario es decir todos los input que esten en ese formulario...
                var datos=$(this).serialize();
                 /*swal(
                 'Titulo del Mensaje',
                 'Mensaje',
                 'Tipo de mesaje'
                 );*/
                 setTimeout('document.location.reload()',2000);
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url();?>zona_urbana/insertar",
                    data:datos,

                    success:function(data){
                        swal(
                            'Buen Trabajo',
                            'Insertaste Correctamente el Registro.',
                            'success'
                        );
                        
                        //imprimo el resultado en el div mensaje que procesa ajax
                       // $("#mensaje").html(data);                    
                    }
                });
            });
        });
    </script>
-->
    