
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
                 <div class="clearfix"></div>
                 <div class="col-lg-12 text-center">
                     <div id="success"></div>
                     <button class="btn btn-primary btn-xl text-uppercase" name="form" type="submit">Créer votre événement</button>
                 </div>
             </div>
         </form>
     </div>
 </div>
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
