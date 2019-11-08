<script src="https://www.google.com/recaptcha/api.js"></script>
<div class="container">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title taillePoliceSection" align="center">Inscrivez-vous pour organiser vos soirées</h3>
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
                                    <input type="password" id="mdp" name="mdp" class="form-control input-sm" placeholder="Mot de passe" required>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="password" id="confirmationMdp" name="confirmationMdp" class="form-control input-sm" placeholder="Confirmation">
                                </div>
                            </div>
                            <input type="checkbox" required style="margin-left:5%">   Lu et accepté le <a href="CGU.php"> CGU</a>
                        </div>
                        <div class="g-recaptcha" id="captcha" data-sitekey="6Ldy2r0UAAAAADWwvNHnYzltYCCChGywMHOyR1nQ">
                        </div>
                        <input type="submit" value="Inscrivez vous" class="btn btn-primary align-middle">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
