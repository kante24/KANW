<?php
class GenreManager
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

    public function genre($code)
    {
        $req=$this->_db->query("SELECT * FROM genre WHERE codeOeuvre = '$code'  ORDER BY genre ASC");
        $genre= array();
        while ($data=$req->fetch(PDO::FETCH_ASSOC)) {
            $genre[] = new Genre($data);
        }
        return $genre;
    }
}