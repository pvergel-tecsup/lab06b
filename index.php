<?php
require_once('./connection/BaseMySQL.php');
require_once('./model/Genre.php');
require_once('./model/Movie.php');
require_once('./database/MovieDB.php');

$database = BaseMySql::conexion();

$movieDB = new MovieDB();

if (isset($_POST['search'])) {
    $busqueda = $_POST['search'];
    $peliculas = $movieDB->buscar($database, trim($busqueda));
} else {
    $peliculas = $movieDB->listar($database);
}

BaseMySql::close($database);

require_once('./layout/header.php');
?>
<div class="fs-1 text-center">Películas</div>
<div class="d-flex justify-content-end">
    <a href="movie_new.php" class="btn btn-outline-primary">Agregar</a>
</div>
<table class="table mt-3 mb-5">
    <thead>
        <tr>
            <th class="col-5">Titulo</th>
            <th class="col-2">Género</th>
            <th class="col-2">Año de Estreno</th>
            <th class="col-3">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($peliculas as $objeto) {
            echo '<tr>';
            echo '<td>' . $objeto->getTitle() . '</td>';
            //echo '<td>' . $objeto->getGenre()->getName() . '</td>';
            $objeto_genero = $objeto->getGenre();
            echo '<td>' . $objeto_genero->getName() . '</td>';
            echo '<td>' . $objeto->getReleaseYear() . '</td>';
            echo '<td>';
            echo '<a href="movie_detail.php?id=' . $objeto->getId() . '" class="btn btn-outline-info">Ver Detalle</a>&nbsp;';
            echo '<a href="movie_modify.php?id=' . $objeto->getId() . '" class="btn btn-outline-warning">Actualizar</a>&nbsp;';
            echo '<a href="javascript:confirmar(' . $objeto->getId() . ',\'' . $objeto->getTitle() . '\')" class="btn btn-outline-danger">Eliminar</a>';
            echo '</td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>
<script>
    function confirmar(pId, pTitulo) {
        if (confirm('¿Desea eliminar la película ' + pTitulo + '?'))
            location.href = 'movie_delete.php?id=' + pId;
    }
</script>
<?php
require_once('./layout/footer.php')
?>