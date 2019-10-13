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
                    <tbody id="listeCommentaire">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6 text-center">
        <div class="card mb-3 transparent" style="max-width: 60rem;">
            <div class="card-header">Conseils</div>
            <form id="commentaire" name="commentaire" method="post" action="validation.html">
                <div id="errorFormmm"></div>
            <div class="card-body">
                <h5 class="card-title">Ajoutez un commentaire pour l'hôte</h5>
                <br>
                <input type="text" id="commentaire" name="commentaire" class="form-control input-sm" placeholder="Commentaire...">
                <br>
                <input type="submit" id="commentaire" value="Ajoutez" class="btn btn-primary boutonEvent">
            </div>
            </form>
        </div>
    </div>



</div>
<div class="row text-center">

    <div class="col-md-6 text-center">
        <div class="card mb-3 transparent" style="max-width: 60rem;">
            <div class="card-header">Liste fournitures</div>
            <div class="card-body">
                <form id="formQuantite" name="formQuantite" method="post" action="validation.html">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th style="width: 10%" scope="col" class="taillePolice">#</th>
                        <th style="width: 45%" scope="col" class="taillePolice">Fournitures</th>
                        <th style="width: 15%"scope="col" class="taillePolice">Quantité</th>
                    </tr>
                    </thead>
                    <tbody id="listeFournitures">
                    </tbody>
                </table>
                <input type="submit" value="Validez vos quantites" class="btn btn-primary boutonEvent">
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6  text-center">
        <div class="card mb-3 transparent" style="max-width: 60rem;">
            <div class="card-header">Fournitures nécessaires : </div>
            <div class="card-body">
                <h5 class="card-title">Ajouter des fournitures !</h5>
                <br>
                <form id="formFournitures" name="formFournitures" method="post" action="validation.html">
                    <div id="errorForm"></div>
                    <input type="text"  name="fourniture" class="form-control input-sm" placeholder="Fourniture pour l'événement">
                    <br>
                    <input type="submit" value="Ajouter la fourniture à la liste" class="btn btn-primary boutonEvent">
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
