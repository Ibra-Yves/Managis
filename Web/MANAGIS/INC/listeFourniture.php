    <div class="row text-center">
        <div class="col-md-6 text-center">
            <div class="card mb-3 transparent" style="max-width: 110rem;">
                <div class="card-header">Liste fournitures</div>
                <div class="card-body">
                    <div class="table-responsive" style="max-height: 250px">
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
        </div>
        <div class="col-md-6  text-center">
            <div class="card mb-3 transparent" style="max-width: 110rem;">
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


