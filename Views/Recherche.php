<?php
require("../Controllers/Fonctions.class.php");
// session_start();
// if (!isset($_SESSION['connexion'])) {
//     header('Location: Recherche.php');
//     exit;
// }
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
                <div class="col" style="margin-bottom: 100px; text-align: right;">
                    a
                </div>
            </div>
            <div class="row">
                <div class="col" style="text-align: center;">
                    <?php
                //Recherche
                if (isset($_GET["critere"])) {
                    rechercheAnime();
                }

                //Afficher oeuvre selecionné
                else if(isset($_GET["code"])) {
                    // echo "Manger nene";
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