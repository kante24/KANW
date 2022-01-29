<?php

class Oeuvre
{
    private $_titre;
    private $_codeOeuvre;
    private $_type;
    private $_synopsis;
    private $_resume;
    private $_critique;
    private $_note;
    private $_image;
    private $_auteur;
    private $_derniereLecture;
    private $_adulte;


    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }


    //Getters
    public function titre()
    {
        return $this->_titre;
    }
    public function codeOeuvre()
    {
        return $this->_codeOeuvre;
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
    public function type()
    {
        return $this->_type;
    }
    public function derniereLecture()
    {
        return $this->_derniereLecture;
    }
    public function adulte()
    {
        return $this->_adulte;
    }


    //definition des setters
    public function setTitre($titre)
    {
        $this->_titre = $titre;
    }
    public function setType($type)
    {
        $this->_type = $type;
    }
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
    public function setCodeOeuvre($codeOeuvre)
    {
        $this->_codeOeuvre = $codeOeuvre;
    }
    public function setAuteur($auteur)
    {
        $this->_auteur = $auteur;
    }
    public function setDerniereLecture($derniereLecture)
    {
        $this->_derniereLecture = $derniereLecture;
    }
    public function setAdulte($adulte)
    {
        $this->_adulte = $adulte;
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
