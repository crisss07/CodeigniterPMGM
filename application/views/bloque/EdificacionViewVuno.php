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
                        <h4 class="card-title">Datos Edificaciones</h4>
                        <h6 class="card-subtitle">Material de Construccion</h6>
                        <?php 
                        /*$max = sizeof($grupos_subgrupos);
                        echo $max;

                        for ($i = 0; $i < $max ; $i++) {

                           //$last_names = array_column($result_array, 'alias');
                           
                         echo "<pre>";                                                                         
                         print_r($grupos_subgrupos[$i]['desc_grupo']);
                         echo "</pre>"; }*/
                    

                         ?>

                         
                         <!-- Step 1 -->
                         <h2></h2>
                         <button type="button" class="btn btn-info" data-toggle="modal" data-target=".bs-example-modal-lg">
                            Nuevo Bloque
                        </button>

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">

                                    <!-- sample modal content -->
                                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myLargeModalLabel">Datos Bloque</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>

                                                <div class="modal-body">

                                                    <?php echo form_open('Edificacion/create', array('method'=>'POST')); ?>

                                                    <div class="row">
                                                        <!-- column -->                                                              

                                                        <div class="col-lg-7">
                                                            <div class="container-fluid">
                                                                <h3>Tabla de estructuras</h3>                                                                      

                                                                <?php 
                                                                      $max = sizeof($grupos_subgrupos);
                                                                      $long=$max-1;
                                                                      $count=0;//contador de las sumas 
                                                                                                              

                                                                      for ($i = 0; $i < $max ; $i++) {?> 

                                                                      <?php                                                                       
                                                                        
                                                                        if($i==0) {  ?>
                                                                          <div class="row" style="background-color:White;"> 
                                                                          <div class="col-sm-5 col-md-7" style="background-color:LightGray">     <?php        echo "<pre>";                                
                                                                                print_r($grupos_subgrupos[$i]['desc_grupo']);
                                                                                echo "</pre>"; ?>
                                                                            </div>                                                                           
                                                                       </div>
                                                                   <?php } ?>                                                                 


                                                                            

                                                                          <div class="row" style="background-color:White;">
                                                                            

                                                                            <div class="col-sm-5 col-sm-offset-2 col-md-7 col-md-offset-0" style="background-color:lightyellow">
                                                                                <?php        echo "<pre>";                                
                                                                                print_r($grupos_subgrupos[$i]['desc_item']);
                                                                                echo "</pre>"; ?>                                                                                
                                                                            </div>
                                                                            <div class="col-sm-5 col-sm-offset-2 col-md-2 col-md-offset-0" style="background-color:White;">
                                                                            <input type="text" class="form-control sumcontrol<?php echo $count ?>" name="grupos[<?php echo $grupos_subgrupos[$i]['grupo_mat_id'] ?>][<?php echo $grupos_subgrupos[$i]['mat_item_id'] ?>]" ></div>                                                                                                                                                       
                                                                        </div>

                                                                        <?php $j=$i+1;
                                                                        if($i==$long){?>                                                                            
                                                                            <?php $j=$i; ?>
                                                                            <div class="row" style="background-color:White;">                                                                              
                                                                            
                                                                            <div class="col-sm-5 col-sm-offset-2 col-md-7 col-md-offset-0" style="background-color:White;" align="right">Total
                                                                            </div>
                                                                            <div class="col-sm-5 col-sm-offset-2 col-md-2 col-md-offset-0" style="background-color:White;">
                                                                               <input type="text" class="form-control total<?php echo $count ?>" value="" />
                                                                               <div id="validsuma<?php echo $count ?>" Style="color:red;"></div>
                                                                            </div>
                                                                            </div>                                                                    
                                                                            <?php  } ?>
                                                                        <?php                                                                       
                                                                        
                                                                        if($grupos_subgrupos[$i]['grupo_mat_id']!=$grupos_subgrupos[$j]['grupo_mat_id']) {  ?>

                                                                          <div class="row" style="background-color:White;">                                                                              
                                                                            
                                                                            <div class="col-sm-5 col-sm-offset-2 col-md-7 col-md-offset-0" style="background-color:White;" align="right">Total
                                                                            </div>
                                                                            <div class="col-sm-5 col-sm-offset-2 col-md-2 col-md-offset-0" style="background-color:White;">
                                                                               <input type="text" class="form-control total<?php echo $count ?>" value="" />
                                                                               <div id="validsuma<?php echo $count ?>" Style="color:red;">
                                                                               </div>
                                                                           </div>
                                                                       </div>

                                                                       <div class="row" style="background-color:White;"> 
                                                                          <div class="col-sm-5 col-md-7" style="background-color:LightGray">     <?php        echo "<pre>";                                
                                                                                print_r($grupos_subgrupos[$j]['desc_grupo']);
                                                                                echo "</pre>"; ?>
                                                                            </div>                                                                           
                                                                       </div>

                                                                   <?php $count++;} ?>
                                                               <?php } ?>
                                                                
                                                           </div><!--FIN container-->


                                                       </div><!--col-lg-7-->


                                                       <div class="col-lg-5">
                                                        <h6 class="card-subtitle">Caracteristicas de la construccion</h6>
                                                        <div class="row">
                                                            <!--test-->
                                                            <div class="col-md-5">
                                                                <div class="form-group">
                                                                    <label for="location1">Nro de Bloque:</label>
                                                                    <select class="custom-select form-control" id="nro_bloque" name="nro_bloque">
                                                                        <option value="">Seleccionar</option>                                                                           
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="form-group">
                                                                    <label for="wfirstName2">Nombre de Bloque : <span class="danger">*</span> </label>
                                                                    <input type="text" class="form-control required" id="nom_bloque" name="nom_bloque">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <!--test-->
                                                            

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="wfirstName2">Año de construccion: <span class="danger">*</span> </label>
                                                                    <input type="text" class="form-control required" id="anio_cons" name="anio_cons">
                                                                </div>
                                                            </div>
                                          
                                                           
                                                            <div class="col-md-6">

                                                            <div class="form-group">
                                                                    <label for="wfirstName2">Año de remodelacion: <span class="danger">*</span> </label>
                                                                    <input type="text" class="form-control required" id="anio_remo" name="anio_remo">
                                                                </div>
                                                                            


                                                               
                                                            </div>

                                                        </div>
                                                        <div class="row">

                                                            <div class="col-md-5">
                                                                <div class="form-group">
                                                                    <label for="location1">Destino :</label>
                                                                    <select class="custom-select form-control" id="destino_bloque_id" name="destino_bloque_id">
                                                                        <?php foreach ($destino_bloque as $d): ?>
                                                                            <option value="<?php echo $d->destino_bloque_id; ?>"><?php echo $d->descripcion; ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="form-group">
                                                                    <label for="location1">Uso :</label>
                                                                    <select class="custom-select form-control" id="uso_bloque_id" name="uso_bloque_id">
                                                                       <?php foreach ($destino_uso as $du): ?>
                                                                        <option value="<?php echo $du->uso_bloque_id; ?>"><?php echo $du->descripcion; ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <label for="location1">Estado Fisico :</label>
                                                                    <select class="custom-select form-control" id="estado_fisico" name="estado_fisico">
                                                                        <option value="">Seleccionar</option>
                                                                        <option value="Bueno">Bueno</option>
                                                                        <option value="Precario">Precario</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                    </div>

                                                    <h6 class="card-subtitle">Superficie de la Planta</h6>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="location1">Nivel :</label>
                                                                <select class="custom-select form-control" id="nivel" name="nivel">
                                                                    <option value="">Seleccionar</option>
                                                                    <option value="-1">-1</option>
                                                                    <option value="0">0</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                </select>
                                                            </div>
                                                        </div>



                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="location1">Tipo de planta :</label>
                                                                <select class="custom-select form-control" id="tipo_planta_id" name="tipo_planta_id">
                                                                   <?php foreach ($tipo_planta as $tp): ?>
                                                                    <option value="<?php echo $tp->tipo_planta_id; ?>"><?php echo $tp->descripcion; ?></option>
                                                                <?php endforeach; ?>                                                                          
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="wfirstName2">Superficie : <span class="danger">*</span> </label>
                                                            <input type="number" class="form-control required" id="superficie" name="superficie">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="wfirstName2">Altura : <span class="danger">*</span> </label>
                                                            <input type="number" class="form-control required" id="altura" name="altura">
                                                        </div>
                                                    </div>
                                                </div>

                                        </div><!--fin col-lg-5-->
                                    </div><!--fin column-->                                        


                                       <button type="submit" class="btn btn-success" value="save">Guardar</button>
                                                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Cancelar</button>
                                            </form> 


                               </div><!--fin modal body-->    

                                <div class="modal-footer">


                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->


                </div>
            </div>
        </div>
        <!-- div-boton--nuevo-->


        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Bloques Registrados</h4>
                <h6 class="card-subtitle">...</h6>
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nro de bloque</th>
                                <th>Nombre</th>
                                <th>Estado fisico</th>
                                <th>Año construccion</th>
                                <th>Destino</th>
                                <th>Uso</th>
                            </tr>
                        </thead>
                        <tbody>


                         <?php foreach($bloques as $row) {?>
                            <tr>
                              <th scope="row"><?php echo $row->nro_bloque; ?></th>
                              <td><?php echo $row->nom_bloque; ?></td>
                              <td><?php echo $row->estado_fisico; ?></td>
                              <td><?php echo $row->anio_cons; ?></td>
                              <td><?php echo $row->destino_bloque_id; ?></td>
                              <td><?php echo $row->uso_bloque_id; ?> </td>
                              <td>
                               
                               

                           </td>


                       </tr>
                   <?php } ?> 

               </tbody>
           </table>
           
       </div>
       <div align="right">
       <a href="<?php echo site_url('edificacion/propietario');?>/"<button type="button" class="btn btn-success" align="right">Siguiente</button></a>
       </div>
   
   </div>
</div>







<!--</form>-->
</div>
</div>
</div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Right sidebar -->
<!-- ============================================================== -->
<!-- .right-sidebar -->

<!-- ============================================================== -->
<!-- End Right sidebar -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
                                <!-- ============================================================== -->