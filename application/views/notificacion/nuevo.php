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
                                <h4 class="card-title">Envio de Notificaciones</h4>                                
                            </div>
                        </div>

                        <div class="row">
                            <div class="mt-4 col-5">
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
                                        <textarea class="form-control" id="mensaje" rows="3" placeholder="Message" name="mensaje"></textarea>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        
                                        <button type="submit" class="btn btn-info">Enviar Nuevo</button>
                                    </div>
                            </form>                            
                        </div>

                        <div class="mt-4 col-5">
                           Vista previa en el dispositivo

                            <div class="card">
                            <div class="el-card-item">
                                <div class="el-card-avatar el-overlay-1"> 
                                    <img src="<?php echo base_url(); ?>public/assets/images/movil.png" alt="user" />
                                    
                                </div>
                                
                            </div>
                        </div>

                        </div>
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
