<?php
class AnimeManager
{
    //retour de l'objet de connection pdo
    private $_db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function db()
    {
        $this->_db;
    }

    public function setDb($db)
    {
        return $this->_db = $db;
    }

    public function Animes()
    {
        $req=$this->_db->query("SELECT * FROM oeuvres WHERE type = 'Anime' ORDER BY note DESC");
        $animes= array();
        while ($data=$req->fetch(PDO::FETCH_ASSOC)) {
            $animes[] = new Anime($data);
        }
        return $animes;
    }


    public function afficherAnime($code)
    {
        $req=$this->_db->query("SELECT * FROM oeuvres WHERE codeOeuvre = '$code' ");
        $Anime= array();
        while ($data=$req->fetch(PDO::FETCH_ASSOC)) {
            $Anime[] = new Anime($data);
        }
        return $Anime;
    }
}
