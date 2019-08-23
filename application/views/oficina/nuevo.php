<style type="text/css">
	.col-form-label{
		text-align: right;
		font-weight: 500;
	}
	p{
        display: inline-block;
    }
</style>
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor mb-0 mt-0">Iniciar tramite</h3>
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
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Llenar formulario para iniciar su tramite</h4>
                                <h5 class="card-subtitle"> El llenado de este formulario podra ser validado	 con papeles originales </h5>
                                <form class="form">
                                	<div class="form-group row">
                                        <label for="example-month-input2" class="col-2 col-form-label">Tramite</label>
                                        <div class="col-10">
                                            <select class="custom-select col-12" id="example-month-input2">
                                            	<option selected="">Escoger</option>
                                            	<?php foreach ($tramites as $valores): ?>
                                            		<option value="1"><?php echo $valores->tramite; ?></option>
                                            	<?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-2 col-form-label">Propietario</label>
                                        <div class="col-10">
                                            <input class="form-control" type="search" id="example-search-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-2 col-form-label">Nro. folio</label>
                                        <div class="col-10">
                                            <input class="form-control" type="search" id="example-search-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-2 col-form-label">......</label>
                                        <div class="col-10">
                                            <input class="form-control" type="search" id="example-search-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-2 col-form-label">......</label>
                                        <div class="col-10">
                                            <input class="form-control" type="search" id="example-search-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-2 col-form-label">.........</label>
                                        <div class="col-10">
                                            <input class="form-control" type="search" id="example-search-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-2 col-form-label">.......</label>
                                        <div class="col-10">
                                            <input class="form-control" type="search" id="example-search-input">
                                        </div>
                                    </div>                                                                    
                                </form>
                            </div>
                        </div>
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