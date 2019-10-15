<div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4 ajustement-div">
    <div class="panel-default transparent">
        <div class="panel-heading">
            <h3 class="panel-title taillePoliceSection" align="center">Détails du compte</h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th style="width: 25%" scope="col" class="taillePoliceTitre">Pseudo</th>
                        <th style="width: 20%" scope="col" class="taillePoliceTitre">Date création</th>
                        <th style="width: 25%" scope="col" class="taillePoliceTitre">Mail</th>
                    </tr>
                    </thead>
                    <tbody id="infoCompte">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
<div class="panel-default transparent">
    <div class="panel-heading">
        <h3 class="panel-title taillePoliceSection" align="center">Changer de mot de passe</h3>
    </div>
    <div class="panel-body">
        <form id="formNewMdp" class="formNewMdp" name="formNewMdp" method="post" action="validation.html">
            <div id="errorForm"></div>
            <div class="form-group">
                <input type="password" name="ancienMDP" id="ancienMDP" class="form-control input-sm" placeholder="Ancien mot de passe">
            </div>

            <div class="row transparent">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="password" id="newMDP" name="newMDP" class="form-control input-sm" placeholder="Nouveau mot de passe">
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="password" id="confirmationMdp" name="confirmationMdp" class="form-control input-sm" placeholder="Confirmation">
                    </div>
                </div>
            </div>
            <input type="submit" value="Changez mot de passe" class="btn btn-primary align-middle">
        </form>
    </div>
</div>
</div>