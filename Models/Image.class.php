<?php

class Image
{
    private $_nom;
    private $_codeImage;
    private $_taille;
    private $_bin;
    private $_type;
    private $_codeOeuvre;


    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }


    //Getters
    public function bin()
    {
        return $this->_bin;
    }
    public function codeOeuvre()
    {
        return $this->_codeOeuvre;
    }
    public function nom()
    {
        return $this->_nom;
    }
    public function taille()
    {
        return $this->_taille;
    }
    public function codeImage()
    {
        return $this->_codeImage;
    }
    public function type()
    {
        return $this->_type;
    }


    //definition des setters
    public function setBin($bin)
    {
        $this->_bin = $bin;
    }
    public function setType($type)
    {
        $this->_type = $type;
    }
    public function setNom($nom)
    {
        $this->_nom = $nom;
    }
    public function setTaille($taille)
    {
        $this->_taille = $taille;
    }
    public function setCodeOeuvre($codeOeuvre)
    {
        $this->_codeOeuvre = $codeOeuvre;
    }
    public function setCodeImage($codeImage)
    {
        $this->_codeImage = $codeImage;
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
