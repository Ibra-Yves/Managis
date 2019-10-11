<div class="card transparent mb-3" style="max-width: 110rem;">
                <div class="card-header">Listes des invités</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th style="width: 5%" scope="col" class="taillePolice">#</th>
                                <th style="width: 95%" scope="col" class="taillePolice">Nom de l'invité</th>
                            </tr>
                            </thead>
                            <tbody id="invites">
                            </tbody>
                        </table>
                        <h5 class="card-title">Ajouter des invités !</h5>
                        <form class="form-group" id="formAjoutInv" name="formAjoutInv" method="post" action="validation.html">
                            <div id="errorForm"></div>
                            <input type="text" name="pseudoInv" id="pseudoInv" class="form-control input-sm" placeholder="Nom invité">
                            <input type="submit" value="Ajouter un invité" class="btn btn-primary boutonEvent">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row text-center">
    <div class="col-md-6 text-center">
        <div class="card mb-3 transparent" style="max-width: 60rem;">
            <div class="card-header">Liste commentaires</div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th style="width: 5%" scope="col" class="taillePolice">#</th>
                        <th style="width: 95%" scope="col" class="taillePolice">Commentaire</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td class="taillePolice">J'ai soif</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<div class="col-md-6 text-center">
    <div class="card mb-3 transparent" style="max-width: 60rem;">
        <div class="card-header">Conseils</div>
        <div class="card-body">
            <h5 class="card-title">Ajoutez un commentaire pour l'hôte</h5>
            <br>
            <input type="text" id="pseudo" name="pseudo" class="form-control input-sm"
                   placeholder="Commentaire...">
            <br>
            <button type="button" id="changerMDP" class="btn btn-primary boutonEvent">Ajoutez</button>
        </div>
    </div>
</div>



</div>
<div class="row text-center">

    <div class="col-md-6 text-center">
        <div class="card mb-3 transparent" style="max-width: 60rem;">
            <div class="card-header">Liste fournitures</div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th style="width: 10%" scope="col" class="taillePolice">#</th>
                        <th style="width: 45%" scope="col" class="taillePolice">Fournitures</th>
                        <th style="width: 15%"scope="col" class="taillePolice">Ajouter 1</th>
                        <th style="width: 15%"scope="col" class="taillePolice">Retirer 1</th>
                        <th style="width: 15%"scope="col" class="taillePolice">Quantité</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td class="taillePolice">Vodka</td>
                        <td>
                            <button type="button" id="apporte" class="btn btn-primary boutonEvent">+</button>
                        </td>
                        <td>
                            <button type="button" id="retire" class="btn btn-primary boutonEvent">-</button>
                        </td>
                        <td class="taillePolice">35</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td class="taillePolice">Doritos sel</td>
                        <td>
                            <button type="button" id="apporte" class="btn btn-primary boutonEvent">+</button>
                        </td>
                        <td>
                            <button type="button" id="apporte" class="btn btn-primary boutonEvent">-</button>
                        </td>
                        <td class="taillePolice">3</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6  text-center">
        <div class="card mb-3 transparent" style="max-width: 60rem;">
            <div class="card-header">Fournitures nécessaires : </div>
            <div class="card-body">
                <h5 class="card-title">Ajouter des fournitures !</h5>
                <br>
                <input type="text" id="pseudo" name="pseudo" class="form-control input-sm"
                       placeholder="Fourniture pour l'événement">
                <br>
                <button type="button" id="changerMDP" class="btn btn-primary boutonEvent">Ajouter la fourniture à la
                    liste</button>
            </div>
        </div>
    </div>

</div>
</div>
</div>
