<?php
class Genre
{
    private $_genreId;
    private $_name;

    public function __construct($genreId, $name)
    {
        $this->_genreId = $genreId;
        $this->_name = $name;
    }

    // GETTERS 
    public function getGenreId()
    {
        return $this->_genreId;
    }
    public function getName()
    {
        return $this->_name;
    }
    // SETTERS 
    public function setGenreId($genreId)
    {
        $this->_genreId = $genreId;
    }
    public function setName($name)
    {
        $this->_name = $name;
    }
}
?>