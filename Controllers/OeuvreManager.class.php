<?php
class OeuvreManager
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

    public function ajoutOeuvre(Oeuvre $oeuvre)
    {
        try {
            $titre = $oeuvre->titre();
            $synopsis = $oeuvre->synopsis();
            $auteur = $oeuvre->auteur();
            $critique = $oeuvre->critique();
            $type = $oeuvre->type();
            $resume = $oeuvre->resume();
            $note = $oeuvre->note();
            $codeOeuvre = $oeuvre->codeOeuvre();
            $adulte = $oeuvre->adulte();
            $image = "-";
            $req=$this->_db->query("INSERT INTO oeuvres (codeOeuvre, titre, type, synopsis, resume, critique, note, image,  auteur, adulte) VALUES ('$codeOeuvre','$titre','$type','$synopsis','$resume','$critique','$note', '$image', '$auteur', '$adulte' ) ");
            $req->execute();
        }catch(Exception $ex){return $ex->getMessage();}
    }


    public function recherche($critere)
    {
        $req=$this->_db->query("SELECT * FROM oeuvres WHERE (titre like '%$critere%' or auteur like '%$critere%' or codeOeuvre like '%$critere%')  ORDER BY titre ASC");
        $Anime= array();
        while ($data=$req->fetch(PDO::FETCH_ASSOC)) {
            $Anime[] = new Anime($data);
        }
        return $Anime;
    }
}
