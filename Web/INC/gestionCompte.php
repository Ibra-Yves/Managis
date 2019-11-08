<div class="col-lg-12 pasColler">
    <div class="panel-default ">
        <div class="panel-heading">
            <h3 class="panel-title gestionDeCompteTitre" align="center">Détails du compte</h3>
        </div>
        <div class="panel-body ">
            <div class="table-responsive ">
                <table class="table table-striped transparent">
                    <thead>
                    <tr>
                        <th style="width: 25%" scope="col" class="gestionDeCompteSousTitre">Pseudo</th>
                        <th style="width: 20%" scope="col" class="gestionDeCompteSousTitre">Date création</th>
                        <th style="width: 25%" scope="col" class="gestionDeCompteSousTitre">Mail</th>
                    </tr>
                    </thead>
                    <tbody id="infoCompte" class="transparent">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!--<div id="errorForm"></div>
<div class="form-group">
    <input type="password" name="ancienMDP" id="ancienMDP" class="form-control input-sm" placeholder="Ancien mot de passe">
</div>-->
<div class="panel-heading">
    <h3 class="panel-title gestionDeCompteTitre" align="center">Changer de mot de passe</h3>
</div>
<div class="row centered-form" >
    <div class="col-lg-12">
        <div id="errorForm"></div>
        <form id="formNewMdp" class="formNewMdp" name="formNewMDP" method="post" action="validation.html" >
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input class="form-control" id="ancienMDP" name="ancienMDP" type="password" placeholder="Votre ancien mot de passe *" required="required" data-validation-required-message="Veuillez entrer votre prénom.">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input class="form-control" id="newMDP" name="newMDP" type="password" placeholder="Votre nouveau mot de passe *" required="required" data-validation-required-message="Veuillez entrer votre adresse email.">
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="confirmationMDP" type="password" name="confirmationMDP" placeholder="Retapez votre nouveau mot de passe *" required="required" data-validation-required-message="Veuillez entrer votre message."></input>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                    <div id="success"></div>
                    <button class="btn btn-primary btn-xl text-uppercase" type="submit">Changer de mot de passe</button>
                </div>
            </div>
        </form>
    </div>
</div>