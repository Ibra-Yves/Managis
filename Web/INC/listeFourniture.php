<div class="row text-center " id="ajoutFour">
        <div class="col-md-6  text-center" >
            <div class="mb-3 transparent" style="max-width: 110rem;">
                <div class="card-header transparent gestionDeCompteSousTitre">Fournitures nécessaires : </div>
                <div class="card-body transparent">
                    <h5 class="card-title font-weight-bold">Ajouter des fournitures !</h5>
                    <form id="formFournitures" name="formFournitures" method="post" action="validation.html">
                        <div id="errorForm"></div>
                        <input type="text"  name="fourniture" class="form-control input-sm" placeholder="Fourniture pour l'événement">
                        <input type="submit" value="Ajouter la fourniture à la liste" class="btn btn-primary boutonEvent">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 text-center" >
            <div class="mb-3 transparent" style="max-width: 110rem;">
                <div class="card-header transparent gestionDeCompteSousTitre">Liste fournitures</div>
                <div class="card-body transparent">
                    <div class="table-responsive" style="max-height: 250px">
                        <form id="formQuantite" name="formQuantite" method="post" action="validation.html">
                            <table class="table table-striped">
                                <thead style="position: sticky; top: 0;">
                                <tr>
                                    <th style="width: 10%" scope="col" class="taillePoliceTitre">#</th>
                                    <th style="width: 45%" scope="col" class="taillePoliceTitre">Fournitures</th>
                                    <th style="width: 15%" scope="col" class="taillePoliceTitre">Quantité</th>
                                    <th style="width: 15%; display: none "  id="suppr" scope="col" class="taillePoliceTitre">Supprimer Fourniture</th>
                                </tr>
                                </thead>
                                <tbody id="listeFournitures" align="left">
                                </tbody>
                            </table>
                            <input type="submit" value="Validez vos quantites" class="btn btn-primary boutonEvent" id="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
