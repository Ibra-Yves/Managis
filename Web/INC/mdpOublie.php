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
    </div>
</div>

