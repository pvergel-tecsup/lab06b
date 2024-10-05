<?php
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
        $peliculas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $peliculas;
    }
}
?>