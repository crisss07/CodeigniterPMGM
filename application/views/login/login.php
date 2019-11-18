<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>public/assets/images/favicon.png">
    <title>LOGIN</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>public/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>public/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo base_url(); ?>public/css/colors/blue.css" id="theme" rel="stylesheet">

    <!--alerts CSS -->
    <link href="<?php echo base_url(); ?>public/assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<style type="text/css">
        .botonimagen{
            background:
    url(data:image/gif;base64,R0lGODlhEAAQAMQAAORHHOVSKudfOulrSOp3WOyDZu6QdvCchPGolfO0o/XBs/fNwfjZ0frl3/zy7////wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAkAABAALAAAAAAQABAAAAVVICSOZGlCQAosJ6mu7fiyZeKqNKToQGDsM8hBADgUXoGAiqhSvp5QAnQKGIgUhwFUYLCVDFCrKUE1lBavAViFIDlTImbKC5Gm2hB0SlBCBMQiB0UjIQA7)
    no-repeat
    left center;
            background-repeat:no-repeat;
            height:50px;
            width:300px;
            background-position:center;
        }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image: url(public/assets/images/background/2.jpg);">        
            <div class="login-box card">
               <div class="m-login__logo btn btn-block">
                            <a href="">
                                <img src="<?php echo base_url().'publico/assets/app/media/img/logos/logo2.png' ;?>">
                            </a>
                </div> 

            <div class="card-body">
                
                <!--<form class="form-horizontal form-material" action="<?php echo base_url();?>login/login" method="POST">-->
                <?php echo form_open('login/login', array('class'=>'form-horizontal form-material', 'method'=>'POST')); ?>
                    <h3 class="box-title mb-3">Inicia Sesi&oacute;n</h3>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Nombre de Usuario" name="usuario" autofocus> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" required="" placeholder="Contrase&ntilde;a" name="contrasenia"> </div>
                    </div>
                    
                    <div class="form-group text-center mt-3">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Ingresar</button>
                        </div>
                    </div>

                   
                    <div class="form-group text-center mt-3">
                        <div class="col-xs-12"> 
                            <a href="https://cuenta.ciudadaniadigital.agetic.gob.bo/auth?client_id=a477e307-081a-4c62-bbf7-f53b88821a46&scope=openid%20nombre%20documento_identidad%20fecha_nacimiento%20email%20celular&response_type=code&redirect_uri=https%3A%2F%2Fwww.gob.bo%2Fciudadania%2Foauth%2Flogin.html&state=ccfd68adbc85596452e709dd2e178a84&nonce=2c24f56fb65cb668c30edf12dbaff93f" class="btn btn-secondary col-xs-12" >INGRESAR CON AGETIC </a>
                        </div>
                    </div>           
                   
                    
                </form>
               
            </div>
          </div>
        </div>
        
    </section>
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
    <script src="<?php echo base_url(); ?>public/js/custom.min.js"></script>
    <!-- ============================================================== -->
  <!-- Sweet-Alert  -->
    <script src="<?php echo base_url(); ?>public/assets/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/plugins/sweetalert/jquery.sweet-alert.custom.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url(); ?>public/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>

</body>
<<<<<<< Updated upstream
    
=======
<script type="text/javascript">
    function nonce (length) {
        var result = ''; var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';var charactersLength = characters.length;
        for ( var i = 0; i < length; i++ ) {result += characters.charAt(Math.floor(Math.random() * charactersLength));}
        return result;
        console.log(nonce(30));
    }
    function URL_CiudadaniaDigital(){
        var client_id               = 's6JKYjjYU6869BhdRkqt3',
            response_type           = 'core',
            state                   = '509ccc2713049e6efea071a9c34f6f45',
            nonce                   = nonce(30),
            redirect_uri            = 'http://localhost/CodeigniterPMGM/login/login',
            scope                   = 'openid%20profile';
            URL_cliente             = "https://<base-url-proveedor-identidad>/auth?response_type="+response_type+"&client_id="+client_id+"&state="+state+"&nonce="+nonce+"&redirect_uri="+redirect_uri;
            return URL_cliente;                
    }
    
</script>
>>>>>>> Stashed changes
</html>