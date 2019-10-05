<div class="container">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Créez votre propre événement !</h3>
                </div>
                <div class="panel-body">
                    <form id="formCreaEvent" class="formCreaEvent" name="formCreaEvent" method="post" action="validation.html">
                        <div class="form-group">
                            <input type="text" name="nom" id="nom" class="form-control input-sm" placeholder="Nom de l'événement">
                        </div>
                        <div class="form-group">
                            <input type="text" name="ville" id="ville" class="form-control input-sm" placeholder="Ville de l'hôte">
                        </div>
                        <div class="form-group">
                            <input type="text" name="rue" id="rue" class="form-control input-sm" placeholder="Rue de l'hôte">
                        </div>
                        <div class="form-group">
                            <input type="text" name="numero" id="numero" class="form-control input-sm" placeholder="Numéro de maison de l'hôte">
                        </div>
                        <div class="form-group">
                            <input type="text" name="date" id="date" class="form-control input-sm" placeholder="Date de l'événement">
                        </div>
                        <div class="form-group" >
                            <div class="col-xs-9 col-sm-9 col-md-9">
                                <input type="text" name="invite" id="invite" class="form-control input-sm" placeholder="Pseudo de l'invité">
                            </div>
                            <div class="input-group-append">
                                <button id="ajouterInv" onclick="$('#listeInvite').append($('#invite').val() + '\n');" class="btn btn-outline-secondary" type="button">Ajouter</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea readonly name="pseudos" class="listeInvite" id="listeInvite" rows="3" placeholder="Liste d'invités"></textarea>
                        </div>
                        <input type="submit" value="Ajouter l'événement" class="btn btn-primary align-middle">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
