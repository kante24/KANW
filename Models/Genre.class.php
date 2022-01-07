<?php

class Genre
{
    private $_idGenre;
    private $_codeAnime;
    private $_genre;


    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }


    //Getters
    public function idGenre()
    {
        return $this->_idGenre;
    }
    public function codeAnime()
    {
        return $this->_codeAnime;
    }
    public function genre()
    {
        return $this->_genre;
    }


    //definition des setters
    public function setIdGenre($idGenre)
    {
        $this->_idGenre = $idGenre;
    }
    public function setCodeAnime($codeAnime)
    {
        $this->_codeAnime = $codeAnime;
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
