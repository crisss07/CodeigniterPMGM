 <div class="page-wrapper">
 	<!-- ============================================================== -->
 	<!-- Container fluid  -->
 	<!-- ============================================================== -->
 	<div class="container-fluid">

 		<!-- Row -->
 		<div class="row">

 			<div class="col-2 mt-4">
 				<!-- Card -->
 				<div class="card text-center">
 					<div class="card-header">
 						Consulta
 					</div>
 					<div class="card-body">
 						<h4 class="card-title">Cod Catastral</h4>
 						<input type="text" class="form-control" name="">
 						<p></p>
 						<a href="#" class="btn btn-info" onclick="muestraDetalle();">Buscar</a>
 					</div>

 				</div>
 				<!-- Card -->
 			</div>

 			<div class="col-6 mt-4" style="display: none;" id="detalle">

 				<!-- Card -->
 				<div class="card text-center">
 					<div class="card-header">
 						Predios
 					</div>
 					<div class="card-body">
 						<div id="tabla_din_wrapper" class="dataTables_wrapper dt-bootstrap4">
 							<div class="row">
 								<div class="col-sm-12 col-md-6">
 									<div class="dataTables_length" id="tabla_din_length"><label></label></div>
 								</div>
 								<div class="col-sm-12 col-md-6">
 									<div id="tabla_din_filter" class="dataTables_filter"><label></div>
 								</div>
 							</div>
 							<div class="row">
 								<div class="col-sm-12">
 									<table id="tabla_din" class="table table-bordered table-striped dataTable"
 										cellspacing="0" width="100%" role="grid" aria-describedby="tabla_din_info"
 										style="width: 100%;">
 										<thead>
 											<tr role="row">
 												<th class="sorting" tabindex="0" aria-controls="tabla_din" rowspan="1"
 													colspan="1"
 													aria-label="#: Activar para ordenar la columna de manera ascendente"
 													style="width: 76px;">#</th>
 												<th class="sorting_desc" tabindex="0" aria-controls="tabla_din"
 													rowspan="1" colspan="1" aria-sort="descending"
 													aria-label="FECHA REGISTRO: Activar para ordenar la columna de manera ascendente"
 													style="width: 398px;">FECHA REGISTRO</th>
 												<th class="sorting" tabindex="0" aria-controls="tabla_din" rowspan="1"
 													colspan="1"
 													aria-label="COD CATASTRAL: Activar para ordenar la columna de manera ascendente"
 													style="width: 343px;">COD CATASTRAL</th>
 												<th class="sorting" tabindex="0" aria-controls="tabla_din" rowspan="1"
 													colspan="1"
 													aria-label="ZONA URBANA: Activar para ordenar la columna de manera ascendente"
 													style="width: 307px;">ZONA URBANA</th>
 												<th class="sorting" tabindex="0" aria-controls="tabla_din" rowspan="1"
 													colspan="1"
 													aria-label="ACCIONES: Activar para ordenar la columna de manera ascendente"
 													style="width: 320px;">ACCIONES</th>
 											</tr>
 										</thead>

 										<tbody>

 											<tr role="row" class="odd">
 												<td>7</td>
 												<td class="sorting_1">
 													2019-07-05 16:06:45 </td>
 												<td>0050060002</td>
 												<!-- <td></td> -->
 												<td>
 													Uno </td>
 												<!-- <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td> -->
 												<td>
 													<div class="btn-group btn-group-xs" role="group">
 														<a href="#"
 															class="btn btn-primary footable-edit" onclick="muestraDatos();">
 															<span class="fas fas fa-edit" aria-hidden="true"></span>
 														</a>


 														<a href="#"
 															class="btn btn-success footable-edit" onclick="muestraFotos();">
 															<span class="fas fas fa-print" aria-hidden="true"></span>
 														</a>
 														
 													</div>
 												</td>
 											</tr>
 										</tbody>
 									</table>
 								</div>
 							</div>
                            
 							<div class="row">
 								<div class="col-sm-12 col-md-5"></div>
 								<div class="col-sm-12 col-md-7">
 									<div class="dataTables_paginate paging_simple_numbers" id="tabla_din_paginate">
 										<ul class="pagination">
 											<li class="paginate_button page-item previous disabled"
 												id="tabla_din_previous"></li>
 											<li class="paginate_button page-item active"></li>
 											<li class="paginate_button page-item "></li>
 											<li class="paginate_button page-item "></li>
 											<li class="paginate_button page-item next" id="tabla_din_next"></li>
 										</ul>
 									</div>
 								</div>
 							</div>
 						</div>
 					</div>

 				</div>

 				<!-- Card -->
 			</div>

            <div class="col-4 mt-4" style="display: none;" id="datos">
                <div class="col-md-12">
                    <div class="card card-outline-info">
                        <div class="card-header">
                            <h4 class="mb-0 text-white">Datos Generales</h4>
                        </div>
                        <div class="card-body">
                        <table class="table table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>Descripcion</th>
                                                <th>Dato</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>COD Catastral</td>
                                                <td>005454</td>
                                            </tr>
                                            <tr>
                                                <td>Propietario</td>
                                                <td>Jackie Calderon Vega</td>
                                            </tr>
                                            <tr>
                                                <td>Numero</td>
                                                <td>12</td>
                                            </tr>
                                        </tbody>
                                    </table>
                        </div>
                    </div>
                </div>
            </div>

 		</div>
 		<!-- End Row -->

 		<!-- End Row -->
 		<!-- Row -->
 		<div class="row" style="display: none;" id="fotos">
 			
 			
 			<div class="col-md-6">
 				<div class="card card-outline-info">
 					<div class="card-header">
 						<h4 class="mb-0 text-white">Mapa</h4>
 					</div>
 					<div class="card-body">
                        <img src="<?php echo base_url("public/assets/images/reportes/predio.png") ?>">
 					</div>
 				</div>
 			</div>
 			<div class="col-md-6">
 				<div class="card card-outline-primary">
 					<div class="card-header">
 						<h4 class="mb-0 text-white">Foto Fachada</h4>
 					</div>
 					<div class="card-body">
                        <img src="<?php echo base_url("public/assets/images/reportes/fachada.jpg") ?>">
 					</div>
 				</div>
 			</div>
 			
 		</div>
 		<!-- End Row -->
 		<!-- Row -->
 		
 	</div>
 	<!-- ============================================================== -->
 	<!-- End Container fluid  -->
 	<!-- ============================================================== -->
 	<!-- ============================================================== -->
 </div>
<script type="text/javascript">
    function muestraDetalle(){
        $("#detalle").toggle('slow');
    }

    function muestraDatos(){
        $("#datos").toggle('slow');    
    }

    function muestraFotos(){
        $("#fotos").toggle('slow');    
    }
    
</script>