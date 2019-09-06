<style type="text/css">
    p{
        display: inline-block;
    }
</style>
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor mb-0 mt-0">Noticias</h3>
                <!-- <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Stylish Tooltips</li>
                </ol> -->
            </div>
            <div class="col-md-6 col-4 align-self-center">
                <button class="btn float-right hidden-sm-down btn-success"> 
                    <p id="diaSemana" class="diaSemana">Martes</p>
                    <p id="dia" class="dia">27</p>
                    <p>de </p>
                    <p id="mes" class="mes">Octubre</p>
                    <p>del </p>
                    <p id="year" class="year">2015</p>
                </button>
                <button class="float-right mr-2 hidden-sm-down btn btn-secondary" type="button"   > 
                    <p id="horas" class="horas">11</p>
                    <p>:</p>
                    <p id="minutos" class="minutos">48</p>
                    <p>:</p>
                    <p id="segundos" class="segundos">12</p>
                    <p id="ampm" class="ampm">AM</p>
                </button>    
            </div>            
        </div>
        
        <div class="row">
            <div class="col-lg-9 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Draggable Panel Portlets</h4>
                        <h6 class="card-subtitle">Thus is a widget layout jquery plugin. <a href="http://troolee.github.io/gridstack.js/" target="_blank">gridstack.js</a> is used to design this layout. This is drag-and-drop multi-column grid. It allows you to build draggable responsive layouts.</h6>
                        <div class="grid-stack" data-gs-width="12" data-gs-animate="yes">
                            <div class="grid-stack-item" data-gs-x="0" data-gs-y="0" data-gs-width="4" data-gs-height="3">
                                <div class="grid-stack-item-content">
                                	<img class="img-responsive" src="<?php echo base_url(); ?>public/assets/images/oficina/noticia1.jpg" alt="Third slide">
	                                <h5 class="card-title">Sales of the Month</h4>
	                                <div style="text-align: justify;">
	                                    <h6>
	                                    	Para el pueblo lo que es del pueblo, porque el pueblo se lo ganó. 
	                                    </h6>
	                                </div>
                                </div>
                            </div>
                            <div class="grid-stack-item" data-gs-x="4" data-gs-y="0" data-gs-width="4" data-gs-height="3">
                                <div class="grid-stack-item-content">
                                    <img class="img-responsive" src="<?php echo base_url(); ?>public/assets/images/oficina/noticia2.jpg" alt="Third slide">
	                                <h5 class="card-title">Sales of the Month</h4>
	                                <div style="text-align: justify;">
	                                    <h6>
	                                    	Para el pueblo lo que es del pueblo, porque el pueblo se lo ganó. 
	                                    </h6>
	                                </div>
                                </div>
                            </div>
                            <!-- <div class="grid-stack-item" data-gs-x="8" data-gs-y="0" data-gs-width="2" data-gs-height="2" data-gs-min-width="2" data-gs-no-resize="yes">
                                <div class="grid-stack-item-content"> <span class="fa fa-hand-o-up"></span> Drag me! </div>
                            </div> -->
                            <div class="grid-stack-item" data-gs-x="9" data-gs-y="0" data-gs-width="4" data-gs-height="3">
                                <div class="grid-stack-item-content">
                                	<img class="img-responsive" src="<?php echo base_url(); ?>public/assets/images/oficina/noticia3.jpg" alt="Third slide">
	                                <h5 class="card-title">Sales of the Month</h4>
	                                <div style="text-align: justify;">
	                                    <h6>
	                                    	Para el pueblo lo que es del pueblo, porque el pueblo se lo ganó. 
	                                    </h6>
	                                </div>
                                </div>
                            </div>
                            <div class="grid-stack-item" data-gs-x="0" data-gs-y="3" data-gs-width="4" data-gs-height="3">
                                <div class="grid-stack-item-content">
                                	<img class="img-responsive" src="<?php echo base_url(); ?>public/assets/images/oficina/noticia4.jpg" alt="Third slide">
	                                <h5 class="card-title">Sales of the Month</h4>
	                                <div style="text-align: justify;">
	                                    <h6>
	                                    	Para el pueblo lo que es del pueblo, porque el pueblo se lo ganó. 
	                                    </h6>
	                                </div>
                                </div>
                            </div>
                            <div class="grid-stack-item" data-gs-x="4" data-gs-y="3" data-gs-width="4" data-gs-height="3">
                                <div class="grid-stack-item-content">
                                	<img class="img-responsive" src="<?php echo base_url(); ?>public/assets/images/oficina/noticia5.jpg" alt="Third slide">
	                                <h5 class="card-title">Sales of the Month</h4>
	                                <div style="text-align: justify;">
	                                    <h6>
	                                    	Para el pueblo lo que es del pueblo, porque el pueblo se lo ganó. 
	                                    </h6>
	                                </div>
                                </div>
                            </div>
                        </div>
           			</div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Sales of the Month</h4>
                        <div id="sales-donute" style="width:100%; height:300px;"></div>
                        <div class="round-overlap mt-3"><i class="mdi mdi-cart"></i></div>
                        <ul class="list-inline mt-4 text-center">
                            <li><i class="fa fa-circle text-purple"></i> Item A</li>
                            <li><i class="fa fa-circle text-success"></i> Item B</li>
                            <li><i class="fa fa-circle text-info"></i> Item C</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12" >
                <div class="card" style="background: #0489B1;">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class=""><img src="<?php echo base_url(); ?>public/assets/images/users/1.jpg" alt="user" class="img-circle" width="100"></div>
                            <div class="pl-3">
                                <h3 style="color: white;" class="font-medium">Daniel Kristeen</h3>
                                <h6 style="color: white;">UIUX Designer</h6>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col border-right">
                                <h2 style="color: white;" class="font-light">14</h2>
                                <h6 style="color: white;" >Photos</h6></div>
                            <div class="col border-right">
                                <h2 style="color: white;" class="font-light">54</h2>
                                <h6 style="color: white;">Videos</h6></div>
                            <div class="col">
                                <h2 style="color: white;" class="font-light">145</h2>
                                <h6 style="color: white;" >Tasks</h6></div>
                        </div>
                    </div>
                    <div>
                        <hr>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
 </div>  