    <div class="page-wrapper" style="background: #0489B1; height: 10px;">
				<div class="container-fluid" style="background: #0489B1;" >
                    <div class="row page-titles">
                        <div class="col-md-6 col-8 align-self-center">
                            <h3 class="text-themecolor mb-0 mt-0"></h3>
                        </div>
          
                    </div>        
                    <div class="row">
                        <div class="col-lg-4 col-md-12" >
                            <div class="card" style="background: #0489B1;">
                                <div class="card-body">
                                    <img class="" src="<?php echo base_url(); ?>public/assets/images/oficina/catastro.png" alt="Third slide">       
                                    <p style="color: white; padding: 20px;"> © Todos los derechos reservados</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12" >
                            <div class="card" style="background: #0489B1;">
                                <div class="card-body">
                                    <h3 style="color: white;">Redes Sociales</h3>    
                                    <div class="custom"  >
                                        <ul >
                                            <li><a class="facebook-block" href="//www.facebook.com/MinTrabajoBol/" target="_blank"><i class="mdi mdi-facebook"></i><span style="color: white">Facebook</span></a></li>
                                            <li><a class="twitter-block" href="//twitter.com/MinTrabajoBol"  target="_blank"><i class="mdi mdi-twitter"></i><span style="color: white">Twiter</span></a></li>
                                            <li><a class="youtube-block" href="//www.youtube.com/channel/UC1xsWye6VjRT7hqzBBGER1Q"  target="_blank"><i class="mdi mdi-youtube-play"></i><span style="color: white">Twiter</span></a></li>
                                        </ul>
                                    </div>                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12" >
                            <div class="card" style="background: #0489B1;">
                                <div class="card-body">
                                    <h3 style="color: white;">Direccion</h3>   
                                    <p style="color: white;">
                                        Av. Mariscal Santa Cruz esq. Oruro
                                        <br>
                                        Edif. Centro de Comunicaciones La Paz
                                        <br>
                                        Piso 3
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <hr>
                    </div>
                    <div>
                        <p style="color: white; padding: 160px;">© Ministerio de Obras P&uacute;blicas Servicios y Vivienda - Programa de Mejora de la Gesti&oacute;n Municipal</p>
                    </div>
                    
                </div>
			</div>
	    </div>
	 <script src="<?php echo base_url(); ?>public/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url(); ?>public/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url(); ?>public/js_1/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url(); ?>public/js_1/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url(); ?>public/js_1/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url(); ?>public/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!-- Draggable-portlet -->
    <script src="<?php echo base_url(); ?>public/assets/plugins/jqueryui/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/plugins/gridstack/lodash.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/plugins/gridstack/gridstack.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/plugins/gridstack/gridstack.jQueryUI.js"></script>
    <script type="text/javascript">
    $(function() {
        $('.grid-stack').gridstack({
            width: 12,
            alwaysShowResizeHandle: /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent),
            resizable: {
                handles: 'e, se, s, sw, w'
            }
        });
    });
    </script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url(); ?>public/js_1/custom.min.js"></script>
    <!-- ============================================================== -->
     <script src="<?php echo base_url(); ?>public/assets/plugins/jquery-datatables-editable/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/plugins/datatables/datatables.min.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/plugins/tiny-editable/mindmup-editabletable.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/plugins/tiny-editable/numeric-input-example.js"></script>
    <script>
    $('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();
    $('#editable-datatable').editableTableWidget().numericInputExample().find('td:first').focus();
    $(document).ready(function() {
        $('#editable-datatable').DataTable();
    });
    </script>
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url(); ?>public/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <script type="text/javascript">
    (function(){
    var actualizarHora = function(){
        // Obtenemos la fecha actual, incluyendo las horas, minutos, segundos, dia de la semana, dia del mes, mes y año;
        var fecha = new Date(),
            horas = fecha.getHours(),
            ampm,
            minutos = fecha.getMinutes(),
            segundos = fecha.getSeconds(),
            diaSemana = fecha.getDay(),
            dia = fecha.getDate(),
            mes = fecha.getMonth(),
            year = fecha.getFullYear();

        // Accedemos a los elementos del DOM para agregar mas adelante sus correspondientes valores
        var pHoras = document.getElementById('horas'),
            pAMPM = document.getElementById('ampm'),
            pMinutos = document.getElementById('minutos'),
            pSegundos = document.getElementById('segundos'),
            pDiaSemana = document.getElementById('diaSemana'),
            pDia = document.getElementById('dia'),
            pMes = document.getElementById('mes'),
            pYear = document.getElementById('year');

        
        // Obtenemos el dia se la semana y lo mostramos
        var semana = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];
        pDiaSemana.textContent = semana[diaSemana];

        // Obtenemos el dia del mes
        pDia.textContent = dia;

        // Obtenemos el Mes y año y lo mostramos
        var meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
        pMes.textContent = meses[mes];
        pYear.textContent = year;

        // Cambiamos las hora de 24 a 12 horas y establecemos si es AM o PM

        if (horas >= 12) {
            horas = horas - 12;
            ampm = 'PM';
        } else {
            ampm = 'AM';
        }

        // Detectamos cuando sean las 0 AM y transformamos a 12 AM
        if (horas == 0 ){
            horas = 12;
        }

        // Si queremos mostrar un cero antes de las horas ejecutamos este condicional
        // if (horas < 10){horas = '0' + horas;}
        pHoras.textContent = horas;
        pAMPM.textContent = ampm;

        // Minutos y Segundos
        if (minutos < 10){ minutos = "0" + minutos; }
        if (segundos < 10){ segundos = "0" + segundos; }

        pMinutos.textContent = minutos;
        pSegundos.textContent = segundos;
    };

    actualizarHora();
    var intervalo = setInterval(actualizarHora, 1000);
}())
</script>
</body>

</html>
