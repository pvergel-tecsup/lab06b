<?php
require_once('./model/Movie.php');

/**
 * ENLACES DE AYUDA
 * - bindValue: https://www.php.net/manual/es/pdostatement.bindvalue.php
 * - execute: https://www.php.net/manual/es/pdostatement.execute.php
 */

class MovieDB
{
    public function listar($cnx)
    {

        try {
            $sql = "SELECT m.id, m.title, g.name as genre_name, m.release_year  
                FROM movies m 
                INNER JOIN genres g 
                  ON g.genre_id = m.genre_id";
            $stmt = $cnx->prepare($sql);
            $stmt->execute();
            $vector = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $peliculas = [];

            foreach ($vector as $item) {
                $obj = new Movie($item['id'], $item['title'], 0, 0, $item['release_year'], 0, 0, $item['genre_name']);
                $peliculas[] = $obj;
            }
            return $peliculas;
        } catch (PDOException $error) {
            echo '<h2>No fue posible consultar la base de datos: ' . $error->getMessage() . '</h2>';
            return [];
        }
    }

    public function buscar($cnx, $textoBuscar)
    {
        try {
            $sql = "SELECT m.id, m.title, g.name as genre_name, m.release_year  
                    FROM movies m 
                    INNER JOIN genres g 
                    ON g.genre_id = m.genre_id
                    WHERE m.title LIKE :search";
            $stmt = $cnx->prepare($sql);
            $busqueda = '%' . $textoBuscar . '%';
            $stmt->bindValue(':search', $busqueda, PDO::PARAM_STR);
            $stmt->execute();
            $vector = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $peliculas = [];

            foreach ($vector as $item) {
                $obj = new Movie($item['id'], $item['title'], 0, 0, $item['release_year'], 0, 0, $item['genre_name']);
                $peliculas[] = $obj;
            }
            return $peliculas;
        } catch (PDOException $error) {
            echo '<h2>No fue posible consultar la base de datos: ' . $error->getMessage() . '</h2>';
            return [];
        }
    }

    public function detalle($cnx, $id)
    {
        try {
            $sql = "SELECT 
                           m.id, m.title, m.rating, 
                           m.awards, m.release_year, m.length, 
                           g.genre_id, g.name as genre_name 
                    FROM movies m 
                    INNER JOIN genres g 
                      ON g.genre_id = m.genre_id
                    WHERE m.id = :movieId";
            $stmt = $cnx->prepare($sql);
            $stmt->bindValue(':movieId', $id, PDO::PARAM_INT);
            $stmt->execute();
            $vector = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $peliculas = [];

            foreach ($vector as $item) {
                $obj = new Movie(
                    $item['id'],
                    $item['title'],
                    $item['rating'],
                    $item['awards'],
                    $item['release_year'],
                    $item['length'],
                    $item['genre_id'],
                    $item['genre_name']
                );
                $peliculas[] = $obj;
            }
            return $peliculas[0];
        } catch (PDOException $error) {
            echo '<h2>No fue posible consultar la base de datos: ' . $error->getMessage() . '</h2>';
            return null;
        }
    }

    public function insertar($cnx, $objeto_pelicula)
    {
        try {
            $query = "INSERT INTO movies (title, rating, awards, release_year, length, genre_id) 
                  VALUES (:titulo, :ranking, :premios, :estreno, :duracion, :genero)";
            $stmt = $cnx->prepare($query);
            $stmt->bindValue(':titulo', $objeto_pelicula->getTitle(), PDO::PARAM_STR);
            $stmt->bindValue(':ranking', $objeto_pelicula->getRating(), PDO::PARAM_INT);
            $stmt->bindValue(':premios', $objeto_pelicula->getAwards(), PDO::PARAM_INT);
            $stmt->bindValue(':estreno', $objeto_pelicula->getReleaseYear(), PDO::PARAM_INT);
            $stmt->bindValue(':duracion', $objeto_pelicula->getLength(), PDO::PARAM_INT);
            $stmt->bindValue(':genero', $objeto_pelicula->getGenre()->getGenreId(), PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $error) {
            echo '<h2>No fue posible consultar la base de datos: ' . $error->getMessage() . '</h2>';
            return false;
        }
    }

    public function actualizar($cnx, $objeto_pelicula)
    {
        try {
            $query = "UPDATE movies SET 
                        title = :titulo, 
                        rating = :ranking, 
                        awards = :premios, 
                        release_year = :estreno, 
                        length = :duracion, 
                        genre_id = :genero 
                     WHERE id = :id";
            $stmt = $cnx->prepare($query);
            $stmt->bindValue(':id', $objeto_pelicula->getId(), PDO::PARAM_INT);
            $stmt->bindValue(':titulo', $objeto_pelicula->getTitle(), PDO::PARAM_STR);
            $stmt->bindValue(':ranking', $objeto_pelicula->getRating());
            $stmt->bindValue(':premios', $objeto_pelicula->getAwards());
            $stmt->bindValue(':estreno', $objeto_pelicula->getReleaseYear(), PDO::PARAM_INT);
            $stmt->bindValue(':duracion', $objeto_pelicula->getLength());
            $stmt->bindValue(':genero', $objeto_pelicula->getGenre()->getGenreId(), PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $error) {
            echo '<h2>No fue posible consultar la base de datos: ' . $error->getMessage() . '</h2>';
            return false;
        }
    }

    public function eliminar($cnx, $id)
    {
        try {
            $query = "DELETE FROM movies WHERE id = :id";
            $stmt = $cnx->prepare($query);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $error) {
            echo '<h2>No fue posible consultar la base de datos: ' . $error->getMessage() . '</h2>';
            return false;
        }
    }
}
?>