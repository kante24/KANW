<?php

class Genre
{
    private $_codeGenre;
    private $_codeOeuvre;
    private $_genre;


    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }


    //Getters
    public function codeGenre()
    {
        return $this->_codeGenre;
    }
    public function codeOeuvre()
    {
        return $this->_codeOeuvre;
    }
    public function genre()
    {
        return $this->_genre;
    }


    //definition des setters
    public function setCodeGenre($codeGenre)
    {
        $this->_codeGenre = $codeGenre;
    }
    public function setCodeOeuvre($codeOeuvre)
    {
        $this->_codeOeuvre = $codeOeuvre;
    }
    public function setGenre($genre)
    {
        $this->_genre = $genre;
    }


    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
}
