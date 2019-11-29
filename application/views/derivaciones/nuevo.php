    <!-- sample modal content -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Mapa de ubicacion</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <!-- <div id="map" style="width: 100%; height: 650px;"></div> -->
                <!-- <div id="carga_ajax_mapa"></div> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->

        <?php echo form_open_multipart('derivaciones/guarda', array('method'=>'POST')); ?>
        <div class="row">
            <div class="col-md-12">
            <?php //vdebug($tramite, false, false, true); ?>
                <div class="card">  
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                            <?php //vdebug($tramite, false, false, true); ?>
                                <h2 class="mb-0">CITE: <?php echo $tramite->cite; ?></h2>
                                
                                <h4 class="font-light mt-0">Referencia <?php echo $tramite->referencia; ?></h4>
                            </div>
                            <div class="col-6 align-self-center display-8 text-info text-right">Fecha: <?php echo date("Y-m-d",strtotime($tramite->fecha)); ?></div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                REMITENTE: <?php echo $tramite->remitente; ?><br />
                                ARCHIVO: <a href="<?php echo base_url(); ?>public/assets/images/tramites/<?php echo $tramite->adjunto; ?>.pdf" target='_blank'><?php echo $tramite->adjunto; ?></a>
                            </div>
                            <div class="col-6">
                                PROCEDENCIA: <?php echo $tramite->procedencia; ?>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-4">
                            <?php //vdebug($personas, true, false, true); ?>
                                <div class="form-group">
                                    <input type="hidden" name="idTramite" value="<?php echo $idTramite; ?>">
                                    <input type="hidden" name="orden" id="orden" value="<?php echo $orden; ?>">
                                    <label>Derivar a: </label>
                                    <select class="custom-select form-control" name="destino" />
                                        <?php foreach ($personas as $key => $p): ?>
                                            <option value="<?php echo $p['organigrama_persona_id'] ?>"><?php echo $p['nombre']; ?> - <?php echo $p['descripcion']; ?> (<?php echo $p['unidad']; ?>)</option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label>Descripcion: </label>
                                    <input type="text" class="form-control"
                                     name="descripcion">
                                </div>
                                <!-- <label>&nbsp;</label> -->
                                <?php // echo $tramite->procedencia; ?>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label>Archivo</label>
                                    <input type="file" class="form-control" name="adjunto" accept=".pdf">
                                </div>
                               <!--  <div class="form-group">
                                    <div class="input-group input-file" name="Fichier1">
                                        <span class="input-group-btn">
                                            <button class="btn btn-success btn-choose" type="button">Subir</button>
                                        </span>
                                        <input type="text" class="form-control" placeholder='Escoger Archivo' name="adjunto" />
                                        <span class="input-group-btn">
                                             <button class="btn btn-warning btn-reset" type="button">Eliminar</button>
                                        </span>
                                    </div>
                                </div> -->

                                <!-- <div class="form-group">
                                    <label>Archivo</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Subir</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputGroupFile01" name="adjunto">
                                           
                                            <label class="custom-file-label" for="inputGroupFile01">Escoger Archivo</label>
                                        </div>
                                    </div>
                                </div> -->
                            </div>

                            
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" name="boton" value="nocite" class="btn waves-effect waves-light btn-block btn-info">Derivar</button>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" name="boton" value="cite" class="btn waves-effect waves-light btn-block btn-success">Derivar con Cite</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url(); ?>public/assets/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript">
        function envia(){
            // console.log('Hizo click');
            window.location = "http://localhost/CodeigniterPMGM/derivaciones/listado";
        }
    </script>
     <script type="text/javascript">
         function bs_input_file() {
    $(".input-file").before(
        function() {
            if ( ! $(this).prev().hasClass('input-ghost') ) {
                var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
                element.attr("name",$(this).attr("name"));
                element.change(function(){
                    element.next(element).find('input').val((element.val()).split('\\').pop());
                });
                $(this).find("button.btn-choose").click(function(){
                    element.click();
                });
                $(this).find("button.btn-reset").click(function(){
                    element.val(null);
                    $(this).parents(".input-file").find('input').val('');
                });
                $(this).find('input').css("cursor","pointer");
                $(this).find('input').mousedown(function() {
                    $(this).parents('.input-file').prev().click();
                    return false;
                });
                return element;
            }
        }
    );
}
$(function() {
    bs_input_file();
});
     </script>