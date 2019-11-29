            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                © Ministerio de Obras publicas - Programa de Mejora de la Gestion Municipal
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <!-- Bootstrap tether Core JavaScript -->

    
    <!-- slimscrollbar scrollbar JavaScript -->
    
    <!--Wave Effects -->
    
    <!--Menu sidebar -->
    
    <!--stickey kit -->
    <script src="<?php echo base_url(); ?>public/assets/plugins/datatables/datatables.min.js"></script>
    <script>
    $(function() {
        $('#bloque_tableorg_chart_table').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
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
    $('#org_chart_table').DataTable( {
        "order": [[ 0, "desc" ]],
        "oLanguage": {
            "sUrl": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
    });


    </script>

    <!-- ============================================================== -->
    <!-- Style switcher -->
    <script src="<?php echo base_url(); ?>public/assets/plugins/switchery/dist/switchery.min.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <!-- ============================================================== -->
    
    <script src="<?php echo base_url(); ?>public/assets/plugins/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>public/js/mask.init.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>