<?php

class Anime
{
    private $_titre;
    private $_codeAnime;
    // private $_type;
    private $_synopsis;
    private $_resume;
    private $_critique;
    private $_note;
    private $_image;
    private $_auteur;


    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }


    //Getters
    public function titre()
    {
        return $this->_titre;
    }
    public function codeAnime()
    {
        return $this->_codeAnime;
    }
    public function synopsis()
    {
        return $this->_synopsis;
    }
    public function resume()
    {
        return $this->_resume;
    }
    public function critique()
    {
        return $this->_critique;
    }
    public function note()
    {
        return $this->_note;
    }
    public function image()
    {
        return $this->_image;
    }
    public function auteur()
    {
        return $this->_auteur;
    }
    // public function type()
    // {
    //     return $this->_type;
    // }


    //definition des setters
    public function setTitre($titre)
    {
        $this->_titre = $titre;
    }
    // public function setType($type)
    // {
    //     $this->_type = $type;
    // }
    public function setImage($image)
    {
        $this->_image = $image;
    }
    public function setNote($note)
    {
        $this->_note = $note;
    }
    public function setCritique($critique)
    {
        $this->_critique = $critique;
    }
    public function setResume($resume)
    {
        $this->_resume = $resume;
    }
    public function setSynopsis($synopsis)
    {
        $this->_synopsis = $synopsis;
    }
    public function setCodeAnime($codeAnime)
    {
        $this->_codeAnime = $codeAnime;
    }
    public function setAuteur($auteur)
    {
        $this->_auteur = $auteur;
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
