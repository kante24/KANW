<?php
require("../Controllers/Fonctions.class.php");
?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Recherche</title>
    </head>

    <body>
        <?php require("../Views/haut.php"); ?>
        
    <div class="btn-dark position-relative">
  Marker <svg width="1em" height="1em" viewBox="0 0 16 16" class="position-absolute top-100 start-50 translate-middle mt-1 bi bi-caret-down-fill" fill="#212529" xmlns="http://www.w3.org/2000/svg"><path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/></svg>
</div>
        <div class="container-fluid">

            <div class="row">
                <div class="col" style="text-align: center;">
                    <?php
                //Recherche
                if (isset($_GET["critere"])) {
                    recherche();
                }

                //Afficher oeuvre selecionné
                else if(isset($_GET["code"])) {
                    $Images = new Image(array("codeOeuvre"=>$_GET["code"]));
                    
                    afficherAnime();
                }
          
          ?>
                </div>
            </div>
        </div>
        <center>

        </center>
    </body>

    </html>