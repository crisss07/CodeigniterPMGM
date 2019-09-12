
	Aqui el contenido
	<div class="m-grid__item m-grid__item--fluid m-wrapper">
		<!-- BEGIN: Subheader -->
		<div class="m-subheader ">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="m-subheader__title ">
						Dashboard
					</h3>
				</div>
				<div>
					<span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
						<span class="m-subheader__daterange-label">
							<span class="m-subheader__daterange-title"></span>
							<span class="m-subheader__daterange-date m--font-brand"></span>
						</span>
						<a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
							<i class="la la-angle-down"></i>
						</a>
					</span>
				</div>
			</div>
		</div>
		<!-- END: Subheader -->
		<div class="m-content">
			<!--Begin::Main Portlet-->
			<div class="row">
				<div class="col-xl-12">
					<!--begin:: Widgets/Top Products-->
					<div class="m-portlet m-portlet--bordered-semi m-portlet--full-height">
						<div class="m-portlet__head">
							<div class="m-portlet__head-caption">
								<div class="m-portlet__head-title">
									<h3 class="m-portlet__head-text">
										Información general
									</h3>
								</div>
							</div>
							<div class="m-portlet__head-tools">
								<ul class="m-portlet__nav">
									<li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover" aria-expanded="true">
										<a href="#" class="m-portlet__nav-link m-dropdown__toggle dropdown-toggle btn btn--sm m-btn--pill btn-secondary m-btn m-btn--label-brand">
											All
										</a>
										<div class="m-dropdown__wrapper">
											<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust" style="left: auto; right: 36.5px;"></span>
											<div class="m-dropdown__inner">
												<div class="m-dropdown__body">
													<div class="m-dropdown__content">
														<ul class="m-nav">
															<li class="m-nav__item">
																<a href="" class="m-nav__link">
																	<i class="m-nav__link-icon flaticon-share"></i>
																	<span class="m-nav__link-text">
																		Activity
																	</span>
																</a>
															</li>
															<li class="m-nav__item">
																<a href="" class="m-nav__link">
																	<i class="m-nav__link-icon flaticon-chat-1"></i>
																	<span class="m-nav__link-text">
																		Messages
																	</span>
																</a>
															</li>
															<li class="m-nav__item">
																<a href="" class="m-nav__link">
																	<i class="m-nav__link-icon flaticon-info"></i>
																	<span class="m-nav__link-text">
																		FAQ
																	</span>
																</a>
															</li>
															<li class="m-nav__item">
																<a href="" class="m-nav__link">
																	<i class="m-nav__link-icon flaticon-lifebuoy"></i>
																	<span class="m-nav__link-text">
																		Support
																	</span>
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<div class="m-portlet__body">
							<!--begin::Section-->
							<div class="m-section m-section--last">
								<div class="m-section__content">
									<!--begin::Preview-->
									<div class="m-demo" data-code-preview="true" data-code-html="true" data-code-js="false">
										<div class="m-demo__preview">
											<div class="m-list-search">
												<div class="m-list-search__results">
													
													<a href="#" class="m-list-search__result-item">
														<span class="m-list-search__result-item-pic">
															<img class="m--img-rounded" src="<?php echo base_url().'publico/assets/app/media/img/users/perfil.jpg' ;?>" title="">
														</span>
														<span class="m-list-search__result-item-text">
														<b>
															<?php
																echo $_SESSION['usuario'];
															?>
														</b><br>
															
															<?php 
																//$id = $this->session->userdata("persona_perfil_id");
																$id = $_SESSION['persona_perfil_id'];
																$this->load->model('usuario_model');
																$res = $this->usuario_model->getUsuario($id);
																/*
																$datos = $this->db->query("select * from persona_perfil ")->result();
																foreach ($datos as $data) {
																	echo $data->persona_id;
																}*/
															?>
														</span>
													</a>
													
													<span class="m-list-search__result-category">
														Datos personales
													</span>
												<?php
            										/*foreach($datos as $dato)
										            {*/
										                ?>
													<a href="#" class="m-list-search__result-item">
														<span class="m-list-search__result-item-icon">
															<i class="flaticon-lifebuoy m--font-warning"></i>
														</span>
														<span class="m-list-search__result-item-text">
															<?php echo $res->nombres;?> <?php echo $res->paterno;?> <?php echo $res->materno;?>
														</span>
													</a>
													<a href="#" class="m-list-search__result-item">
														<span class="m-list-search__result-item-icon">
															<i class="flaticon-coins m--font-primary"></i>
														</span>
														<span class="m-list-search__result-item-text">
															<?=$res->ci?>
														</span>
													</a>
													<a href="#" class="m-list-search__result-item">
														<span class="m-list-search__result-item-icon">
															<i class="flaticon-calendar m--font-danger"></i>
														</span>
														<span class="m-list-search__result-item-text">
															<?=$res->fec_nacimiento?>
														</span>
													</a>
													<?php
										            //}
										            ?>
												</div>
											</div>
										</div>
									</div>
									<!--end::Preview-->
									<!--begin::Dropdown-->
									
									<!--end::Dropdown-->
								</div>
							</div>
							<!--end::Section-->
						</div>
					</div>
					<!--end:: Widgets/Top Products-->
				</div>
				
			</div>
			<!--End::Main Portlet-->
			<!--Begin::Main Portlet-->
			
			<!--End::Main Portlet-->
			
			
		</div>
	</div>
	<!--begin::Modal-->
			<div class="modal fade" id="m_modal_5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">
								New message
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">
									&times;
								</span>
							</button>
						</div>
						<div class="modal-body">
							<form>
								<div class="form-group">
									<label for="recipient-name" class="form-control-label">
										Recipient:
									</label>
									<input type="text" class="form-control" id="recipient-name">
								</div>
								<div class="form-group">
									<label for="message-text" class="form-control-label">
										Message:
									</label>
									<textarea class="form-control" id="message-text"></textarea>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">
								Close
							</button>
							<button type="button" class="btn btn-primary">
								Send message
							</button>
						</div>
					</div>
				</div>
			</div>
			<!--end::Modal-->
</div>