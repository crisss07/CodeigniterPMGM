<!--alerts CSS -->
<link href="<?php echo base_url(); ?>public/assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
<!-- Bootstrap Core CSS -->
<link href="<?php echo base_url(); ?>public/assets/plugins/bootstrap-switch/bootstrap-switch.min.css" rel="stylesheet">

<!-- Bootstrap Core CSS -->
    <!-- Custom CSS -->

<style type="text/css">
    #izquierda{
        text-align: center;
    }
    
    #derecha{
        padding-left: 10px;
        float:left;
    }
</style>

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

        <?php foreach ($predios as $pre1) {
                                        // $abc = $this->db->query("SELECT *
                                        //     FROM archivo.raiz
                                        //     WHERE raiz_id = $pre1->raiz_id")->row();

                                            $abc = $this->db->query("SELECT *
                                                FROM archivo.hijo
                                                WHERE raiz_id = $pre1->raiz_id
                                                AND activo = 1")->result();

                                            $abcd = $this->db->query("SELECT *
                                                FROM archivo.documento
                                                WHERE raiz_id = $pre1->raiz_id
                                                AND activo = 1")->result();
                                    }?>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Archivos <b> <?php echo $pre1->nombre; ?></b></h4>
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                          </button>
                          
                          <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                                    
                            
                            <a class="navbar-brand" href="#"><button type="button" class="btn btn-dark btn-circle btn-xl" data-toggle="modal" data-target="#modalCarpeta"><i class="fas fa-folder-open"></i> </button> Carpeta</a>
                            <a class="navbar-brand" href="#"><button type="button" class="btn btn-danger btn-circle btn-xl" data-toggle="modal" data-target="#modalPdf"><i class="fas fa-file-pdf"></i> </button> Pdf</a>
                            <a class="navbar-brand" href="#"><button type="button" class="btn btn-info btn-circle btn-xl" data-toggle="modal" data-target="#modalWord"><i class="fas fa-file-word"></i> </button> Word</a>
                            <a class="navbar-brand" href="#"><button type="button" class="btn btn-success btn-circle btn-xl" data-toggle="modal" data-target="#modalExcel"><i class="fas fa-file-excel"></i> </button> Excel</a>
                            <a class="navbar-brand" href="#"><button type="button" class="btn btn-primary btn-circle btn-xl" data-toggle="modal" data-target="#modalImagen"><i class="fas fa-file-image"></i> </button> Imagen</a>
                            <a class="navbar-brand" href="#"><button type="button" class="btn btn-secondary btn-circle btn-xl" data-toggle="modal" data-target="#modalOtros"><i class="fab fa-slack-hash"></i> </button> Otros</a>
                            
                             


                              
                            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            </ul>
                            <?php echo form_open('archivo/buscar', array('method'=>'POST', 'class'=>'form-inline my-2 my-lg-0')); ?>
                            <!-- <a class="navbar-brand" href=""><button type="button" class="btn btn-warning btn-circle btn-xl" onclick="atras()"><i class="fas fa-arrow-left"></i> </button> Atr&aacute;s</a> -->
                              <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search" name="buscador" id="buscador">
                              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                            </form>
                          </div>
                        </nav>

                            <div class="row el-element-overlay">
                                    <!-- VISTA DE CARPETAS -->
                                    <?php foreach ($abc as $pre) {
                                        $imagen = 'public/assets/images/archivo/'.$pre->tipo.'.jpg';
                                        $datos = $pre->hijo_id."||".
                                                 $pre->nombre."||".
                                                 $pre->descripcion1."||".
                                                 $pre->descripcion2."||".
                                                 $pre->tipo."||".
                                                 $pre->raiz_id;
                                                 // $pre->hijo_id;
                                    ?>
                                        
                                        <div class="col-lg-4 col-md-6">
                                            <div class="card">
                                                <div class="el-card-item card card-body">
                                                    <div class="row">
                                                        <div class="el-card-avatar el-overlay-1 col-md-4 col-lg-3 text-center"> <img src="<?php echo base_url(); ?><?php echo $imagen; ?>" alt="user" class="img-circle img-responsive">
                                                            <div class="el-overlay">
                                                                <ul class="el-info">

                                                                    <!--  -->
                                                                    <li><a class="btn default btn-outline image-popup-vertical-fit" href="<?= base_url('archivo/ingresarhijo/'. $pre->hijo_id); ?>"><i class="icon-login"></i></a></li>
                                                                    <li><a class="btn default btn-outline" href="javascript:void(0);" data-toggle="modal" data-target="#modalEdicion" onclick="agregarform('<?php echo $datos ?>')"><i class="icon-pencil"></i></a></li>
                                                                    <li><a class="btn default btn-outline" href="<?= base_url('archivo/eliminarhijo/'. $pre->hijo_id); ?>" alt="alert" class="img-responsive model_img" id="sa-params11" onclick="alerta('<?php echo $pre->hijo_id ?>')"><i class="icon-trash"></i></a></li>
                                                                    <li><a class="btn default btn-outline image-popup-vertical-fit" href="<?= base_url('archivo/ingresar/'. $pre->hijo_id); ?>"><i class="icon-share-alt"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8 col-lg-9">
                                                            <h4 class="mb-0"><?php echo $pre->nombre;  ?></h4> 
                                                            <small>Nombre del Propietario: <?php echo $pre->descripcion1; ?></small>
                                                            <br>
                                                            <small>C.I. del Propietario: <?php echo $pre->descripcion2; ?></small>
                                                            <address>
                                                                795 Folsom Ave, Suite 600 San Francisco, CADGE 94107
                                                                 
                                                            </address>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <!-- VISTA DE ARCHIVOS -->

                                     <?php foreach ($abcd as $pre2) {
                                        $imagen = 'public/assets/images/archivo/'.$pre2->carpeta.'.jpg';
                                        $datos1 = $pre2->documento_id."||".
                                                 $pre2->nombre."||".
                                                 $pre2->descripcion1."||".
                                                 $pre2->descripcion2."||".
                                                 $pre2->carpeta."||".
                                                 $pre2->raiz_id."||".
                                                 $pre2->hijo_id;

                                    ?>

                                        <div class="col-lg-4 col-md-6">
                                            <div class="card">
                                                <div class="el-card-item card card-body">
                                                    <div class="row">
                                                        <div class="el-card-avatar el-overlay-1 col-md-4 col-lg-3 text-center"> <img src="<?php echo base_url(); ?><?php echo $imagen; ?>" alt="user" class="img-circle img-responsive">
                                                            <div class="el-overlay">
                                                                <ul class="el-info">
                                                                    <?php $varr = base_url().'public/assets/archivos/'.$pre1->nombre.'/'.$pre2->nombre.'.'.$pre2->extension; 
                                                                        
                                                                        $supervar = urldecode($varr);
                                                                    ?>

                                                                    <!--  -->
                                                                    <li><a class="btn default btn-outline image-popup-vertical-fit" data-toggle="modal" data-target="#Modaluno"  onclick="alerta1('<?php echo $supervar ?>')"><i class="icon-login"></i></a></li>
                                                                    <li><a class="btn default btn-outline" href="javascript:void(0);" data-toggle="modal" data-target="#modalEdicion1" onclick="agregarform1('<?php echo $datos1 ?>')"><i class="icon-pencil"></i></a></li>
                                                                    <li><a class="btn default btn-outline" href="<?= base_url('archivo/eliminardocumento/'. $pre2->documento_id); ?>" alt="alert" class="img-responsive model_img" id="sa-params11" onclick="alerta('<?php echo $pre2->hijo_id ?>')"><i class="icon-trash"></i></a></li>
                                                                    <li><a class="btn default btn-outline image-popup-vertical-fit" href="<?= base_url('archivo/ingresar/'. $pre2->hijo_id); ?>"><i class="icon-share-alt"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8 col-lg-9">
                                                            <h4 class="mb-0"><?php echo $pre2->nombre;  ?></h4> 
                                                            <small>Nombre: <?php echo $pre2->descripcion1; ?></small>
                                                            <br>
                                                            <small>Carnet de Identidad: <?php echo $pre2->descripcion2; ?></small>
                                                            <address>
                                                                795 Folsom Ave, Suite 600 San Francisco, CADGE 94107

                                                             
                                                            </address>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>

                            </div>
                            

                            <!-- VISTA PREVIA -->
                            <div id="Modaluno" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h4 class="modal-title">Vista Previa</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            
                                        </div>
                                        <div class="modal-body">


                                                <div class="form-group">
                                                    <input type="text" hidden="" class="form-control" id="valor1" required value="<?php echo $supervar; ?>">
                                                </div>

                                                <embed src="<?php echo $supervar; ?>" target="_blank" frameborder="0" width="100%" height="400px">

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- HASTA AQUI -->

                            <div id="modalCarpeta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        
                                        <div class="modal-body">
                                           <?php echo form_open('archivo/insertarhijo', array('method'=>'POST')); ?>

                                                <div class="form-group">
                                                    <input type="text" hidden="" id="nombre_raiz" name="nombre_raiz" value="<?php echo $pre1->nombre; ?>">
                                                </div>

                                                 <div class="form-group">
                                                    <input type="text" hidden="" id="raiz_id" name="raiz_id" value="<?php echo $pre1->raiz_id; ?>">
                                                </div>
                                              
                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Nombre:</label>
                                                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="control-label">Nombre del Propietario:</label>
                                                    <textarea class="form-control" id="descripcion1" name="descripcion1" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="control-label">C.I. del Propietario:</label>
                                                    <textarea class="form-control" id="descripcion2" name="descripcion2" required></textarea>
                                                </div>
                                                
                                                

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                                </div>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <div id="modalEdicion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        
                                        <div class="modal-body">
                                           <?php echo form_open('archivo/updatehijo', array('method'=>'POST')); ?>

                                                <div class="form-group">
                                                    <input type="text" hidden="" id="hijo_idc" name="hijo_id">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" hidden="" id="raiz_idc" name="raiz_id">
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Nombre:</label>
                                                    <input type="text" class="form-control" id="nombrec" name="nombre" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="control-label">Nombre del Propietario:</label>
                                                    <textarea class="form-control" id="descripcion1c" name="descripcion1" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="control-label">C.I. del Propietario:</label>
                                                    <textarea class="form-control" id="descripcion2c" name="descripcion2" required></textarea>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Tipo de Carpeta</label>
                                                        <select class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" id="tipoc" name="tipo">
                                                            <option value="carpeta">Carpeta</option>
                                                            <option value="carpeta_llena">Carpeta Llena</option>
                                                            <option value="carpeta_vacia">Carpeta Vacia</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                                </div>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <div id="modalEdicion1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        
                                        <div class="modal-body">
                                           <?php echo form_open('archivo/updatedocumento', array('method'=>'POST')); ?>

                                                <div class="form-group">
                                                    <input type="text" hidden="" id="raiz_id1" name="raiz_id">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" hidden="" id="documento_id1" name="documento_id">
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Nombre:</label>
                                                    <input type="text" class="form-control" id="nombre1" name="nombre" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="control-label">Nombre del Propietario:</label>
                                                    <textarea class="form-control" id="descripcion11" name="descripcion1" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="control-label">C.I. del Propietario:</label>
                                                    <textarea class="form-control" id="descripcion21" name="descripcion2" required></textarea>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                                </div>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>



                            <div id="modalPdf" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        
                                        <div class="modal-body">
                                           <?php echo form_open_multipart('archivo/do_upload', array('method'=>'POST')); ?>

                                                
                                                <div class="form-group">
                                                    <input type="text" hidden="" id="nombre_raiz" name="nombre_raiz" value="<?php echo $pre1->nombre; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <input type="text" hidden="" id="raiz_id" name="raiz_id" value="<?php echo $pre1->raiz_id; ?>">
                                                </div>
                                                
                                                
                                                <div class="form-group">
                                                    <input type="text" hidden="" id="carpeta" name="carpeta" value="pdf">
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Nombre:</label>
                                                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="message-text" class="control-label">Nombre del Propietario:</label>
                                                    <textarea class="form-control" id="descripcion1" name="descripcion1" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="control-label">C.I. del Propietario:</label>
                                                    <textarea class="form-control" id="descripcion2" name="descripcion2" required></textarea>
                                                </div>
                                                <div class="col-md-12 mb-6">
                                                    <div class="form-group">
                                                        <div class="card">
                                                            <label for="recipient-name" class="control-label">Adjuntar</label>
                                                            <label for="input-file-now">
                                                                <button type="button" class="btn waves-effect waves-light btn-sm btn-info">
                                                                    <i class="fas fa-exclamation"></i>
                                                                </button>
                                                                OJO Solo archivos Pdf
                                                            </label>
                                                            <input type="file" id="input-file-now" class="dropify" name="adjunto" accept=".pdf" required />
                                                        </div>
                                                    </div>
                                                </div>

                                                

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                                </div>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <div id="modalWord" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        
                                        <div class="modal-body">
                                           <?php echo form_open_multipart('archivo/do_upload', array('method'=>'POST')); ?>

                                                <div class="form-group">
                                                    <input type="text" hidden="" id="nombre_raiz" name="nombre_raiz" value="<?php echo $pre1->nombre; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <input type="text" hidden="" id="raiz_id" name="raiz_id" value="<?php echo $pre1->raiz_id; ?>">
                                                </div>
                                                
                                                <div class="form-group">
                                                    <input type="text" hidden="" id="carpeta" name="carpeta" value="docx">
                                                </div>

                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Nombre:</label>
                                                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="control-label">Nombre del Propietario:</label>
                                                    <textarea class="form-control" id="descripcion1" name="descripcion1" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="control-label">C.I. del Propietario:</label>
                                                    <textarea class="form-control" id="descripcion2" name="descripcion2" required></textarea>
                                                </div>
                                                <div class="col-md-12 mb-6">
                                                    <div class="form-group">
                                                        <div class="card">
                                                            <label for="recipient-name" class="control-label">Adjuntar</label>
                                                            <label for="input-file-now">
                                                                <button type="button" class="btn waves-effect waves-light btn-sm btn-info">
                                                                    <i class="fas fa-exclamation"></i>
                                                                </button>
                                                                OJO Solo archivos Word
                                                            </label>
                                                            <input type="file" id="input-file-now" class="dropify" name="adjunto" accept=".doc,.docx,.docm,.dotx,.dotm,.odt" required />
                                                        </div>
                                                    </div>
                                                </div>

                                                

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                                </div>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <div id="modalExcel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        
                                        <div class="modal-body">
                                           <?php echo form_open_multipart('archivo/do_upload', array('method'=>'POST')); ?>

                                                 <div class="form-group">
                                                    <input type="text" hidden="" id="nombre_raiz" name="nombre_raiz" value="<?php echo $pre1->nombre; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <input type="text" hidden="" id="raiz_id" name="raiz_id" value="<?php echo $pre1->raiz_id; ?>">
                                                </div>
                                                
                                                <div class="form-group">
                                                    <input type="text" hidden="" id="carpeta" name="carpeta" value="xlsx">
                                                </div>

                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Nombre:</label>
                                                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="control-label">Nombre del Propietario:</label>
                                                    <textarea class="form-control" id="descripcion1" name="descripcion1" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="control-label">C.I. del Propietario:</label>
                                                    <textarea class="form-control" id="descripcion2" name="descripcion2" required></textarea>
                                                </div>
                                                <div class="col-md-12 mb-6">
                                                    <div class="form-group">
                                                        <div class="card">
                                                            <label for="recipient-name" class="control-label">Adjuntar</label>
                                                            <label for="input-file-now">
                                                                <button type="button" class="btn waves-effect waves-light btn-sm btn-info">
                                                                    <i class="fas fa-exclamation"></i>
                                                                </button>
                                                                OJO Solo archivos Excel
                                                            </label>
                                                            <input type="file" id="input-file-now" class="dropify" name="adjunto"  accept=".xlsx,.xlsm,.xltx,.xltm,.xlsb,.xlam" required/>
                                                        </div>
                                                    </div>
                                                </div>

                                                

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                                </div>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <div id="modalImagen" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        
                                        <div class="modal-body">
                                          <?php echo form_open_multipart('archivo/do_upload', array('method'=>'POST')); ?>

                                                <div class="form-group">
                                                    <input type="text" hidden="" id="nombre_raiz" name="nombre_raiz" value="<?php echo $pre1->nombre; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <input type="text" hidden="" id="raiz_id" name="raiz_id" value="<?php echo $pre1->raiz_id; ?>">
                                                </div>
                                                
                                                <div class="form-group">
                                                    <input type="text" hidden="" id="carpeta" name="carpeta" value="jpg">
                                                </div>

                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Nombre:</label>
                                                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="control-label">Nombre del Propietario:</label>
                                                    <textarea class="form-control" id="descripcion1" name="descripcion1" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="control-label">C.I. del Propietario:</label>
                                                    <textarea class="form-control" id="descripcion2" name="descripcion2" required></textarea>
                                                </div>
                                                <div class="col-md-12 mb-6">
                                                    <div class="form-group">
                                                        <div class="card">
                                                            <label for="recipient-name" class="control-label">Adjuntar</label>
                                                            <label for="input-file-now">
                                                                <button type="button" class="btn waves-effect waves-light btn-sm btn-info">
                                                                    <i class="fas fa-exclamation"></i>
                                                                </button>
                                                                OJO Solo Imagenes
                                                            </label>
                                                            <input type="file" id="input-file-now" class="dropify" name="adjunto" accept=".jpg,.jpeg,.png" required />
                                                        </div>
                                                    </div>
                                                </div>

                                                

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                                </div>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <div id="modalOtros" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        
                                        <div class="modal-body">
                                           <?php echo form_open_multipart('archivo/do_upload', array('method'=>'POST')); ?>

                                                <div class="form-group">
                                                    <input type="text" hidden="" id="nombre_raiz" name="nombre_raiz" value="<?php echo $pre1->nombre; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <input type="text" hidden="" id="raiz_id" name="raiz_id" value="<?php echo $pre1->raiz_id; ?>">
                                                </div>
                                                
                                                <div class="form-group">
                                                    <input type="text" hidden="" id="carpeta" name="carpeta" value="otros">
                                                </div>

                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Nombre:</label>
                                                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="control-label">Nombre del Propietario:</label>
                                                    <textarea class="form-control" id="descripcion1" name="descripcion1" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="control-label">C.I. del Propietario:</label>
                                                    <textarea class="form-control" id="descripcion2" name="descripcion2" required></textarea>
                                                </div>
                                                <div class="col-md-12 mb-6">
                                                    <div class="form-group">
                                                        <div class="card">
                                                            <label for="recipient-name" class="control-label">Adjuntar</label>
                                                            <label for="input-file-now">
                                                            </label>
                                                            <input type="file" id="input-file-now" class="dropify" name="adjunto" accept=".csv,.txt,.rtf,.html,.zip,.mp3,.wma,.mpg,.flv,.avi" required />
                                                        </div>
                                                    </div>
                                                </div>

                                                

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                                </div>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>


                            <div id="modalAdicion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        
                                        <div class="modal-body">
                                           <?php echo form_open('archivo/insertarhijo', array('method'=>'POST')); ?>
                                                
                                                <div class="form-group">
                                                    <input type="text" hidden="" id="raiz_id" name="raiz_id">
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Nombre:</label>
                                                    <input type="text" class="form-control" id="nombree" name="nombre" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="control-label">Nombre del Propietario:</label>
                                                    <textarea class="form-control" id="descripcion1" name="descripcion1" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="control-label">C.I. del Propietario:</label>
                                                    <textarea class="form-control" id="descripcion2" name="descripcion2" required></textarea>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Tipo de Carpeta</label>
                                                        <select class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" id="tipo" name="tipo">
                                                            <option value="carpeta">Carpeta</option>
                                                            <option value="carpeta_llena">Carpeta Llena</option>
                                                            <option value="carpeta_vacia">Carpeta Vacia</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                                </div>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div id="Modaluno" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h4 class="modal-title">Acta de inspeccion</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            
                                        </div>
                                        <div class="modal-body">

                                            <embed src="<?php echo base_url().'public/assets/archivos/a' ?>"
                                                   frameborder="0" width="100%" height="400px">

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


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
</div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/plugins/edit/ubicacionscript.js"></script>

    <script>
        function agregarform(datos)
        {
             d=datos.split('||');
              $('#hijo_idc').val(d[0]);
              $('#nombrec').val(d[1]);
              $('#descripcion1c').val(d[2]);
              $('#descripcion2c').val(d[3]);
              $('#tipoc').val(d[4]);
              $('#raiz_idc').val(d[5]);
        }

    </script>
    
    <script>
    function agregarform1(datos1)
        {
             d1=datos1.split('||');
              $('#documento_id1').val(d1[0]);
              $('#nombre1').val(d1[1]);
              $('#descripcion11').val(d1[2]);
              $('#descripcion21').val(d1[3]);
              $('#carpeta1').val(d1[4]);
              $('#raiz_id1').val(d1[5]);

        }
     </script>

      <script>
    function alerta1(datos2)
        {
            var abc = datos2;

            $('#valor1').val(abc);
            

        }
     </script>

     <!-- Sweet-Alert  -->
    <script src="<?php echo base_url(); ?>public/assets/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/plugins/sweetalert/jquery.sweet-alert.custom.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url(); ?>public/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>

<!-- bt-switch -->

    <script src="<?php echo base_url(); ?>public/assets/plugins/bootstrap-switch/bootstrap-switch.min.js"></script>
    <script type="text/javascript">
            function atras()
        {
            // window.history.go(-2) //dos atras
            // window.history.back();//uno atras
             // redirectPreviousPage();
             back();
        }
    </script>

    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url(); ?>public/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <!-- This is data table -->
    <script src="<?php echo base_url(); ?>public/assets/plugins/datatables/datatables.min.js"></script>

        
    <!-- desde aqui -->
        
    


    <!-- hasta aqui -->






        <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script>
      $('#tabla_din1').DataTable( {
     
        "oLanguage": {
            "sUrl": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
    });
    </script>
    