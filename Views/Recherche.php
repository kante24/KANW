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