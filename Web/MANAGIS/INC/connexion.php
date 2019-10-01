<div class="container login-container">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="../CSS/connexion.css" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <div class="row">
        <div class="col-md-6 login-form-1">
            <h3>Connexion</h3>
            <form id="formConnexion" class="formConnexion" name="formConnexion" method="post" action="validation.php">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Pseudo" value="" id="pseudo" name="pseudo"/>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Mot de passe" value="" id="mdp" name="mdp"/>
                </div>
                <div class="form-group">
                    <input type="submit" class="btnSubmit" name="form" value="connexion" />
                </div>
            </form>
        </div>
    </div>
</div>
