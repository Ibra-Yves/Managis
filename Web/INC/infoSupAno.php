<?php
 function infoSoiree($idEvent)
{
    $db = new Db();
    $infoSoiree = $db->procCall('vosInvitAno', [$idEvent]);
    $tabInfoSoiree = '';
    $tabInfoSoiree .=
        '<div class="transparent ajustement-div">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead >
                    <tr>
                        <th style="width: 25%" scope="col" class="taillePoliceTitre">Nom de l\'événement</th>
                        <th style="width: 25%" scope="col" class="taillePoliceTitre">Nom de l\'hôte</th>
                        <th style="width: 20%" scope="col" class="taillePoliceTitre">Date de l\'événement</th>
                        <th style="width: 25%" scope="col" class="taillePoliceTitre">Adresse</th>
                    </tr>
                    </thead>
                    <tbody id="vosEvent" align="left" class="transparent"><tr>';
                        $tabInfoSoiree .= '<td>' . $infoSoiree[0]['nomEvent'] . '</td>' .
                            '<td>' . $infoSoiree[0]['hote'] . '</td>' .
                            '<td>' . $infoSoiree[0]['dateEvent'] . '</td>' .
                            '<td>' . $infoSoiree[0]['adresse'] . '</td>';

    $tabInfoSoiree .= '</tr></tbody></table></div></div>';
    echo $tabInfoSoiree;
}

function listeInvites($idEvent)
{
    $db = new Db();
    $listeInvites = $db->procCall('listeInvites', [$idEvent]);
    $tabListeInv = '';
    $tabListeInv .= '<div class="col-md-6 col-md-offset-0 text-center" >
        <div class="transparent mb-3" style="max-width: 110rem;">
            <div class="card-header transparent gestionDeCompteSousTitre">Listes des invités</div>
            <div class="card-body transparent">
                <div class="table-responsive" style="max-height: 250px">
                    <table class="table table-striped">
                        <thead style="position: sticky; top: 0;">
                        <tr>
                            <th style="width: 95%" scope="col" class="taillePoliceTitre">Nom de l\'invité</th>     
                        </tr>
                        </thead>
                        <tbody style="height: 10px !important; overflow: scroll;" id="invites" align="left">';
    foreach ($listeInvites as $key => $value) {
        $i = 0;
        $tabListeInv .= '<tr><td>' . $listeInvites[$key]['pseudo'] . '</td></tr>';
    }
    $tabListeInv .= '</tbody></table></div></div></div></div>';
    echo $tabListeInv;
}

function listeParticipant($idEvent)
{
    $db = new Db();
    $listeParticipant = $db->procCall('listeParticipant', [$idEvent]);
    $tabListePart = '';
    $tabListePart .= '<div class="col-md-6 col-md-offset-0 text-center" >
        <div class="transparent mb-3" style="max-width: 110rem;">
            <div class="card-header transparent gestionDeCompteSousTitre">Liste des participants</div>
            <div class="card-body transparent">
                <div class="table-responsive" style="max-height: 250px">
                    <table class="table table-striped">
                        <thead style="position: sticky; top: 0;">
                        <tr>
                            <th style="width: 95%" scope="col" class="taillePoliceTitre">Participants</th>
                        </tr>
                        </thead>
                        <tbody style="height: 10px !important; overflow: scroll;" id="participants" align="left">';
    foreach ($listeParticipant as $key => $value) {
        $tabListePart .= '<tr><td>' . $listeParticipant[$key]['pseudo'] . '</td></tr>';
    }
    $tabListePart .= '</tbody></table></div></div></div></div></div>';
    echo $tabListePart;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MANAGIS</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <!-- Bootstrap core CSS -->
    <!--<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
    <!-- Material Design Bootstrap -->
    <!--<link href="CSS/mdb.min.css" rel="stylesheet">-->

    <!-- Your custom styles (optional) -->
    <link href="CSS/style2.css" rel="stylesheet">


    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href="CSS/agency.css" rel="stylesheet">

    <!-- JQuery -->
    <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="JS/popper.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="JS/mdb.min.js"></script>
    <script type="text/javascript" src="JS/main.js"></script>




</head>

<body id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Managis</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ml-auto">
                <?php
                $accueil =
                    '<li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index.php">Accueil</a>
          </li>';
                    echo $accueil;
                ?>
            </ul>
        </div>
    </div>
</nav>

<header class="masthead">

    <div class="container">
        <div class="intro-text">
            <div class="panel-heading">
                <h3 class="panel-title gestionDeCompteTitre pasColler" align="center">Vous avez été invité à cet événement :</h3>
            </div>
            <div class="panel-heading">
                <h3 class="panel-title avertissementAnonyme" align="center" style="color : orange">Pour le rejoindre veuillez d'abord rejoindre l'accueil afin de vous inscrire.</h3>
            </div>
            <div class="row text-center">
                <div class="col-md-12">
                    <?php infoSoiree($_SESSION['idEvent']); ?>
                </div>
            </div>
            <div class="row text-center ajustement-div">
                <?php listeInvites($_SESSION['idEvent']); ?>
                <?php listeParticipant($_SESSION['idEvent']); ?>
            </div>
        </div>
    </div>
</header>




<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4">
                <span class="copyright">Managis Website</span>
            </div>
            <div class="col-md-4">
                <ul class="list-inline social-buttons">
                    <li class="list-inline-item">
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="list-inline quicklinks">
                    <li class="list-inline-item">
                        <a href="#">Privacy Policy</a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">Terms of Use</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Contact form JavaScript -->
<script src="js/jqBootstrapValidation.js"></script>

<!-- Custom scripts for this template -->
<script src="js/agency.min.js"></script>

</body>

</html>