<?php
require_once('./connection/BaseMySQL.php');
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
    foreach ($peliculas as $item) {
        echo '<tr>';
        echo '<td>' . $item['title'] . '</td>';
        echo '<td>' . $item['genre_name'] . '</td>';
        echo '<td>' . $item['release_year'] . '</td>';
        echo '<td>&nbsp;</td>';
        echo '</tr>';
    }
    ?>
    </tbody>
</table>
<?php
require_once('./layout/footer.php')
?>