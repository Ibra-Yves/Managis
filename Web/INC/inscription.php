<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<div class="container">

    <div class="row centered-form">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title gestionDeCompteTitre" align="center">Inscrivez-vous pour organiser vos soirées</h3>
                </div>
                <div class="panel-body">
                    <form id="formInscription" class="formInscription" name="formInscription" method="post" action="validation.html">
                        <div id="errorForm"></div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" id="pseudo" name="pseudo" class="form-control input-sm" placeholder="Pseudo" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Adresse Email" required>
                        </div>

                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="password" id="mdp" name="mdp" class="form-control input-sm" placeholder="Mot de passe" required minlength="8">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="password" id="confirmationMdp" name="confirmationMdp" class="form-control input-sm" placeholder="Confirmation">
                                </div>
                            </div>
                            <input type="checkbox" required style="margin-left:5%">   Lu et accepté le <a href="CGU.php"> CGU</a>
                        </div>
                        <div class="g-recaptcha" data-sitekey="6Lf1PsQUAAAAAEEZbvu-67ds-7KAigR8s7pnFMhb"></div>
                        <input class="btn btn-primary btn-xl text-uppercase" type="submit" value="Inscription">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
