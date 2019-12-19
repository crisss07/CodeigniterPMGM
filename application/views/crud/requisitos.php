<link href="<?php echo base_url(); ?>public/assets/plugins/wizard/steps.css" rel="stylesheet">
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">      
        <div class="row">
            <div class="col-12">
                <div class="card wizard-content">
                    <div class="card-body">
                        <div class="row page-titles">
                            <div class="col-md-6 col-8 align-self-center">
                                <h4 class="card-title">Requisitos</h4>                                
                            </div>
                        </div>
                        <p></p>
                        <!-- Step 1 -->                         
                        <div class="row" >
                            <div class="col-md-12">                                        
                                <button <?php echo $verifica['alta']; ?> type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_insertar"><i class="mdi mdi-plus"></i> Nuevo Requisito</button>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Listado</h4>                                        
                                <div class="table-responsive m-t-40">
                                    <table id="tabla_din1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>nro</th>
                                                <th>tramite</th>
                                                <th>descripcion</th>
                                                <th>Estado</th>                                                         
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1;?>
                                            <?php foreach ($data_requisitos as $row) { $datos = $row->requisito_id."||".
                                             $row->descripcion."||".
                                            $row->tipo_tramite_id."||".
                                            $row->tramite; ?>
                                            <tr>
                                                <td ><?php echo $i++;?></td>
                                                <td><?php echo $row->tramite; ?></td>
                                                <td><?php echo $row->descripcion; ?></td>
                                                <td>                                                                                               
                                                    <?php if (($row->activo)==1):?>
                                                        <a <?php echo $verifica['baja'];?>="<?php echo site_url('Requisitos/delete'); ?>/<?php echo $row->requisito_id; ?>"><button type="button" class="btn btn-success"><span class="fas fa-arrow-alt-circle-up" aria-hidden="true"></span> Activo</button></a>                                                          
                                                    <?php endif ?>
                                                    <?php if (($row->activo)==0):?>
                                                        <a <?php echo $verifica['baja'];?>="<?php echo site_url('Requisitos/delete'); ?>/<?php echo $row->requisito_id; ?>"><button type="button" class="btn btn-danger"><span class="fas fa-arrow-alt-circle-down" aria-hidden="true"></span> Inactivo</button></a>
                                                    <?php endif ?>
                                                </td>                                                                                                             
                                                <td>
                                                    <button <?php echo $verifica['modificacion']; ?> type="button" class="btn btn-warning footable-edit" data-toggle="modal" data-target="#modalEdicion" onclick="agregarform('<?php echo $datos ?>')">
                                                        <span class="fas fas fa-edit" aria-hidden="true">
                                                        </span>
                                                    </button>                                                                                                               
                                                </td>
                                            </tr>
                                            <?php 
                                        } ?>
                                    </tbody>
                                </table>
                            </div>                                        
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modal_insertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel1">Insertar nuevo Cargo</h4>
                            </div>
                            <div class="modal-body">
                                <!--<form action="<?php echo base_url();?>zona_urbana/insertar" method="POST">-->
                                    <?php echo form_open('Requisitos/create', array('method'=>'POST', 'id'=>'insertar')); ?>
                                    <div class="form-group">
                                    <label for="location1">Tipo tramite :<span class="text-danger"> *</span></label>
                                    <select class="custom-select form-control" id="tipo_tramite_id" name="tipo_tramite_id">
                                        <option value="">Seleccione Opcion</option>
                                        <?php foreach ($data_tramite as $tp) : ?>
                                            <option value="<?php echo $tp->tipo_tramite_id; ?>"><?php echo $tp->tramite; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Requisito :<span class="text-danger"> *</span> </label>
                                        <input type="text" class="form-control" id="requisito" name="requisito">
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel1">Editar</h4>
                            </div>
                            <div class="modal-body">                        
                                <?php echo form_open('Requisitos/update', array('method'=>'POST')); ?> 
                                <div class="form-group">
                                    <label for="location1">Tipo tramite :<span class="text-danger"> *</span></label>
                                    <select class="custom-select form-control" id="tipo_tramite_id_e" name="tipo_tramite_id_e">                                       

                                        <?php foreach ($data_tramite as $tp) : ?>
                                            <option value="<?php echo $tp->tipo_tramite_id; ?>"><?php echo $tp->tramite; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>



                                <div class="form-group">
                                    <input type="text" class="form-control" hidden="" id="requisito_id_e" name="requisito_id_e">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Documento</label>
                                    <input type="text" class="form-control" id="descripcion_e" name="descripcion_e" >
                                </div>                            
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </form>
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
<script src="<?php echo base_url(); ?>public/assets/plugins/jquery/jquery.min.js"></script>
<script>
    function agregarform(datos)
    {
       d=datos.split('||');
       $('#requisito_id_e').val(d[0]);
       $('#descripcion_e').val(d[1]);
       $('#tipo_tramite_id_e').val(d[2]);
       $('#valor').val(d[3]);
   }
</script>
<!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url(); ?>public/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <!-- This is data table -->
    <script src="<?php echo base_url(); ?>public/assets/plugins/datatables/datatables.min.js"></script>
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