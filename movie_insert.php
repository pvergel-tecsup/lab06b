<?php
require_once('./connection/BaseMySQL.php');
require_once('./model/Movie.php');
require_once('./database/MovieDB.php');

// OBTENEMOS LOS VALORES DEL FORMULARIO
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
echo 'post: ' . $_POST['length'];
echo 'duración: ' . $duracion;
exit;
// CREAMOS EL OBJETO PELÍCULA
$objeto_pelicula = new Movie(0, $titulo, $ranking, $premios, $estreno, $duracion, $generoId, '');

// ABRIMOS LA CONEXIÓN A LA BASE DE DATOS
$database = BaseMySql::conexion();

// DEFINIMOS EL OBJETO PARA TRABAJAR LA BASE DE DATOS
$movieDB = new MovieDB();

// GUARDAMOS EL OBJETO EN LA BASE DE DATOS
$insertado = $movieDB->insertar($database, $objeto_pelicula);

// CERRAMOS LA CONEXIÓN A LA BASE DE DATOS
BaseMySql::close($database);

// SI EL REGISTRO HA SIDO GUARDADO, REDIRECCIONAMOS A INDEX
if ($insertado) {
    header('Location:index.php');
    exit;
}

// SI EL REGISTRO NO HA SIDO GUARDADO, MOSTRAMOS EL ERROR
require_once('./error_msg.php');
?>