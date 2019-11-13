<div class="panel-heading">
     <h3 class="panel-title gestionDeCompteTitre" align="center">Créez votre propre événement!</h3>
 </div>
 <div class="row centered-form" >
     <div class="col-lg-12">
         <form id="formCreaEvent" class="formCreaEvent" name="formCreaEvent" method="post" action="validation.html">
             <div class="row">
                 <div class="col-md-6">
                     <div class="form-group">
                         <input class="form-control" id="nom" name="nomEvent" type="text" placeholder="Nom de l'événement *" required="required">
                         <p class="help-block text-danger"></p>
                     </div>
                 </div>
                 <div class="col-md-6">
                     <div class="form-group">
                         <input class="form-control" id="adresse" name="adresse" type="text" placeholder="Adresse de l'hôte *" required="required">
                         *Format ville-rue-numéro
                         <p class="help-block text-danger"></p>
                     </div>
                 </div>
                 <div class="col-md-6">
                     <div class="form-group">
                         <input class="form-control" id="date" name="date" type="date" placeholder="Date de l'événement *" required="required">
                         <p class="help-block text-danger"></p>
                     </div>
                 </div>
                 <div class="col-md-6">
                     <div class="form-group">
                         <input class="form-control" id="heure" name="heure" type="time" placeholder="Heure de l'événement *" required="required">
                         <p class="help-block text-danger"></p>
                     </div>
                 </div>
                 <div class="clearfix"></div>
                 <div class="col-lg-12 text-center">
                     <div id="success"></div>
                     <button class="btn btn-primary btn-xl text-uppercase" name="form" type="submit">Créer votre événement</button>
                 </div>
             </div>
         </form>
     </div>
 </div>