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
        $req=$this->_db->query("SELECT * FROM genres WHERE codeOeuvre = '$code'  ORDER BY genre ASC");
        $genre= array();
        while ($data=$req->fetch(PDO::FETCH_ASSOC)) {
            $genre[] = new Genre($data);
        }

        return $genre;
    }

    public function ajouterGenre(Genre $Genre)
    {
        $codeGenre = $Genre->codeGenre();
        $code = $Genre->codeOeuvre();
        $genre = $Genre->genre();

        $req=$this->_db->query("SELECT * FROM genres WHERE genre = '$genre' AND codeOeuvre = '$code' ");
        if ($req->fetch(PDO::FETCH_ASSOC) != null) {
            return $genre;
        } elseif ($req->fetch(PDO::FETCH_ASSOC) == null) {
            // echo "insertion";
            $req=$this->_db->query("INSERT INTO genres VALUES ('$codeGenre', '$code', '$genre')");
            $req->execute();
            exit;
        };
    }
}
