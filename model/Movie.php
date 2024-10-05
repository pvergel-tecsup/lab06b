<?php
class Movie
{
    private $_id;
    private $_title;
    private $_rating;
    private $_awards;
    private $_releaseYear;
    private $_length;
    private $_genreId;

    public function __construct($id, $title, $rating, $awards, $releaseYear, $length, $genre_id)
    {
        $this->_id = $id;
        $this->_title = $title;
        $this->_rating = $rating;
        $this->_awards = $awards;
        $this->_releaseYear = $releaseYear;
        $this->_length = $length;
        $this->_genreId = $genre_id;
    }

    public function getId()
    {
        return $this->_id;
    }
    public function getTitle()
    {
        return $this->_title;
    }
    public function getRating()
    {
        return $this->_rating;
    }
    public function getAwards()
    {
        return $this->_awards;
    }
    public function getReleaseYear()
    {
        return $this->_releaseYear;
    }
    public function getLength()
    {
        return $this->_length;
    }
    public function getGenreId()
    {
        return $this->_genreId;
    }

    public function setId($id)
    {
        $this->_id = $id;
    }
    public function setTitle($title)
    {
        $this->_title = $title;
    }
    public function setRating($rating)
    {
        $this->_rating = $rating;
    }
    public function setAwards($awards)
    {
        $this->_awards = $awards;
    }
    public function setReleaseYear($releaseYear)
    {
        $this->_releaseYear = $releaseYear;
    }
    public function setLength($length)
    {
        $this->_length = $length;
    }
    public function setGenre($genreId)
    {
        $this->_genreId = $genreId;
    }
}
