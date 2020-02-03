</br>
</br>
</br>
<style>
#header{
  z-index: 10000;
    background-color: #fff;
    transition: background-color 0.3s ease-in-out;
    border-bottom: 1px solid #e3e6f0;
}
#usuarioHEADER{
  color:#fff;
}
#header_usuario{
    color:#fff;

}
#menu_oficina li a{
  color:#646F79;
}
</style>
<div class="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">

				<div class="card wizard-content">
					<div class="card-body">
						<div class="row page-titles">
							<div class="col-md-6 col-8 align-self-center">
								<h4 class="card-title">Noticias catastro</h4>
							</div>
						</div>
						<p></p>
						<!-- Step 1 -->
						<div class="row">
							<div class="col-md-12">
								<button type="button" class="btn btn-success" data-toggle="modal"
									data-target="#modal_insertar"><i class="mdi mdi-plus"></i> Nuevo Noticia</button>
							</div>
						</div>
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Lista de tramites<span><input type="number"
											name="gestion_tramite" id="gestion_tramite"></span></h4>
								<?php //vdebug($mis_tramites, true, false, true); ?>
								<table id="tabla_din" class="table table-bordered table-striped" cellspacing="0"
									width="100%">
									<thead>
										<tr>
											<th>Fecha publicacion</th>
											<th>Titulo</th>
											<th>Contenido</th>
											<th>Imagen</th>
											<th>Accion</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>Fecha publicación</th>
											<th>Titulo</th>
											<th>Contenido</th>
											<th>Imagen</th>
											<th>Accion</th>
										</tr>
									</tfoot>
									<tbody>
										<?php foreach ($noticias as $mt):
									$id_noticia = $mt->noticias_id;
								?>
										<tr>
											<td>
												<?php 
                                                $fecha_mod = explode(".", $mt->fec_creacion); 
                                                echo $fecha_mod[0]; 
                                            ?>
											</td>
											<td><?php echo $mt->titulo; ?></td>
											<td><?php echo $mt->contenido; ?></td>
											<td><?php echo $mt->adjunto; ?></td>
											<!-- <td><?php //echo $mt->codcatas_anterior; ?></td> -->
											<td>
												<div class="btn-group btn-group-xs" role="group">
													<?php 
                                            if ($mt->activo == 1){  
                                                echo '
													<a
														href="'.base_url().'Oficina_virtual/estado_noticia?noticia_id='.$id_noticia.'&estado=1"
														class="icono_baja_noticia" title="Baja"></a>';
													}else{
													echo '<a
														href="'.base_url().'Oficina_virtual/estado_noticia?noticia_id='.$id_noticia.'&estado=0"
														class="icono_alta_noticia" title="Alta"></a>';
													}
													echo '<a
														href="'.base_url().'Oficina_virtual/modificar_noticia?noticia_id='.$id_noticia.'"
														class="icono_modificar_noticia" title="Actualizar"> </a>';
													?>
												</div>
											</td>
										</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="modal_insertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="exampleModalLabel1">Insertar Nueva Noticia</h4>
					</div>
					<div class="modal-body">
						<!--<form action="<?php echo base_url();?>zona_urbana/insertar" method="POST">-->
						<?php echo form_open('Oficina_virtual/almacenar_noticia', array('method'=>'POST', 'id'=>'insertar', 'enctype'=>'multipart/form-data')); ?>

						<div class="form-group">
							<label for="recipient-name" class="control-label titulo_noticia">Titulo</label>
							<input type="text" class="form-control" id="titulo" name="titulo" value="">
						</div>

						<div class="form-group">
							<label for="recipient-name" class="control-label titulo_noticia">Descripcion</label>
							<textarea rows="4" class="cuadro_texto_noticia" id="contenido" name="contenido"></textarea>
						</div>

						<div class="form-group disenio_imagen">
							<label for="recipient-name" class="control-label titulo_noticia">imagen</label>
							<!--  seleccionar imagen noticia-->
							<div class="imagen_para">
								<div class="imagen_archivo">
									<input type="file" id="archivo_seleccionado" name="archivo_seleccionado"
										onchange="seleccionar_archivo_imagen()" />
								</div>
							</div>
						</div>
						<!--  Visualizar imagen-->
						<div class="vista_imagen">
							<div class="datos_imagen">
								<div id="ver_archivo"></div>
							</div>
						</div>
						<input type="hidden" name="base_sesenta_y_cuatro" id="base_sesenta_y_cuatro">

						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
							<button type="submit" class="btn btn-primary">Guardar</button>
						</div>
						</form>
					</div>

				</div>
			</div>
		</div>

		<script>
			function seleccionar_archivo_imagen() {
				document.getElementById("ver_archivo").style.background = 'white';
				var filesSelected = document.getElementById("archivo_seleccionado").files;
				var formato_imagen
				formato_imagen = filesSelected[0];
				if (formato_imagen.type === "image/jpeg") {
					if (filesSelected.length > 0) {
						var fileToLoad = filesSelected[0];
						var fileReader = new FileReader();
						fileReader.onload = function (fileLoadedEvent) {
							var srcData = fileLoadedEvent.target.result; // <--- data: base64
							var newImage = document.createElement('img');
							newImage.src = srcData;
							document.getElementById("ver_archivo").innerHTML = newImage.outerHTML; // Enviara la imagen
							//alert("Converted Base64 version is " + document.getElementById("imgTest").innerHTML);
							document.getElementById("base_sesenta_y_cuatro").innerHTML = srcData;
							document.getElementsByName("base_sesenta_y_cuatro")[0].value = srcData;
							//console.log("Converted Base64 version is " + document.getElementById("imgTest").innerHTML);
						}
						fileReader.readAsDataURL(fileToLoad);
					}
				} else if (formato_imagen.type === "image/png") {
					if (filesSelected.length > 0) {
						var fileToLoad = filesSelected[0];
						var fileReader = new FileReader();
						fileReader.onload = function (fileLoadedEvent) {
							var srcData = fileLoadedEvent.target.result; // <--- data: base64
							var newImage = document.createElement('img');
							newImage.src = srcData;
							document.getElementById("ver_archivo").innerHTML = newImage.outerHTML; // Enviara la imagen
							//alert("Converted Base64 version is " + document.getElementById("imgTest").innerHTML);
							document.getElementById("base_sesenta_y_cuatro").innerHTML = srcData;
							document.getElementsByName("base_sesenta_y_cuatro")[0].value = srcData;
							//console.log("Converted Base64 version is " + document.getElementById("imgTest").innerHTML);
						}
						fileReader.readAsDataURL(fileToLoad);
					}
				} else {
					alert('Archivo no permitido. Seleccione una imagen en formato PNG o JPEG.')
					document.getElementById("archivo_seleccionado").value = ''
					document.getElementById("base_sesenta_y_cuatro").value = ''
				}
			}

		</script>
