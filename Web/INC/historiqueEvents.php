<div class="container-fluid centered-form">
    <div class="panel-heading">
        <h3 class="panel-title gestionDeCompteTitre pasColler" align="center">Historique d'événements</h3>
    </div>
    <div class="row text-center">
        <div class="col-md-12">
            <div class="col mb-6" style="max-width: 110rem;">

                <div>
                    <!--Accordion wrapper-->
                    <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

                        <!-- Accordion card -->
                        <div class="transparent">

                            <!-- Card header -->
                            <div class="card-header" role="tab" id="headingOne1">
                                <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="false"
                                   aria-controls="collapseOne1">
                                    <h5 class="gestionDeCompteSousTitre">
                                        Historique de vos événements<i class="fas fa-angle-down rotate-icon"></i>
                                    </h5>
                                </a>
                            </div>

                            <!-- Card body -->
                            <div id="collapseOne1" class="collapse" role="tabpanel" aria-labelledby="headingOne1"
                                 data-parent="#accordionEx">
                                <div class="transparent">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th style="width: 5%" scope="col" class="taillePoliceTitre" >#</th>
                                                <th style="width: 25%" scope="col" class="taillePoliceTitre">Nom de l'événement</th>
                                                <th style="width: 25%" scope="col" class="taillePoliceTitre">Nom de l'hôte</th>
                                                <th style="width: 20%" scope="col" class="taillePoliceTitre">Date de l'événement</th>
                                                <th style="width: 25%" scope="col" class="taillePoliceTitre">Adresse</th>
                                            </tr>
                                            </thead>
                                            <tbody id="vosEventPasse" align="left">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- Accordion card -->

                        <!-- Accordion card -->
                        <div class="transparent ajustement-div">

                            <!-- Card header -->
                            <div class="card-header" role="tab" id="headingTwo2">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2"
                                   aria-expanded="false" aria-controls="collapseTwo2">
                                    <h5 class="gestionDeCompteSousTitre">
                                        Historique de vos invitations<i class="fas fa-angle-down rotate-icon"></i>
                                    </h5>
                                </a>
                            </div>

                            <!-- Card body -->
                            <div id="collapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2"
                                 data-parent="#accordionEx">
                                <div class="card-body transparent">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th style="width: 5%" scope="col" class="taillePoliceTitre" >#</th>
                                                <th style="width: 25%" scope="col" class="taillePoliceTitre">Nom de l'événement</th>
                                                <th style="width: 25%" scope="col" class="taillePoliceTitre">Nom de l'hôte</th>
                                                <th style="width: 20%" scope="col" class="taillePoliceTitre">Date de l'événement</th>
                                                <th style="width: 25%" scope="col" class="taillePoliceTitre">Adresse</th>
                                            </tr>
                                            </thead>
                                            <tbody id="vosInvitPasse" align="left">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- Accordion card -->
                    </div>
                </div>
            </div>
            <div class=" row col-md-6" id="nombreInvFourComm"></div>
        </div>

        <div class="col-md-12" id="afficheInfos"></div>
    </div>

