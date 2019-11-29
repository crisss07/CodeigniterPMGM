<?php //vdebug($asignados, false, false, true); ?>
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
                        <h4 class="card-title">ASIGNADOS</h4></h4>
                        <?php //vdebug($mis_tramites, true, false, true); ?>
                        <table id="tabla_din" class="table table-bordered table-striped" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Persona</th>
                                    <th>Asignaciones</th>
                                    <th>Visualizar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($asignados as $a): ?>
                                    <?php 
                                        $datos_persona = $this->db->get_where('persona', array('persona_id'=>$a->persona_id))->row();
                                        // vdebug($datos_persona, false, false, true);
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $datos_persona->nombres; ?>
                                            <?php echo $datos_persona->paterno; ?>
                                            <?php echo $datos_persona->materno; ?>
                                        </td>
                                        <td><?php echo $a->total; ?> </td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>Inspeccion/lista_asign_id/<?php echo $a->persona_id; ?>" class="btn btn-info footable-edit">
                                                    <span class="fas fa-search" aria-hidden="true"></span>
                                            </a>

                                       
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
//$(".modal-dialog").hide();
function load_marks(stu_id)
{
    $.ajax({
                type: "POST",
                url: "<?php echo base_url().inspeccion/lista_asign_id_modal;?>",
                data: "stu_id="+stu_id,
                success: function (response) {
                $(".displaycontent").html(response);                  
                }
            });
}
</script>

<div class="modal fade displaycontent" id="myModal">

<?php include('modalasignaciones.php');?>





</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ==============================================================
