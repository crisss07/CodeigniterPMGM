 <!-- DataTable Service Side-->
 <script src="<?php echo base_url(); ?>public/assets/plugins/jquery/jquery-3.3.1.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/plugins/datatables/DataTables/DataTables1.10.20/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/plugins/datatables/DataTables/DataTables1.10.20/css/jquery.dataTables.min.css"/>
       
<script type="text/javascript">
    $(document).ready(function(e){
        var base_url = "<?php echo base_url();?>"; // You can use full url here but I prefer like this
        $('#predio').DataTable({
            "language": {
            "decimal":        ".",
            "emptyTable":     "No hay datos para mostrar",
            "info":           "del _START_ al _END_ (_TOTAL_ total)",
            "infoEmpty":      "del 0 al 0 (0 total)",
            "infoFiltered":   "(filtrado de todas las _MAX_ entradas)",
            "infoPostFix":    "",
            "thousands":      "'",
            "lengthMenu":     "Mostrar _MENU_ entradas",
            "loadingRecords": "Cargando...",
            "processing":     "Procesando...",
            "search":         "Buscar:",
            "zeroRecords":    "No hay resultados",
            "paginate": {
            "first":      "Primero",
            "last":       "Último",
            "next":       "Siguiente",
            "previous":   "Anterior"
            },
            "aria": {
            "sortAscending":  ": ordenar de manera Ascendente",
            "sortDescending": ": ordenar de manera Descendente ",
            }},
            "serverSide": true,
            "order": [[0, "asc" ]],
            "ajax":{
                    url :  "<?php echo base_url();?>"+'Predios/listar_predio',
                    type : 'GET'
            }
        }); // End of DataTable
    }); // End Document Ready Function
</script>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">LISTA PREDIOS</h4></h4>
                            <table id="predio" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th id="indentificador_predio">CODIGO PREDIO</th>
                                        <th>FECHA CREACION</th>
                                        <th>GEOCODIGO</th>
                                        <th>COD CATASTRAL</th>
                                        <th>DIRECCION</th>
                                        <th>ACCION</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>CODIGO PREDIO</th>
                                        <th>FECHA CREACION</th>
                                        <th>GEOCODIGO</th>
                                        <th>COD CATASTRAL</th>
                                        <th>DIRECCION</th>
                                        <th>ACCION</th>
                                    </tr>
                                </tfoot>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>                        

  