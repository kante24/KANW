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
                                <a href="../Views/Recherche.php?code='. $value->codeAnime() . '"> <img style="width: 150px; height: 150px;" src="/dashboard/KAMW/Images/' . $value->image() .'" alt="' . $value->titre() . '"> </a>
                                </div>
                                <div>
                                    <a href="../Views/Recherche.php?code='. $value->codeAnime() . '"> <input type="button" value="Afficher" style="margin-top: 70px; width: 200px;" /> </a>
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

//Carousel Index

//Achiffer resultat recherche
function rechercheAnime()
{
    $bd = connection();
    $AnimeManager = new AnimeManager($bd);
    $result = $AnimeManager->rechercheAnime($_GET["critere"]);
    if ($result == null) {
        echo "<center><br/><br/><br/><h4>Aucun anime trouvé selon ce critère</center><h4>";
    } else {
        echo '<div class="container-fluid"><div class="row" style="height: 400px;">';
        foreach ($result as $key =>$value) {
            echo '<div class="col" style="text-align: center;"><br/>';
            //Note
            echo "Anime - " . note($value->note());

            //Titre et Image
            echo'
                                <br/><br/><b>' . $value->titre() . '</b>
                                <div></br>
                                <a href="../Views/Recherche.php?code='. $value->codeAnime() . '"> <img style="width: 200px; height: 200px;" src="/dashboard/KAMW/Images/' . $value->image() .'" alt="' . $value->titre() . '"> </a>
                                <br/><br/>Auteur : '. $value->auteur() . '
                                </div>
                                <div>
                                    <a href=../Views/Recherche.php?code=' . $value->codeAnime() .'> <input type="button" value="Afficher" style="margin-top: 40px; width: 200px;" /> </a>
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
                </center>";
        $form = "";
        $form ='<div style="width: 1500px; margin-left: 100px;" >

                <div style="width: 400px;float: left;margin-top: 50px ;">
                    <img style="width: 500px; height:500px"  src="/dashboard/KAMW/Images/' . $result[0]->image() . '" alt="' . $result[0]->image() . '" /> 
                </div>

                <div style="width: 400px;float: left;margin-top: 50px ;height:600px"" class="shadow-lg p-3 mb-5 bg-body rounded">
                    <table style=" height:500px">
                        <tr> <td style="text-align: right;"> Nom Auteur:</td>  <td>'  . $result[0]->auteur() . '</td> </tr>
                        <tr> <td style="text-align: right;"> Titre:</td>  <td> ' . $result[0]->titre() . '</td> </tr>
                        <tr> <td style="text-align: right;"> Note:</td>  <td>' . note($result[0]->note()) . '</td> </tr>
                        <tr> <td colspan="2"><b>'.  $genre . '</b></td> </tr></table></div>
                <div style="width: 700px;float: right;margin-top: 50px ;height:500px">
                <div style=" height:300px">'.
                $result[0]->synopsis() . '</div>
                <div class="shadow-sm p-3 mb-5 bg-body rounded" style=" height:200px">' . $result[0]->resume() . '</div>
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
    for ($i = 0; $i < count($genres); $i++) {
        //M'évitera d'avoir une virgule à la fin
        if ($i == (count($genres)-1)) {
            $G .= $genres[$i]->genre();
        } else {
            $G .= $genres[$i]->genre(). ', ';
        }
    }
    return $G;
    // foreach ($genres as $key =>$genre) {
    //     echo $genre->genre(). ', ';
    // };
}
