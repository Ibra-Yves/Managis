<div class="container-fluid">

    <div class="card transparent mb-3" style="max-width: 110rem;">

        <div class="card-header">Listes des invités</div>
        <div class="card-body">
            <div class="table-responsive" style="max-height: 250px">
                <table class="table table-striped">
                    <thead style="position: sticky; top: 0;">
                    <tr>
                        <th style="width: 5%" scope="col" class="taillePolice">#</th>
                        <th style="width: 95%" scope="col" class="taillePolice">Nom de l'invité</th>
                    </tr>
                    </thead>
                    <tbody style="height: 10px !important; overflow: scroll;" id="invites">
                    </tbody>
                </table>
                <h5 class="card-title">Ajouter des invités !</h5>
                <form class="form-group" id="formAjoutInv" name="formAjoutInv" method="post" action="validation.html">
                    <div id="errorFormm"></div>
                    <input type="text" name="pseudoInv" id="pseudoInv" class="form-control input-sm" placeholder="Nom invité">
                    <input type="submit" value="Ajouter un invité" class="btn btn-primary boutonEvent">
                </form>
            </div>
        </div>
    </div>
</div>


