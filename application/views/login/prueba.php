<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">

        <div class="row">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                            <!--<form action="<?php echo base_url();?>zona_urbana/insertar" method="POST">-->
                                        <form>
                                            <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Radier y Pilotaje</label>
                                                    <input type="text" class="importe_linea" id="suma1" name="suma1">
                                            </div>
                                            <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Hormigon Armado</label>
                                                    <input type="text" class="importe_linea" id="suma2" name="suma2">
                                            </div>
                                            <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Hormigon Simple</label>
                                                    <input type="text" class="importe_linea" id="suma3" name="suma3">
                                            </div>
                                            <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Mamp. de piedra o ladrillo y cemento</label>
                                                    <input type="text" class="importe_linea" id="suma4" name="suma4">
                                            </div>

                                            <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Total</label>
                                                    <input type="text" class="form-control" id="total" name="total">
                                            </div>
                                             <input type="button" value="Calcular" onclick="calcular_total()"/>

                                        </form>
                                    </div>
                                   
                        
                                </div>
                            </div>

                            <!-- Column -->
                            <div class="col-lg-3 col-md-6">
                                    <?php 
                                        $sum = 0;
                                        $sum = $sum + 20;
                                    ?>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <h3 id="to"><?php echo $sum;?>%</h3>
                                                <h6 class="card-subtitle">Total Product</h6></div>
                                            <div class="col-12">
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $sum;?>%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                          
                        </div>



                        


 
        <form method="POST" action="nada.html">
            <div id="lineas">
                <input type="text" class="importe_linea" value="0"/><br/>
            </div>
            <div id="lineas">
                <input type="text" class="importe_linea" value="0"/><br/>
            </div>
            <label for="total">Total: <input type="text" id="total" value="0"/><br/>
            <input type="button" value="Calcular" onclick="calcular_total()"/>
        </form>

     </div>
 </div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>public/assets/plugins/edit/ubicacionscript.js"></script>
<script type="text/javascript">
function calcular_total() {
    importe_total = 0
    $(".importe_linea").each(
        function(index, value) {
            importe_total = importe_total + eval($(this).val());
            $("#to").val(importe_total);
        }
    );
    $("#total").val(importe_total);
}
 
function nueva_linea() {
    $("#lineas").append('<input type="text" class="importe_linea" value="0"/><br/>');
}
</script>