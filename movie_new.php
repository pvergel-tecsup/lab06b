<?php
require_once('./layout/header.php');
?>
<div class="fs-1 text-center">Agregar Película</div>
<form>
    <div class="row mb-3">
        <div class="col-sm-12">
            <label for="title" class="form-label">Titulo</label>
            <input type="text" name="title" class="form-control">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-12">
            <label for="title" class="form-label">Género</label>
            <select name="genre_id" class="form-control">
                <option value="">[- SELECCIONE -]</option>
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-6">
            <label for="title" class="form-label">Año de Estreno</label>
            <input type="number" name="release_year" class="form-control">
        </div>
        <div class="col-sm-6">
            <label for="title" class="form-label">Duración (minutos)</label>
            <input type="number" name="length" class="form-control">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-6">
            <label for="title" class="form-label">Premios</label>
            <input type="number" name="awards" class="form-control">
        </div>
        <div class="col-sm-6">
            <label for="title" class="form-label">Rating</label>
            <input type="number" name="rating" class="form-control">
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