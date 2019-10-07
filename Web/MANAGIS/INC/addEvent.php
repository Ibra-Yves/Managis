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
                                    Nom de l'événement :
                                    <input type="text" name="nom" id="nom" class="form-control input-sm" placeholder="Nom de l'événement" required minlength="6">
                                </div>
                                <div class="form-group">
                                    Adresse de l'événement : 
                                    <input type="text" name="adresse" id="adresse" class="form-control input-sm" placeholder="Adresse de l'hôte">
                                    *Format Ville-rue-numéro
                                </div>
                                <br>
                                <div class="form-group">
                                    Date de l'événement : 
                                    <input type="date" name="date" id="date" class="form-control input-sm" placeholder="YYYY-MM-DD">
                                </div>
                                <div class="form-group" >
                                    <div class="col-xs-9 col-sm-9 col-md-9">
                                        Pseudo de l'invité : 
                                        <input type="text" id="invite" class="form-control input-sm" placeholder="Pseudo de l'invité">
                                    </div>
                                    <div class="input-group-append">
                                        <a href="ajouterInv.php" id="ajouterInv" onclick="$('#listeInvite').append( $('#invite').val() + '\n');" class="btn btn-outline-secondary" type="button">Ajouter</a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea readonly class="listeInvite" id="listeInvite" rows="3" placeholder="Liste d'invités"></textarea>
                                </div>
                                <input type="submit" value="Ajouter l'événement" class="btn btn-primary align-middle">
                            </form>
                        </div>
