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
        $req=$this->_db->query("SELECT * FROM animes ORDER BY note DESC");
        $animes= array();
        while ($data=$req->fetch(PDO::FETCH_ASSOC)) {
            $animes[] = new Anime($data);
        }
        return $animes;
    }

    public function rechercheAnime($critere)
    {
        // $req=$this->_db->query("SELECT * FROM animes WHERE (titre like '%$critere%' or auteur like '%$critere%' or codeAnime like '%$critere%')  ORDER BY titre ASC");
        $req=$this->_db->query("SELECT DISTINCT animes.* FROM animes, nomsAlternatifs, genre WHERE animes.codeAnime = genre.codeAnime And (genre.genre like '%$critere%' or animes.titre like '%$critere%' or animes.auteur like '%$critere%' or animes.codeAnime like '%$critere%')  ORDER BY animes.titre ASC");
        // $req=$this->_db->query("SELECT DISTINCT animes.* FROM animes INNER JOIN genre ON animes.codeAnime = animes.codeAnime WHERE (genre.genre like '%$critere%' or animes.titre like '%$critere%' or animes.auteur like '%$critere%' or animes.codeAnime like '%$critere%') ORDER BY animes.titre ASC ");
        $Anime= array();
        while ($data=$req->fetch(PDO::FETCH_ASSOC)) {
            $Anime[] = new Anime($data);
        }
        return $Anime;
    }

    public function afficherAnime($code)
    {
        $req=$this->_db->query("SELECT * FROM animes WHERE codeAnime = '$code' ");
        $Anime= array();
        while ($data=$req->fetch(PDO::FETCH_ASSOC)) {
            $Anime[] = new Anime($data);
        }
        return $Anime;
    }
}