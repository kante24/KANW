<?php
require("/Applications/XAMPP/xamppfiles/htdocs/dashboard/KAMW/Controllers/Fonctions.class.php");
?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css" rel="stylesheet" href="/Applications/XAMPP/xamppfiles/htdocs/dashboard/KAMW/Styles/style.css" />

        <title>Modification d'une oeuvre</title>

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

        <?php require("/Applications/XAMPP/xamppfiles/htdocs/dashboard/KAMW/Views/haut.php");
        
//Si l'element est déjà ajouté avec succès
if (isset($_GET['ajout']) && $_GET['ajout'] == "true") {
    ?>
        <form method="post" enctype="multipart/form-data">

            <div class="container mt-5">

                <div class="row textCenter">

                    <div class="row textCenter">

                        <div class="col-6 textCenter">
                            <h4 style="margin-top: 10px">Genres</h4>
                            <div class="row">
                                <div class="col">

                                    <div class="row">
                                        <div class="col form-floating" style="margin-top:30px">
                                            <input class="form-control" id="floatingInput" style="vertical-align:top; width: 200px;height:50px;text-align: center;" type="text" name="genre" placeholder="GENRE">
                                            <label for="floatingInput" style="text-align:center">GENRE À AJOUTER</label>
                                        </div>

                                        <div class="col form-floating" style="margin-top:30px">
                                            <button class="btn btn-success" type="submit" style="margin: 0 auto;width: 200px;" name="ajoutGenre">
                                                Ajouter  <img src="https://www.pngmart.com/files/21/Add-Button-PNG-Isolated-File.png" style="width: 20px; height: 20px;";/>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col textCenter" style="margin-top:30px">
                                            <h4 id="txtGenre">
                                                <?php echo genre(); ?>
                                            </h4>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="col-6 textCenter">

                            <h4 style="background-color:white; margin-top: 10px; margin-left: 50px;">Image à AJouter</h4>

                            <div class="row">
                                <div class="col-12">
                                    <input style="margin-top: 10px;text-align: center;" type="file" name="image" placeholder="IMAGE">
                                </div>
                            </div>

                            <div class="col form-floating" style="margin-top:20px; margin-bottom: 10px;">
                                <button class="btn btn-success" type="submit" style="margin: 0 auto;width: 200px;" name="ajoutImage">
                                    Ajouter  <img src="https://www.pngmart.com/files/21/Add-Button-PNG-Isolated-File.png" style="width: 20px; height: 20px;";/>
                                </button>
                            </div>

                            <h4 id="txtImage"></h4>
                        </div>

                    </div>

                    <div class="row textCenter" style="margin-top: 50px">

                        <div class="col textCenter p-4" style="border-style:solid;border-color: <?couleur() ?>">

                            <h4>Images</h4>

                            <?php
                            $codeOeuvre = $_GET["code"];
    $Image = new Image(array("codeOeuvre"=>$codeOeuvre));
    echo Images($Image); ?>
                        </div>

                    </div>


                    <div class="row" style="margin-top: 50px">
                        <div class="col-12 form-floating" style="margin-top:30px">
                            <button class="btn btn-success" type="submit" style="margin: 0 auto;width: 200px;" name="fin">
                            Terminer  <img src="https://www.kindpng.com/picc/m/721-7212637_done-icon-white-png-transparent-png.png" style="width: 20px; height: 20px; background-color: green;";/>
                        </button>
                        </div>
                    </div>

                </div>
            </div>

        </form>
        <?php
    //Fonction pour ajouter un genre
    if (isset($_POST['ajoutGenre'])) {
        if (empty($_POST['genre'])) {
            echo'<script>
                    document.getElementById("txtGenre").innerHTML = "Veuiller donner un genre à ajouter"
                </script>';
        } else {
            $codeOeuvre = $_GET["code"];
            $genre = $_POST["genre"];
            $codeGenre = substr($codeOeuvre, 0, 3) . substr($genre, 0, 3) . rand(0, 9999999999999);
            $Genre = new Genre(array("codeGenre" => $codeGenre, "codeOeuvre" => $codeOeuvre, "genre"=>$genre ));
            echo "<div style='text-align:center;margin-top:30px'><h4>" . ajoutGenre($Genre) . "</h4>";
        }
    }
}
        //Sinon, redirection vers ajout
         else {
             echo'
                    <script>
                        window.location.replace("/dashboard/KAMW/Views/AjoutOeuvre.php");
                    </script>';
         }


        //Fonction pour ajouter une image
        if (isset($_POST['ajoutImage'])) {
            if ($_FILES["image"]["name"] == null) {
                echo'<script>
                    document.getElementById("txtImage").innerHTML = "Veuillez choisir une image à ajouter"
                </script>';
            } else {
                $codeOeuvre = $_GET["code"];
                $nom = $_FILES["image"]["name"];
                $codeImage = substr($codeOeuvre, 0, 3) . substr($nom, 0, 3) . rand(0, 9999999999999);
                $taille = $_FILES["image"]["size"];
                $type = $_FILES["image"]["type"];
                $bin = $_FILES["image"]["tmp_name"];
                $Image = new Image(array("codeImage"=>$codeImage, "codeOeuvre"=>$codeOeuvre, "nom"=>$nom, "taille"=>$taille, "type"=>$type, "bin"=>$bin));
                
                echo "<div style='text-align:center;margin-top:30px'><h4>" . ajoutImage($Image) . "</h4>";
            }
        }
        ?>


    </body>

    </html>