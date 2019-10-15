<div class="row text-center">
    <div class="col-md-6 text-center">
        <div class="card mb-3 transparent " style="max-width: 110rem;">
            <div class="card-header blanc">Liste commentaires</div>
            <div class="card-body">
                <div class="table-responsive" style="max-height: 100px">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th style="width: 5%" scope="col" class="taillePolice">#</th>
                        <th style="width: 95%" scope="col" class="taillePolice">Commentaire</th>
                        <th style="width: 95%" scope="col" class="taillePolice">Supprimer le commentaire</th>
                    </tr>
                    </thead>
                    <tbody id="listeCommentaire">
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 text-center">
        <div class="card mb-3 transparent " style="max-width: 110rem;">
            <div class="card-header blanc">Conseils</div>
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

