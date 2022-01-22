<?php
class ImageManager
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

    public function images(Oeuvre $Oeuvre)
    {
        $codeOeuvre = $Oeuvre->codeOeuvre();
        $req=$this->_db->query("SELECT * FROM images WHERE codeOeuvre = '$codeOeuvre' ");
        $images= array();
        while ($data=$req->fetch(PDO::FETCH_ASSOC)) {
            $images[] = new Image($data);
        }
        return $images;
    }
}