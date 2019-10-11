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
