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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Division del predio</h4>
                        <div class="row">
                          <?php //vdebug($predio, false, false, true); ?>
                            <div class="col-md-3 col-xs-6 border-right"> <strong>Cod CATASTRAL</strong>
                                <br>
                                <p class="text-muted"><?php echo $predio['codcatas'] ?></p>
                            </div>
<!--                             <div class="col-md-3 col-xs-6 border-right"> <strong>Tipo Predio</strong>
                                <br>
                                <p class="text-muted">Propiedad Condominio</p>
                            </div>
                            <div class="col-md-3 col-xs-6 border-right"> <strong>Propietario</strong>
                                <br>
                                <p class="text-muted">Faviani Herrera Calderon</p>
                            </div>
                             -->
                             <div class="col-md-3 col-xs-6"> <strong>Geocodigo</strong>
                                <br>
                                <p class="text-muted"><?php echo $predio['geocodigo'] ?></p>
                            </div>
                        </div>                        
                        <p></p>
    
                        <div class="row">
                            <div class="col-md-3">
                                <h4 class="card">Ingrese el codigo catastral</h4>
                                <input type="text" class="form-control" name="">
                                <p></p>
                                <a href="#" class="btn btn-info" onclick="muestraDetalle();">Buscar</a>
                            </div>

                            <div class="col-md-9" style="display: block;" id="resultado">
                              <div class="row">
                                Predios Hijos
                                <?php //vdebug($hijos, false, false, true); ?>
                                <table class="table no-wrap">
                                  <thead>
                                      <tr>
                                          <th>#</th>
                                          <th>Codigo Catastral</th>
                                          <th>Geocodigo</th>
                                          <th>Acciones</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php foreach ($hijos as $key => $h): ?>
                                      <tr>
                                          <td><?php echo ++$key; ?></td>
                                          <td><?php echo $h['codcatas'] ?></td>
                                          <td><?php echo $h['geocodigo'] ?></td>
                                          <td><span class="label label-danger">admin</span> </td>
                                      </tr>
                                    <?php endforeach ?>
                                  </tbody>
                                </table>
                              </div>  
                            </div>
                        </div>                        

                    </div>

                </div>

            </div>
        </div>

    </div>
</div>
<script type="text/javascript">
    function muestraDetalle(){
        $("#resultado").toggle('slow');
    }

/*    function muestraDatos(){
        $("#datos").toggle('slow');    
    }

    function muestraFotos(){
        $("#fotos").toggle('slow');    
    }
*/    
</script>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ==============================================================