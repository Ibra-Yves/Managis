 <div class="container">
            <div class="row centered-form">
                <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title taillePoliceSection">Créez votre propre événement !</h3>
                        </div>
                        <div class="panel-body">
                            <form id="formCreaEvent" class="formCreaEvent" name="formCreaEvent" method="post" action="validation.html">

                                <div class="form-group font-weight-bold">
                                    Nom de l'événement :
                                    <input type="text" name="nomEvent" id="nom" class="form-control input-sm" placeholder="Nom de l'événement" required minlength="6">
                                </div>
                                <div class="form-group font-weight-bold">
                                    Adresse de l'événement : 
                                    <input type="text" name="adresse" id="adresse" class="form-control input-sm" placeholder="Adresse de l'hôte">
                                    *Format Ville-rue-numéro
                                </div>
                                <br>
                                <div class="form-group font-weight-bold">
                                    Date de l'événement : 
                                    <input type="date" name="date" id="date" class="form-control input-sm" placeholder="YYYY-MM-DD">
                                </div>
                                <input type="submit" value="Ajouter l'événement" class="btn btn-primary align-middle">
                            </form>
                        </div>
