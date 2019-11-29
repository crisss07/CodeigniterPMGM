<?php //echo vdebug($fotos); ?>
<?php //header('Content-type: image/jpeg'); ?>
<?php foreach ($fotos as $f): ?>
    <?php //echo pg_unescape_bytea($f->foto_plano_ubi); ?>
    <?php //echo $f->codcatas; ?>
    <?php echo pg_unescape_bytea($f->foto_fachada); ?>
    <?php echo pg_unescape_bytea($f->foto_plano_ubi); ?>
    <?php $foto = pg_unescape_bytea($f->foto_plano_ubi); ?>

    <?php $foto_64 = base64_encode($foto); ?>
    <?php echo $foto_64; ?>

    <?php 

        $fichero = 'pillin.jpg';
        file_put_contents($fichero, $foto);
        print_r($fichero);
        echo "<img src='$fichero'>";
        
        // $img = "<img src= 'data:image/jpeg;base64, $foto' />";
        // print($img);
        // $im = imagecreatefromstring($foto);
        // $img = fopen($foto, 'wb') or die("cannot open image\n");
        // fwrite($img, $foto) or die("cannot write image data\n");
        // fclose($img);

        // print_r($im);
        // header('Content-Type: image/jpeg');
        // imagejpeg($im);
        //imagedestroy($im);
    ?>
    <!-- <img src="1.jpg" alt="Smiley face" height="42" width="42"> -->
    <?php echo "<img src='data:image/jpeg;base64, $foto_64' />"; ?>
    <br />
<?php endforeach; ?>