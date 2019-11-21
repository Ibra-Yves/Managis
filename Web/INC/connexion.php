
<div class="row centered-form" >
    <div class="col-lg-12">
        <div class="panel-heading">
            <h3 class="panel-title gestionDeCompteTitre" align="center">Connectez-vous</h3>
        </div>
        <form id="formConnexion" class="formConnexion" name="formConnexion" method="post" action="validation.php">
            <div id="errorForm"></div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input class="form-control" id="pseudo" name="pseudo" type="text" placeholder="Votre pseudo *" required="required">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input class="form-control" id="mdp" name="mdp" type="password" placeholder="Votre mot de passe *" required="required">
                        <p class="help-block text-danger"></p>
                        <a>Mot de passe oublié ? <a href="mdpOublie.php">Cliquez-ici !</a></a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                    <div id="success"></div>
                    <br>
                    <button class="btn btn-primary btn-xl text-uppercase" name="form" type="submit">Connexion</button>
                </div>
            </div>
        </form>
        <a>Vous ne faites pas encore partie de la communauté? <a href="inscription.php">Inscrivez vous dès maintenant</a></a>
    </div>
</div>


<div class="row centered-form" >
    <div class="col-lg-12">
        <div class="panel-heading">
            <h3 class="panel-title gestionDeCompteTitre" align="center">Connectez-vous</h3>
        </div>
        <form id="formConnexion" class="formConnexion" name="formConnexion" method="post" action="validation.php">
            <div id="errorForm"></div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input class="form-control" id="pseudo" name="pseudo" type="text" placeholder="Votre pseudo *" required="required">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input class="form-control" id="mdp" name="mdp" type="password" placeholder="Votre mot de passe *" required="required">
                        <p class="help-block text-danger"></p>
                        <a>Mot de passe oublié ? <a href="mdpOublie.php">Cliquez-ici !</a></a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                    <div id="success"></div>
                    <br>
                    <button class="btn btn-primary btn-xl text-uppercase" name="form" type="submit">Connexion</button>
                </div>
            </div>
        </form>
        <a>Vous ne faites pas encore partie de la communauté? <a href="inscription.php">Inscrivez vous dès maintenant</a></a>
    </div>
</div>


<div class="container">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title taillePoliceSection" align="center">Connectez-vous</h3>
                </div>
                <div class="panel-body">
                    <form id="formConnexion" class="formConnexion" name="formConnexion" method="post" action="validation.php">
                        <div id="errorForm"></div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Pseudo" value="" id="pseudo" name="pseudo">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Mot de passe" value="" id="mdp" name="mdp"/>
                        </div>

                        <input type="submit" class="btn btn-primary align-middle" name="form" value="connexion" />
                    </form>
                    <a href="mdpOublie.php" style="float: right">Mot de passe oublié?</a>
                </div>
            </div>
        </div>
    </div>
</div>

