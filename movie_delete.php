<?php
require_once('./connection/BaseMySQL.php');
require_once('./model/Movie.php');
require_once('./database/MovieDB.php');

$id = $_GET['id'];

$database = BaseMySql::conexion();

$movieDB = new MovieDB();

$eliminado = $movieDB->eliminar($database, $id);

BaseMySql::close($database);

if ($eliminado) {
    header('Location:index.php');
    exit;
}

require_once('./error_msg.php');
?>