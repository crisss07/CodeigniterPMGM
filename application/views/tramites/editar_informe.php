<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/plugins/dropify/dist/css/dropify.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/plugins/wizard/steps.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/pasos.css">
<!-- <script src="https://cdn.jsdelivr.net/npm/vue@2.6.9/dist/vue.js"></script> -->

<!-- sample modal content -->

<!-- /.modal -->

<!-- ============================================================== -->
<!-- Start Page Content 
   <select class="custom-select form-control" id="tipo_predio" name="tipo_predio_id" required />
        <option value="">Seleccione tipo</option>
        <?php foreach ($dc_tipos_predio as $d): ?>
            <option value="<?php echo $d->tipo_predio_id; ?>"><?php echo $d->descripcion; ?></option>
        <?php endforeach; ?>
    </select>  
-->
<!-- ============================================================== -->

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-body">
                            <?php echo form_open_multipart('tipo_tramite/guardar_edicion', array('method'=>'POST')); ?>
                                <h3 class="" style="text-align: center;"> EDITAR INFORME TECNICO  </h3>
                                    <div>
                                        <input type="hidden" name="organigrama_persona_id" value="" >
                                        <input type="hidden" name="informe_id" id="informe_id" value="<?php echo $tramites->informe_tecnico_id; ?>">
                                        <div class="form-group  row">
                                            <label for="example-text-input" class="col-3 col-form-label">CITE: GAMM-SMDT-TEC-Nº </label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" id="cite" name="cite" value="<?php echo $tramites->cite ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-month-input2" class="col-2 col-form-label">A : </label>
                                            <div class="col-10">
                                                <select class="custom-select col-12" id="a" name="a" required>
                                                    <option value="<?php echo $tramites->a ?>"><?php echo $a->nombre;?> - <?php echo $a->cargo;?> (<?php echo $a->unidad;?>)</option>
                                                    <?php foreach ($personas as $key => $p): ?>
                                                        <option value="<?php echo $p['id'] ?>"><?php echo $p['nombre']; ?> - <?php echo $p['cargo']; ?> (<?php echo $p['unidad']; ?>)</option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-month-input2" class="col-2 col-form-label">VIA : </label>
                                            <div class="col-10">
                                                <select class="custom-select col-12" id="via" name="via" required>
                                                    <option value="<?php echo $tramites->via ?>"><?php echo $via->nombre;?> - <?php echo $via->cargo;?> (<?php echo $via->unidad;?>)</option>
                                                    <?php foreach ($personas as $key => $p): ?>
                                                        <option value="<?php echo $p['id'] ?>"><?php echo $p['nombre']; ?> - <?php echo $p['cargo']; ?> (<?php echo $p['unidad']; ?>)</option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group  row">
                                            <label for="example-text-input" class="col-2 col-form-label">Nro. de tramite</label>
                                            <div class="col-10">
                                                <input class="form-control" type="text" id="nro_tramite" name="nro_tramite" value="<?php echo $tramites->nro_tramite ?>"  required>
                                            </div>
                                        </div>
                                        <!--<?php $fecha //= date('d-m-Y'); ?>
                                         <div class="col-md-12 mb-form-group mb-5">
                                            <input type="text" class="form-control" id="fecha_tramite" name="fecha_tramite" value="<?php echo $fecha ?>" required>
                                            <label >Fecha<span class="text-danger">*</span></label>
                                        </div> -->
                                        <div class="form-group row">
                                            <label for="example-month-input2" class="col-2 col-form-label">Procesador : </label>
                                            <div class="col-10">
                                                <select class="custom-select col-12"  id="procesador" name="procesador" required>
                                                    <option value="<?php echo $tramites->procesador ?>"><?php echo $procesador->nombre;?> - <?php echo $procesador->cargo;?> (<?php echo $procesador->unidad;?>)</option>
                                                    <?php foreach ($personas as $key => $p): ?>
                                                        <option value="<?php echo $p['id'] ?>"><?php echo $p['nombre']; ?> - <?php echo $p['cargo']; ?> (<?php echo $p['unidad']; ?>)</option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-form-group" style="padding-top: 30px; padding-bottom: 20px;">
                                    <u><b>ANTECEDENTES</b></u> <br>   
                                    <b>Da curso a la siguiente solicitud</b> <br/>
                                </div>
                                <div class="row" >
                                    <div class="form-group row col-12">
                                        <label for="example-text-input" class="col-3 col-form-label">Fecha de solicitud</label>
                                        <div class="col-9">
                                            <input class="form-control" type="date" id="fecha_solicitud" name="fecha_solicitud" value="<?php echo date("Y-m-d",strtotime($tramites->fecha_solicitud));?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group  row col-8">
                                        <label for="example-text-input" class="col-3 col-form-label">Solicitante 1</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" id="solicitante" name="solicitante" value="<?php echo $tramites->solicitante; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group  row col-4">
                                        <label for="example-text-input" class="col-2 col-form-label">CI</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" id="ci" name="ci" value="<?php echo $tramites->ci; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group  row col-8">
                                        <label for="example-text-input" class="col-3 col-form-label">Solicitante 2</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" id="solicitante2" name="solicitante2" value="<?php echo $tramites->solicitante2; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group  row col-4">
                                        <label for="example-text-input" class="col-2 col-form-label">CI</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" id="ci2" name="ci2" value="<?php echo $tramites->ci2; ?>" >
                                        </div>
                                    </div>
                                </div>
                                <?php $lista2 = $this->db->query("SELECT * FROM tramite.tipo_tramite WHERE activo='1' ORDER BY tipo_tramite_id ASC")->result();
                                    $valores=$this->db->query("SELECT tramite FROM tramite.tipo_tramite WHERE tipo_tramite_id = '$tramites->tipo_tramite_id'")->row();?>
                                <div class="form-group row">
                                    <label for="example-month-input2" class="col-2 col-form-label">Tipo de Tramite : </label>
                                    <div class="col-10">
                                        <select class="custom-select col-12"   id="tipo_tramite_id" name="tipo_tramite_id" required>
                                            <option value="<?php echo $tramites->tipo_tramite_id; ?>"><?php echo $valores->tramite;?></option>
                                            <?php foreach ($lista2 as $tc): ?>
                                            <option value="<?php echo $tc->tipo_tramite_id; ?>"><?php echo $tc->tramite; ?></option>
                                        <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group" id="listas">
                                </div>
                                <div class="form-group row ">
                                    <label for="example-text-input" class="col-2 col-form-label">Ubicacion</label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" id="ubicacion" name="ubicacion" value="<?php echo $tramites->ubicacion; ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group row col-6">
                                        <label for="example-text-input" class="col-3 col-form-label">Lote</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" id="lote" name="lote" value="<?php echo $tramites->lote; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label for="example-text-input" class="col-3 col-form-label">Urbanizacion</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" id="urbanizacion" name="urbanizacion" value="<?php echo $tramites->urbanizacion; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group row col-6">
                                        <label for="example-text-input" class="col-3 col-form-label">Manzano</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" id="manzana" name="manzana" value="<?php echo $tramites->manzana; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label for="example-text-input" class="col-3 col-form-label">Comunidad</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" id="comunidad" name="comunidad" value="<?php echo $tramites->comunidad; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group row col-6">
                                        <label for="example-text-input" class="col-6 col-form-label">Superficie segun testimonio</label>
                                        <div class="col-6">
                                            <input class="form-control" type="text" id="superficie_testimonio" name="superficie_testimonio" value="<?php echo $tramites->superficie_testimonio; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label for="example-text-input" class="col-6 col-form-label">Superficie segun medicion</label>
                                        <div class="col-6">
                                            <input class="form-control" type="text" id="superficie_medicion" name="superficie_medicion" value="<?php echo $tramites->superficie_medicion; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-form-group " style="padding-top: 30px; padding-bottom: 20px;">
                                    <u><b>DOCUMENTACION PRESENTADA</b></u> <br>
                                    <b>Folio</b>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-2 col-form-label">N°  </label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" id="nro_folio" name="nro_folio" value="<?php echo $tramites->nro_folio;?>" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-form-group" style="padding-top: 30px; padding-bottom: 20px;">
                                    <b>Testimonio de propiedad</b>
                                </div>
                                <div class="row">
                                    <div class="form-group row col-4">
                                        <label for="example-text-input" class="col-4 col-form-label">N°</label>
                                        <div class="col-8">
                                            <input class="form-control" type="text" id="nro_testimonio" name="nro_testimonio" value="<?php echo $tramites->nro_testimonio; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row col-4">
                                        <label for="example-text-input" class="col-4 col-form-label">Notaria</label>
                                        <div class="col-8">
                                            <input class="form-control" type="text" id="notaria" name="notaria" value="<?php echo $tramites->notaria; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row col-4">
                                        <label for="example-text-input" class="col-4 col-form-label">Fecha</label>
                                        <div class="col-8">
                                            <input class="form-control" type="date" id="fecha_testimonio" name="fecha_testimonio" value="<?php echo date("Y-m-d",strtotime($tramites->fecha_testimonio));?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-2 col-form-label">Notario Dr(a)</label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" id="notario" name="notario" value="<?php echo $tramites->notario; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-form-group ">
                                    <b>Impuestos</b>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-2 col-form-label">Años</label>
                                    <div class="col-10">
                                        <input class="form-control" type="text"id="impuestos" name="impuestos" value="<?php echo $tramites->impuestos; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-form-group ">
                                    <u><b>OBSERVACIONES</b></u>
                                </div>
                                <div class="form-group  row">
                                    <label for="example-text-input" class="col-2 col-form-label">Observaciones</label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" id="observaciones" name="observaciones" value="<?php echo $tramites->observaciones; ?>">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-form-group ">
                                    Glosa del certificado de superficie (Datos del predio anterior)
                                </div>
                                <div class="form-group  row">
                                    
                                    <div class="col-12">
                                        <textarea rows="3" class="form-control" type="text" id="glosa" name="glosa"><?php echo $tramites->glosa; ?></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" name="boton" value="generar" class="btn waves-effect waves-light btn-block btn-info">Guardar</button>
                                    </div>
                                </div>
                            </form>
                          
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12" >
                <div class="card" style="background: #0489B1;">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <!-- <div class=""><img src="<?php echo base_url(); ?>public/assets/images/users/1.jpg" alt="user" class="img-circle" width="100"></div> -->
                            <div class="pl-3">
                                <h3 style="color: white;" class="font-medium">Forma de llenar el formulario</h3>
                                <!-- <h6 style="color: white;">UIUX Designer</h6> -->
                            </div>
                        </div>
                        <div class="row mt-5">
                            <!-- <div class="col border-right">
                                <h2 style="color: white;" class="font-light">14</h2>
                                <h6 style="color: white;" >Photos</h6></div>
                            <div class="col border-right">
                                <h2 style="color: white;" class="font-light">54</h2>
                                <h6 style="color: white;">Videos</h6></div>
                            <div class="col">
                                <h2 style="color: white;" class="font-light">145</h2>
                                <h6 style="color: white;" >Tasks</h6></div> -->
                            

                        </div>
                    </div>
                    <div>
                        <hr>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>public/assets/plugins/jquery/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBw8R4L-CtMu9XuQBiymIEs6UEc715P2eA&callback=initMap&libraries=drawing" async defer></script>