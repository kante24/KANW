<?php
require("../Controllers/Fonctions.class.php");
?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ajout d'une nouvelle oeuvre</title>

        <style>
            .textCenter {
                text-align: center;
            }
            
            h4 {
                background-color: white;
            }
            
            .row {
                margin-top: 20px;
            }
            
            .col {
                margin-top: 20px;
            }
        </style>

    </head>

    <body>

        <?php require("../Views/haut.php"); ?>
        <!-- form pour ajout -->
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

            <div class="container div" style="background-color: <?couleur() ?> ;border-radius: 50%;margin-top: 30px; text-align: center; width: 800px;">
                <div class="row">

                    <div class="col form-floating" style="margin-left: 90px;">
                        <input class="form-control" id="floatingInput" style="vertical-align:top; width: 200px;height:50px;text-align: center;" type="text" name="titre" placeholder="Titre">
                        <label for="floatingInput" style="text-align:center">TITRE</label>
                    </div>
                    <div class="col form-floating">
                        <input class="form-control" id="floatingInput" style="vertical-align:top; width: 200px;height:50px;text-align: center;" type="text" name="auteur" placeholder="AUTEUR">
                        <label for="floatingInput" style="text-align:center">AUTEUR</label>
                    </div>

                </div>

                <div class="row" style="margin-top: 30px;">
                    <div class="col" style="width: 200px;">
                        <h6 style="background-color: white;">Type</h6>
                        <select size="3" style="margin: 0 auto;text-align: center; width: 200px;" class="form-select" multiple aria-label="multiple select example" name="type">
                            <option value="Anime" selected>Anime</option>
                            <option value="Manga">Manga</option>
                             <option value="Webtoon">Webtoon</option>
                        </select>
                    </div>
                </div>


                <div class="row" style="margin: 0 auto;width: 200px; margin-top: 30px;">
                    <h6 style="background-color: white;">Note en
                        <?php echo note(1) ?>
                    </h6>
                    <select style="margin: 0 auto;text-align: center; width: 200px;" class="form-select" aria-label="Default select example" name="note">
                        <option selected value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>


                <div class="row" style="margin: 0 auto;width: 200px; margin-top: 30px;">
                    <select style="margin: 0 auto;text-align: center; width: 200px;" class="form-select" aria-label="Default select example" name="adulte">
                        <option selected value=0>Tout Public</option>
                        <option value=1>Adulte</option>
                    </select>
                </div>

                <div class="row" style="margin-top: 30px;">

                    <div class="col">
                        <div class="form-floating">
                            <textarea name="synopsis" class="form-control" placeholder="Synopsys" id="floatingTextarea2" style="height: 150px"></textarea>
                            <label for="floatingTextarea2">Synopsis</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <textarea name="resume" class="form-control" placeholder="Mon Resumé" id="floatingTextarea2" style="height: 150px" name="resume"></textarea>
                            <label for="floatingTextarea2">Mon Resumé</label>
                        </div>
                    </div>

                </div>

                <div class="row" style="margin: 0 auto;width: 400px; margin-top: 30px;">

                    <div class="col">
                        <div class="form-floating">
                            <textarea name="critique" class="form-control" placeholder="Critique" id="floatingTextarea2" style="height: 150px" name="critique"></textarea>
                            <label for="floatingTextarea2">Critique</label>
                        </div>
                    </div>

                </div>

                <div class="row" style="margin: 0 auto; margin-top: 30px;">
                    <div class="col">
                        <button class="btn btn-success" type="submit" style="margin: 0 auto;width: 200px;" name="ajout">
                            Ajouter  <img src="https://www.pngmart.com/files/21/Add-Button-PNG-Isolated-File.png" style="width: 20px; height: 20px;";/>
                         </button>
                    </div>
                    <div class="col">
                        <button class="btn btn-danger" type="submit" style="margin: 0 auto;width: 200px;" value="Effacer" name="effacer">
                            Effacer  <img src="https://cdn-icons-png.flaticon.com/512/70/70287.png" style="width: 20px; height: 20px;";/>
                        </button>
                    </div>
                </div>
            </div>
        </form>


    </body>

    </html>

    <?php

//Ajout nouvelle oeuvre
if (isset($_POST['ajout'])) {

    //Test pour champs vide(s)
    if (empty($_POST['titre']) or empty($_POST['auteur']) or empty($_POST['synopsis']) or empty($_POST['resume']) or empty($_POST['critique'])) {
        echo "<h4>Veuillez remplir tous les champs</h4>";
    } else {
        $codeOeuvre = substr($_POST['titre'], 0, 3) . substr($_POST['auteur'], 0, 3) . substr($_POST['type'], 0, 3). rand(0, 9999999999999);
        $Oeuvre=new Oeuvre(array("titre"=>$_POST['titre'], "codeOeuvre"=>$codeOeuvre, "synopsis"=>$_POST['synopsis'], "resume"=>$_POST['resume'], "critique"=> $_POST['critique'],  "note"=> $_POST['note'], "auteur"=> $_POST['auteur'], "type"=> $_POST['type'], "adulte"=> $_POST['adulte'] ));
        if (ajoutOeuvre($Oeuvre) === true) {
            echo    '<script>
                            window.location.replace("/dashboard/KAMW/Views/ModificationOeuvre.php?ajout=true&code='. $codeOeuvre .'");
                        </script>';
        }
    }
}

?>