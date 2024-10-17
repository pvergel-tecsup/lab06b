<?php
require_once('./connection/BaseMySQL.php');
require_once('./model/Movie.php');
require_once('./database/MovieDB.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = 0;
}

$database = BaseMySql::conexion();

$movieDB = new MovieDB();

$pelicula = $movieDB->detalle($database, $id);

BaseMySql::close($database);

require_once('./layout/header.php');
?>
<div class="fs-1 text-center">Detalle de Película</div>
<div class="row mb-3">
    <div class="col-sm-12">
        <label for="title" class="form-label">Titulo</label>
        <input type="text" name="title" class="form-control" value="<?php echo $pelicula->getTitle() ?>" readonly>
    </div>
</div>
<div class="row mb-3">
    <div class="col-sm-12">
        <label for="genre" class="form-label">Género</label>
        <input type="text" name="genre" class="form-control" value="<?php echo $pelicula->getGenre()->getName() ?>" readonly>
    </div>
</div>
<div class="row mb-3">
    <div class="col-sm-6">
        <label for="release_year" class="form-label">Año de Estreno</label>
        <input type="text" name="release_year" class="form-control" value="<?php echo $pelicula->getReleaseYear() ?>" readonly>
    </div>
    <div class="col-sm-6">
        <label for="length" class="form-label">Duración (minutos)</label>
        <input type="text" name="length" class="form-control" value="<?php echo $pelicula->getLength() ?>" readonly>
    </div>
</div>
<div class="row mb-3">
    <div class="col-sm-6">
        <label for="awards" class="form-label">Premios</label>
        <input type="text" name="awards" class="form-control" value="<?php echo $pelicula->getAwards() ?>" readonly>
    </div>
    <div class="col-sm-6">
        <label for="rating" class="form-label">Rating</label>
        <input type="text" name="rating" class="form-control" value="<?php echo $pelicula->getRating() ?>" readonly>
    </div>
</div>
<div class="row mb-3">
    <div class="col-sm-12 text-center">
        <a href="index.php" class="btn btn-outline-danger ms-2" role="button">Volver</a>
    </div>
</div>
<?php
require_once('./layout/footer.php')
?>