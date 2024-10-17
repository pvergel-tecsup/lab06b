<?php
require_once('./connection/BaseMySQL.php');
require_once('./model/Movie.php');
require_once('./database/MovieDB.php');

$id = $_POST['movie_id'];
$titulo = $_POST['title'];
$generoId = $_POST['genre_id'];
$estreno = $_POST['release_year'];
$ranking = $_POST['rating'];
if (isset($_POST['length'])) {
    $duracion = $_POST['length'];
} else {
    $duracion = null;
}
if (isset($_POST['awards'])) {
    $premios = $_POST['awards'];
} else {
    $premios = null;
}

$objeto_pelicula = new Movie($id, $titulo, $ranking, $premios, $estreno, $duracion, $generoId, '');

$database = BaseMySql::conexion();

$movieDB = new MovieDB();

$actualizado = $movieDB->actualizar($database, $objeto_pelicula);

BaseMySql::close($database);

if ($actualizado) {
    header('Location:index.php');
    exit;
}

require_once('./error_msg.php');
?>