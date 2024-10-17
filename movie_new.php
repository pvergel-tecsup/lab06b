<?php
require_once('./connection/BaseMySQL.php');
require_once('./model/Genre.php');
require_once('./database/GenreDB.php');

$database = BaseMySql::conexion();

$genreDB = new GenreDB();

$generos = $genreDB->listar($database);

BaseMySql::close($database);

require_once('./layout/header.php');
?>
<div class="fs-1 text-center">Agregar Película</div>
<form method="post" action="movie_insert.php">
    <div class="row mb-3">
        <div class="col-sm-12">
            <label for="title" class="form-label">Titulo</label>
            <input type="text" name="title" class="form-control" required>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-12">
            <label for="genre_id" class="form-label">Género</label>
            <select name="genre_id" class="form-control" required>
                <option value="">[- SELECCIONE -]</option>
                <?php
                foreach ($generos as $objeto) {
                    echo '<option value="' . $objeto->getGenreId() . '">' . $objeto->getName() . '</option>';
                }
                ?>
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-6">
            <label for="release_year" class="form-label">Año de Estreno</label>
            <input type="number" name="release_year" class="form-control" min="1930" required>
        </div>
        <div class="col-sm-6">
            <label for="length" class="form-label">Duración (minutos)</label>
            <input type="number" name="length" class="form-control" min="3">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-6">
            <label for="awards" class="form-label">Premios</label>
            <input type="number" name="awards" class="form-control" min="0">
        </div>
        <div class="col-sm-6">
            <label for="rating" class="form-label">Rating</label>
            <input type="number" name="rating" class="form-control" min="1" max="5" required>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-12 text-center">
            <button type="submit" class="btn btn-outline-primary">Agregar</button>
            <a href="index.php" class="btn btn-outline-danger ms-2" role="button">Volver</a>
        </div>
    </div>
</form>
<?php
require_once('./layout/footer.php')
?>