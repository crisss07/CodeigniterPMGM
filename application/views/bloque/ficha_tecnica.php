<!DOCTYPE html>
<html>
<head>
    <title>Reporte</title>
    <link href="<?php echo base_url(); ?>public/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>public/assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->

    <link href="<?php echo base_url(); ?>public/css/style.css" rel="stylesheet">
    
    <!-- You can change the theme colors from here -->
    <link href="<?php echo base_url(); ?>public/css/colors/blue-dark.css" id="theme" rel="stylesheet">
    <link href="<?php echo base_url(); ?>public/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/assets/plugins/switchery/dist/switchery.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>public/assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <script src="<?php echo base_url(); ?>public/assets/plugins/jquery/jquery.min.js"></script>

    <link href="<?php echo base_url(); ?>public/assets/plugins/wizard/steps.css" rel="stylesheet">

</head>
<body>
  <div>
        <!-- <div>
          <p>
          	<img src="<?php echo base_url().'public/assets/images/logo.png' ;?>" style=" float: left; height: 80px; width: 130px;">
            <img src="<?php echo base_url().'public/assets/images/pmgm.jpg' ;?>"  style=" float: right; height: 80px; width: 130px;">
            
<center>            <h5 style="padding-top: 10px;">ESTADO PLURINACIONAL DE BOLIVIA <br>MINISTERIO DE OBRAS PUBLICAS, SERVICIOS Y VIVIENDA <br>VICEMINSTERIO DE VIVIENDA Y URBANISMO </h5></center>					
          </p>
        </div> -->         
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card wizard-content">

                    <div class="card-body">

                        <?php 
                        /*$max = sizeof($grupos_subgrupos);
                        echo $max;

                        for ($i = 0; $i < $max ; $i++) {

                           //$last_names = array_column($result_array, 'alias');
                           
                         echo "<pre>";                                                                         
                         print_r($grupos_subgrupos[$i]['desc_grupo']);
                         echo "</pre>"; }*/


                        ?>
                        <!-- Step 2 -->

                        <div class="row page-titles">
                            <div class="col-md-6 col-8 align-self-center">
                                <h3 class="text-themecolor mb-0 mt-0">Registro Bloque Nro: </h3>

                            </div>
                        </div>
                        <?php echo form_open('Edificacion/create', array('method' => 'POST')); ?>

                        <input type="hidden" class="form-control required" id="cod_catastral" name="cod_catastral" readonly="" value="">
                        <input type="hidden" class="form-control required" id="nro_bloque" name="nro_bloque" readonly="" value="">
                        <h4>Caracteristicas de la construccion</h4>


                        <div class="row">
                            <!-- column -->


                            <div class="col-lg-3">
                                <!--grid 1-->
                                <div class="container-fluid">


                                    <?php 
                                    $max = sizeof($grupos_subgrupos);
                                    $long = $max - 1;
                                    $count = 0; //contador de las sumas

                                    $ngrupos = sizeof($grupos);
                                    $longgrupo = $ngrupos - 1;
                                    $cant = $longgrupo / 3;
                                    $cantgrupos = round($cant, 0);


                                    $count2 = 0; //contador de los ciclos

                                    $pos = 0; //posicion final de la ultima grid                                                                        


                                    for ($i = 0; $i < $max; $i++) { ?>

                                    <?php 

                                    if ($i == 0) {  ?>
                                    <hr>
                                    <div class="row" style="background-color:Ivory;">
                                        <div class="col-sm-5 col-md-8 " style="background-color:Ivory">
                                            <h6> <b> <?php print_r($grupos_subgrupos[$i]['desc_grupo']); ?> </b></h6>
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-2 col-md-4 col-md-offset-0" style="background-color:Ivory;"><small><i>Porcentaje %</i></small>
                                        </div>
                                    </div>
                                    <?php 
                                } else { ?>

                                    <?php 
                                } ?>
                                    <div class="row" style="background-color:Ivory;">
                                        <input type="hidden" class="form-control required" id="tam_grup_sub" name="tam_grup_sub" readonly="" value="<?php echo $max; ?>">

                                        <div class="col-sm-5 col-sm-offset-2 col-md-8 col-md-offset-0" style="background-color:Ivory">
                                            <small><i>
                                                    <?php 
                                                    print_r($grupos_subgrupos[$i]['desc_item']);
                                                    ?></i></small>
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-2 col-md-4 col-md-offset-0" style="background-color:Ivory;">

                                            <input type="hidden" class="form-control required" id="<?php echo $i; ?>a" name="<?php echo $i; ?>a" readonly="" value="<?php 
                                                                                                                                                                    echo $grupos_subgrupos[$i]['grupo_mat_id'];
                                                                                                                                                                    ?>">
                                            <input type="hidden" class="form-control required" id="<?php echo $i; ?>b" name="<?php echo $i; ?>b" readonly="" value="<?php 
                                                                                                                                                                    echo $grupos_subgrupos[$i]['mat_item_id'];
                                                                                                                                                                    ?>">
                                            <input type="number" class="form-control sumcontrol<?php echo $count ?>" name="<?php echo $i; ?>c" required value="0" size="3" min="0" max="100" oninput = "(validity.valid) || (value = ' ');">
                                        </div>
                                    </div>

                                    <?php $j = $i + 1;
                                    if ($i == $long) { ?>
                                    <?php $j = $i; ?>
                                    <div class="row" style="background-color:White;">

                                        <div class="col-sm-5 col-sm-offset-2 col-md-8 col-md-offset-0" style="background-color:White;" align="right">Total
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-2 col-md-4 col-md-offset-0" style="background-color:White;">
                                            <input type="text" class="form-control total<?php echo $count ?>" value="" readonly />
                                            <div class="form-control-feedback" Style="color:red;"><small id="validsuma<?php echo $count ?>"><i></i></small>
                                            </div>
                                        </div>
                                    </div>                                   
                                    <hr>
                                    <?php 
                                } ?>
                                    <?php 

                                    if ($grupos_subgrupos[$i]['grupo_mat_id'] != $grupos_subgrupos[$j]['grupo_mat_id']) {  ?>

                                    <div class="row" style="background-color:White;">

                                        <div class="col-sm-5 col-sm-offset-2 col-md-8 col-md-offset-0" style="background-color:White;" align="right">Total
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-2 col-md-4 col-md-offset-0 " style="background-color:White;">
                                            <input type="text" class="form-control total<?php echo $count ?>" value="" readonly />
                                            <div class="form-control-feedback" Style="color:red;"><small id="validsuma<?php echo $count ?>"><i></i></small>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <hr>
                                    <?php 
                                    $count2++;
                                    //echo $count2;
                                    if ($count2 < $cantgrupos) { ?>
                                    <p></p>
                                    <div class="row" style="background-color:White;">
                                        <div class="col-sm-5 col-md-8" style="background-color:Ivory">
                                            <h6> <b><?php 
                                                    print_r($grupos_subgrupos[$j]['desc_grupo']);
                                                    ?></h6></b>
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-2 col-md-4 col-md-offset-0" style="background-color:White;"><small><i>Porcentaje %</i></small>
                                        </div>
                                    </div>

                                    <?php 
                                } ?>

                                    <?php 
                                    if ($count2 == $cantgrupos) { ?>

                                    <?php $pos = $i;
                                    $i = $long;
                                } ?>

                                    <?php $count++;
                                } ?>
                                    <?php 
                                } ?>

                                </div>
                                <!--FIN container-->


                            </div>
                            <!--col-lg-10-->


                            <div class="col-lg-3">
                                <!--grid 2-->
                                <div class="container-fluid">
                                    <?php 
                                    $max = sizeof($grupos_subgrupos);
                                    $long = $max - 1;
                                    //$count=0;//contador de las sumas

                                    $ngrupos = sizeof($grupos);
                                    $longgrupo = $ngrupos - 1;
                                    $cant = $longgrupo / 3;
                                    $cantgrupos = round($cant, 0);
                                    $count3 = $cantgrupos * 2; //contador de los ciclos


                                    for ($i = $pos + 1; $i < $max; $i++) { ?>

                                    <?php 

                                    if ($i == $pos + 1) {  ?>
                                    <hr>
                                    <div class="row" style="background-color:White;">
                                        <div class="col-sm-5 col-md-8" style="background-color:Ivory">
                                            <h6> <b> <?php 
                                                        print_r($grupos_subgrupos[$i]['desc_grupo']);
                                                        ?> </b> </h6>
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-2 col-md-4 col-md-offset-0" style="background-color:Ivory;"><small><i>Porcentaje %</i></small>
                                        </div>
                                    </div>
                                    <?php 
                                } else { ?>

                                    <?php 
                                } ?>
                                    <div class="row" style="background-color:Ivory;">
                                        <div class="col-sm-5 col-sm-offset-2 col-md-8 col-md-offset-0" style="background-color:Ivory">
                                            <small><i>
                                                    <?php 
                                                    print_r($grupos_subgrupos[$i]['desc_item']);
                                                    ?>
                                                </i></small>
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-2 col-md-4 col-md-offset-0" style="background-color:Ivory;">
                                            <input type="hidden" class="form-control required" id="<?php echo $i; ?>a" name="<?php echo $i; ?>a" readonly="" value="<?php 
                                                                                                                                                                    echo $grupos_subgrupos[$i]['grupo_mat_id'];
                                                                                                                                                                    ?>">
                                            <input type="hidden" class="form-control required" id="<?php echo $i; ?>b" name="<?php echo $i; ?>b" readonly="" value="<?php 
                                                                                                                                                                    echo $grupos_subgrupos[$i]['mat_item_id'];
                                                                                                                                                                    ?>">
                                            <input type="number" class="form-control sumcontrol<?php echo $count ?>" name="<?php echo $i; ?>c" required value="0" size="3" min="0" max="100" oninput = "(validity.valid) || (value = ' ');">

                                        </div>
                                    </div>

                                    <?php $j = $i + 1;
                                    if ($i == $long) { ?>
                                    <?php $j = $i; ?>
                                    <div class="row" style="background-color:White;">

                                        <div class="col-sm-5 col-sm-offset-2 col-md-8 col-md-offset-0" style="background-color:White;" align="right">Total
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-2 col-md-4 col-md-offset-0" style="background-color:White;">
                                            <input type="text" class="form-control total<?php echo $count ?>" readonly />
                                            <div class="form-control-feedback" Style="color:red;"><small id="validsuma<?php echo $count ?>"><i></i></small>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <?php 
                                } ?>
                                    <?php 

                                    if ($grupos_subgrupos[$i]['grupo_mat_id'] != $grupos_subgrupos[$j]['grupo_mat_id']) {  ?>

                                    <div class="row" style="background-color:White;">

                                        <div class="col-sm-5 col-sm-offset-2 col-md-8 col-md-offset-0" style="background-color:White;" align="right">Total
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-2 col-md-4 col-md-offset-0" style="background-color:White;">
                                            <input type="text" class="form-control total<?php echo $count ?>" value="" readonly />
                                            <div class="form-control-feedback" Style="color:red;"><small id="validsuma<?php echo $count ?>"><i></i></small>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                    <?php 
                                    $count2++; //echo $count2;
                                    if ($count2 < $count3) { ?>
                                    <p></p>
                                    <div class="row" style="background-color:White;">
                                        <div class="col-sm-5 col-md-8" style="background-color:Ivory">
                                            <h6> <b> <?php 
                                                        print_r($grupos_subgrupos[$j]['desc_grupo']);
                                                        ?></h6> </b>
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-2 col-md-4 col-md-offset-0" style="background-color:Ivory;"><small><i>Porcentaje %</i></small>
                                        </div>
                                    </div>
                                    <?php 
                                } ?>

                                    <?php 
                                    if ($count2 == $count3) { ?>

                                    <?php $pos = $i;
                                    $i = $long;
                                } ?>

                                    <?php $count++;
                                } ?>
                                    <?php 
                                } ?>

                                </div>
                                <!--FIN container-->
                            </div>
                            <!--col-lg-10-->
                            <div class="col-lg-3">
                                <!--grid 2-->
                                <div class="container-fluid">


                                    <?php 
                                    $max = sizeof($grupos_subgrupos);
                                    $long = $max - 1;
                                    //$count=0;//contador de las sumas

                                    $ngrupos = sizeof($grupos);
                                    $longgrupo = $ngrupos;
                                    $cant = $longgrupo / 3;
                                    $cantgrupos = round($cant, 0);
                                    $count3 = $cantgrupos * 2; //contador de los ciclos

                                    for ($i = $pos + 1; $i < $max; $i++) { ?>

                                    <?php 

                                    if ($i == $pos + 1) {  ?>
                                    <hr>
                                    <div class="row" style="background-color:White;">
                                        <div class="col-sm-5 col-md-8" style="background-color:Ivory">
                                            <h6> <b> <?php 
                                                        print_r($grupos_subgrupos[$i]['desc_grupo']);
                                                        ?></h6> </b>
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-2 col-md-4 col-md-offset-0" style="background-color:Ivory;"><small><i>Porcentaje %</i></small>
                                        </div>
                                    </div>
                                    <?php 
                                } else { ?>

                                    <?php 
                                } ?>
                                    <div class="row" style="background-color:White;">

                                        <div class="col-sm-5 col-sm-offset-2 col-md-8 col-md-offset-0" style="background-color:Ivory">
                                            <small><i> <?php 
                                                        print_r($grupos_subgrupos[$i]['desc_item']);
                                                        ?></i></small>
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-2 col-md-4 col-md-offset-0" style="background-color:Ivory;">
                                            <input type="hidden" class="form-control required" id="<?php echo $i; ?>a" name="<?php echo $i; ?>a" readonly="" value="<?php 
                                                                                                                                                                    echo $grupos_subgrupos[$i]['grupo_mat_id'];
                                                                                                                                                                    ?>">
                                            <input type="hidden" class="form-control required" id="<?php echo $i; ?>b" name="<?php echo $i; ?>b" readonly="" value="<?php 
                                                                                                                                                                    echo $grupos_subgrupos[$i]['mat_item_id'];
                                                                                                                                                                    ?>">
                                            <input type="number" class="form-control sumcontrol<?php echo $count ?>" name="<?php echo $i; ?>c" value="0" size="3" min="0" max="100" oninput = "(validity.valid) || (value = ' ');" required>
                                        </div>
                                    </div>

                                    <?php $j = $i + 1;
                                    if ($i == $long) { ?>
                                    <?php $j = $i; ?>
                                    <div class="row" style="background-color:White;">
                                        <div class="col-sm-5 col-sm-offset-2 col-md-8 col-md-offset-0" style="background-color:White;" align="right">Total
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-2 col-md-4 col-md-offset-0" style="background-color:White;">
                                            <input type="text" class="form-control total<?php echo $count ?>" value="" readonly />
                                            <div class="form-control-feedback" Style="color:red;"><small id="validsuma<?php echo $count ?>"><i></i></small>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                    <?php 
                                } ?>
                                    <?php 

                                    if ($grupos_subgrupos[$i]['grupo_mat_id'] != $grupos_subgrupos[$j]['grupo_mat_id']) {  ?>
                                    <div class="row" style="background-color:White;">
                                        <div class="col-sm-5 col-sm-offset-2 col-md-8 col-md-offset-0" style="background-color:White;" align="right">Total
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-2 col-md-4 col-md-offset-0" style="background-color:White;">
                                            <input type="text" class="form-control total<?php echo $count ?>" value="" readonly />
                                            <div class="form-control-feedback" Style="color:red;"><small id="validsuma<?php echo $count ?>"><i></i></small>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <?php 
                                    $count2++;
                                    //echo $count2;
                                    if ($count2 < $longgrupo) { ?>
                                    <p></p>
                                    <div class="row" style="background-color:White;">
                                        <div class="col-sm-5 col-md-8" style="background-color:Ivory">
                                            <h6> <b>
                                                    <?php 
                                                    print_r($grupos_subgrupos[$j]['desc_grupo']);
                                                    ?></h6></b>
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-2 col-md-4 col-md-offset-0" style="background-color:Ivory;"><small><i>Porcentaje %</i></small>
                                        </div>
                                    </div>
                                    <?php 
                                } ?>
                                    <?php $count++;
                                } ?>
                                    <?php 
                                } ?>
                                </div>
                                <!--FIN container-->
                            </div>
                            <!--col-lg-10-->
                            <div class="col-lg-3">
                                <h6 class="card-subtitle">Caracteristicas de la construccion</h6>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="wfirstName2">Nombre de Bloque :<span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control required" id="nom_bloque" name="nom_bloque" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="wfirstName2">Año de construccion: <span class="text-danger"> *</span></label>
                                            <input type="number" size="4" class="form-control required" id="anio_cons" name="anio_cons" min="1000" max="<?php echo $anio_actual; ?>"  required>                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="wfirstName2">Año de remodelacion: <span class="text-danger"> *</span></label>
                                            <input type="number" size="4" class="form-control required" id="anio_remo" name="anio_remo" min="1000" max="<?php echo $anio_actual; ?>"  required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="wfirstName2">Porcentaje de remodelacion: <span class="text-danger"> *<small> entre (0 y 100) % </small> </span>   </label>
                                            <input type="number" size="3" class="form-control required" id="porcentaje_remo" name="porcentaje_remo" min="0" max="100" oninput = "(validity.valid) || (value = ' ');" required>                                          
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="location1">Destino :<span class="text-danger"> *</span></label>
                                            <select class="custom-select form-control" id="destino_bloque_id" name="destino_bloque_id" required>
                                                <option value="">Seleccione destino</option>
                                                <?php foreach ($destino_bloque as $d) : ?>
                                                <option value="<?php echo $d->destino_bloque_id; ?>"><?php echo $d->descripcion; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="location1">Uso :<span class="text-danger"> *</span></label>
                                            <select class="custom-select form-control" id="uso_bloque_id" name="uso_bloque_id" required>
                                                <option value="">Seleccione Uso</option>
                                                <?php foreach ($destino_uso as $du) : ?>
                                                <option value="<?php echo $du->uso_bloque_id; ?>"><?php echo $du->descripcion; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">                                            
                                            <label for="wfirstName2">Estado Fisico : <span class="text-danger"> *  <small> </small> </span> </label>
                                            <input type="text" class="form-control"  id="estado_fisico" name="estado_fisico"  required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="wfirstName2">Altura : <span class="text-danger"> * (90.34) <small> metros </small> </span> </label>
                                            <input type="number" class="form-control" step="0.01" id="altura" name="altura" placeholder="0.00" required>                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                    
       
       

    </div>
</body>
</html>
        </div>