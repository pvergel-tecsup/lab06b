<?php
require_once('./layout/header.php');
?>
<div class="fs-1 text-center">Se produjo un error</div>
<div class="fs-3 text-center">
    <?php echo $mensaje_error ?>
</div>
<div class="col-sm-12 text-center mt-5">
    <a href="index.php" class="btn btn-outline-danger ms-2" role="button">Volver</a>
</div>
<?php
require_once('./layout/footer.php')
?>