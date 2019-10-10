<div class="container-fluid">
    <div class="row text-center">
        <div class="col-md-6 ">
            <div class="card mb-3 transparent" style="max-width: 110rem;">
                <div class="card-header">Détails de votre compte</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th style="width: 25%" scope="col" class="taillePolice">Pseudo</th>
                                <th style="width: 25%" scope="col" class="taillePolice">Mail</th>
                                <th style="width: 20%" scope="col" class="taillePolice">Date de création de compte</th>

                            </tr>
                            </thead>
                            <tbody id="infoCompte">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="infoCompte" class="row text-center">
    <div class="col-md-6 ">
        <div class="card mb-3 transparent" style="max-width: 110rem;">
            <div class="card-header">Changement mot de passe</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th style="width: 5%" scope="col" class="taillePolice">Ancien mot de passe</th>
                            <th style="width: 25%" scope="col" class="taillePolice">Nouveau mot de passe</th>
                            <th style="width: 25%" scope="col" class="taillePolice">Confirmation</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <!--<th scope="row">1</th>-->
                            <td class="taillePolice"><input type="password" name="ancienMDP" id ="ancienMDP" placeholder="Ancien mot de passe"></td>
                            <td class="taillePolice"><input type="password" name="newMDP" id="newMDP" placeholder="Nouveau mot de passe"></td>
                            <td class="taillePolice"><input type="password" name="newMDPconfirm" id="newMDPconfirm" placeholder="Nouveau mot de passe"></td>
                        </tr>
                        </tbody>
                    </table>
                    <button type="button" id="*" class="btn btn-primary boutonEvent">Confirmer</button>
                </div>
            </div>
        </div>
    </div>
</div>
