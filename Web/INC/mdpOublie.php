
<div class="row centered-form" >
    <div class="col-lg-12">
        <div class="panel-heading">
            <h3 class="panel-title gestionDeCompteTitre" align="center">Recupérez votre mot de passe</h3>
        </div>
        <form id="formMdpOublie" class="formMdpOublie" name="formMdpOublie" method="post" action="validation.php">
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
                        <input class="form-control" id="email" name="email" type="email" placeholder="Votre adresse mail *" required="required">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                    <div id="success"></div>
                    <br>
                    <button class="btn btn-primary btn-xl text-uppercase" name="form" type="submit">Réinitialiser le mot de passe</button>
                </div>
            </div>
        </form>
<div class="container">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Recupérez votre mot de passe</h3>
                </div>
                <div class="panel-body">
                    <form id="formMdpOublie" class="formMdpOublie" name="formMdpOublie" method="post" action="validation.php">
                        <div id="errorForm"></div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" id="pseudo" name="pseudo" class="form-control input-sm" placeholder="Pseudo">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Adresse Mail">
                        </div>

                        <input type="submit" value="Reitinialiser votre mot de passe" class="btn btn-primary align-middle">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

