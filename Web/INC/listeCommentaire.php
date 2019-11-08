
<div class="row text-center " id="ajoutCom">
    <div class="col-md-6 col-md-offset-0 text-center">
        <div class="mb-3 transparent" style="max-width: 110rem;">
            <div class="card-header transparent gestionDeCompteSousTitre">Conseils</div>
            <div class="card-body transparent">
                <h5 class="card-title font-weight-bold">Ajoutez un commentaire pour l'hôte</h5>
            <form id="commentaire" name="commentaire" method="post" action="validation.html">
                <div id="errorFormmm"></div>
                    <input type="text" id="commentaire" name="commentaire" class="form-control input-sm" placeholder="Commentaire...">
                    <input type="submit" id="commentaire" value="Ajoutez" class="btn btn-primary boutonEvent">
            </form>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-md-offset-0 text-center" >
        <div class="mb-3 transparent" style="max-width: 110rem;">
            <div class="card-header transparent gestionDeCompteSousTitre">Liste commentaires</div>
            <div class="card-body transparent">
                <div class="table-responsive" style="max-height: 250px">
                    <form id="formQuantite" name="formQuantite" method="post" action="validation.html">
                        <table class="table table-striped">
                            <thead style="position: sticky; top: 0;">
                            <tr>
                                <th style="width: 5%" scope="col" class="taillePoliceTitre">#</th>
                                <th style="width: 150%" scope="col" class="taillePoliceTitre">Commentaire</th>
                                <th style="width: 95%; display: none " id="suppr" scope="col" class="taillePoliceTitre" >Supprimer le commentaire</th>
                            </tr>
                            </thead>
                            <tbody id="listeCommentaire" align="left">
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row text-center ajustement-div">
    <div class="col-md-6 text-center">
        <div class="card mb-3 transparent " style="max-width: 110rem;">
            <div class="card-header blanc taillePoliceSection">Liste commentaires</div>
            <div class="card-body">
                <div class="table-responsive" style="max-height: 100px">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th style="width: 5%" scope="col" class="taillePoliceTitre">#</th>
                        <th style="width: 95%" scope="col" class="taillePoliceTitre">Commentaire</th>
                        <th style="width: 95%" scope="col" class="taillePoliceTitre">Supprimer le commentaire</th>
                    </tr>
                    </thead>
                    <tbody id="listeCommentaire" align="left">
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 text-center">
        <div class="card mb-3 transparent " style="max-width: 110rem;">
            <div class="card-header blanc taillePoliceSection">Conseils</div>
            <form id="commentaire" name="commentaire" method="post" action="validation.html">
                <div id="errorFormmm"></div>
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">Ajoutez un commentaire pour l'hôte</h5>
                    <br>
                    <input type="text" id="commentaire" name="commentaire" class="form-control input-sm" placeholder="Commentaire...">
                    <br>
                    <input type="submit" id="commentaire" value="Ajoutez" class="btn btn-primary boutonEvent">
                </div>
            </form>
        </div>
    </div>
</div>

