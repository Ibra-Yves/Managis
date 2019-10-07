<!DOCTYPE html>
    <html lang="en">

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
        <div class="container">
            <div class="row centered-form">
                <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Créez votre propre événement !</h3>
                        </div>
                        <div class="panel-body">
                            <form id="formCreaEvent" class="formCreaEvent" name="formCreaEvent" method="post" action="validation.html">

                                <div class="form-group">
                                    Nom de l'événement :
                                    <input type="text" name="nom" id="nom" class="form-control input-sm" placeholder="Nom de l'événement" required minlength="6">
                                </div>
                                <div class="form-group">
                                    Adresse de l'événement : 
                                    <input type="text" name="adresse" id="adresse" class="form-control input-sm" placeholder="Adresse de l'hôte">
                                    *Format Ville-rue-numéro
                                </div>
                                <br>
                                <div class="form-group">
                                    Date de l'événement : 
                                    <input type="date" name="date" id="date" class="form-control input-sm" placeholder="YYYY-MM-DD">
                                </div>
                                <div class="form-group" >
                                    <div class="col-xs-9 col-sm-9 col-md-9">
                                        Pseudo de l'invité : 
                                        <input type="text" id="invite" class="form-control input-sm" placeholder="Pseudo de l'invité">
                                    </div>
                                    <div class="input-group-append">
                                        <a href="ajouterInv.php" id="ajouterInv" onclick="$('#listeInvite').append( $('#invite').val() + '\n');" class="btn btn-outline-secondary" type="button">Ajouter</a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea readonly class="listeInvite" id="listeInvite" rows="3" placeholder="Liste d'invités"></textarea>
                                </div>
                                <input type="submit" value="Ajouter l'événement" class="btn btn-primary align-middle">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
