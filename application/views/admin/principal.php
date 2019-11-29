

  
    <!-- chartist CSS -->
    <link href="<?php echo base_url(); ?>public/assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>public/assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
<style type="text/css">
    #izquierda{
        padding-left: 10px;
        float:left;
    }
    
    #derecha{
        padding-left: 10px;
        float:left;
    }
</style>
   

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">

        <div class="row">
                            <!-- Column -->
                            <div class="col-md-6 col-lg-3 col-xlg-3">
                                <div class="card card-inverse card-info">
                                    <div class="box bg-info text-center">

                                        <?php 
                                            $predio = $this->db->query("SELECT count(*) as total FROM catastro.predio")->row(); 
                                        ?>

                                        <h1 class="font-light text-white"><?php echo $predio->total; ?></h1>
                                        <h6 class="text-white">Predios Registrados</h6>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            <div class="col-md-6 col-lg-3 col-xlg-3">
                                <div class="card card-primary card-inverse">
                                    <div class="box text-center">

                                        <?php 
                                            $persona = $this->db->query("SELECT count(*) as total FROM public.persona")->row(); 
                                        ?>

                                        <h1 class="font-light text-white"><?php echo $persona->total; ?></h1>
                                        <h6 class="text-white">Usuarios</h6>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            <div class="col-md-6 col-lg-3 col-xlg-3">
                                <div class="card card-inverse card-success">
                                    <div class="box text-center">

                                        <?php 
                                            $zona = $this->db->query("SELECT count(*) as total FROM catastro.zona_urbana")->row(); 
                                        ?>  
                                        <h1 class="font-light text-white"><?php echo $zona->total; ?></h1>
                                        <h6 class="text-white">Zonas Urbanas</h6>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            <div class="col-md-6 col-lg-3 col-xlg-3">
                                <div class="card card-inverse card-warning">
                                    <div class="box text-center">

                                        <?php 
                                            $tipo_predio = $this->db->query("SELECT count(*) as total FROM catastro.tipo_predio WHERE activo = '1'")->row(); 
                                        ?> 
                                        <h1 class="font-light text-white"><?php echo $tipo_predio->total; ?></h1>
                                        <h6 class="text-white">Tipos de Predios</h6>
                                    </div>
                                </div>
                            </div>
                        </div>

        
   <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex flex-wrap">
                                            <div>
                                                <h3> Estad&iacute;sticas de Registros</h3>
                                                <h6 class="card-subtitle">2019</h6> </div>
                                            <div class="ml-auto ">
                                                <ul class="list-inline">
                                                    <li>
                                                        <h6 class="text-muted"><i class="fa fa-circle mr-1 text-orange"></i>Enero</h6> </li>
                                                    <li>
                                                        <h6 class="text-muted"><i class="fa fa-circle mr-1 text-success"></i>Febrero</h6> </li>
                                                    <li>
                                                        <h6 class="text-muted"><i class="fa fa-circle mr-1 text-info"></i>Marzo</h6> </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="total-revenue4" style="height: 350px;"><div class="chartist-tooltip" style="top: 318px; left: 1152px;"></div><svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-line" style="width: 100%; height: 100%;"><g class="ct-grids"><line x1="30" x2="30" y1="15" y2="315" class="ct-grid ct-horizontal"></line><line x1="246.85714285714286" x2="246.85714285714286" y1="15" y2="315" class="ct-grid ct-horizontal"></line><line x1="463.7142857142857" x2="463.7142857142857" y1="15" y2="315" class="ct-grid ct-horizontal"></line><line x1="680.5714285714286" x2="680.5714285714286" y1="15" y2="315" class="ct-grid ct-horizontal"></line><line x1="897.4285714285714" x2="897.4285714285714" y1="15" y2="315" class="ct-grid ct-horizontal"></line><line x1="1114.2857142857142" x2="1114.2857142857142" y1="15" y2="315" class="ct-grid ct-horizontal"></line><line x1="1331.142857142857" x2="1331.142857142857" y1="15" y2="315" class="ct-grid ct-horizontal"></line><line x1="1548" x2="1548" y1="15" y2="315" class="ct-grid ct-horizontal"></line><line y1="315" y2="315" x1="30" x2="1548" class="ct-grid ct-vertical"></line><line y1="277.5" y2="277.5" x1="30" x2="1548" class="ct-grid ct-vertical"></line><line y1="240" y2="240" x1="30" x2="1548" class="ct-grid ct-vertical"></line><line y1="202.5" y2="202.5" x1="30" x2="1548" class="ct-grid ct-vertical"></line><line y1="165" y2="165" x1="30" x2="1548" class="ct-grid ct-vertical"></line><line y1="127.5" y2="127.5" x1="30" x2="1548" class="ct-grid ct-vertical"></line><line y1="90" y2="90" x1="30" x2="1548" class="ct-grid ct-vertical"></line><line y1="52.5" y2="52.5" x1="30" x2="1548" class="ct-grid ct-vertical"></line><line y1="15" y2="15" x1="30" x2="1548" class="ct-grid ct-vertical"></line></g><g><g class="ct-series ct-series-a"><path d="M30,315L30,315C102.286,302.5,174.571,288.214,246.857,277.5C319.143,266.786,391.429,249.375,463.714,249.375C536,249.375,608.286,315,680.571,315C752.857,315,825.143,71.25,897.429,71.25C969.714,71.25,1042,296.25,1114.286,296.25C1186.571,296.25,1258.857,240,1331.143,240C1403.429,240,1475.714,277.5,1548,296.25L1548,315Z" class="ct-area"></path><path d="M30,315C102.286,302.5,174.571,288.214,246.857,277.5C319.143,266.786,391.429,249.375,463.714,249.375C536,249.375,608.286,315,680.571,315C752.857,315,825.143,71.25,897.429,71.25C969.714,71.25,1042,296.25,1114.286,296.25C1186.571,296.25,1258.857,240,1331.143,240C1403.429,240,1475.714,277.5,1548,296.25" class="ct-line"></path><line x1="30" y1="315" x2="30.01" y2="315" class="ct-point" ct:value="0"></line><line x1="246.85714285714286" y1="277.5" x2="246.86714285714285" y2="277.5" class="ct-point" ct:value="2"></line><line x1="463.7142857142857" y1="249.375" x2="463.7242857142857" y2="249.375" class="ct-point" ct:value="3.5"></line><line x1="680.5714285714286" y1="315" x2="680.5814285714285" y2="315" class="ct-point" ct:value="0"></line><line x1="897.4285714285714" y1="71.25" x2="897.4385714285714" y2="71.25" class="ct-point" ct:value="13"></line><line x1="1114.2857142857142" y1="296.25" x2="1114.2957142857142" y2="296.25" class="ct-point" ct:value="1"></line><line x1="1331.142857142857" y1="240" x2="1331.152857142857" y2="240" class="ct-point" ct:value="4"></line><line x1="1548" y1="296.25" x2="1548.01" y2="296.25" class="ct-point" ct:value="1"></line></g><g class="ct-series ct-series-b"><path d="M30,315L30,315C102.286,290,174.571,240,246.857,240C319.143,240,391.429,315,463.714,315C536,315,608.286,240,680.571,240C752.857,240,825.143,315,897.429,315C969.714,315,1042,240,1114.286,240C1186.571,240,1258.857,315,1331.143,315C1403.429,315,1475.714,265,1548,240L1548,315Z" class="ct-area"></path><path d="M30,315C102.286,290,174.571,240,246.857,240C319.143,240,391.429,315,463.714,315C536,315,608.286,240,680.571,240C752.857,240,825.143,315,897.429,315C969.714,315,1042,240,1114.286,240C1186.571,240,1258.857,315,1331.143,315C1403.429,315,1475.714,265,1548,240" class="ct-line"></path><line x1="30" y1="315" x2="30.01" y2="315" class="ct-point" ct:value="0"></line><line x1="246.85714285714286" y1="240" x2="246.86714285714285" y2="240" class="ct-point" ct:value="4"></line><line x1="463.7142857142857" y1="315" x2="463.7242857142857" y2="315" class="ct-point" ct:value="0"></line><line x1="680.5714285714286" y1="240" x2="680.5814285714285" y2="240" class="ct-point" ct:value="4"></line><line x1="897.4285714285714" y1="315" x2="897.4385714285714" y2="315" class="ct-point" ct:value="0"></line><line x1="1114.2857142857142" y1="240" x2="1114.2957142857142" y2="240" class="ct-point" ct:value="4"></line><line x1="1331.142857142857" y1="315" x2="1331.152857142857" y2="315" class="ct-point" ct:value="0"></line><line x1="1548" y1="240" x2="1548.01" y2="240" class="ct-point" ct:value="4"></line></g></g><g class="ct-labels"><foreignObject style="overflow: visible;" x="30" y="320" width="216.85714285714286" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 217px; height: 20px;">0</span></foreignObject><foreignObject style="overflow: visible;" x="246.85714285714286" y="320" width="216.85714285714286" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 217px; height: 20px;">4</span></foreignObject><foreignObject style="overflow: visible;" x="463.7142857142857" y="320" width="216.85714285714283" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 217px; height: 20px;">8</span></foreignObject><foreignObject style="overflow: visible;" x="680.5714285714286" y="320" width="216.8571428571429" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 217px; height: 20px;">12</span></foreignObject><foreignObject style="overflow: visible;" x="897.4285714285714" y="320" width="216.85714285714278" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 217px; height: 20px;">16</span></foreignObject><foreignObject style="overflow: visible;" x="1114.2857142857142" y="320" width="216.8571428571429" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 217px; height: 20px;">20</span></foreignObject><foreignObject style="overflow: visible;" x="1331.142857142857" y="320" width="216.8571428571429" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 217px; height: 20px;">24</span></foreignObject><foreignObject style="overflow: visible;" x="1548" y="320" width="30" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 30px; height: 20px;">30</span></foreignObject><foreignObject style="overflow: visible;" y="277.5" x="10" height="37.5" width="10"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 38px; width: 10px;">0k</span></foreignObject><foreignObject style="overflow: visible;" y="240" x="10" height="37.5" width="10"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 38px; width: 10px;">2k</span></foreignObject><foreignObject style="overflow: visible;" y="202.5" x="10" height="37.5" width="10"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 38px; width: 10px;">4k</span></foreignObject><foreignObject style="overflow: visible;" y="165" x="10" height="37.5" width="10"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 38px; width: 10px;">6k</span></foreignObject><foreignObject style="overflow: visible;" y="127.5" x="10" height="37.5" width="10"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 38px; width: 10px;">8k</span></foreignObject><foreignObject style="overflow: visible;" y="90" x="10" height="37.5" width="10"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 38px; width: 10px;">10k</span></foreignObject><foreignObject style="overflow: visible;" y="52.5" x="10" height="37.5" width="10"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 38px; width: 10px;">12k</span></foreignObject><foreignObject style="overflow: visible;" y="15" x="10" height="37.5" width="10"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 38px; width: 10px;">14k</span></foreignObject><foreignObject style="overflow: visible;" y="-15" x="10" height="30" width="10"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 10px;">16k</span></foreignObject></g></svg></div>
                                    </div>
                                    <?php 
                                            $enero = $this->db->query("
                                                        SELECT count(*) as nro
                                                        FROM (SELECT codcatas, to_char(fec_creacion, 'MM')as mes 
                                                        FROM catastro.predio)tmp
                                                        WHERE tmp.mes = '01'")->row(); 
                                            $febrero = $this->db->query("
                                                        SELECT count(*) as nro
                                                        FROM (SELECT codcatas, to_char(fec_creacion, 'MM')as mes 
                                                        FROM catastro.predio)tmp
                                                        WHERE tmp.mes = '02'")->row(); 
                                            $marzo = $this->db->query("
                                                        SELECT count(*) as nro
                                                        FROM (SELECT codcatas, to_char(fec_creacion, 'MM')as mes 
                                                        FROM catastro.predio)tmp
                                                        WHERE tmp.mes = '03'")->row();

                                            $total = $this->db->query("SELECT count(*) as total
                                                        FROM catastro.predio")->row();

                                    ?>

                                    <div class="col-lg-3 col-md-6 mb-4 mt-3 text-center">
                                        <h1 class="mb-0 font-light"><?php echo $enero->nro ?></h1>
                                        <h6 class="text-muted">Enero</h6></div>
                                    <div class="col-lg-3 col-md-6 mb-4 mt-3 text-center">
                                        <h1 class="mb-0 font-light"><?php echo $febrero->nro ?></h1>
                                        <h6 class="text-muted">Febrero</h6></div>
                                    <div class="col-lg-3 col-md-6 mb-4 mt-3 text-center">
                                        <h1 class="mb-0 font-light"><?php echo $marzo->nro ?></h1>
                                        <h6 class="text-muted">Marzo</h6></div>
                                    <div class="col-lg-3 col-md-6 mb-4 mt-3 text-center">
                                        <h1 class="mb-0 font-light"><?php echo $total->total ?></h1>
                                        <h6 class="text-muted">Total</h6></div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
    </div>
</div>


