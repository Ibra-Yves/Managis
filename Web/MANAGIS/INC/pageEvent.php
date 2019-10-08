<div class="container-fluid ">
    <div class="row text-center">
        <div class="col-md-12 " >
            <div class="card mb-3 transparent" style="max-width: 120rem;">
                <div class="card-header">Détails de l'événement</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col" class="taillePolice">#</th>
                                    <th scope="col" class="taillePolice">Nom de l'événement</th>
                                    <th scope="col" class="taillePolice">Nom de l'hôte</th>
                                    <th scope="col" class="taillePolice">Date de l'événement</th>
                                    <th scope="col" class="taillePolice">Adresse</th>
                                    <th scope="col" class="taillePolice">Invités</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td class="taillePolice">Soirée PHP</td>
                                    <td class="taillePolice">DOMINIK Delvigne</td>
                                    <td class="taillePolice">19/02/1996</td>
                                    <td class="taillePolice">Av du ciseau</td>
                                    <td class="taillePolice">Carine</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-md-6  text-center" >
            <div class="card mb-3 transparent" style="max-width: 60rem;">
                <div class="card-header">Fournitures nécessaires : </div>
                    <div class="card-body">
                        <h5 class="card-title">Ajouter des fournitures  !</h5>
                        <br>
                        <input type="text" id="pseudo" name="pseudo" class="form-control input-sm" placeholder="Fourniture pour l'événement">
                        <br>
                        <button type="button" id="changerMDP" class="btn btn-primary boutonEvent">Ajouter la fourniture à la liste</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 text-center" >
            <div class="card mb-3 transparent" style="max-width: 60rem;">
                <div class="card-header">Conseils : </div>
                    <div class="card-body">
                        <h5 class="card-title">Ajoutez un commentaire pour l'hôte  !</h5>
                        <br>
                        <input type="text" id="pseudo" name="pseudo" class="form-control input-sm" placeholder="Commentaire...">
                        <br>
                        <button type="button" id="changerMDP" class="btn btn-primary boutonEvent">Ajoutez</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-6 text-center" >
                <div class="card mb-3 transparent" style="max-width: 60rem;">
                    <div class="card-header">Liste fournitures</div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col" class="taillePolice">#</th>
                                        <th scope="col" class="taillePolice">Fournitures</th>
                                        <th scope="col" class="taillePolice">Ajouter 1</th>
                                        <th scope="col" class="taillePolice">Retirer 1</th>
                                        <th scope="col" class="taillePolice">Quantité</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td class="taillePolice">Vodka</td>
                                        <td><button type="button" id="apporte" class="btn btn-primary boutonEvent">+</button></td>
                                        <td><button type="button" id="retire" class="btn btn-primary boutonEvent">-</button></td>
                                        <td class="taillePolice">35</td>    
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td class="taillePolice">Doritos sel</td>
                                        <td><button type="button" id="apporte" class="btn btn-primary boutonEvent">+</button></td>
                                        <td><button type="button" id="retire" class="btn btn-primary boutonEvent">-</button></td>
                                        <td class="taillePolice">3</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 text-center">
            <div class="card mb-3 transparent" style="max-width: 60rem;">
                <div class="card-header">Liste commentaires</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col" class="taillePolice">#</th>
                                    <th scope="col" class="taillePolice">Commentaire</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td class="taillePolice">J'ai soif</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
