<style type="text/css">
    @media print {
        .left-sidebar {display: none;}
    }
</style>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" crossorigin=""/>
<?php require_once(APPPATH.'libraries/coordinates.php'); ?>
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
            <div class="col-md-12">
                <div class="card card-body printableArea">
                <?php //vdebug($predio); ?>
                    <!-- <h3><b>INVOICE</b> <span class="float-right">#5669626</span></h3> -->
                    <!-- <hr> -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="float-left">
                                <address>
                                    <!-- <h3> &nbsp;<b class="text-danger">Monster Admin</b></h3> -->
                                    <!-- <b class="text-muted ml-1">La Paz, 28 de febrero de 2019</b> -->
                                        La Paz, 13 de Diciembre de 2020
                                        <br/> Tramite No 321456,
                                        <br/> <b>Certificacion de Datos Tecnicos No. 1245/2019</b>
                                        <br/> Matricula: <?php //echo $ddrr->nro_matricula_folio ?>

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
                            <!-- <div class="float-right text-right">
                                <address>
                                    <h3>To,</h3>
                                    <h4 class="font-bold">Gaala & Sons,</h4>
                                    <p class="text-muted ml-4">E 104, Dharti-2,
                                        <br/> Nr' Viswakarma Temple,
                                        <br/> Talaja Road,
                                        <br/> Bhavnagar - 364002</p>
                                    <p class="mt-4"><b>Invoice Date :</b> <i class="fa fa-calendar"></i> 23rd Jan 2019</p>
                                    <p><b>Due Date :</b> <i class="fa fa-calendar"></i> 25th Jan 2019</p>
                                </address>
                            </div> -->
                        </div>
                    </div>

                    <div class="row" style="text-align: center;">
                        <div class="col-md-12">
                            <b class="text-black" style="font-size: 45pt;">CERTIFICACION TECNICA</b>
                            <br /> DE CONFORMIDAD A LA LEY NO 247/2012 Y LEY DE MODIFICACIONES 803/2016
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            Verificando el sistema informatico de Registro Catastral, el Archivo documentado del Registro Catastral y planos de acuerdo a lo solicitado, se informa.
                            <br /><b class="text-black" style="font-size: 24pt;">LA EXISTENCIA DE REGISTRO CATASTRAL UBICADO EN:</b>
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
                            <div class="text-black" style="font-size: 28pt;">CODIGO CATASTRAL:  <?php print_r($predio[0]->codcatas); ?></div>
                        </div>
                    </div>

                    Segun plan de URBANIZACION aprobado en fecha 16/05/2018 mediante R.M. No. 338/2014 de 21/10/2014 se tiene la siguiente informacion:
                    <table class="d-print-table">
                        <tr>
                            <td style="width: 610px;">
                                <?php if ($fotos==0){$imagen_plano="";}else{$fotop = $fotos[0]->foto_plano_ubi; $imagen_plano=base_url("/public/assets/files/predios/".$fotop);}?>
                                <!-- <img src="<?php// echo $imagen_plano; ?>" style="width: 610px;">                             -->
                                <?php

                                    // $foto_bytea_ubi = pg_unescape_bytea($predio[0]->foto_plano_ubi); 
                                    // $foto_64_ubi = base64_encode($foto_bytea_ubi);
                                ?>
                                <?php //echo "<img src='data:image/jpeg;base64, $foto_64_ubi' width='350px' />"; ?>

                                <br />CROQUIS DEL PREDIO
                                <?php //echo ll2utm(36.311665575277935,59.55385813725379); ?>
                                <?php echo utm2ll(451603.0487,7994746.7977,20,true);  ?>
                                <div id="mapid" style="height: 380px;"></div>
                                <!-- <div id="mapid" style="height: 180px;"></div> -->
                                <?php $cod_predio = $predio[0]->predio_id; ?>
                                <?php //vdebug($cod_predio, false, false, true); ?>
                                <?php 
                                   
                                    $centroide = $this->db->query("SELECT ST_AsText(ST_Centroid(geom)) as area
                                        FROM catastro.geo_predios
                                        WHERE predio_id = $cod_predio;")->row_array();
                                    $centroide_texto_1 = str_replace("POINT(", "", $centroide);
                                    $centroide_texto_2 = str_replace(")", "", $centroide_texto_1);
                                    $cambio_coordenadas_centroide = str_replace(" ", ",", $centroide_texto_2);

                                    $centroide_json = json_encode($cambio_coordenadas_centroide);
                                    // vdebug($centroide_json, false, false, true);

                                    $vertices2 = $this->db->query("SELECT ST_AsText(geom) as area
                                        FROM catastro.geo_predios
                                        WHERE predio_id = $cod_predio;")->row_array();
                                    $quitado_texto_1 = str_replace("MULTIPOLYGON(((", "", $vertices2);
                                    $quitado_texto_2 = str_replace(")))", "", $quitado_texto_1);
                                    $coordenadas = explode(",", $quitado_texto_2['area']);
                                    $cambio_coordenadas = str_replace(" ", ",", $coordenadas);
                                    // $el_primero = substr($coordenadas[1], 21);
                                    $coordenadas_json = json_encode($cambio_coordenadas);
                                    // vdebug($vertices2, false, false, true);
                                    // vdebug($cambio_coordenadas, false, false, true);
                                    // vdebug($coordenadas, false, false, true);
                                    // vdebug($el_primero, false, false, true);
                                    // vdebug($coordenadas_json, false, false, true);

                                    // $utm_zona = '32720';

                                ?>
                                <br />
                                <?php 
                                    // $foto_bytea_fachada = pg_unescape_bytea($predio[0]->foto_fachada); 
                                    // $foto_64_fachada = base64_encode($foto_bytea_fachada);
                                ?>
                                <?php //echo "<img src='data:image/jpeg;base64, $foto_64_fachada' width='350px' />"; ?>
                                    <?php if ($fotos==0){$imagen_fachada="";}else{$fotof = $fotos[0]->foto_fachada; $imagen_fachada=base_url("/public/assets/files/predios/".$fotof);}?>
                                    <img src="<?php $imagen_fachada ?>" style="width: 610px;">

                                    <input type="file" id="input-file-now" class="dropify" name="foto_plano" data-allowed-file-extensions="png jpg jpeg" data-default-file="<?php echo $imagen_plano; ?>" />
                                
                                    <br />FOTO DE FACHADA
                            </td>
                            <td>
                                <div class="text-black" style="font-size: 18pt; text-decoration: underline;">DATOS TECNICOS</div>
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
                                <div class="text-black" style="font-size: 18pt; text-decoration: underline;">LIMITES COLINDANTES</div>
                                <div class="row">
                                    <div class="col-md-6">Norte</div>
                                    <div class="col-md-6">200.00 m</div>
                                </div>
                            </td>
                        </tr>
                    </table>

                    <div class="row">
                        <div class="col-md-5">
                        
                        <div class="text-black" style="font-size: 18pt; text-decoration: underline;">DATOS DE BLOQUES
                        </div>            


                        <table class="table table-responsive ">
                            <thead>
                                <tr>
                                   
                                    <th><small><i><b>Nro</i></small></th>
                                    <th> <small><i><b> Nombre</i></small></th>
                                    <th><small><i><b> Estado fisico</i></small></th>
                                    <th><small><i><b> Año construccion</i></small></th>                                                     
                                    <th><small><i><b> Destino</i></small></th>
                                    <th><small><i><b> Uso</i></small></th>                                                       
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($bloques as $row) { ?>
                                <tr>
                                 
                                    <td><small><i><?php echo $row->nro_bloque; ?></i></small></td>
                                    <td><small><i><?php echo $row->nom_bloque; ?></i></small></td>
                                    <td><small><i><?php echo $row->estado_fisico; ?></i></small></td>
                                    <td><small><i><?php echo $row->anio_cons; ?></i></small></td>                                                       
                                    <td><small><i><?php echo $row->desc_bloque_dest; ?></i></small></td>
                                    <td><small><i><?php echo $row->desc_bloque_uso; ?></i></small> </td>                                                        
                                </tr>
                                <?php 
                            } ?>
                            </tbody>
                        </table>
                           
                        </div>
                    </div>
                            


               

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            Nota: Se aclara que la manzana S-6985 a la codificacion ANTIGUA, actualemente corresponde a la manzana 125 de acuerdo al Plano General del Area Urbana de La Paz aprobado segun ley Municipal 0159/2016 del 02/09/2016.
                            <br />La presente certificacion no define derecho propietario
                            <br />En cuanto se certifica para fines consiguientes
                        </div>
                    </div>
                    
                    <div class="row">

                        <div class="col-md-12">
                            
                        </div>

                        <div class="col-md-12">
                            <div class="clearfix"></div>
                            <hr>
                            <div class="text-right d-print-none">
                                <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Impresion</span> </button>
                                <a href="<?php //echo base_url(); ?>Predios/pdf_certificado/<?php //echo $predio[0]->codcatas; ?>" class="btn btn-warning footable-edit" title="Imprimir" >
                                    <span class="fas fa-print" aria-hidden="true"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
</div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>

 <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>

<script src="<?php echo base_url(); ?>public/js/proj4-compressed.js"></script>
<script src="<?php echo base_url(); ?>public/js/proj4leaflet.js"></script>

<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet-src.js" crossorigin=""></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/proj4js/2.4.3/proj4.js"></script>
<script src="<?php echo base_url(); ?>public/js/L.LatLng.UTM.js"></script>

<script type="text/javascript">

    var centroide = '<?php echo $centroide_json; ?>';
    var obj_centroide = JSON.parse(centroide);
    var descomp_centroide = obj_centroide.area.split(',');
    var geo_centroide = L.utm({x: descomp_centroide[0], y: descomp_centroide[1], zone: 20, band: 'K'});
    var coord_centroide = geo_centroide.latLng();
    // obj_coord_centroide = JSON.parse(coord_centroide);

    console.log(coord_centroide);
    var mymap = L.map('mapid').setView([coord_centroide['lat'], coord_centroide['lng']], 18);

    var item = L.utm({x: 460011.878, y: 8011211.607, zone: 20, band: 'K'});
    var coord = item.latLng();
    var coordenadas = <?php echo $coordenadas_json; ?>;
    // console.log(coordenadas);
    var array_poligono = [];
    for(i=0;i<coordenadas.length;i++)
    {
        var separador = coordenadas[i].split(',');
        var item = L.utm({x: separador[0], y: separador[1], zone: 20, band: 'K'});
        var coord = item.latLng();
        array_poligono.push([coord['lat'], coord['lng']]);
        // console.log(coord);
    }
    // console.log(array_poligono);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 22,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11'
    }).addTo(mymap);

    var marker = L.marker([coord_centroide['lat'], coord_centroide['lng']]).addTo(mymap);

/*    var polygon = L.polygon([
        [-17.999559202197545, -63.38726487769021],
        [-17.999633481585207, -63.3872968256511],
        [-17.99970452616239, -63.38732738462532],
        [-17.999550216722362, -63.38750240432171],
        [-17.9994858330758, -63.387463482194335],
        [-17.999557268347363, -63.387270113168206],
        [-17.999559202197545, -63.38726487769021]
    ]).addTo(mymap);
*/
    var polygon = L.polygon(array_poligono).addTo(mymap);

</script>
