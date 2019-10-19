 <div class="container-fluid centered-form" id="quiSommesNous">
     <div class="row text-center">
         <div class="col-md-6">
             <div class="card mb-3 transparent" style="max-width: 110rem;">
                 <div class="card-header blanc taillePoliceSection">Evenement</div>
                 <div class="card-body">
                     <!--Accordion wrapper-->
                     <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

                         <!-- Accordion card -->
                         <div class="card">

                             <!-- Card header -->
                             <div class="card-header" role="tab" id="headingOne1">
                                 <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true"
                                    aria-controls="collapseOne1">
                                     <h5 class="mb-0">
                                         Vos évenements<i class="fas fa-angle-down rotate-icon"></i>
                                     </h5>
                                 </a>
                             </div>

                             <!-- Card body -->
                             <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1"
                                  data-parent="#accordionEx">
                                 <div class="card-body">
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
                                             <tbody id="infoSoiree" align="left">
                                             </tbody>
                                         </table>
                                     </div>
                                 </div>
                             </div>

                         </div>
                         <!-- Accordion card -->

                         <!-- Accordion card -->
                         <div class="card">

                             <!-- Card header -->
                             <div class="card-header" role="tab" id="headingTwo2">
                                 <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2"
                                    aria-expanded="false" aria-controls="collapseTwo2">
                                     <h5 class="mb-0">
                                         Vos invitations<i class="fas fa-angle-down rotate-icon"></i>
                                     </h5>
                                 </a>
                             </div>

                             <!-- Card body -->
                             <div id="collapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2"
                                  data-parent="#accordionEx">
                                 <div class="card-body">
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
                                             <tbody id="infoSoiree" align="left">
                                             </tbody>
                                         </table>
                                     </div>
                                 </div>
                             </div>

                         </div>
                         <!-- Accordion card -->

                         <!-- Accordion card -->
                         <div class="card">

                         </div>
                         <!-- Accordion wrapper -->
                 </div>
             </div>
         </div>
         <div class="col-md-6" id="listeInvites"></div>
         <div class="col-md-6" id="nombreInvFourComm"></div>
     </div>

     <div id="fournitures"></div>
     <div id="commentaires"></div>
 </div>
