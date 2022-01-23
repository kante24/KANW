<?php
require("/Applications/XAMPP/xamppfiles/htdocs/dashboard/KAMW/Controllers/Fonctions.class.php");
?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        if (isset($_GET['ajout'])) {
            if ($_GET['ajout'] == "true") {
                ?>
        <form method="post">

            <div class="container" style="border-color:<?couleur()?>; border-style:solid;border-radius: 40%; margin-top: 70px; text-align: center;">

                <div class="row d-flex p-3" style="margin-top: 20px;">

                    <div class="row">

                        <div class="col-6 textCenter" style="margin-top: 20px;background-color: <?couleur() ?>">
                            <h4 style="background-color:white;margin-top: 10px">Genres</h4>
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
                                            <h4>
                                                <?echo genre()?>
                                            </h4>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 50px">

                        <div class="col-6"></div>

                        <div class="col-6 textCenter" style="background-color: <?couleur() ?>">

                            <h4 style="background-color:white; margin-top: 10px; margin-left: 50px;">Image à AJouter</h4>

                            <div class="row">
                                <div class="col-12">
                                    <input id="floatingInput" style="vertical-align:top; margin-top: 10px;text-align: center; background-color: white;" type="file" name="genre" placeholder="GENRE">
                                </div>
                            </div>

                            <div class="col form-floating" style="margin-top:20px; margin-bottom: 10px;">
                                <button class="btn btn-success" type="submit" style="margin: 0 auto;width: 200px;" name="ajoutGenre">
                                    Ajouter  <img src="https://www.pngmart.com/files/21/Add-Button-PNG-Isolated-File.png" style="width: 20px; height: 20px;";/>
                                </button>
                            </div>
                        </div>

                    </div>

                    <div class="row" style="margin-top: 50px">

                        <div class="col-6 textCenter" style="background-color: <?couleur() ?>">

                            <h4 style="background-color:white; margin-top: 10px;">Images</h4>

                            <div class="row">
                                <div class="col">
                                    images
                                </div>
                            </div>

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
        if (isset($_POST['ajoutGenre'])) {
            if (empty($_POST['genre'])) {
                echo "<div style='text-align:center;margin-top:30px'><h4>Veuillez donner un genre</h4></div>";
            } else {
                $codeOeuvre = $_GET["code"];
                $genre = $_POST["genre"];
                $codeGenre = substr($codeOeuvre, 0, 3) . substr($genre, 0, 3) . rand(0, 9999999999999);
                $Genre = new Genre(array("codeGenre" => $codeGenre, "codeOeuvre" => $codeOeuvre, "genre"=>$genre ));
                echo "<div style='text-align:center;margin-top:30px'><h4>" . ajoutGenre($Genre) . "</h4>";
            }
        }
            } elseif ($_GET['ajout'] !== 'true') {
                echo'
                    <script>
                        window.location.replace("/dashboard/KAMW/Views/AjoutOeuvre.php");
                    </script>';
            }
        }

        
        ?>


    </body>

    </html>