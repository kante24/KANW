<form action="AjoutRecette.php" method="POST" enctype="multipart/form-data">      

                <table style="text-align: right; font-size: larger">
                    <tr>
                        <td> Nom de la Recette :</td>
                        <td><input name="nom" /></td>
                    </tr>
                    <tr>
                        <td> Numero :</td>
                        <td><input name="numero" /></td>
                    </tr>
                    <tr>
                        <td>Ingrédients :</td>
                        <td><input type="text" name="ingredient" /></td>
                    </tr></table><br/>
                        
                         Photo :
                    <input type="file" name="image" />

                
                <p style="margin-left: 25%"><input type="submit" value="Ajouter" /> </p>

            </form>

            
<?PHP 
$host = 'localhost';
$user = 'root';
$pwd = '';
$bdd = 'projet';
$link = mysqli_connect($host, $user, $pwd, $bdd) or die ("Erreur de connection au serveur");
mysqli_select_db($link, $bdd) or die ("Erreur de connection à la BDD");
    
$image_name = $_FILES["image"]["name"];
    
$sql = " INSERT INTO `recettes` (`numero`, `nom`, `ingredient`, `photo`)
VALUES
('$_POST[numero]', '$_POST[nom]', '$_POST[ingredient]', '$image_name' )   ";

$result = mysqli_query($link, $sql) or die ('<center><h1>Erreur veuillez réessayer</center><hr/>
<a href="javascript:history.back()"><img style="width : 20px; height : 20px" src="Images/Retour.jpg"/>Retour</a>
');
echo ('<center><h1>Ajout Effectué</center><hr/>
<a href="javascript:history.back()"><img style="width : 20px; height : 20px" src="Images/Retour.jpg"/>Retour</a>
');

mysqli_close($link)
?>