<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">

<div class="row">
                    <!-- Column -->
                 
                    <!-- Column -->
                    <div class="col-lg-12">
                        <!-- Row -->
                        <div class="row">
                            <!-- Column -->
                            <div class="col-sm-3">
                                <div class="card card-body">
                                    <!-- Row -->
                                    <div class="row pt-2 pb-2">
                                        <!-- Column -->
                                        <div class="col pr-0">
                                            <h1 class="font-light"><?php echo $data_personas->total_p ?></h1>
                                            <h6 class="text-muted">Beneficiarios</h6></div>
                                        <!-- Column -->
                                        <div class="col text-right align-self-center">
                                            <div data-label="20%" class="css-bar mb-0 css-bar-primary css-bar-20"><i class="mdi mdi-account-circle"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            <div class="col-sm-3">
                                <div class="card card-body">
                                    <!-- Row -->
                                    <div class="row pt-2 pb-2">
                                        <!-- Column -->
                                        <div class="col pr-0">
                                            <h1 class="font-light"><?php echo $data_tramite_ini->total_t ?></h1>
                                            <h6 class="text-muted">Tramites Iniciados</h6></div>
                                        <!-- Column -->
                                        <div class="col text-right align-self-center">
                                            <div data-label="30%" class="css-bar mb-0 css-bar-danger css-bar-20"><i class="mdi mdi-briefcase-check"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            <div class="col-sm-3">
                                <div class="card card-body">
                                    <!-- Row -->
                                    <div class="row pt-2 pb-2">
                                        <!-- Column -->
                                        <div class="col pr-0">
                                            <h1 class="font-light"><?php echo $data_tramite_fin->total_fin ?></h1>
                                            <h6 class="text-muted">Tramites Concluidos</h6></div>
                                        <!-- Column -->
                                        <div class="col text-right align-self-center">
                                            <div data-label="30%" class="css-bar mb-0 css-bar-danger css-bar-20"><i class="mdi mdi-briefcase-check"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-3">
                                <div class="card card-body">
                                    <!-- Row -->
                                    <div class="row pt-2 pb-2">
                                        <!-- Column -->
                                        <div class="col pr-0">
                                            <h1 class="font-light"><?php echo $data_predio_reg->total_predios ?></h1>
                                            <h6 class="text-muted">Predios Registrados</h6></div>
                                        <!-- Column -->
                                        <div class="col text-right align-self-center">
                                            <div data-label="40%" class="css-bar mb-0 css-bar-warning css-bar-40"><i class="mdi mdi-star-circle"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                        
                        </div>
                    </div>
                </div>
                <!-- Row -->


                    <div class="row">
                    <!-- column -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Tramites por mes</h4>
                                <div>
                                    <canvas id="chart_tramite" height="150"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- column -->
                    <!-- column -->
                   

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Predios Registrados por mes</h4>
                                <div>
                                    <canvas id="chart_predrios" height="150"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- column -->
                    <!-- column -->
                  
                    <!-- column -->
                </div>

                <div class="row">
                    <!-- column -->
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Rendimiento de Tramite Ultimo mes</h4>
                                <div>
                                    <canvas id="chart_tramite_mes" height="50" width="50"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- column -->
                    <!-- column -->
                   

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Inspecciones Realizadas por mes</h4>
                                <div>
                                    <canvas id="chart_inspecciones_mes" height="150"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- column -->
                    <!-- column -->
                  
                    <!-- column -->
                </div>

                <div style="width: 75%"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
        <canvas id="canvas" style="display: block; width: 696px; height: 348px;" width="696" height="348" class="chartjs-render-monitor"></canvas>
    </div>




              
                   </div>
                </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
            © Ministerio de Obras publicas - Programa de Mejora de la Gestion Municipal
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->


    <script src="<?php echo base_url(); ?>public/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url(); ?>public/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url(); ?>public/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url(); ?>public/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url(); ?>public/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url(); ?>public/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url(); ?>public/js/custom.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url(); ?>public/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <script>            
           
    </script> 

    <script src="<?php echo base_url(); ?>public/assets/plugins/Chart.js/Chart.min.js"></script>

 <script>
    var s= <?php echo 200; ?>;
    new Chart(document.getElementById("chart_tramite"),
        {
            "type":"line",
            "data":{"labels":["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
            "datasets":[{
                            "label":"Tramites por Mes",
                            "data":<?php echo $data_tramites; ?>,
                            "fill":false,
                            "borderColor":"rgb(86, 192, 216)",
                            "lineTension":0.1
                        }]
        },"options":{}});


    new Chart(document.getElementById("chart_predrios"),
        {
            "type":"bar",
            "data":{"labels":["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
            "datasets":[{
                            "label":"Predios Registrados por Mes",
                            "data":<?php echo $data_predios; ?>,
                            "fill":false,
                            "backgroundColor":["rgba(255, 99, 132, 0.2)","rgba(255, 159, 64, 0.2)","rgba(255, 205, 86, 0.2)","rgba(75, 192, 192, 0.2)","rgba(54, 162, 235, 0.2)","rgba(153, 102, 255, 0.2)","rgba(201, 203, 207, 0.2)","rgba(201, 203, 207, 0.2)","rgba(201, 203, 207, 0.2)","rgba(18, 166, 196, 1)","rgba(196, 119, 18, 1)","rgba(190, 196, 18, 1)"],
                           
                            "borderWidth":1}
                        ]},
            "options":{
                "scales":{"yAxes":[{"ticks":{"beginAtZero":true}}]}
            }
        });

      new Chart(document.getElementById("chart_tramite_mes"),
        {
            "type":"bar",
            "data":{"labels":["Ingresados","Concluidos"],
            "datasets":[{
                            "label":"Mes: ",
                            "data":[80,57],
                            "fill":false,
                            "backgroundColor":["rgba(61, 171, 199, 1)","rgba(74, 191, 113, 1)"],
                           
                            "borderWidth":1},

                        ]},
            "options":{
                "scales":{"yAxes":[{"ticks":{"beginAtZero":true}}]}
            }
        });

       new Chart(document.getElementById("chart_inspecciones_mes"),
        {
            "type":"line",
            "data":{"labels":["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
            "datasets":[{
                            "label":"Tramites por Mes",
                            "data":<?php echo $data_tramites; ?>,
                            "fill":false,
                            "borderColor":"rgb(86, 192, 216)",
                            "borderDash": [5, 5],
                            "lineTension":0.1
                        }]
        },"options":{

            responsive: true,
                title: {
                    display: true,
                    text: 'Chart.js Line Chart'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Month'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Value'
                        }
                    }]
                }

        }});



</script>
</body>

</html>

