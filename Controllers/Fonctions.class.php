<?php
session_start();

// Setting internal encoding for string functions
mb_internal_encoding("UTF-8");

//connexion pdo à la bd
function connection()
{
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=KAMW", "root", "");
        return $pdo;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

// Chargement automatique des fonctions controlleurs et modèles
function autoChargeFonction($class)
{
    $filename = '/Applications/XAMPP/xamppfiles/htdocs/dashboard/KAMW/Controllers/' . $class . '.class.php';
    if (file_exists($filename)) {
        require("/Applications/XAMPP/xamppfiles/htdocs/dashboard/KAMW/Controllers/" . $class . ".class.php");
    } else {
        require("/Applications/XAMPP/xamppfiles/htdocs/dashboard/KAMW/Models/" . $class . ".class.php");
    }
}
spl_autoload_register('autoChargeFonction');

//Date aujourd'hui
function dateToday()
{
    $date = date('Y-m-d');
    return $date;
}

function Refresh()
{
    $code = $_GET["code"];
    echo'<script>
            window.location.replace("/dashboard/KAMW/Views/ModificationOeuvre.php?ajout=true&code='.$code.'");
        </script>';
}

//Liste de tous les animes
function ListeAnimes()
{
    // if ($_POST["critere"] == "Tous") {
    $bd = connection();

    $AnimeManager = new AnimeManager($bd);
    $results=$AnimeManager->Animes();
    if ($results == null) {
        echo "<center>Aucun Anime disponible, Veuillez revenir ultérieurement</center>";
    } else {
        echo '<div class="container-fluid"><div class="row" style="height: 400px;margin-top:40px">';
        foreach ($results as $key =>$value) {
            echo '<div class="col shadow-lg p-3 mb-5 bg-body rounded" style="text-align: center;"><br/>';
            //Note
            echo note($value->note());

            //Titre et Image
            echo'
                                <br/><br/>' . $value->titre() . '
                                <div></br>
                                <a href="../Views/Recherche.php?code='. $value->codeOeuvre() . '"> <img style="width: 150px; height: 150px;" src="/dashboard/KAMW/Images/' . $value->image() .'" alt="' . $value->titre() . '"> </a>
                                </div>
                                <div>
                                    <a href="../Views/Recherche.php?code='. $value->codeOeuvre() . '"> <input type="button" value="Afficher" style="margin-top: 70px; width: 200px;" /> </a>
                                </div>
                        </div>
                    </br></br></br>';
        }
        echo '</div></div>';
    }
}

//Note
function note($note)
{
    //Note en étoile
    $etoiles = '';
    for ($i = 1; $i <= $note; $i++) {
        $etoiles .= '<i class="fa fa-star"></i>';
    }
    return $etoiles;
}
//Fond lors de l'ajout
function couleur()
{
    $couleur = ["green","yellow","blue","black","red","blue","darkmagenta","purple","orange","pink","Gainsboro","gray","khaki","lime","tomato","purple","thistle","Salmon" ];
    $rand = rand(0, (count($couleur)-1));
    echo $couleur[$rand];
}

//Carousel Index

//Achiffer resultat recherche
function recherche()
{
    $bd = connection();
    $AnimeManager = new AnimeManager($bd);
    $result = $AnimeManager->recherche($_GET["critere"]);
    if ($result == null) {
        echo "<center><br/><br/><br/><h4>Aucun anime trouvé selon ce critère</center><h4>";
    } else {
        echo '<div class="container-fluid"><div class="row" style="height: 400px;">';
        foreach ($result as $key =>$value) {
            echo '<div class="col" style="text-align: center;"><br/>';
            //Note
            echo $value->type() . " - " . note($value->note());

            //Titre et Image
            echo'
                                <br/><br/><b>' . $value->titre() . '</b>
                                <div></br>
                                <a href="../Views/Recherche.php?code='. $value->codeOeuvre() . '"> <img style="width: 200px; height: 200px;" src="/dashboard/KAMW/Images/' . $value->image() .'" alt="' . $value->titre() . '"> </a>
                                <br/><br/>Auteur : '. $value->auteur() . '
                                </div>
                                <div>
                                    <a href=../Views/Recherche.php?code=' . $value->codeOeuvre() .'> <input type="button" value="Afficher" style="margin-top: 40px; width: 200px;" /> </a>
                                </div>
                        </div>
                    </br></br></br>';
        }
        echo '</div></div>';
    }
}

function afficherAnime()
{
    $db = connection();
    $AnimeManager = new AnimeManager($db);
    $result = $AnimeManager->afficherAnime($_GET ["code"]);
    $genre = genre();


    if ($result == null) {
        echo "<center><br/><br/><br/><h4>Cet animé est indisponible pour l'instant</center><h4>";
    } else {
        echo"<Center>
                <h1>
                    <U>
                    ". $result[0]->titre() . "
            </U>
                </h1>
                ";
        $form = "";

        $form ='<div style="width: 1550px; margin-left: 100px;" >

                <div style="width: 500px;float: left;margin-top: 50px ; margin-right : 100px">
                    <img style="width: 500px; height:500px"  src="/dashboard/KAMW/Images/' . $result[0]->image() . '" alt="' . $result[0]->image() . '" /> 
                </div>


                <div style="width: 400px;float: left;margin-top: 50px ;height:500px" class="shadow-lg p-3 mb-5 bg-body rounded">
                    <table style=" height:500px">
                        <tr> <td style="text-align: right;"> Nom Auteur:</td>  <td>'  . $result[0]->auteur() . '</td> </tr>
                        <tr> <td style="text-align: right;"> Titre:</td>  <td> ' . $result[0]->titre() . '</td> </tr>
                        <tr> <td style="text-align: right;"> Note:</td>  <td>' . note($result[0]->note()) . '</td> </tr>
                        <tr> <td colspan="2"><b>'.  $genre . '</b></td> </tr>
                    </table>
                </div>


                <div style="width: 400px;float: left;margin-top: 50px; margin-left: 50px;">
                    <div style="vertical-align: top;">
                    <h4>Synopsis</h4>'.
                    $result[0]->synopsis() . '<hr/></div>

                    <div class="shadow-sm p-3 mb-5 bg-body rounded" style="vertical-align: bottom;">
                    <h4>Mon Resumé</h4>' . $result[0]->resume() . '</div>
                    </div>
                </div><br/><br/>';
        echo $form;
    }
}

//Genre
function genre()
{
    $db = connection();
    $GenreManager = new GenreManager($db);
    $G = "";
    $genres = $GenreManager->genre($_GET["code"]);
    if ($genres !=null) {
        for ($i = 0; $i < count($genres); $i++) {
            //M'évitera d'avoir une virgule à la fin
            if ($i == (count($genres)-1)) {
                $G .= "<a href='../Views/Recherche.php?critere=". $genres[$i]->genre() . "'>" . $genres[$i]->genre() . "</a>";
            } else {
                $G .= "<a href='../Views/Recherche.php?critere=". $genres[$i]->genre() . "'>" . $genres[$i]->genre() . "</a>" . ' - ';
            }
        }
        return $G;
    } else {
        return "Aucun genre pour cet oeuvre";
    }
    // foreach ($genres as $key =>$genre) {
    //     echo $genre->genre(). ', ';
    // };
}
//Genre
function ajoutGenre(Genre $Genre)
{
    $db = connection();
    $GenreManager = new GenreManager($db);
    if ($GenreManager->ajouterGenre($Genre) !=null) {
        return "Ce genre existe déjà";
    }
}

//Images d'une oeuvre
function Images(Oeuvre $Oeuvre)
{
    $bd = connection();
    $ImageManager = new ImageManager($bd);
    $results=$ImageManager->Images($Oeuvre);
    $rand = rand(0, (count($results)-1));
    if ($results != null) {
        $div = '<div class="container">
                    <div class="row">';
        for ($i=0; $i<count($results); $i++) {
            $div .= '   <div class="col mb-4">
                            <img style="width:100px;height:100px" src="data:image/jpeg;base64,'.base64_encode($results[$i]->bin()) .'" />
                        </div>';
        }
        $div .= '   </div>
                </div>';
        return $div;
    } else {
        return "Auncune image pour cette Oeuvre";
    }
}

function ajoutImage(Image $Image)
{
    $db = connection();
    $ImageManager = new ImageManager($db);
    if ($ImageManager->ajoutImage($Image) !=null) {
        return "Cette image existe déjà";
    }
    Refresh();
}

//Ajout d'un nouvel oeuvre
function ajoutOeuvre(Oeuvre $Oeuvre)
{
    try {
        $db = connection();
        $OeuvreManager = new OeuvreManager($db);
        $OeuvreManager->ajoutOeuvre($Oeuvre);
        return true;
    } catch (Exception $ex) {
        return $ex->getMessage();
    }
}
