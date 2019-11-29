<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {packages:["orgchart"]});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Name');
    data.addColumn('string', 'Manager');
    data.addColumn('string', 'ToolTip');

        // For each orgchart box, provide the name, manager, and tooltip to show.
        //obtiene el valor del ultimo nivel del organigrama
        var cant='<?php echo $nivel->nivel; ?>';
        
        data.addRows([
          //level one        
          
          <?php foreach ($data_chart_img as $tp) : ?>
              [{v:'<?php echo $tp->unidad; ?>', f:'<?php echo $tp->unidad; ?><p> <img src="<?php echo base_url(); ?><?php echo $tp->url; ?>/<?php echo $tp->imagen; ?>" height="42" width="50"> </img>'},
                '<?php echo $tp->jefe; ?>', 'VP'],
            
              ['<?php echo $tp->unidad; ?>', '<?php echo $tp->jefe; ?>', ''],  
          <?php endforeach; ?>          
          ]);

        // Create the chart.
        var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
        // Draw the chart, setting the allowHtml option to true for the tooltips.
        chart.draw(data, {allowHtml:true});
    }
</script>
<style>
    table{
        border-collapse: separate !important;
    }
</style>
<div class="page-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card wizard-content">
                    <div class="card-body">
                        <div class="row page-titles" align="center">
                            <div class="col-md-12 col-8 align-self-center">
                                <h2 class="card-title">Organigrama de la organizacion</h2>                                                                
                            </div>                            
                        </div>	
                        <div class="row" >                                
                            <div class="col-md-6" align="left">                                        
                                <a  class=" btn btn-success" href="<?php echo site_url('organigrama/nuevo'); ?>" align="right"><i class="fas fa-angle-left"></i> Volver</a>
                            </div>
                        </div>
                        <br>
                        <div id="chart_div">
						</div>	
                    </div>                
                </div> 
            </div>                        
        </div>
    </div>
</div>






