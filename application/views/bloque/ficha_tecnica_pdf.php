<html>
<head>
<style type="text/css">
#contenedor {
    display: table;
    border: 2px solid #000;
    width: 612px;
    height:792px;
    text-align:center;
    margin: 0 auto;
}
#contenidos {
    display: table-row;
}
#columna1, #columna2, #columna3 {
    display: table-cell;
    border: 1px solid #000;
    vertical-align: middle;
    padding: 10px;
}
</style>
</head>
<body>
<h4>GOBIERNO AUTONOMO MUNICIPAL "EL TORNO"</h4>

for ($i = 0; $i < $max; $i++) { ?>

<?php 

if ($i == 0) {  ?>
<hr>
<div class="row" style="background-color:Ivory;">
    <div class="col-sm-5 col-md-8 " style="background-color:Ivory">
        <h6> <b> <?php print_r($grupos_subgrupos[$i]['desc_grupo']); ?> </b></h6>
    </div>
    <div class="col-sm-5 col-sm-offset-2 col-md-4 col-md-offset-0" style="background-color:Ivory;"><small><i>Porcentaje %</i></small>
    </div>
</div>
<?php 
} else { ?>

<?php 
} ?>
<div class="row" style="background-color:Ivory;">
    <input type="hidden" class="form-control required" id="tam_grup_sub" name="tam_grup_sub" readonly="" value="<?php echo $max; ?>">

    <div class="col-sm-5 col-sm-offset-2 col-md-8 col-md-offset-0" style="background-color:Ivory">
        <small><i>
                <?php 
                print_r($grupos_subgrupos[$i]['desc_item']);
                ?></i></small>
    </div>
    <div class="col-sm-5 col-sm-offset-2 col-md-4 col-md-offset-0" style="background-color:Ivory;">

        
    </div>
</div>

<div id="contenedor">
    <div id="contenidos">
        <div id="columna1">Tutoriales En Linea 1</div>
        <div id="columna2">Tutoriales En Linea 2</div>    
    </div>
    <div id="contenidos">
        <div id="columna1">Tutoriales En Linea 1</div>
        <div id="columna2">Tutoriales En Linea 2</div>
    </div>
</div>
</body>
</html>