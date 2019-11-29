<style type="text/css">
    p{
        display: inline-block;
    }
    .codigo_tramite{
        background:#fff;
    }
</style>
<section class="breadcrumb_area blog_banner_two">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
    <div class="container">
        <div class="page-cover text-center">
            <h2 class="page-cover-tittle f_48">Inspecciones</h2>
            <ol class="breadcrumb">
                <li><a href="#">Inpeccion</a></li>
                <li class="active">Tramites</li>
            </ol>
        </div>
    </div>
</section>

<div class="whole-wrap">
<!--<div class="row justify-content-center">
    <div class="col-12">
        <label for="staticTramite" class="sr-only">Email</label>
        <input type="text" readonly class="form-control-plaintext" id="staticTramite" value="TM-254">      
        <label for="inputcodigo_tramite" class="sr-only">CodigoTramite</label>
        <input type="text" class="form-control" id="inputcodigo_tramite" placeholder="Ingrese el codigo de trámite">      
    </div>
</div>
<form class="form-inline seccion_tramite">
        <div class="form-group mb-2">
            <label for="staticTramite" class="sr-only">Email</label>
            <input type="text" readonly class="form-control-plaintext" id="staticTramite" value="TM-254">
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <label for="inputcodigo_tramite" class="sr-only">CodigoTramite</label>
            <input type="text" class="form-control" id="inputcodigo_tramite" placeholder="Ingrese el codigo de trámite">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Buscar trámite</button>
</form>-->

<div class="row justify-content-right">
    <div class="col-12">
        <label> Codigo tramite (TM-GMP-GMV): </label>
        <input type="text"  class="codigo_tramite" placeholder="Ingrese el codigo de trámite">
        <button type="button" class="btn btn-success">Buscar trámite</button>
    </div>

</div>
    <div class="container">
       
        <div class="section-top-border">
            <table class="table no-wrap table-striped table-bordered mt-5" id="editable-datatable">
                                        <thead>
                                            <tr>
                                                <th>NRO.</th>
                                                <th>FECHA</th>
                                                <th>INSPECTOR</th>
                                                <th>REFERENCIA</th>
                                                <th>ESTADO</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>NRO.</th>
                                                <th>FECHA</th>
                                                <th>INSPECTOR</th>
                                                <th>REFERENCIA</th>
                                                <th>ESTADO</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php $cont =1;
                                            foreach ($lista as $key => $value) { ?>
                                                <tr>
                                                    <td><?php echo $cont ?></td>
                                                    <td><?php echo $value->inicio ?></td>
                                                    <td><?php echo $value->nombre ?></td>
                                                    <td><?php echo $value->tramite ?></td>
                                                    <td><span class="label label-danger"><?php echo $value->tipo ?></span></td>
                                                </tr>
                                            <?php  $cont++;
                                        } ?>
                                            
                                            
                                        </tbody>

                                    </table>
        </div>
       
    </div>
</div>