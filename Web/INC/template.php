<!DOCTYPE html>
<html lang="en" id="quiSommesNous">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>MANAGIS WEBSITE</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="CSS/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="CSS/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="CSS/style.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="IMG/favicon.png" />

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="JS/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="JS/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="JS/mdb.min.js"></script>
    <script type="text/javascript" src="JS/main.js"></script>
</head>

<body>

<header>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="barreblanche">
        <div class="container-fluid">
            <!-- Navbar brand -->
            <a class="navbar-brand" href="template.php">MANAGIS</a>

            <!-- Collapse button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
                    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapsible content -->
            <div class="collapse navbar-collapse" id="basicExampleNav">

                <ul class="navbar-nav ml-auto">
                   <?php
                        $inscription =
                            '<li class="nav-item active">
                                <a href="inscription.php" class="btn btn-outline-dark"><i class="far fa-address-card"></i> Inscription</a>
                            </li>';
                        $quiSommesNous =
                            '<li class="nav-item">
                                <a href="quiSommesNous.php" class="btn btn-outline-dark"><i class="fas fa-users"></i> Qui sommes-nous?</a>
                            </li>';
                        $connexion =
                            '<li class="nav-item">
                                <a href="connexion.php" class="btn btn-outline-dark"> <i class="fas fa-sign-in-alt"></i> Connexion</a>
                            </li>' ;
                        $vosEvenements =
                            /*'<li class="nav-item">
                                <a href="vosEvenements.php" class="btn btn-outline-dark">Vos evenements</a>
                            </li>'*/
                        '<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle btn btn-outline-dark" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="glyphicon glyphicon-calendar"></span> GESTION EVENEMENTS
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="addEvent.php">CREER VOTRE EVENEMENT</a>
                              <a class="dropdown-item" href="vosEvenements.php">EVENEMENTS A VENIR</a>
                              <a class="dropdown-item" href="historiqueEvents.php">HISTORIQUE DE VOS EVENEMENTS</a>
                            </div>
                         </li>';
                        if (!empty($_SESSION['user'])) {
                            //$ajouterEvent = str_replace("<a href=\"inscription.php\" class=\"btn btn-outline-dark\">Inscription</a>", '<a href="addEvent.php"  class="btn btn-outline-dark">Créer votre evenement </a>', $inscription);
                            $espaceMembre = str_replace("<a href=\"connexion.php\" class=\"btn btn-outline-dark\"> <i class=\"fas fa-sign-in-alt\"></i> Connexion</a>", "<a href=\"espaceMembre.php\" class=\"btn btn-outline-dark\"><span class=\"glyphicon glyphicon-user\"></span>  Espace Membre</a>", $connexion);
                            $deconnexion= str_replace("<a href=\"quiSommesNous.php\" class=\"btn btn-outline-dark\"><i class=\"fas fa-users\"></i> Qui sommes-nous?</a>", "<a href=\"deconnexion.php\" class=\"btn btn-outline-dark\"><i class=\"fas fa-sign-out-alt\"></i> Deconnexion</a>", $quiSommesNous);
                            echo $vosEvenements  . $espaceMembre . $deconnexion;
                        }
                        else {
                            echo $inscription . $connexion . $quiSommesNous;
                        }
                   ?>
                </ul>
                <!-- Links -->
            </div>
        </div>
        <!-- Collapsible content -->

    </nav>
    <!--/.Navbar-->
    <div id="intro" class="container-fluid"></div>

</header>

<main class="container-fluid colormain">
    <div class="row">
        <div class="col-md-4 marge">
            <img class="rounded mx-auto d-block marge rounded-circle" src="IMG/managis.png" height="200px" width="200px"align="center">

            <h2 align="center">Qu'est ce que Managis ?</h2>
            <p align="center">
                <br>
                Il s'agit d'une application servant à savoir qui apporte quoi lors de vos événements.<br>
                Finit de se retrouver en manque d'alcool ou bien de chips en soirée !<br>
                Prévoyez tout à l'avance et tout ce passera pour le mieux !<br>
            </p>
        </div>
        <div class="col-md-4 marge ">
            <img class="rounded mx-auto d-block marge rounded-circle" src="IMG/soireAmis.jpg" height="200px" width="200px"align="center">
            <h2 align="center">Pourquoi l'utiliser ?</h2>
            <p align="center">
                <br>
                Enormément de possibilités !<br>
                Un voyage entre amis, une soirée, une excursion, une raclette ?<br>
                Managis sera le partenaire essentiel de la plupart de vos événements !
            </p>
        </div>
        <div class="col-md-4 marge">
            <img class="rounded mx-auto d-block marge rounded-circle" src="IMG/avantage.jpeg" height="200px" width="200px" align="center">

            <h2 align="center">Le petit plus!</h2>
            <p align="center">
                <br>
                Finis de jeter vos restes ! Mettez les dans un panier pour votre prochain événement !<br>
                De plus nous offrons un système de covoiturage ce qui évite d'avoir 5 voitures de 1 personnes pour la soirée !<br>
                Devenez plus éco-responsable en vous amusant !<br>
            </p>
        </div>
    </div>
</main>

<!-- Footer -->
<footer class="page-footer font-small grey darken-1 fixed-bottom container-fluid">

    <!-- Footer Elements -->
    <div class="container-fluid">
        <!-- Grid row-->
        <div class="row">
            <!-- Grid column -->
            <div class="col-md-12 py-1 ">
                <div class="mb-1 flex-center textfont"><span class ="espace">Retrouvez-nous sur :</span>
                    <!-- Facebook -->
                    <a class="fb-ic">
                        <i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"></i>
                    </a>
                    <!-- Twitter -->
                    <a class="tw-ic">
                        <i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"></i>
                    </a>
                    <!--Instagram-->
                    <a class="ins-ic">
                        <i class="fab fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"></i>
                    </a>

                    <a class="mail-ic">
                        <i class="far fa-envelope fa-lg white-text mr-md-5 mr-3 fa-2x"></i>
                    </a>
                </div>
            </div>
            <!-- Grid column -->
        </div>
        <!-- Grid row-->
    </div>
    <!-- Footer Elements -->

</footer>
<!-- Footer -->

</body>


</html>
