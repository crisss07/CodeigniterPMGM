<style type="text/css">
    p{
        display: inline-block;
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
                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor mb-0 mt-0">Inspecciones programadas</h3>
                        <!-- <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Stylish Tooltips</li>
                        </ol> -->
                    </div>
                    <div class="col-md-6 col-4 align-self-center">
		                <button class="btn float-right hidden-sm-down btn-success"> 
		                    <p id="diaSemana" class="diaSemana">Martes</p>
		                    <p id="dia" class="dia">27</p>
		                    <p>de </p>
		                    <p id="mes" class="mes">Octubre</p>
		                    <p>del </p>
		                    <p id="year" class="year">2015</p>
		                </button>
		                <button class="float-right mr-2 hidden-sm-down btn btn-secondary" type="button"   > 
		                    <p id="horas" class="horas">11</p>
		                    <p>:</p>
		                    <p id="minutos" class="minutos">48</p>
		                    <p>:</p>
		                    <p id="segundos" class="segundos">12</p>
		                    <p id="ampm" class="ampm">AM</p>
		                </button>    
		            </div>

                </div>
                <div class="row">
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Lista de inspecciones programadas</h4> 
                               
                        <div class="table-responsive">
                                    <table class="table no-wrap table-striped table-bordered mt-5" id="editable-datatable">
                                        <thead>
                                <tr>
                                	<th>NRO.</th>
                                    <th>FECHA</th>
                                    <th>INSPECTOR</th>
                                    <th>REFERENCIA</th>
                                    <th>ESTADO</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                	<th>NRO.</th>
                                    <th>FECHA</th>
                                    <th>INSPECTOR</th>
                                    <th>REFERENCIA</th>
                                    <th>ESTADO</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                	<td>1</td>
                                    <td>20-08-2019</td>
                                    <td>Juan Pablo Fernandez</td>
                                    <td>Cambio de nombre</td>
                                    <td><span class="label label-danger">Cancelada</span></td>
                                </tr>
                                <tr>
                                	<td>2</td>
                                    <td>17-28-2019</td>
                                    <td>Roberto Torrez</td>
                                    <td>Division y particion</td>
                                    <td><span class="label label-warning">Visita observada</span></td>
                                </tr>
                                <tr>
                                	<td>3</td>
                                    <td>15-08-2019</td>
                                    <td>Carlos Lopez</td>
                                    <td>Legalizacion de construcciones</td>
                                    <td><span class="label label-success">Programado</span></td>
                                </tr>
                                <tr>
                                	<td>4</td>
                                    <td>01-08-2019</td>
                                    <td>Abel Mendoza</td>
                                    <td>Aprobacion de planos de construccion</td>
                                    <td><span class="label label-info">Realizado</span></td>
                                </tr>
                               
                            </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-lg-3 col-md-12" >
                        <div class="card" style="background: #0489B1;">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div class=""><img src="<?php echo base_url(); ?>public/assets/images/users/1.jpg" alt="user" class="img-circle" width="100"></div>
                                    <div class="pl-3">
                                        <h3 style="color: white;" class="font-medium">Daniel Kristeen</h3>
                                        <h6 style="color: white;">UIUX Designer</h6>
                                        
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col border-right">
                                        <h2 style="color: white;" class="font-light">14</h2>
                                        <h6 style="color: white;" >Photos</h6></div>
                                    <div class="col border-right">
                                        <h2 style="color: white;" class="font-light">54</h2>
                                        <h6 style="color: white;">Videos</h6></div>
                                    <div class="col">
                                        <h2 style="color: white;" class="font-light">145</h2>
                                        <h6 style="color: white;" >Tasks</h6></div>
                                </div>
                            </div>
                            <div>
                                <hr>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            </div>