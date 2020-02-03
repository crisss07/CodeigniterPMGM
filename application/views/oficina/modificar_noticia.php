	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel1">Editar noticia</h4>
			</div>
			<div class="modal-body">
				<form action="<?php echo base_url();?>Oficina_virtual/actualizar_noticia" method="POST" enctype="multipart/form-data">
			

				<?php foreach ($noticia as $mt):?>
				<div class="form-group">
					<input type="text" hidden="" id="noticias_id" name="noticias_id">
				</div>

				<div class="form-group">
					<label for="recipient-name" class="control-label titulo_noticia">Titulo</label>
					<input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo ($mt->titulo); ?>">
				</div>

				<div class="form-group">
					<label for="recipient-name" class="control-label titulo_noticia">Descripcion</label>
					<textarea rows="4" class="cuadro_texto_noticia" id="contenido" name="contenido"><?php echo ($mt->contenido); ?></textarea>
				</div>

				<div class="form-group disenio_imagen">
					<label for="recipient-name" class="control-label titulo_noticia">Cambiar imagen</label>
					<input type="hidden" class="form-control" id="noticia_id" name="noticia_id" value="<?php echo ($mt->noticias_id); ?>">
                    <input type="hidden" id="nombre_imagen_noticia" name="nombre_imagen_noticia" value="<?php echo ($mt->adjunto); ?>">

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
				<?php endforeach; ?>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary">Guardar</button>

				</div>
				</form>
			</div>

		</div>
	</div>
    <script>
        var imagen = document.getElementById("nombre_imagen_noticia").value;
		document.getElementById("ver_archivo").style.background =
			'url("<?php echo base_url()?>public/assets/images/noticias/'+imagen+'")';
		document.getElementById("ver_archivo").style.backgroundSize = '90% 90%';
		document.getElementById("ver_archivo").style.backgroundRepeat = 'no-repeat';
		document.getElementById("ver_archivo").style.backgroundPosition = 'center';
	
	

	function seleccionar_archivo_imagen() {
		document.getElementById("ver_archivo").style.background = 'white';
		var filesSelected = document.getElementById("archivo_seleccionado").files;
		var formato_imagen
		formato_imagen = filesSelected[0];
		if (formato_imagen.type === "image/png") {
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
		} else if (formato_imagen.type === "image/jpg") {
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
