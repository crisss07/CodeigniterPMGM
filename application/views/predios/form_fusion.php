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
                        <h4 class="card-title">Fusion del predio</h4>
                        <div class="row">
                            <div class="col-md-3 col-xs-6 border-right"> <strong>Cod CATASTRAL</strong>
                                <br>
                                <p class="text-muted">0012547</p>
                            </div>
                            <div class="col-md-3 col-xs-6 border-right"> <strong>Tipo Predio</strong>
                                <br>
                                <p class="text-muted">Propiedad Condominio</p>
                            </div>
                            <div class="col-md-3 col-xs-6 border-right"> <strong>Propietario</strong>
                                <br>
                                <p class="text-muted">Faviani Herrera Calderon</p>
                            </div>
                            <div class="col-md-3 col-xs-6"> <strong>Direccion</strong>
                                <br>
                                <p class="text-muted">Av. pucarani #456</p>
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

                            <div class="col-md-9" style="display: none;" id="resultado">
                              <div class="row">
                                <table class="table table-hover no-wrap">
                                      <tbody>
                                          <tr>
                                              <td>Cod Catastral</td>
                                              <td>0045678</td>
                                          </tr>
                                          <tr>
                                              <td>Tipo Predio</td>
                                              <td>Propiedad Condominio</td>
                                          </tr>
                                          <tr>
                                              <td>Propietario</td>
                                              <td>Juan carlos Funes</td>
                                          </tr>
                                          <tr>
                                              <td>Direccion</td>
                                              <td>Calle pucarani #556</td>
                                          </tr>
                                      </tbody>
                                  </table>
                                  <a href="#" class="btn btn-block btn-success">Fucionar</a>
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