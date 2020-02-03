<style>
	#header{
  z-index: 100000;
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
	</style>

<br />
<br /><br />

<!-- ========== MAIN CONTENT ========== -->
 <!-- Title -->
 <div class="text-center w-md-80 w-lg-60 mx-md-auto mb-7">
                <h2>Tramites</h2>
                <p class="mb-0">Información, requisitos y flujo de tramites</p>
            </div>
      </div>

	<div class="contenedor_tramites">
		<?php foreach ($tramites as $listas): ?>
		<div class="row" id="tramite_items">
			<!-- Room -->
			<div class="contenedor_datos_tramite">
				<a class="card bg-img-hero lift-lg shadow-2-lg-hover border-0 gradient-overlay-half-dark-v2-2 min-height-320 text-white rounded-pseudo p-3 h-100"
					href="#" style="background-image: url(<?php echo base_url(); ?>public/img/enpadronamiento.jpg);">
					<div class="mb-3">
						<span class="badge badge-pill badge-dark bg-black-opacity-0_3 font-weight-normal text-uppercase px-3">1
							tramite en proceso</span>
					</div>
					<div class="mt-auto">
						<h5 class="font-weight-normal"><?php echo $listas["tramite"] ?></h5>
						<div class="d-flex align-items-center small text-white">
							<div class="d-flex align-items-center mr-4">
								<i class="svg-icon svg-icon-xs text-white mr-2">
									<img src="<?php echo base_url(); ?>public/img/tiempo_tramite.png" alt="requisitos tramite">
								</i>
								<?php echo $listas["tiempo"] ?> Dias
							</div>
							<div class="d-flex align-items-center">
								<i class="svg-icon svg-icon-xs text-white mr-2">
									<img src="<?php echo base_url(); ?>public/img/costo_tramite.png" alt="costo tramite">
								</i>
								<?php echo $listas["costo"] ?> Bs.
							</div>
						</div>
						<hr class="border-white-opacity-0_3">
						Información de <span class="text-primary font-weight-medium"
							onclick="abrir_modal(<?php echo $listas['tipo_tramite_id'] ?>)">tramite</span><br />
					</div>
				</a>
			</div>
			<!-- End Room -->
		</div>
		<a class="ocultar_etiqueta" href="#modal_<?php echo $listas["tipo_tramite_id"] ?>"
			data-modal-target="#modal_<?php echo $listas["tipo_tramite_id"] ?>"
			id="abrir_modal_<?php echo $listas["tipo_tramite_id"] ?>">Informacion tramite</a>
		<div id="modal_<?php echo $listas["tipo_tramite_id"] ?>" class="js-subscribe-for-updates u-modal-window contenedor_modal"
			style="height: 900px; width: 900px;">
			<button class="btn btn-sm btn-icon btn-text-secondary u-modal-window__close" type="button"
				onclick="Custombox.modal.close();"><span class="fas fa-times"></span></button>
			<header class="text-center mb-5">
				</br>
				</br>
				<h2 class="h3 mb-0"><?php echo $listas['tramite'] ?></h2>
				<p>Informacion de trámite</p>
			</header>
			<div class="container ">
				<div class="nav nav-tabs justify-content-center tab-modern mb-1" id="h-tab" role="tablist"
					aria-orientation="vertical">
					<a class="nav-link h7 active tab-modern__nav-link mb-4"
						id="informacion_<?php echo $listas["tipo_tramite_id"] ?>-tab" data-toggle="pill"
						href="#informacion_<?php echo $listas["tipo_tramite_id"] ?>" role="tab"
						aria-controls="informacion_<?php echo $listas["tipo_tramite_id"] ?>" aria-selected="true">
						<img class="max-width-8 tab-modern__nav-link-icon mx-auto mb-2"
							src="<?php echo base_url(); ?>public/oficina_virtual/assets/svg/business-icons/iStar_Design_Business_LineIcons_Live-45.svg"
							alt="Image Description">
						Información
					</a>
					<a class="nav-link h7 tab-modern__nav-link mb-4" id="requisitos_<?php echo $listas["tipo_tramite_id"] ?>-tab"
						data-toggle="pill" href="#requisitos_<?php echo $listas["tipo_tramite_id"] ?>" role="tab"
						aria-controls="requisitos_<?php echo $listas["tipo_tramite_id"] ?>" aria-selected="false">
						<img class="max-width-8 tab-modern__nav-link-icon mx-auto mb-2"
							src="<?php echo base_url(); ?>public/oficina_virtual/assets/svg/components/manage-primary-icon.svg"
							alt="Image Description">
						Requisitos
					</a>
					<a class="nav-link h7 tab-modern__nav-link mb-4" id="flujo_<?php echo $listas["tipo_tramite_id"] ?>-tab"
						data-toggle="pill" href="#flujo_<?php echo $listas["tipo_tramite_id"] ?>" role="tab"
						aria-controls="flujo_<?php echo $listas["tipo_tramite_id"] ?>" aria-selected="false">
						<img class="max-width-8 tab-modern__nav-link-icon mx-auto mb-2"
							src="<?php echo base_url(); ?>public/oficina_virtual/assets/svg/components/cog-primary-icon.svg"
							alt="Image Description">
						Flujo
					</a>
				</div>

				<div class="tab-content" id="h-tabContent">

					<div class="tab-pane fade show active" id="informacion_<?php echo $listas["tipo_tramite_id"] ?>"
						role="tabpanel" aria-labelledby="informacion_<?php echo $listas["tipo_tramite_id"] ?>-tab">

						<div class="p-5">
							<h3 class="h5 mb-3"><?php echo $listas["tramite"] ?></h3>
							<p class="mb-0"><?php echo $listas["informacion"] ?> </p>
						</div>

					</div>

					<div class="tab-pane fade" id="requisitos_<?php echo $listas["tipo_tramite_id"] ?>" role="tabpanel"
						aria-labelledby="requisitos_<?php echo $listas["tipo_tramite_id"] ?>-tab">

						<div class="p-5 ">
							<h3 class="h5 mb-3">Requisitos</h3>
							<?php foreach ($requisitos as $tramite): ?>
							<?php if ($tramite["tipo_tramite_id"] == $listas["tipo_tramite_id"]): ?>
							<p><span> <img src="<?php echo base_url(); ?>public/img/requisito.png" alt="papel requisito"></span>
								<?php echo $tramite["descripcion"] ?></p>
							<?php endif ?>
							<?php endforeach ?>
						</div>
						<!-- End About -->
					</div>

					<div class="tab-pane fade" id="flujo_<?php echo $listas["tipo_tramite_id"] ?>" role="tabpanel"
						aria-labelledby="flujo_<?php echo $listas["tipo_tramite_id"] ?>">
						<div class="p-5 modal_requisito">
							<div class="container">
								<ul class="u-timeline">
									<?php foreach ($flujo as $proceso): ?>
									
									<?php if ($proceso[0]["tipo_tramite_id"] == $listas["tipo_tramite_id"]): ?>
									<li class="u-timeline__item">
										<div class="u-timeline__content">
											<div class="media">
												<span class="u-icon u-icon--primary u-icon--sm u-timeline__icon rounded-circle mr-3">
													<span class="u-icon__inner"><?php echo $proceso[0]["orden"] ?></span>
												</span>
												<div class="media-body">
													<h4 class="h5"><?php echo $proceso[0]["flujo"] ?></h4>
													<!-- <p>This is where we sit down, grab a cup of coffee and dial in the details. Understanding the
														task at hand and ironing out the wrinkles is key.</p> -->
												</div>
											</div>
										</div>
										<div class="u-timeline__info">
											<!-- <img class="w-sm-50 w-lg-75 mx-lg-auto"
												src="<?php echo base_url(); ?>public/oficina_virtual/assets/svg/components/planning-illustration.svg"
												alt="Image Description"> -->
										</div>
										<div class="u-timeline__spacer"></div>
									</li>
									<?php endif ?>
									<?php endforeach ?>
								</ul>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<?php endforeach ?>
	</div>


	<script>
		function abrir_modal(tramite) {
			var nombre_modal = "abrir_modal_" + tramite;
			document.getElementById(nombre_modal).click();
		}

	</script>







	
