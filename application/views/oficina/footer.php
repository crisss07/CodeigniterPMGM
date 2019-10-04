<style type="text/css">
    p{
        display: inline-block;
    }
</style>
<section class="event_date_area">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d_flex">
                <div class="evet_location flex">
                    <h3></h3>
                    <p><span class="lnr lnr-calendar-full"></span><p id="diaSemana" class="diaSemana">Martes</p>
                    <p id="dia" class="dia">27</p>
                    <p>de </p>
                    <p id="mes" class="mes">Octubre</p>
                    <p>del </p>
                    <p id="year" class="year">2015</p></p>
                  <!--   <p><span class="lnr lnr-clock"></span>Saturday, 09.00 am to 05.00 pm</p> -->
                </div>
            </div>
            <div class="col-md-6 event_time">
                <h4>Hora</h4>
                <div id="timer" class="timer">
                    <div class="timer__section hours">
                        <div style="font-size: 30px;">        <p id="horas" class="horas">11</p></div>
                        <div class="timer__label">Hora</div>
                    </div>
                    <div class="timer__section minutes">
                        <div style="font-size: 30px;"><p id="minutos" class="minutos">48</p></div>
                        <div class="timer__label">Minutes</div>
                    </div>
                    <div class="timer__section seconds">
                        <div style="font-size: 30px;"><p id="segundos" class="segundos">12</p></div>
                        <div class="timer__label">seconds</div>
                    </div>
                    <div class="timer__section days">
                        <div style="font-size: 30px;"><p id="ampm" class="ampm">AM</p></div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>    
<footer class="footer-area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-3  col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6 class="footer_title">Oficina Virtual</h6>
                    <p>En enta oficina podra conocer como se realiza los tramites de catastro, podra realizar tramites en linea, tendra la manera de hacer seguimiento</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6 class="footer_title">Links de navegacion</h6>
                    <div class="row">
                        <div class="col-4">
                            <ul class="list_style">
                                <li><a href="<?php echo base_url(); ?>oficina_virtual/index">Inicio</a></li>
                                <li><a href="<?php echo base_url(); ?>oficina_virtual/requisitos">Requisitos</a></li>
                                <li><a href="<?php echo base_url(); ?>oficina_virtual/servicios">Servicios en linea</a></li>
                               
                            </ul>
                        </div>
                        <div class="col-4">
                            <ul class="list_style">
                                <li><a href="<?php echo base_url(); ?>oficina_virtual/nuevo">Iniciar tramite</a></li>
                                <li><a href="<?php echo base_url(); ?>oficina_virtual/inspecciones">Inspecciones</a></li>
                                
                            </ul>
                        </div>                                      
                    </div>                          
                </div>
            </div>                          
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6 class="footer_title">Contactos</h6>
                    <p>Podra contactarse a los numeros XXXXXXXXXXX nos encontramos ubicados en XXXXXXX XXXXXXX XXXXXX</p>     
                    <!-- <div id="mc_embed_signup">
                        <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative">
                            <div class="input-group d-flex flex-row">
                                <input name="EMAIL" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" required="" type="email">
                                <button class="btn sub-btn"><span class="lnr lnr-location"></span></button>     
                            </div>                                  
                            <div class="mt-10 info"></div>
                        </form>
                    </div> -->
                </div>
            </div>
            <!-- <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget instafeed">
                    <h6 class="footer_title">InstaFeed</h6>
                    <ul class="list_style instafeed d-flex flex-wrap">
                        <li><img src="image/instagram/Image-01.jpg" alt=""></li>
                        <li><img src="image/instagram/Image-02.jpg" alt=""></li>
                        <li><img src="image/instagram/Image-03.jpg" alt=""></li>
                        <li><img src="image/instagram/Image-04.jpg" alt=""></li>
                        <li><img src="image/instagram/Image-05.jpg" alt=""></li>
                        <li><img src="image/instagram/Image-06.jpg" alt=""></li>
                        <li><img src="image/instagram/Image-07.jpg" alt=""></li>
                        <li><img src="image/instagram/Image-08.jpg" alt=""></li>
                    </ul>
                </div>
            </div>        -->               
        </div>
        <div class="border_line"></div>
        <div class="row footer-bottom d-flex justify-content-between align-items-center">
            <p class="col-lg-8 col-sm-8 footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                © Ministerio de Obras P&uacute;blicas Servicios y Vivienda - <a href="#">Programa de Mejora de la Gesti&oacute;n Municipal</a>
            </p>
            <div class="col-lg-4 col-sm-4 footer-social">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-dribbble"></i></a>
                <a href="#"><i class="fa fa-behance"></i></a>
            </div>
        </div>
    </div>
</footer>
        <!--================ End footer Area  =================-->
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="<?php echo base_url(); ?>public/js_3/jquery-3.2.1.min.js"></script>
        <script src="<?php echo base_url(); ?>public/js_3/popper.js"></script>
        <script src="<?php echo base_url(); ?>public/js_3/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>public/vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="<?php echo base_url(); ?>public/js_3/jquery.ajaxchimp.min.js"></script>
        <script src="<?php echo base_url(); ?>public/js_3/mail-script.js"></script>
        <script src="<?php echo base_url(); ?>public/js_3/mail-script.js"></script>
        <script src="<?php echo base_url(); ?>public/js_3/stellar.js"></script>
        <script src="<?php echo base_url(); ?>public/vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="<?php echo base_url(); ?>public/vendors/flipclock/timer.js"></script>
        <script src="<?php echo base_url(); ?>public/vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="<?php echo base_url(); ?>public/js_3/custom.js"></script>
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
