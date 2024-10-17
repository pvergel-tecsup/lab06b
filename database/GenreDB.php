<?php
require_once('./model/Genre.php');

class GenreDB
{
    public function listar($cnx)
    {
        $query = "SELECT genre_id, name FROM genres";
        $stmt = $cnx->prepare($query);
        $stmt->execute();
        $vector = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $generos = [];

        foreach ($vector as $item) {
            $obj = new Genre($item['genre_id'], $item['name']);
            $generos[] = $obj;
        }
        return $generos;
    }
}
?>