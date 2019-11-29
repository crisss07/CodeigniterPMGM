<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/plugins/dropify/dist/css/dropify.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/plugins/wizard/steps.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/pasos.css">
<!-- <script src="https://cdn.jsdelivr.net/npm/vue@2.6.9/dist/vue.js"></script> -->

<!-- sample modal content -->

<!-- /.modal -->

<!-- ============================================================== -->
<!-- Start Page Content 
   <select class="custom-select form-control" id="tipo_predio" name="tipo_predio_id" required />
        <option value="">Seleccione tipo</option>
        <?php foreach ($dc_tipos_predio as $d): ?>
            <option value="<?php echo $d->tipo_predio_id; ?>"><?php echo $d->descripcion; ?></option>
        <?php endforeach; ?>
    </select>  
-->
<!-- ============================================================== -->

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    
  <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor mb-0 mt-0">Dashboard</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                         <img src="<?php echo base_url(); ?>public/assets/images/reportes/certificado_tec.png" class="light-logo" alt="homepage" width="100%"/>
                        <div class="card card-inverse card-info">

                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white"></h1>
                                <a href="<?php echo base_url(); ?>Reporteseicu/certificacion" target=blank><h6 class="text-white">
                                CERTIFICACION TECNICA</h6></a>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <img src="<?php echo base_url(); ?>public/assets/images/reportes/ficha_tec.png" class="light-logo" alt="homepage" width="100%"/>
                        <div class="card card-primary card-inverse">
                            <div class="box text-center">
                                <h1 class="font-light text-white"></h1>
                                <a href="<?php echo base_url(); ?>Reporteseicu/ficha_tecnica" target=blank><h6 class="text-white">FICHA TECNICA</h6></a>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <img src="<?php echo base_url(); ?>public/assets/images/reportes/certificado_cat.png" class="light-logo" alt="homepage" width="100%"/>
                        <div class="card card-inverse card-success">
                            <div class="box text-center">
                                <h1 class="font-light text-white"></h1>
                            <a href="<?php echo base_url(); ?>Reporteseicu/certificacion_bloques" target=blank><h6 class="text-white">CERTFICACION CATASTRAL</h6></a>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
               
                </div>
        
        
           
           
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
          





</div>


    <script src="<?php echo base_url(); ?>public/assets/plugins/jquery/jquery.min.js"></script>
 


