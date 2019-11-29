<?php foreach ($fotos as $f): ?>
    <?php //echo pg_unescape_bytea($f->foto_plano_ubi); ?>
    <?php echo $f->codcatas; ?>
    <img src="<?php //echo pg_unescape_bytea($f->foto_plano_ubi); ?>" alt="Smiley face" height="42" width="42">
    <br />
<?php endforeach; ?>