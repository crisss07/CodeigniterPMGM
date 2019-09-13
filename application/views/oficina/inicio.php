        <!--================banner Area =================-->
        <section class="banner_area d-flex text-center">
            <div class="container align-self-center">
                <div class="row">
                    <div class="col-md-12">
                        <div class="banner_content">
                            <h6>Catastro</h6>
                            <h1>Oficina Virtual</h1>
                            <p>Podra realizar consultas, iniciar tramite, obtener informacion.</p>
                            <a href="<?php echo base_url(); ?>oficina_virtual/nuevo" class="btn_hover btn_hover_two">Iniciar tramite</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================banner Area =================-->
        <style type="text/css">
            p{
                display: inline-block;
            }
        </style>
        <!--================Event Date Area =================-->
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
                                <div ><p id="minutos" class="minutos">48</p></div>
                                <div class="timer__label">Minutes</div>
                            </div>
                            <div class="timer__section seconds">
                                <div ><p id="segundos" class="segundos">12</p></div>
                                <div class="timer__label">seconds</div>
                            </div>
                            <div class="timer__section days">
                                <div class="timer__number"><p id="ampm" class="ampm">AM</p></div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

                    <p>:</p>
                    <p id="minutos" class="minutos">48</p>
                    <p>:</p>
                    
                    
        <!--================Event Date Area =================-->
        
        <!--================About Area =================-->
        <section class="about_area section_gap">
            <div class="container">
                <div class="section_title text-center">
                    <h2>NOTICIAS</h2>
                    <!-- <p>The French Revolution constituted for the conscience of the dominant aristocratic class a fall from </p> -->
                </div>
                <div class="row">
                    <div class="col-md-6 d_flex">
                        <div class="about_content flex">
                            <h3 class="title_color">CATASTRO URBANO EN LOS TIEMPOS DEL ESTADO PLURINACIONAL DE BOLIVIA</h3>
                            <p>El Estado Plurinacional de Bolivia a través del Ministerio de Obras Públicas, Servicios y Vivienda ha logrado establecer los procesos de gestión y generación del catastro urbano en 12 Gobiernos Autónomos Municipales (GAMs) principales del país que a la fecha llegó aproximadamente a 500.000 predios urbanos para poder contar con información que servirá para las políticas públicas municipales y nacionales en el marco de la autonomía promovida desde la gestión 2010. </p>
<!--                             <a href="#" class="about_btn btn_hover">Read Full Story</a> -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img style="width: 500px; height: 300px;" src="<?php echo base_url(); ?>public/assets/images/imagen1.jpg" alt="abou_img">
                    </div>
                </div>
            </div>
        </section>
        <!--================About Area =================-->
        
        <!--================Features Area =================-->
        <section class="features_area">
            <div class="row m0">
                <div class="col-md-3 features_item">
                    <h3>Cambio de nombre</h3>
                    <p>Se podra realizar el cambio de nombre del propietario de un predio.</p>
                    <a href="<?php echo base_url(); ?>oficina_virtual/requisitos" class="btn_hover view_btn">Ver Detalles</a>
                </div>
                <div class="col-md-3 features_item">
                    <h3>Linea y nivel (Solo urbanizaciones aprobadas)</h3>
                    <p>Se verifica que el predio este en las dimensiones que muestra el documento.</p>
                    <a href="<?php echo base_url(); ?>oficina_virtual/requisitos" class="btn_hover view_btn">Ver Detalles</a>
                </div>
                <div class="col-md-3 features_item">
                    <h3>Pago de transferencia</h3>
                    <p>Aprobacion de la transferencia de predio y autorizacion del pago para dicha transaccion.</p>
                    <a href="<?php echo base_url(); ?>oficina_virtual/requisitos" class="btn_hover view_btn">Ver Detalles</a>
                </div>
                <div class="col-md-3 features_item">
                    <h3>Aprobacion de planos de lote</h3>
                    <p>Se aprueba la construccion del predio vajo las normas del estado, siempre y cuando cumpla con los requerimientos</p>
                    <a href="<?php echo base_url(); ?>oficina_virtual/requisitos" class="btn_hover view_btn">Ver Detalles</a>
                </div>
            </div>
        </section>
        <!--================Features Area =================-->
        
        <!--================Sermons work Area =================-->
        <section class="sermons_work_area section_gap">
            <div class="container">
                <div class="section_title text-center">
                    <h2>NOTICIAS</h2>
                    <<!-- p>The French Revolution constituted for the conscience of the dominant aristocratic class a fall from</p> -->
                </div>
                <div class="sermons_slider owl-carousel">
                    <div class="item row">
                        <div class="col-lg-8">
                            <div class="sermons_image">
                                <img style="width: 600px;height: 300px;" src="<?php echo base_url(); ?>public/assets/images/imagen2.jpg" alt="">
                                <p>Cnl. Marco Zenteno Santa Cruz, comandante del Instituto Geográfico Militar, explicó  que Porco se constituiría en el primer municipio a nivel nacional en validar su sistema catastral con el viceministerio de urbanismo y vivienda, es decir, éste municipio contaría con una herramienta importante para su planificación territorial.</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="sermons_content">
                                <h3 class="title_color">PORCO ES EL PRIMER MUNICIPIO EN BOLIVIA EN VALIDAR SU SISTEMA DE CATASTRO URBANO
</h3>
                                <ul class="list_style sermons_category">
                                    <!-- <li><i class="lnr lnr-user"></i><span>Fecha: </span><a href="#"> Travor James</a></li>
                                    <li><i class="lnr lnr-database"></i><span>Sermon Speaker: </span> Prayer</li> -->
                                    <li><i class="lnr lnr-calendar-full"></i><span>Fecha:</span>  25 abril, 2019</li>
                                </ul>
                              <!--   <a href="#" class="btn_hover">View More Details</a> -->
                            </div>
                        </div>
                    </div>
                    <div class="item row">
                        <div class="col-lg-8">
                            <div class="sermons_image">
                                <img style="width: 600px;height: 300px;" src="<?php echo base_url(); ?>public/assets/images/imagen3.jpg" alt="">
                                <p>En Bolivia según estudios efectuados el 60% no tiene regularizados el derecho propietario de los inmuebles. Esto debido a muchos factores como la burocracia en el trámite en las instancias encargadas como son los gobiernos municipales y lo otro por la dejadez de los mismos propietarios.

Con el fin de coadyuvar en la regulación del derecho propietario de la población boliviana fue creado el programa PROREVI (Programa de Regularización de Derecho Propietario sobre Vivienda) en el año 2012.</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="sermons_content">
                                <h3 class="title_color">60% DE LOS INMUEBLES EN BOLIVIA NO ESTÁN REGULARIZADOS COMO DERECHO PROPIETARIO</h3>
                                <ul class="list_style sermons_category">
                                    <!-- <li><i class="lnr lnr-user"></i><span>Categories: </span><a href="#"> Travor James</a></li>
                                    <li><i class="lnr lnr-database"></i><span>Sermon Speaker: </span> Prayer</li> -->
                                    <li><i class="lnr lnr-calendar-full"></i><span>Fecha:</span>  18 diciembre, 2018</li>
                                </ul>
                                <!-- <a href="#" class="btn_hover">View More Details</a> -->
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </section>
        <!--================Sermons work Area=================-->
        <!--================Donate Area=================-->
       <!--  <section class="donate_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 d-flex align-self-center">
                        <div class="donate_content ">
                            <h2>Your donation can save <br>many lives</h2>
                            <p>The French Revolution constituted for the conscience of the dominant aristocratic class a fall from innocence.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="donation_form">
                            <h3>How much would you like to donate?</h3>
                            <div class="form-group">
                                <input type='text' class="form-control" placeholder="$5"/>
                            </div>
                            <div class="form-group">
                                <input type='text' class="form-control" placeholder="$5"/>
                            </div>
                            <div class="form-group">
                                <input type='text' class="form-control" placeholder="$5"/>
                            </div>
                            <div class="form-group">
                                <input type='text' class="form-control" placeholder="Any"/>
                            </div>
                            <a href="#" class="btn_hover btn_hover_two">Donate Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!--================Donate Area=================-->
        
        <!--================Event Blog Area=================-->
        <!-- <section class="event_blog_area section_gap">
            <div class="container">
                <div class="section_title text-center">
                    <h2>Upcoming Events</h2>
                    <p>We all live in an age that belongs to the young at heart. Life that is becoming extremely fast</p>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="event_post">
                            <img src="image/blog1.jpg" alt="">
                            <a href="#"><h2 class="event_title">Spreading Peace to world</h2></a>
                            <ul class="list_style sermons_category event_category">
                                <li><i class="lnr lnr-user"></i>Saturday, 5th may, 2018</li>
                                <li><i class="lnr lnr-apartment"></i>Rocky beach Church</li>
                                <li><i class="lnr lnr-location"></i>Santa monica, Los Angeles, USA</li>
                            </ul>
                            <a href="#" class="btn_hover">View Details</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="event_post">
                            <img src="image/blog2.jpg" alt="">
                            <a href="#"><h2 class="event_title">Spread Happyness to world</h2></a>
                            <ul class="list_style sermons_category event_category">
                                <li><i class="lnr lnr-user"></i>Saturday, 5th may, 2018</li>
                                <li><i class="lnr lnr-apartment"></i>Rocky beach Church</li>
                                <li><i class="lnr lnr-location"></i>Santa monica, Los Angeles, USA</li>
                            </ul>
                            <a href="#" class="btn_hover">View Details</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="event_post">
                            <img src="image/blog3.jpg" alt="">
                            <a href="#"><h2 class="event_title">Spreading Light to world</h2></a>
                            <ul class="list_style sermons_category event_category">
                                <li><i class="lnr lnr-user"></i>Saturday, 5th may, 2018</li>
                                <li><i class="lnr lnr-apartment"></i>Rocky beach Church</li>
                                <li><i class="lnr lnr-location"></i>Santa monica, Los Angeles, USA</li>
                            </ul>
                            <a href="#" class="btn_hover">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!--================Blog Area=================-->
        
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