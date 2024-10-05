<?php
require_once('./connection/BaseMySQL.php');
require_once('./model/Genre.php');
require_once('./model/Movie.php');
require_once('./database/MovieDB.php');

$database = BaseMySql::conexion();

$movieDB = new MovieDB();

$peliculas = $movieDB->listar($database);

BaseMySql::close($database);

require_once('./layout/header.php');
?>
<div class="fs-1 text-center">Películas</div>
<table class="table mt-3 mb-5">
    <thead>
        <tr>
            <th>Titulo</th>
            <th>Género</th>
            <th>Año de Lanzamiento</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach ($peliculas as $objeto) {
        echo '<tr>';
        echo '<td>' . $objeto->getTitle() . '</td>';
        echo '<td>' . $objeto->getGenre()->getName() . '</td>';
        echo '<td>' . $objeto->getReleaseYear() . '</td>';
        echo '<td>&nbsp;</td>';
        echo '</tr>';
    }
    ?>
    </tbody>
</table>
<?php
require_once('./layout/footer.php')
?>