<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style type="text/css">
        .dropdown:hover .dropdown-menu {
            display: block;
        }
    </style>

    <link type="text/css" rel="stylesheet" href="/dashboard/KAMW/Styles/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" href="/dashboard/KAMW/Images/K.png" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/dashboard/KAMW/Controllers/scriptJs.js"></script>
    <title></title>


</head>

<body class="body">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand" href="/dashboard/KAMW/">
                <img src="/dashboard/KAMW/Images/K.png" style="width: 50;height: 50px;" />
            </a>

            <!-- Liens et Actions -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/dashboard/KAMW/Views/Animes.php">Animes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard/KAMW/Views/Mangas.php">Mangas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard/KAMW/Views/Webtoons.php">Webtoons</a>
                    </li>

                    <!-- dropdown list for actions -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Actions</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/dashboard/KAMW/Views/AjoutOeuvre.php">Ajouter</a></li>
                            <li><a class="dropdown-item" href="#">Modifier</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Suprimer</a></li>
                        </ul>
                    </li>
                </ul>

                <form class="d-flex" action="/dashboard/KAMW/Views/Recherche.php">
                    <input style="width: 500px;text-align:center" class="form-control me-2" type="search" placeholder="Recherche par Titre, Auteur" aria-label="Search" name="critere">
                    <button class="btn btn-outline-dark" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>

</html>