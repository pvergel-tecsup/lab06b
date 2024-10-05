<?php
require_once('./model/Movie.php');

class MovieDB
{
    public function listar($cnx)
    {
        $query = "SELECT m.id, m.title, g.name as genre_name, m.release_year
                  FROM movies m
                  INNER JOIN genres g 
                    ON g.genre_id = m. genre_id";
        $stmt = $cnx->prepare($query);
        $stmt->execute();
        $vector = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $peliculas = [];

        foreach ($vector as $item)
        {
            $obj = new Movie($item['id'], $item['title'], 0, 0, $item['release_year'], 0, 0, $item['genre_name']);
            $peliculas[] = $obj;
        }
        return $peliculas;
    }
}
?>