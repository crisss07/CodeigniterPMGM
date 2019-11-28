<section class="breadcrumb_area blog_banner_two">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
    <div class="container">
        <div class="page-cover text-center">
            <h2 class="page-cover-tittle f_48">Requisitos</h2>
            <ol class="breadcrumb">
                <li><a href="index.html">Oficina virtual</a></li>
                <li class="active">Tramites</li>
            </ol>
        </div>
    </div>
</section>
<style type="text/css">
  body {
    color: #2c3e50;
    background: #ecf0f1;
    padding: 0 1em 1em;
  }

  h1 {
    margin: 0;
    line-height: 2;
    text-align: center;
  }

  h2 {
    margin: 0 0 .5em;
    font-weight: normal;
  }

  input {
    position: absolute;
    opacity: 0;
    z-index: -1;
  }

  .row {
    display: flex;
  }
  .row .col {
    flex: 1;
  }
  .row .col:last-child {
    margin-left: 1em;
  }

  /* Accordion styles */
  .tabs {
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 4px -2px rgba(0, 0, 0, 0.5);
  }

  .tab {
    width: 100%;
    color: white;
    overflow: hidden;
  }
  .tab-label {
    display: flex;
    justify-content: space-between;
    padding: 1em;
    background: #2c3e50;
    font-weight: bold;
    cursor: pointer;
    /* Icon */
  }
  .tab-label:hover {
    background: #1a252f;
  }
  .tab-label::after {
    content: "\276F";
    width: 1em;
    height: 1em;
    text-align: center;
    transition: all .35s;
  }
  .tab-content {
    max-height: 0;
    padding: 0 1em;
    color: #2c3e50;
    background: white;
    transition: all .35s;
  }
  .tab-close {
    display: flex;
    justify-content: flex-end;
    padding: 1em;
    font-size: 0.75em;
    background: #2c3e50;
    cursor: pointer;
  }
  .tab-close:hover {
    background: #1a252f;
  }

  input:checked + .tab-label {
    background: #1a252f;
  }
  input:checked + .tab-label::after {
    -webkit-transform: rotate(90deg);
            transform: rotate(90deg);
  }
  input:checked ~ .tab-content {
    max-height: 100vh;
    padding: 1em;
  }

</style>

<div class="whole-wrap">
    <div class="container">
       
        <div class="section-top-border">
            <?php $cont =0 ?>
            <div class="row">
                <?php foreach ($tramites as $listas): 
                    $requisitos = $this->db->query("SELECT descripcion FROM tramite.requisito WHERE tipo_tramite_id = '$listas->tipo_tramite_id'")->result();  
                    ?>
                    <div class="col-lg-4 col-sm-6 mt-sm-30 typo-sec generic-blockquote">
                        <h3 class="mb-20 title_color"><?php echo $listas->tramite ?></h3>
                        <div class="row">
                            <div class="col">
                                <div class="tabs">
                                    <div class="tab">
                                        <input type="checkbox" id="<?php echo $listas->tipo_tramite_id ?>.1">
                                        <label class="tab-label" for="<?php echo $listas->tipo_tramite_id ?>.1">Informacion</label>
                                        <div class="tab-content">
                                          <?php echo $listas->informacion; ?>
                                        </div>
                                    </div>
                                    <div class="tab">
                                        <input type="checkbox" id="<?php echo $listas->tipo_tramite_id ?>.2">
                                        <label class="tab-label" for="<?php echo $listas->tipo_tramite_id ?>.2">Donde puedo realizar</label>
                                        <div class="tab-content">
                                          <?php echo $listas->lugar; ?>
                                        </div>
                                    </div>
                                    <div class="tab">
                                        <input type="checkbox" id="<?php echo $listas->tipo_tramite_id ?>.3">
                                        <label class="tab-label" for="<?php echo $listas->tipo_tramite_id ?>.3">Requisitos</label>
                                        <div class="tab-content">
                                            <div>
                                                <ol class="unordered-list">
                                                  <?php foreach ($requisitos as $valores): ?>
                                                    <li><span><?php echo $valores->descripcion; ?></span></li>
                                                  <?php endforeach ?>               
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab">
                                        <input type="checkbox" id="<?php echo $listas->tipo_tramite_id ?>.4">
                                        <label class="tab-label" for="<?php echo $listas->tipo_tramite_id ?>.4">Costo del tramite</label>
                                        <div class="tab-content">
                                          <?php echo $listas->costo; ?>
                                        </div>
                                    </div>
                                    <div class="tab">
                                        <input type="checkbox" id="<?php echo $listas->tipo_tramite_id ?>.5">
                                        <label class="tab-label" for="<?php echo $listas->tipo_tramite_id ?>.5">Tiempo de duracion del tramite</label>
                                        <div class="tab-content">
                                          <?php echo $listas->tiempo; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <?php
                        $cont =$cont+1;
                     if ($cont%3==0): ?>
                              <div class="border_line" style="background-color: #fff;"></div>
                              <br><br><br><br>                        
                    <?php endif ?>
                                        
                <?php endforeach ?>
            </div>
        </div>
       
    </div>
</div>




