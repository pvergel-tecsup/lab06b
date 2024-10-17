<?php
require_once('./connection/BaseMySQL.php');
require_once('./model/Genre.php');
require_once('./model/Movie.php');
require_once('./database/GenreDB.php');
require_once('./database/MovieDB.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = 0;
}

$database = BaseMySql::conexion();

$movieDB = new MovieDB();

$pelicula = $movieDB->detalle($database, $id);

$genreDB = new GenreDB();

$generos = $genreDB->listar($database);

BaseMySql::close($database);

require_once('./layout/header.php');
?>
<div class="fs-1 text-center">Editar Película</div>
<form method="post" action="movie_update.php">
    <div class="row mb-3">
        <div class="col-sm-12">
            <label for="title" class="form-label">Titulo</label>
            <input type="text" name="title" class="form-control" value="<?php echo $pelicula->getTitle() ?>" required>
            <input type="hidden" name="movie_id" value="<?php echo $pelicula->getId() ?>">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-12">
            <label for="title" class="form-label">Género</label>
            <select name="genre_id" class="form-control" required>
                <option value="">[- SELECCIONE -]</option>
                <?php
                foreach ($generos as $objeto) {
                    $seleccionado = "";
                    if ($objeto->getGenreId() == $pelicula->getGenre()->getGenreId()) {
                        $seleccionado = "selected";
                    }
                    echo '<option value="' . $objeto->getGenreId() . '" ' . $seleccionado . '>' . $objeto->getName() . '</option>';
                }
                ?>
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-6">
            <label for="title" class="form-label">Año de Estreno</label>
            <input type="number" name="release_year" class="form-control" min="1930" value="<?php echo $pelicula->getReleaseYear() ?>" required>
        </div>
        <div class="col-sm-6">
            <label for="title" class="form-label">Duración (minutos)</label>
            <input type="number" name="length" class="form-control" min="3" value="<?php echo $pelicula->getLength() ?>">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-6">
            <label for="title" class="form-label">Premios</label>
            <input type="number" name="awards" class="form-control" min="0" value="<?php echo $pelicula->getAwards() ?>">
        </div>
        <div class="col-sm-6">
            <label for="title" class="form-label">Rating</label>
            <input type="number" name="rating" class="form-control" min="1" max="5" value="<?php echo $pelicula->getRating() ?>" required>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-12 text-center">
            <button type="submit" class="btn btn-outline-primary">Actualizar</button>
            <a href="index.php" class="btn btn-outline-danger ms-2" role="button">Volver</a>
        </div>
    </div>
</form>
<?php
require_once('./layout/footer.php')
?>