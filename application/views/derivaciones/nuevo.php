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

        <?php echo form_open('derivaciones/guarda', array('method'=>'POST')); ?>
        <div class="row">
            <div class="col-md-12">
            
                <div class="card">
                    <div class="card-body">
                    
                        <div class="row">
                            <div class="col-6">
                            <?php //vdebug($tramite); ?>
                                <h2 class="mb-0">CITE: <?php echo $tramite->cite; ?></h2>
                                <h4 class="font-light mt-0">Referencia <?php echo $tramite->referencia; ?></h4>
                            </div>
                            <div class="col-6 align-self-center display-8 text-info text-right">Fecha: <?php echo $tramite->fecha; ?></div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                REMITENTE: <?php echo $tramite->remitente; ?>
                            </div>
                            <div class="col-6">
                                PROCEDENCIA: <?php echo $tramite->procedencia; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-6">

                                <div class="form-group">
                                    <input type="hidden" name="idTramite" value="<?php echo $idTramite; ?>">
                                    <label>Derivar a: </label>
                                    <select class="custom-select form-control" name="destino" />
                                        <?php foreach ($personas as $key => $p): ?>
                                            <option value="<?php echo $p['id'] ?>"><?php echo $p['nombre']; ?> - <?php echo $p['cargo']; ?> (<?php echo $p['unidad']; ?>)</option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                            
                                <div class="form-group">
                                    <label>Descripcion: </label>
                                    <input type="text" class="form-control" name="descripcion">
                                </div>
                                <!-- <label>&nbsp;</label> -->
                                <?php // echo $tramite->procedencia; ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn waves-effect waves-light btn-block btn-info">Derivar</button>
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