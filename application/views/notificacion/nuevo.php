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
                                <h4 class="card-title">Cargos</h4>                                
                            </div>
                        </div>
                        <p></p>
                                           
                        <div class="row" >
                            <div class="col-md-12">                                        
                            </div>
                        </div>
                        <div class="row">
                            <?php echo form_open('Notificacion/enviar', array('method'=>'POST', 'id'=>'insertar')); ?>
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Titulo</label>
                                        <input type="text" class="form-control" id="titulo" name="titulo">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Asunto</label>
                                        <input type="text" class="form-control" id="asunto" name="asunto">
                                    </div>
                                       <div class="form-group">
                                        <label for="recipient-name" class="control-label">Mensaje</label>
                                        <input type="text" class="form-control" id="mensaje" name="mensaje">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                            </form>                            
                        </div>
                        <div class="card">
                          
                    </div>
                </div>             
              
        </div>
    </div>
</div>
</div>
</div>
<!-- ============================================================== --> 
<script src="<?php echo base_url(); ?>public/assets/plugins/jquery/jquery.min.js"></script>
