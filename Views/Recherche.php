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
        <h4 class="btn-primary position-relative" style="width: 100px;">
            Alerts
            <span class="position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-danger p-2"><span class="visually-hidden">unread messages</span></span>
        </h4>
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

                //Supression si parametre sup
                if(isset($_GET["sup"])) {
                    $code = $_GET["code"];
                    $Oeuvre = new Oeuvre(array("codeOeuvre"=>$code));
                    if(supOeuvre($Oeuvre) == "true")
                    {
                        echo'
                            <script>
                                window.location.replace("/dashboard/KAMW/index.php");
                            </script>';
                    }
                    else echo'
                            <script>
                                window.location.replace("/dashboard/KAMW/Views/Recherche.php?code="'. $code .');
                            </script>';
                }

          
          ?>
                </div>
            </div>
        </div>

    </body>

    </html>