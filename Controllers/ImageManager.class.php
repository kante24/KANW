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

    public function Images(Image $Image)
    {
        $codeOeuvre = $Image->codeOeuvre();
        $req=$this->_db->query("SELECT * FROM images WHERE codeOeuvre = '$codeOeuvre' ");
        $images= array();
        while ($data=$req->fetch(PDO::FETCH_ASSOC)) {
            $images[] = new Image($data);
        }
        return $images;
    }

    public function ajoutImage(Image $Image)
    {

        $codeImage = $Image->codeImage();
        $codeOeuvre = $Image->codeOeuvre();
        $nom = $Image->nom();
        $taille = $Image->taille();
        $type = $Image->type();
        $bin = $Image->bin();

        $req=$this->_db->query("SELECT * FROM images WHERE codeOeuvre = '$codeOeuvre' AND nom = '$nom' ");
        if ($req->fetch(PDO::FETCH_ASSOC) != null) {
            return $nom;
        } elseif ($req->fetch(PDO::FETCH_ASSOC) == null) {
            $req = $this->_db->prepare("insert into images (codeImage, codeOeuvre, nom, taille, type, bin) values (?,?,?,?,?,?) ");
            $req->execute(array($codeImage, $codeOeuvre ,$nom, $taille, $type, file_get_contents($bin)));
            exit;
        }
    }
}
