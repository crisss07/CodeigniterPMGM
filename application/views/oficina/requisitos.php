<style type="text/css">
    p{
        display: inline-block;
    }
</style>
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor mb-0 mt-0">Requisitos</h3>
               
            </div>
            <div class="col-md-6 col-4 align-self-center">
                <button class="btn float-right hidden-sm-down btn-success"> 
                    <p id="diaSemana" class="diaSemana">Martes</p>
                    <p id="dia" class="dia">27</p>
                    <p>de </p>
                    <p id="mes" class="mes">Octubre</p>
                    <p>del </p>
                    <p id="year" class="year">2015</p>
                </button>
                <button class="float-right mr-2 hidden-sm-down btn btn-secondary" type="button"   > 
                    <p id="horas" class="horas">11</p>
                    <p>:</p>
                    <p id="minutos" class="minutos">48</p>
                    <p>:</p>
                    <p id="segundos" class="segundos">12</p>
                    <p id="ampm" class="ampm">AM</p>
                </button>    
            </div>
        </div>
        
        <div class="row">
            <?php foreach ($tramites as $datos): ?>
                <div class="col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-lg-12">
                                <h4 class="card-title"><?php echo $datos->tramite; ?></h4>
                                <h6 class="card-subtitle">Requisitos</h6>
                                <?php $requisitos= $this->db->query("SELECT r.descripcion FROM tramite.tipo_tramite tt JOIN tramite.requisito r ON tt.tipo_tramite_id = r.tipo_tramite_id WHERE tt.activo=1 AND tt.tipo_tramite_id='$datos->tipo_tramite_id'")->result();?>
                                <ul class="list-icons">
                                    <?php foreach ($requisitos as $valores): ?>
                                        <li><a href="javascript:void(0)"><i class="fa fa-check text-info"></i> <?php echo $valores->descripcion ?> </a></li>                             
                                    <?php endforeach ?>                                                         
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>            
        </div>
        <div class="row">           
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tooltip Style 12 Line Tooltip</h4> Tar light, encyclopaedia <a class="mytooltip" href="javascript:void(0)"> Line tooltip<span class="tooltip-content5"><span class="tooltip-text3"><span class="tooltip-inner2">Howdy, Ben!<br /> There are 13 unread messages in your inbox.</span></span></span></a> galactica are creatures of the cosmos.
                    </div>
                </div>
            </div>
        </div>
      
    </div>
</div>