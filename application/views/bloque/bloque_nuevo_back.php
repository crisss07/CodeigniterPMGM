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
                         <h2>Registro Bloque N</h2>
                                                    <?php echo form_open('Edificacion/create', array('method'=>'POST')); ?>

                                                    <div class="row">
                                                        <!-- column -->                                                              

                                                        <div class="col-lg-3"><!--grid 1-->
                                                            <div class="container-fluid">
                                                                <h3>Tabla de estructuras</h3>                                                                      

                                                                <?php 
                                                                      $max = sizeof($grupos_subgrupos);                                                                    
                                                                      $long=$max-1;
                                                                      $count=0;//contador de las sumas
                                                                      
                                                                      $ngrupos = sizeof($grupos);
                                                                      $longgrupo = $ngrupos-1;
                                                                      $cant=$longgrupo / 3;
                                                                      $cantgrupos=round($cant, 0);
                                                                      echo $cantgrupos;
                                                                      
                                                                      $count2=0;//contador de los ciclos

                                                                      $pos=0;//posicion final de la ultima grid                                                                        
                                                                                                              

                                                                      for ($i = 0; $i < $max ; $i++) {?> 

                                                                      <?php                                                                       
                                                                        
                                                                        if($i==0) {  ?>
                                                                          <div class="row" style="background-color:White;"> 
                                                                          <div class="col-sm-5 col-md-9" style="background-color:LightGray">     <?php        echo "<pre>";                                
                                                                                print_r($grupos_subgrupos[$i]['desc_grupo']);
                                                                                echo "</pre>"; ?>
                                                                            </div>                                                                           
                                                                       </div>
                                                                   <?php } else{?>    

                                                                    <?php }?> 
                                                                          <div class="row" style="background-color:White;">                                                                          

                                                                            <div class="col-sm-5 col-sm-offset-2 col-md-9 col-md-offset-0" style="background-color:lightyellow">
                                                                                <?php        echo "<pre>";                                
                                                                                print_r($grupos_subgrupos[$i]['desc_item']);
                                                                                echo "</pre>"; ?>                                                                                
                                                                            </div>
                                                                            <div class="col-sm-5 col-sm-offset-2 col-md-3 col-md-offset-0" style="background-color:White;">
                                                                            <input type="text" class="form-control sumcontrol<?php echo $count ?>" name="grupos[<?php echo $grupos_subgrupos[$i]['grupo_mat_id'] ?>][<?php echo $grupos_subgrupos[$i]['mat_item_id'] ?>]" ></div>                                                                                                                                                       
                                                                        </div>

                                                                        <?php $j=$i+1;
                                                                        if($i==$long){?>                                                                            
                                                                            <?php $j=$i; ?>
                                                                            <div class="row" style="background-color:White;">                                                                              
                                                                            
                                                                            <div class="col-sm-5 col-sm-offset-2 col-md-9 col-md-offset-0" style="background-color:White;" align="right">Total
                                                                            </div>
                                                                            <div class="col-sm-5 col-sm-offset-2 col-md-3 col-md-offset-0" style="background-color:White;">
                                                                               <input type="text" class="form-control total<?php echo $count ?>" value="" />
                                                                               <div id="validsuma<?php echo $count ?>" Style="color:red;"></div>
                                                                            </div>
                                                                            </div>                                                                    
                                                                            <?php  } ?>
                                                                        <?php                                                                       
                                                                        
                                                                        if($grupos_subgrupos[$i]['grupo_mat_id']!=$grupos_subgrupos[$j]['grupo_mat_id']) {  ?>

                                                                          <div class="row" style="background-color:White;">                                                                              
                                                                            
                                                                            <div class="col-sm-5 col-sm-offset-2 col-md-9 col-md-offset-0" style="background-color:White;" align="right">Total
                                                                            </div>
                                                                            <div class="col-sm-5 col-sm-offset-2 col-md-3 col-md-offset-0" style="background-color:White;">
                                                                               <input type="text" class="form-control total<?php echo $count ?>" value="" />
                                                                               <div id="validsuma<?php echo $count ?>" Style="color:red;">
                                                                               </div>
                                                                           </div>
                                                                       </div>

                                                                       <?php                                                                       
                                                                        $count2++; echo $count2;
                                                                         if($count2<$cantgrupos){?>
                                                                         <div class="row" style="background-color:White;"> 
                                                                          <div class="col-sm-5 col-md-9" style="background-color:LightGray">     <?php        echo "<pre>";                                
                                                                                print_r($grupos_subgrupos[$j]['desc_grupo']);
                                                                                echo "</pre>"; ?>
                                                                            </div>                                                                           
                                                                       </div>
                                                                              <?php } ?>

                                                                              <?php 
                                                                         if($count2==$cantgrupos){?>

                                                                            <?php $pos=$i;$i=$long;} ?>

                                                                   <?php $count++;} ?>
                                                               <?php } ?>
                                                                
                                                           </div><!--FIN container-->


                                                       </div><!--col-lg-10-->

                                                       
                                                        <div class="col-lg-3"><!--grid 2-->
                                                            <div class="container-fluid">
                                                                <h3>Tabla de estructuras</h3>                                                                      

                                                                <?php 
                                                                      $max = sizeof($grupos_subgrupos);                                                                    
                                                                      $long=$max-1;
                                                                      //$count=0;//contador de las sumas
                                                                      
                                                                      $ngrupos = sizeof($grupos);
                                                                      $longgrupo = $ngrupos-1;
                                                                      $cant=$longgrupo / 3;
                                                                      $cantgrupos=round($cant, 0);
                                                                      echo $cantgrupos;
                                                                      $count3=$cantgrupos*2;//contador de los ciclos
                                                                                                           

                                                                      for ($i = $pos+1; $i < $max ; $i++) {?> 

                                                                      <?php                                                                       
                                                                        
                                                                        if($i==$pos+1) {  ?>
                                                                          <div class="row" style="background-color:White;"> 
                                                                          <div class="col-sm-5 col-md-9" style="background-color:LightGray">     <?php        echo "<pre>";                                
                                                                                print_r($grupos_subgrupos[$i]['desc_grupo']);
                                                                                echo "</pre>"; ?>
                                                                            </div>                                                                           
                                                                       </div>
                                                                   <?php } else{?>    

                                                                    <?php }?> 
                                                                          <div class="row" style="background-color:White;">                                                                          

                                                                            <div class="col-sm-5 col-sm-offset-2 col-md-9 col-md-offset-0" style="background-color:lightyellow">
                                                                                <?php        echo "<pre>";                                
                                                                                print_r($grupos_subgrupos[$i]['desc_item']);
                                                                                echo "</pre>"; ?>                                                                                
                                                                            </div>
                                                                            <div class="col-sm-5 col-sm-offset-2 col-md-3 col-md-offset-0" style="background-color:White;">
                                                                            <input type="text" class="form-control sumcontrol<?php echo $count ?>" name="grupos[<?php echo $grupos_subgrupos[$i]['grupo_mat_id'] ?>][<?php echo $grupos_subgrupos[$i]['mat_item_id'] ?>]" ></div>                                                                                                                                                       
                                                                        </div>

                                                                        <?php $j=$i+1;
                                                                        if($i==$long){?>                                                                            
                                                                            <?php $j=$i; ?>
                                                                            <div class="row" style="background-color:White;">                                                                              
                                                                            
                                                                            <div class="col-sm-5 col-sm-offset-2 col-md-9 col-md-offset-0" style="background-color:White;" align="right">Total
                                                                            </div>
                                                                            <div class="col-sm-5 col-sm-offset-2 col-md-3 col-md-offset-0" style="background-color:White;">
                                                                               <input type="text" class="form-control total<?php echo $count ?>" value="" />
                                                                               <div id="validsuma<?php echo $count ?>" Style="color:red;"></div>
                                                                            </div>
                                                                            </div>                                                                    
                                                                            <?php  } ?>
                                                                        <?php                                                                       
                                                                        
                                                                        if($grupos_subgrupos[$i]['grupo_mat_id']!=$grupos_subgrupos[$j]['grupo_mat_id']) {  ?>

                                                                          <div class="row" style="background-color:White;">                                                                              
                                                                            
                                                                            <div class="col-sm-5 col-sm-offset-2 col-md-9 col-md-offset-0" style="background-color:White;" align="right">Total
                                                                            </div>
                                                                            <div class="col-sm-5 col-sm-offset-2 col-md-3 col-md-offset-0" style="background-color:White;">
                                                                               <input type="text" class="form-control total<?php echo $count ?>" value="" />
                                                                               <div id="validsuma<?php echo $count ?>" Style="color:red;">
                                                                               </div>
                                                                           </div>
                                                                       </div>

                                                                       <?php                                                                       
                                                                        $count2++; echo $count2;
                                                                         if($count2<$count3){?>
                                                                         <div class="row" style="background-color:White;"> 
                                                                          <div class="col-sm-5 col-md-9" style="background-color:LightGray">     <?php        echo "<pre>";                                
                                                                                print_r($grupos_subgrupos[$j]['desc_grupo']);
                                                                                echo "</pre>"; ?>
                                                                            </div>                                                                           
                                                                       </div>
                                                                              <?php } ?>

                                                                              <?php 
                                                                         if($count2==$count3){?>

                                                                            <?php $pos=$i;$i=$long;} ?>

                                                                   <?php $count++;} ?>
                                                               <?php } ?>
                                                                
                                                           </div><!--FIN container-->


                                                       </div><!--col-lg-10-->

													   
                                                       
                                                        <div class="col-lg-3">
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
                                                                          <div class="col-sm-5 col-md-9" style="background-color:LightGray">     <?php        echo "<pre>";                                
                                                                                print_r($grupos_subgrupos[$i]['desc_grupo']);
                                                                                echo "</pre>"; ?>
                                                                            </div>                                                                           
                                                                       </div>
                                                                   <?php } ?>    
                                                                          <div class="row" style="background-color:White;">                                                                          

                                                                            <div class="col-sm-5 col-sm-offset-2 col-md-9 col-md-offset-0" style="background-color:lightyellow">
                                                                                <?php        echo "<pre>";                                
                                                                                print_r($grupos_subgrupos[$i]['desc_item']);
                                                                                echo "</pre>"; ?>                                                                                
                                                                            </div>
                                                                            <div class="col-sm-5 col-sm-offset-2 col-md-3 col-md-offset-0" style="background-color:White;">
                                                                            <input type="text" class="form-control sumcontrol<?php echo $count ?>" name="grupos[<?php echo $grupos_subgrupos[$i]['grupo_mat_id'] ?>][<?php echo $grupos_subgrupos[$i]['mat_item_id'] ?>]" ></div>                                                                                                                                                       
                                                                        </div>

                                                                        <?php $j=$i+1;
                                                                        if($i==$long){?>                                                                            
                                                                            <?php $j=$i; ?>
                                                                            <div class="row" style="background-color:White;">                                                                              
                                                                            
                                                                            <div class="col-sm-5 col-sm-offset-2 col-md-9 col-md-offset-0" style="background-color:White;" align="right">Total
                                                                            </div>
                                                                            <div class="col-sm-5 col-sm-offset-2 col-md-3 col-md-offset-0" style="background-color:White;">
                                                                               <input type="text" class="form-control total<?php echo $count ?>" value="" />
                                                                               <div id="validsuma<?php echo $count ?>" Style="color:red;"></div>
                                                                            </div>
                                                                            </div>                                                                    
                                                                            <?php  } ?>
                                                                        <?php                                                                       
                                                                        
                                                                        if($grupos_subgrupos[$i]['grupo_mat_id']!=$grupos_subgrupos[$j]['grupo_mat_id']) {  ?>

                                                                          <div class="row" style="background-color:White;">                                                                              
                                                                            
                                                                            <div class="col-sm-5 col-sm-offset-2 col-md-9 col-md-offset-0" style="background-color:White;" align="right">Total
                                                                            </div>
                                                                            <div class="col-sm-5 col-sm-offset-2 col-md-3 col-md-offset-0" style="background-color:White;">
                                                                               <input type="text" class="form-control total<?php echo $count ?>" value="" />
                                                                               <div id="validsuma<?php echo $count ?>" Style="color:red;">
                                                                               </div>
                                                                           </div>
                                                                       </div>

                                                                       <div class="row" style="background-color:White;"> 
                                                                          <div class="col-sm-5 col-md-9" style="background-color:LightGray">     <?php        echo "<pre>";                                
                                                                                print_r($grupos_subgrupos[$j]['desc_grupo']);
                                                                                echo "</pre>"; ?>
                                                                            </div>                                                                           
                                                                       </div>

                                                                   <?php $count++;} ?>
                                                               <?php } ?>
                                                                
                                                           </div><!--FIN container-->


                                                       </div><!--col-lg-10-->

                                                       
													   
                                                    
													   
													   
													   
                                                       <div class="col-lg-2">
                                                        <h6 class="card-subtitle">Caracteristicas de la construccion</h6>
                                                        <div class="row">
                                                            <!--test-->
                                                            <div class="col-md-12">
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
                                                            </div>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="wfirstName2">Nombre de Bloque : <span class="danger">*</span> </label>
                                                                    <input type="text" class="form-control required" id="nom_bloque" name="nom_bloque">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <!--test-->
                                                            

                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="wfirstName2">Año de construccion: <span class="danger">*</span> </label>
                                                                    <input type="text" class="form-control required" id="anio_cons" name="anio_cons">
                                                                </div>
                                                            </div>
                                                            </div>

                                                        <div class="row">
                                          
                                                           
                                                            <div class="col-md-12">

                                                            <div class="form-group">
                                                                    <label for="wfirstName2">Año de remodelacion: <span class="danger">*</span> </label>
                                                                    <input type="text" class="form-control required" id="anio_remo" name="anio_remo">
                                                                </div>
                                                                            


                                                               
                                                            </div>

                                                        </div>
                                                        <div class="row">

                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="location1">Destino :</label>
                                                                    <select class="custom-select form-control" id="destino_bloque_id" name="destino_bloque_id">
                                                                        <?php foreach ($destino_bloque as $d): ?>
                                                                            <option value="<?php echo $d->destino_bloque_id; ?>"><?php echo $d->descripcion; ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="location1">Uso :</label>
                                                                    <select class="custom-select form-control" id="uso_bloque_id" name="uso_bloque_id">
                                                                       <?php foreach ($destino_uso as $du): ?>
                                                                        <option value="<?php echo $du->uso_bloque_id; ?>"><?php echo $du->descripcion; ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
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
                                                        <div class="col-md-12">
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
                                                        <div class="col-md-12">
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



                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="wfirstName2">Superficie : <span class="danger">*</span> </label>
                                                            <input type="number" class="form-control required" id="superficie" name="superficie">
                                                        </div>
                                                    </div>
                                                    </div>
                                                        <div class="row">
                                                    <div class="col-md-12">
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