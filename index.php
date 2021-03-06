<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="dashboard/KAMW/style.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



    <title>Accueil</title>
</head>

<body>
<div class="mydiv">The background-color changes in time</div>
    
    <?php require("./Views/haut.php");
    require("./Controllers/Fonctions.class.php");
    // $Oeuvre = new Oeuvre(array("codeOeuvre"=>"aka1"));
    // echo count(Images($Oeuvre));
    $bd = connection();
    $OeuvreManager = new OeuvreManager($bd);
    $results=$OeuvreManager->Animes();


    $rand = rand(0, (count($results)-1));

    //Indicateur du carousel, pour chaque anime, affichera dans la label la place de l'anime (anime 1, anime 2)
    echo '<div id="carouselExampleIndicators" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">';
    for ($i=0; $i<=count($results); $i++) {
        echo '<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="'.$i.'" class="active" aria-current="true" aria-label="Anime '. ($i+1).'"></button>';
    }
    //L'item actif du carousel qui sera choisi au hasard
    echo'</div>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <a href=/dashboard/KAMW/Views/Recherche.php?code=' . $results[$rand]->codeOeuvre() . '><img style="width: 500px;height: 800px;" src="/dashboard/KAMW/Images/'. $results[$rand]->image(). '" class="d-block w-100" alt="..."/></a>
        <div class="carousel-caption d-none d-md-block">
            <h5>' . $results[$rand]->titre() . '</h5>
            <p>' . note($results[$rand]->note()) . '</p>
        </div>
        </div>';
        //Les autre item
        for ($i=0; $i<count($results); $i++) {
            echo '<div class="carousel-item">
            <a href=/dashboard/KAMW/Views/Recherche.php?code=' . $results[$i]->codeOeuvre() . '><img  style="width: 400px;height: 800px;" src="/dashboard/KAMW/Images/'. $results[$i]->image() . '" class="d-block w-100" alt="..."/></a>
            <div class="carousel-caption d-none d-md-block">
            <h5>' . $results[$i]->titre() . '</h5>
            <p>' . note($results[$i]->note()) . '</p>
            </div>
            </div>';
        }
        echo '</div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
            </button></div>'
    ?>


<?
    echo '    <style>
        .mydiv {
  width:100%;
  height:100%;
  color:black;
  font-weight:bold;
  animation: myanimation 10s infinite;
}

@keyframes myanimation {
  0% {background-color: '. couleur() .';}
  25%{background-color: '. couleur() .';}
  50%{background-color: '. couleur() .';}
  75%{background-color: '. couleur() .';}
  100% {background-color:  '. couleur() .';}
}
    </style>' ?>
        
</body>

</html>