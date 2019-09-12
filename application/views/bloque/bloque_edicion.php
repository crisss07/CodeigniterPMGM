<link href="<?php echo base_url(); ?>public/assets/plugins/wizard/steps.css" rel="stylesheet">
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

                    <?php foreach ($datos_bloque as $row) { 
                        $bloque_id= $row->bloque_id;
                        $predio_id = $row->predio_id;
                        $nro_bloque = $row->nro_bloque;
                        $nom_bloque = $row->nom_bloque;
                        $estado_fisico = $row->estado_fisico;
                        $altura = $row->altura;
                        $anio_cons= $row->anio_cons;
                        $anio_remo= $row->anio_remo;
                        $porcentaje_remo= $row->porcentaje_remo;
                        $destino_bloque_id= $row->destino_bloque_id;
                        $desc_bloque_dest= $row->desc_bloque_dest;
                        $uso_bloque_id= $row->uso_bloque_id; 
                        $desc_bloque_uso= $row->desc_bloque_uso; 
                        //$tipolo_id= $row->tipolo_id;
                        //$activo= $row->activo;                        
                    } ?>
                        <!-- Step 2 -->

                        <div class="row page-titles">
                            <div class="col-md-6 col-8 align-self-center">
                                <h3 class="text-themecolor mb-0 mt-0">Registro Bloque Nro: <?php echo $nro_bloque; ?></h3>

                            </div>
                            <div class="col-md-6 col-4 align-self-center">
                                <button class="btn float-right hidden-sm-down btn-success">Cod. Catastral: <?php echo $cod_catastral; ?>
                                </button>
                            </div>
                        </div>
                        <?php echo form_open('Edificacion/actualizar', array('method' => 'POST')); ?>

                        <input type="hidden" class="form-control required" id="cod_catastral" name="cod_catastral" readonly="" value="<?php echo $cod_catastral; ?>">
                        <input type="hidden" class="form-control required" id="nro_bloque" name="nro_bloque" readonly="" value="<?php echo $nro_bloque; ?>">
                        <input type="hidden" class="form-control required" id="nro_bloque" name="bloque_id" readonly="" value="<?php echo $bloque_id; ?>">
                        <input type="hidden" class="form-control required" id="predio_id" name="predio_id" readonly="" value="<?php echo $predio_id; ?>">
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
                                    
                                    $suma_total=0;


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
                                            <input type="number" class="form-control sumcontrol<?php echo $count ?>" name="<?php echo $i; ?>c" required value="<?php echo $grupos_subgrupos[$i]['cantidad']; ?>" size="3" min="0" max="100" oninput = "(validity.valid) || (value = ' ');" >
                                            <?php $valor_dato=$grupos_subgrupos[$i]['cantidad']; $suma_total=$suma_total+$valor_dato; ?>
                                        </div>
                                    </div>

                                    <?php $j = $i + 1;
                                    if ($i == $long) { ?>
                                    <?php $j = $i; ?>
                                    <div class="row" style="background-color:White;">

                                        <div class="col-sm-5 col-sm-offset-2 col-md-8 col-md-offset-0" style="background-color:White;" align="right">Total
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-2 col-md-4 col-md-offset-0" style="background-color:White;">
                                            <input type="text" class="form-control total<?php echo $count ?>" value="<?php echo $suma_total ?>" readonly />
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
                                            <input type="text" class="form-control total<?php echo $count ?>" value="<?php echo $suma_total ?>" readonly />
                                            <div class="form-control-feedback" Style="color:red;"><small id="validsuma<?php echo $count ?>"><i></i></small>
                                            <?php $suma_total=0 ?>
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
                                    $suma_total=0;


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
                                            <input type="number" class="form-control sumcontrol<?php echo $count ?>" name="<?php echo $i; ?>c" required value="<?php echo $grupos_subgrupos[$i]['cantidad']; ?>" size="3" min="0" max="100" oninput = "(validity.valid) || (value = ' ');" >
                                            <?php $valor_dato=$grupos_subgrupos[$i]['cantidad']; $suma_total=$suma_total+$valor_dato; ?>

                                        </div>
                                    </div>

                                    <?php $j = $i + 1;
                                    if ($i == $long) { ?>
                                    <?php $j = $i; ?>
                                    <div class="row" style="background-color:White;">

                                        <div class="col-sm-5 col-sm-offset-2 col-md-8 col-md-offset-0" style="background-color:White;" align="right">Total
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-2 col-md-4 col-md-offset-0" style="background-color:White;">
                                            <input type="text" class="form-control total<?php echo $count ?>" value="<?php echo $suma_total ?>" readonly />
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
                                            <input type="text" class="form-control total<?php echo $count ?>" value="<?php echo $suma_total ?>" readonly />
                                            <?php  $suma_total=0; ?>
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

                                    $suma_total=0;

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
                                            <input type="number" class="form-control sumcontrol<?php echo $count ?>" name="<?php echo $i; ?>c" value="<?php echo $grupos_subgrupos[$i]['cantidad']; ?>" size="3" min="0" max="100" oninput = "(validity.valid) || (value = ' ');"  required>
                                            <?php $valor_dato=$grupos_subgrupos[$i]['cantidad']; $suma_total=$suma_total+$valor_dato; ?>
                                        </div>
                                    </div>

                                    <?php $j = $i + 1;
                                    if ($i == $long) { ?>
                                    <?php $j = $i; ?>
                                    <div class="row" style="background-color:White;">
                                        <div class="col-sm-5 col-sm-offset-2 col-md-8 col-md-offset-0" style="background-color:White;" align="right">Total
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-2 col-md-4 col-md-offset-0" style="background-color:White;">
                                            <input type="text" class="form-control total<?php echo $count ?>" value="<?php echo $suma_total ?>" readonly />
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
                                            <input type="text" class="form-control total<?php echo $count ?>" value="<?php echo $suma_total ?>" readonly />
                                            <div class="form-control-feedback" Style="color:red;"><small id="validsuma<?php echo $count ?>"><i></i></small>
                                            <?php $suma_total=0 ?>
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
                                            <input type="text" class="form-control required" id="nom_bloque" name="nom_bloque" value="<?php echo $nom_bloque; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="wfirstName2">Año de construccion: <span class="text-danger"> *</span></label>
                                            <input type="number" size="4" class="form-control required" id="anio_cons" name="anio_cons" min="1000" max="2019" value="<?php echo $anio_cons; ?>" required>                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="wfirstName2">Año de reposicion: <span class="text-danger"> *</span></label>
                                            <input type="number" size="4" class="form-control required" id="anio_remo" name="anio_remo" min="1000" max="2019" value="<?php echo $anio_remo; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="wfirstName2">Porcentaje de reposicion: <span class="text-danger"> *<small> entre (0 y 100) % </small> </span>   </label>
                                            <input type="number" size="3" class="form-control required" id="porcentaje_remo" name="porcentaje_remo" value="<?php echo $porcentaje_remo; ?>" min="0" max="100" oninput = "(validity.valid) || (value = ' ');" required>                                          
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="location1">Destino :<span class="text-danger"> * <small> (destino inicial del bloque)</small></span></label>
                                            <select class="custom-select form-control" id="destino_bloque_id" name="destino_bloque_id" required>
                                            <option value="<?php echo $destino_bloque_id; ?>" selected><?php echo $desc_bloque_dest; ?></option>
                                                <?php foreach ($destino_bloque as $d) : ?>
                                                <?php if (($d->destino_bloque_id) != $destino_bloque_id): ?>
                                                <option value="<?php echo $d->destino_bloque_id; ?>"><?php echo $d->descripcion; ?></option>
                                                <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="location1">Uso :<span class="text-danger"> * <small>(uso actual del bloque)</small></span></label>
                                            <select class="custom-select form-control" id="uso_bloque_id" name="uso_bloque_id" required>
                                            <option value="<?php echo $uso_bloque_id; ?>" selected><?php echo $desc_bloque_uso; ?></option>
                                                <?php foreach ($destino_uso as $du) : ?>
                                                <?php if (($du->uso_bloque_id) != $uso_bloque_id): ?>
                                                <option value="<?php echo $du->uso_bloque_id; ?>"><?php echo $du->descripcion; ?></option>
                                                <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="wfirstName2">Estado Fisico : <span class="text-danger"> *  <small> </small> </span> </label>

                                            <select class="custom-select form-control" id="estado_fisico" name="estado_fisico" required>
                                            <option value="<?php echo $estado_fisico; ?>" selected><?php echo $estado_fisico; ?></option>
                                                <?php foreach ($estado_fis as $ef) : ?>
                                                <?php if (($ef) != $estado_fisico): ?>
                                                <option value="<?php echo $ef; ?>"><?php echo $ef; ?></option>
                                                <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                            <!--<input type="text" class="form-control"  id="estado_fisico" name="estado_fisico" value="<?php echo $estado_fisico; ?>" required>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="wfirstName2">Altura : <span class="text-danger"> * (90.12) <small> metros </small> </span> </label>
                                            <input type="number" class="form-control" step="0.01" id="altura" name="altura" value="<?php echo $altura; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="card-subtitle">Superficie de la Planta</h6>
                                <!--modal-->

                                <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Registro de niveles</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                                            </div>
                                            <div class="modal-body">                                                                                                
                                                    
                                                    <div class="row" >
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label for="location1">Tipo de planta :<span class="text-danger"> *</span></label>
                                                                <select class="custom-select form-control" id="tipo_planta_id" name="tipo_planta_id">
                                                                    <option value="">Seleccione Tipo de planta</option>
                                                                    <?php foreach ($tipo_planta as $tp) : ?>
                                                                    <option value="<?php echo $tp->tipo_planta_id; ?>"><?php echo $tp->descripcion; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" >
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label for="wfirstName2">Nivel : <span class="text-danger"> * <small></small></span> </label>
                                                                <input type="number" class="form-control" step='1' id="nivel" name="nivel" value="0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" >
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label for="wfirstName2">Altura : <span class="text-danger"> * <small>metros</small></span> </label>
                                                                <input type="number" class="form-control" step='0.100' id="altura_p" name="altura_p" value="0.00">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" >
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label for="wfirstName2">Superficie : <span class="text-danger"> * <small>metros</small></span> </label>
                                                                <input type="number" class="form-control" step="0.100" id="superficie" name="superficie" value="0.00">
                                                            </div>
                                                        </div>
                                                    </div>

                                              
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cerrar</button>
                                                <button type="button" class="btn btn-success waves-effect waves-light" id="bt_add" >Agregar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--fin modal-->




                                <div class="row" >
                                    <div class="col-md-12">                                        
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#responsive-modal">Adicionar Niveles</button><span class="text-danger"> * requerido<small></small></span>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table id="detalles" class="table table-hover no-wrap">
                                                <thead>
                                                    <tr>
                                                        <th>Planta</th>
                                                        <th>Nivel</th>
                                                        <th>Sup </th>
                                                        <th>altura</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <script>
                                                 var cont_n = 0;
                                                    estado = 0;
                                                    total = 0;
                                                </script>
                                                <?php $contador=0; foreach ($datos_bloque_piso as $rowd) { ?>
                                                    <tr class="selected" id="fila<?php echo $contador; ?>">
                                                        <td><input type="hidden" name="id_tipo_planta[]" value="<?php echo $rowd->tipo_planta_id; ?>"><?php echo $rowd->descripcion;?></td>
                                                        <td><input type="hidden" name="niveles[]" value="<?php echo $rowd->nivel; ?>"><?php echo $rowd->nivel; ?></td>
                                                        <td><input type="hidden" name="superficies[]" value="<?php echo $rowd->superficie; ?>"><?php echo $rowd->superficie; ?></td> 
                                                        <td><input type="hidden" name="alturas[]" value="<?php echo $rowd->altura; ?>"><?php echo $rowd->altura; ?></td>                                                                                                             
                                                        <td>                                                            
                                                         <button type="button" cLass="btn btn-danger" onclick="eliminar(<?php echo $contador; ?>);"><span class="fas fa-trash-alt" aria-hidden="true"></span></button>
                                                        </td>
                                                    </tr>
                                                    <script>
                                                        cont_n++;                                                        
                                                        total++;
                                                    </script>
                                                    <?php $contador++; ?>
                                                    <?php 
                                                } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12" align="right">
                                    <br>
                                 <div class="alert alert-warning"> <i class="ti-info-alt"></i> Debera almenos agregar un nivel al bloque para poder guardar los cambios 
                                            
                                        </div>
                                </div>

                                <div class="col-md-12" align="right">
                                <button type="submit" class="btn btn-info" value="save" id="guardar">Guardar</button>
                                <a class="btn btn-danger" href="<?php echo site_url('edificacion/nuevo'); ?>/<?php echo $predio_id ?>" align="right">Cancelar</a>
                                </div>



                            </div>
                            <!--fin col-lg-5-->
                        </div>
                        <!--fin column-->
                        
                        
                        </form>
                    </div>
                    <!--</form>-->
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>public/assets/plugins/jquery/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#bt_add').click(function() {
            agregar();
            $('#responsive-modal').modal('hide');
        });
    });
    //var cont_n = 0;
    //estado = 0;
    //total = 0;
    subtotal = [];
    //$("#guardar").hide();
    //evaluar();

    function agregar() {
        tipo_planta_id = $("#tipo_planta_id").val();
        tipo_planta = $("#tipo_planta_id option:selected").text();
        idnivel = $("#nivel").val();
        nivel = $("#nivel option:selected").text();
        superficie = $("#superficie").val();
        altura = $("#altura_p").val();

        if (tipo_planta_id != "" && idnivel != "" && superficie != "" && altura != "") {
            total = total+1;
            var fila = '<tr class="selected" id="fila' + cont_n + '"><td><input type="hidden" name="id_tipo_planta[]" value="' + tipo_planta_id + '">' + tipo_planta + '</td><td><input type="hidden" name="niveles[]" value="' + idnivel + '">' + idnivel + '</td><td><input type="hidden" name="superficies[]" value="' + superficie + '">' + superficie + '</td><td><input type="hidden" name="alturas[]" value="' + altura + '">' + altura +'</td><td><button type="button" cLass="btn btn-danger" onclick="eliminar(' + cont_n + ');"><span class="fas fa-trash-alt" aria-hidden="true"></span></button></td></tr>';
            //var fila = '<tr class="selected" id="fila' + cont_n + '"><td><input type="hidden" name="id_tipo_planta[]" value="' + tipo_planta_id + '">' + tipo_planta + '</td><td><input type="hidden" name="niveles[]" value="' + idnivel + '">' + idnivel + '</td><td><input type="hidden" name="superficies[]" value="' + superficie + '">' + superficie + '</td><td><button type="button" cLass="btn btn-danger" onclick="eliminar(' + cont_n + ');"><span class="fas fa-trash-alt" aria-hidden="true"></span></button></td></tr>';
            cont_n++;
            limpiar();
            evaluar();
            $('#detalles').append(fila);
        } else {
            alert("los campos estan vacios");
        }
    }

    function limpiar() {
        $("#tipo_planta_id").val(""); //id
        $("#nivel").val("0");
        $("#superficie").val("0.00");
        $("#altura_p").val("0.00");
    }

    function evaluar() {
        if (total > 0) {
            $("#guardar").show();
        } else {
            $("#guardar").hide();
        }
    }

    function eliminar(index) {
        total = total - 1;
        $("#fila" + index).remove();
        evaluar();
    }
</script>

<script>
$(document).ready(function() {

$('input[type=number][max]:not([max=""])').on('input', function(ev) {
  var $this = $(this);
  var maxlength = $this.attr('max').length;
  var value = $this.val();
  if (value && value.length >= maxlength) {
    $this.val(value.substr(0, maxlength));
  } 
});
});
</script>


<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== --> 