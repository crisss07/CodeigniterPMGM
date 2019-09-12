
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">ASIGNACI&Oacute;N DE OFICINAS</h4>
                        <div class="col-lg-2 col-md-4">
                            <button type="button" class="btn btn-block btn-lg btn-success" data-toggle="modal" data-target="#Modal_insert">Nueva asignaci&oacute;n</button>
                        </div>
                        <?php $i=1; //echo $data['title']; ?>
                        <table id="tabla_din" class="table table-bordered table-striped" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Nro</th>
                                    <th>Fecha de alta</th>
                                    <th>Fecha de baja</th>
                                    <th>Persona</th>
                                    <th>Unidad</th>
                                    <th>Cargo</th>
                                    <th>Vigencia</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($datos as $lista){ ?>
                                    <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo $lista->fec_alta ?></td>
                                        <td><?php echo $lista->fec_baja ?></td>
                                        <td><?php echo $lista->nombres; echo ' '; echo $lista->paterno; echo " "; echo $lista->materno; ?></td>
                                        <td><?php echo $lista->unidad; ?></td>
                                        <td><?php echo $lista->descripcion; ?></td>
                                        <td><?php echo $lista->vigencia; ?> mes(es)</td>
                                        <td>
                                            
                                                <!-- <a  href="<?php //echo site_url('organigrama_persona/baja/'.$lista->organigrama_persona_id); ?>" type="button" title="Dar de baja" class="darbaja btn btn-success footable-action"><span class="fas fa-arrow-down" aria-hidden="true">
                                                    </span></a> -->
                                                <button class="btn btn-success" title="Dar de baja" onclick="dar_baja(<?php echo $lista->organigrama_persona_id;?>)"><span class="fas fa-arrow-down" aria-hidden="true"></span></button>
                                                <button class="btn btn-warning" title="Editar" onclick="edit_book(<?php echo $lista->organigrama_persona_id;?>)"><span class="fas fa-pencil-alt" aria-hidden="true"></span></button>
                                                
                                                
                                            
                                            <!-- <button type="button" class="btn btn-warning footable-edit" data-toggle="modal" data-target="#modalEdicion" onclick="agregarform('$lista->organigrama_persona_id')">
                                                    <span class="fas fa-pencil-alt" aria-hidden="true"></span>
                                            </button> -->
                                            <a href= "<?php echo site_url('Organigrama_persona/eliminar/'.$lista->organigrama_persona_id); ?>" type="button" title="Eliminar" class="eliminarorganigrama btn btn-danger footable-delete">
                                                <span class="fas fa-trash-alt" aria-hidden="true">
                                                </span>
                                            </a>
                                       
                                            <!--<button class="btn btn-danger" onclick="validate(this)" value="<?php //echo $lista->organigrama_persona_id?>"><i class="icon icon-times"></i></button>
                                            </button> -->
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>      
                    </div>  
                </div>
            </div>
        </div>
        <div class="modal fade" id="Modal_insert"  role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Insertar Nueva Asignacion de oficina</h4>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open('Organigrama_persona/insertar', array('method'=>'POST')); ?>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Personal</label>
                                <select class="select2 " style="width: 100%" name="persona_id" id="persona_id">
                                    <option>Seleccionar personal</option>
                                    <?php foreach($personas as $plista){ ?>
                                        <option value="<?php echo $plista->persona_id; ?>"><?php echo $plista->nombres.' '.$plista->paterno.' '.$plista->materno; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Oficina</label>
                                <select class="select2" style="width: 100%" name="organigrama_id" id="organigrama_id">
                                    <option>Seleccionar oficina</option>
                                    <?php foreach($organigramas as $olista){ ?>
                                        <option value="<?php echo $olista->organigrama_id; ?>"><?php echo $olista->unidad; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Cargo</label>
                                <select class="select2" style="width: 100%" name="cargo_id" id="cargo_id">
                                    <option>Seleccionar cargo</option>
                                    <?php foreach($cargos as $clista){ ?>
                                        <option value="<?php echo $clista->cargo_id; ?>"><?php echo $clista->descripcion; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Fecha de alta</label>
                                <input type="date" class="form-control" id="fec_alta" name="fec_alta">
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
                        <h4 class="modal-title" id="exampleModalLabel1">Editar asignaci&oacute;n</h4>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open('Organigrama_persona/guardar_editado', array('method'=>'POST')); ?>
                            <div class="form-group">
                                <input type="text" hidden="" name="organigrama_persona_id">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Personal</label>
                                <select class="select2" style="width: 100%" name="persona_id1" id="persona_id1">
                                    <?php foreach($personas as $plista){ ?>
                                        <option value="<?php echo $plista->persona_id; ?>"><?php echo $plista->nombres.' '.$plista->paterno.' '.$plista->materno; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Oficina</label>
                                <select class="select2" style="width: 100%" name="organigrama_id1" id="organigrama_id1">
                                    <?php foreach($organigramas as $olista){ ?>
                                        <option value="<?php echo $olista->organigrama_id; ?>"><?php echo $olista->unidad; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Cargo</label>
                                <select class="select2" style="width: 100%" name="cargo_id1" id="cargo_id1">
                                    <?php foreach($cargos as $clista){ ?>
                                        <option value="<?php echo $clista->cargo_id; ?>"><?php echo $clista->descripcion; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Fecha de alta</label>
                                <input type="date" class="form-control" id="fec_alta1" name="fec_alta1">
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
        <div class="modal fade" id="modalBaja" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Dar de baja</h4>
                    </div>
                    <div class="modal-body">
                    <?php echo form_open('organigrama_persona/baja', array('method'=>'POST')); ?>
                        <form>
                            <div class="form-group">
                                <input type="text" hidden="" name="organigrama_persona_id1">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Fecha de baja</label>
                                <input type="date" class="form-control" id="fec_baja" name="fec_baja" value="<?php echo set_value('fec_baja'); ?>">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Observación para dar de baja</label>
                                <input type="text" class="form-control" id="observacion" name="observacion" value="<?php echo set_value('observacion'); ?>">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <button type="submit"  class="btn btn-primary" >Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>public/assets/plugins/jquery/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" type="text/css" />
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
    jQuery(document).ready(function() {
        $('.select2').select2({
            dropdownParent: $('#modalEdicion'),
        });
        $(".ajax").select2({
            minimumInputLength: 2,
            ajax: {
                //url: "<?php //echo base_url();?>organigrama_persona/ajax_select2",
                url: "https://api.github.com/search/repositories",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function(data, params) {
                    // parse the results into the format expected by Select2
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data, except to indicate that infinite
                    // scrolling can be

                    params.page = params.page || 1;
                    return {
                        results: data.items,
                        pagination: {
                            more: (params.page * 30) < data.total_count
                        }
                    };
                },
                cache: true
            },
            escapeMarkup: function(markup) {
                return markup;
            }, // let our custom formatter work
            //templateResult: formatRepo, // omitted for brevity, see the source of this page
            //templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
        });
    });
</script> 
<script src="<?php echo base_url(); ?>public/assets/plugins/datatables/datatables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<script>
    $(function() {
        $('#myTable').DataTable({
            "oLanguage": {
                "sUrl": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
        });
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [0, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');

    $('#tabla_din').DataTable( {
        "order": [[ 0, "desc" ]],
        "oLanguage": {
            "sUrl": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
    });
    </script>
<script src="<?php echo base_url(); ?>public/assets/plugins/sweetalert/sweetalert.min.js"></script>
<script type="text/javascript">
    $('.eliminarorganigrama').on("click", function(e) {
          e.preventDefault();
          var url = $(this).attr('href');
          Swal({
          title: 'Está seguro?',
          text: "No podrá recuperar una vez sea eliminado!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
           cancelButtonText: "No, Cancelar!",
          confirmButtonText: 'Si, Eliminarlo!'
        }).then((result) => {
          if (result.value) {
                window.location.replace(url);
                swal("Eliminado!", "Su información ha sido eliminado!", "success");
          }else{
            swal("Cancelado", "Su información está a salvo! :)", "error");
          }
        });
    });    
</script>

<!-- <script type="text/javascript">
$('#guardar_baja').click(function() {
    var form_data = {
        fec_baja: $('#fec_baja').val(),
        observacion: $('#observacion').val(),
    };
    $.ajax({
        url: "<?php //echo site_url('organigrama_persona/baja'); ?>",
        type: 'POST',
        data: form_data,
        success: function(msg) {
            
            $('#alert-msg').html('<div class="alert alert-danger">' + msg + '</div>');
        }
    });
    return false;
});
</script> -->

<script type="text/javascript">
    function edit_book(id){
       var personas = $("#persona_id1");
       var organigramas = $("#organigrama_id1");
       var cargos = $("#cargo_id1");
      $.ajax({
        url : "<?php echo site_url('Organigrama_persona/editar_organigrama')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="organigrama_persona_id"]').val(id);
            $('[name="fec_alta1"]').val(data.fec_alta);
            personas.append('<option selected value="' +data.persona_id+ '">' + data.nombres +  ' ' + data.paterno + ' ' + data.materno +' </option>');
            organigramas.append('<option selected value="' +data.organigrama_id+ '">' + data.unidad + '</option>');
            cargos.append('<option selected value="' +data.cargo_id+ '">' + data.descripcion + '</option>');
            $('#modalEdicion').modal('show'); // show bootstrap modal when complete loaded
           // $('.modal-title').text('Edit Book'); // Set title to Bootstrap modal title
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }
</script>
<script type="text/javascript">
    function dar_baja(id){
        $('[name="organigrama_persona_id1"]').val(id);
        $('#modalBaja').modal('show');
    }


</script>