<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html><!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Version: 5.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			Login
		</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>
		<!--end::Web font -->
		<!--begin::Base Styles -->
		<link href="<?php echo base_url().'publico/assets/vendors/base/vendors.bundle.css' ;?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url().'publico/assets/demo/default/base/style.bundle.css' ;?>" rel="stylesheet" type="text/css" />
		<!--end::Base Styles -->
		<link rel="shortcut icon" href="<?php echo base_url().'publico/assets/demo/default/media/img/logo/favicon.ico' ;?>" />
	</head>
	<!-- end::Head -->
	<!-- end::Body -->
	<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--singin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url(publico/assets/app/media/img//bg/bg-3.jpg);">
				<div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
					<div class="m-login__container">
						<div class="m-login__logo">
							<a href="https://www.oopp.gob.bo/">
								<img src="<?php echo base_url().'publico/assets/app/media/img/logos/logo1.png' ;?>">

							</a>
						</div>
						<div class="m-login__signin">
							<div class="m-login__head">
								<h3 class="m-login__title">
									Inicia Sesi&oacute;n
								</h3>
							</div>
							<form action="<?php echo base_url();?>login/login" method="POST" class="m-login__form m-form">
								<div class="form-group m-form__group">
									<input class="form-control m-input" type="text" placeholder="Nombre de Usuario" name="usuario" autocomplete="off">
								</div>
								<div class="form-group m-form__group">
									<input class="form-control m-input m-login__form-input--last" type="password" placeholder="Contrase&ntilde;a" name="contrasenia">
								</div>
								
								<div class="m-login__form-action">
									<button type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
										Iniciar
									</button>
								</div>
							</form>

						</div>
						<div class="m-login__signup">
							<div class="m-login__head">
								<h3 class="m-login__title">
									Reg&iacute;strate
								</h3>
								<div class="m-login__desc">
									Llene todos los campos:
								</div>
							</div>
							<form action="<?php echo base_url();?>persona/insertar" method="POST" class="m-login__form m-form">
								<div class="form-group m-form__group">
									<input class="form-control m-input" type="text" placeholder="Nombres" name="nombres" >
								</div>
								<div class="form-group m-form__group">
									<input class="form-control m-input" type="text" placeholder="Apellido Paterno" name="paterno" >
								</div>
								<div class="form-group m-form__group">
									<input class="form-control m-input" type="text" placeholder="Apellido Materno" name="materno" >
								</div>
								<div class="form-group m-form__group">
									<input class="form-control m-input" type="integer" placeholder="Carnet de Identidad" name="ci" >
								</div>
								<div class="form-group m-form__group">
									<input class="form-control m-input" type="date" placeholder="Fecha de Nacimiento (dd-mm-aaaa)" name="fec_nacimiento">
								</div>

								<!--
								<div class="form-group m-form__group">
									<input class="form-control m-input" type="text" placeholder="Nombre de Usuario" name="usuario" autocomplete="off">
								</div>
								<div class="form-group m-form__group">
									<input class="form-control m-input" type="password" placeholder="Contrase&ntilde;a" name="contrasenia">
								</div>
							     -->
								
								<div class="m-login__form-action">
									<button type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn">
										Regristrarte
									</button>
									&nbsp;&nbsp;
									<button id="m_login_signup_cancel" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom  m-login__btn">
										Cancelar
									</button>
								</div>
							</form>
						</div>
						<div class="m-login__account">
							<span class="m-login__account-msg">
								¿A&uacute;n no tienes una cuenta?
							</span>
							&nbsp;&nbsp;
							<a id="m_login_signup" class="m-link m-link--light m-login__account-link">
								Reg&iacute;strate
							</a>
						</div>
						
						
						
					</div>
				</div>
			</div>
		</div>
		<!-- end:: Page -->


		<!--begin::Base Scripts -->
		<script src="<?php echo base_url().'publico/assets/vendors/base/vendors.bundle.js' ;?>" type="text/javascript"></script>
		<script src="<?php echo base_url().'publico/assets/demo/default/base/scripts.bundle.js' ;?>" type="text/javascript"></script>
		<!--end::Base Scripts -->
		<!--begin::Page Snippets -->
		<script src="<?php echo base_url().'publico/assets/snippets/pages/user/login.js' ;?>" type="text/javascript"></script>
		<!--end::Page Snippets -->
	</body>
	<!-- end::Body -->
</html>
