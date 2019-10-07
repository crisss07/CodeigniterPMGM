<style type="text/css">
    p{
        display: inline-block;
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