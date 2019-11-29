<style type="text/css">
  @media print {
    .left-sidebar {display: none;}
  }
</style>

<div class="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-body printableArea">
          <div class="row">
            <div class="col-md-12">
              <div class="float-left">
                <address>
                  La Paz, 21 de marzo de 2019
                  <br/> Tramite No 321456,
                  <br/> <b>Certificacion de Datos Tecnicos No. 1245/2019</b>
                  <br/> Matricula: <?php echo $ddrr->nro_matricula_folio ?>
                  <br/> Propietario(s): 
                  <?php $cont=1 ?>
                  <?php foreach ($personas as $propietarios) {
                      if ($cont>1) {
                          echo ' , '; 
                      }
                      echo $propietarios->nombres; echo " ";  echo $propietarios->paterno; echo " "; echo $propietarios->materno;
                       $cont=$cont+1;
                  } ?>                                 
                </address>
              </div>
            </div>
          </div>
          <div class="row" style="text-align: center;">
              <div class="col-md-12">
                  <b class="text-black" style="font-size: 25pt;">CERTIFICACION TECNICA</b>
                  <br /> DE CONFORMIDAD A LA LEY NO 247/2012 Y LEY DE MODIFICACIONES 803/2016
              </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                  Verificando el sistema informatico de Registro Catastral, el Archivo documentado del Registro Catastral y planos de acuerdo a lo solicitado, se informa.
                  <br /><b class="text-black" style="font-size: 15pt;">LA EXISTENCIA DE REGISTRO CATASTRAL UBICADO EN:</b>
              </div>
          </div>
          <table class="table">
            <tr>
              <td>
                Distrito No: <b><?php echo $predio[0]->distrito; ?></b>
                <br />Predio: <b><?php echo $predio[0]->predio; ?></b>
              </td>
              <td>
                  Sub Distrito No: <b>34</b>
                  <br />Lote No: <b>34</b>
              </td>
              <td>
                  Zona: <b>CENTRAL</b>
                  <br>Calle: <b>Innominada</b>
              </td>
              <td>
                  Manzana Act: <b>125</b>
                  <br />Organizacion: <b>LOMA PAMPA</b>
              </td>
              </tr>
          </table>
          <div class="row" style="text-align: center;">
              <div class="col-md-12">
                  <div class="text-black" style="font-size: 15pt;">CODIGO CATASTRAL:  <?php print_r($predio[0]->codcatas); ?></div>
              </div>
          </div>
          Segun plan de URBANIZACION aprobado en fecha 16/05/2018 mediante R.M. No. 338/2014 de 21/10/2014 se tiene la siguiente informacion:
          <table class="d-print-table">
            <tr>
              <td style="width: 100%;">
                <?php
                    $foto_bytea_ubi = pg_unescape_bytea($predio[0]->foto_plano_ubi); 
                    $foto_64_ubi = base64_encode($foto_bytea_ubi);
                ?>
                <?php echo "<img src='data:image/jpeg;base64, $foto_64_ubi' width='250px' />"; ?>

                <br />CROQUIS DEL PREDIO
                <br />
                <?php 
                    $foto_bytea_fachada = pg_unescape_bytea($predio[0]->foto_fachada); 
                    $foto_64_fachada = base64_encode($foto_bytea_fachada);
                ?>
                <?php echo "<img src='data:image/jpeg;base64, $foto_64_fachada' width='250px' />"; ?>
                <br />FOTO DE FACHADA
              </td>
              <td>
                <div class="text-black" style="font-size: 10pt; text-decoration: underline;">DATOS TECNICOS</div>
                <br />RELACION SUPERFICIES
                <div class="row">
                    <div class="col-md-6">
                        Sup Lote No 24
                    </div>
                    <div class="col-md-6">
                        200.00 m
                    </div>
                </div>
                <P>&nbsp;</P>
                <div class="text-black" style="font-size: 10pt; text-decoration: underline;">LIMITES COLINDANTES</div>
                <div class="row">
                  <div class="col-md-6">Norte</div>
                  <div class="col-md-6">200.00 m</div>
                </div>
              </td>
            </tr>
          </table>
          <hr>
          <div class="row">
              <div class="col-md-12">
                  Nota: Se aclara que la manzana S-6985 a la codificacion ANTIGUA, actualemente corresponde a la manzana 125 de acuerdo al Plano General del Area Urbana de La Paz aprobado segun ley Municipal 0159/2016 del 02/09/2016.
                  <br />La presente certificacion no define derecho propietario
                  <br />En cuanto se certifica para fines consiguientes
              </div>
          </div>          
        </div>
      </div>
    </div>
  </div>
</div>
        
   