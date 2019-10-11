<div class="container">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Recupérez votre mot de passe</h3>
                </div>
                <div class="panel-body">
                    <form id="mdpOublie" name="mdpOublie" method="post" action="validation.php">
                        <div id="errorForm"></div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" id="pseudo" name="pseudo" class="form-control input-sm" placeholder="Pseudo">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Adresse Email">
                        </div>

                        <input type="submit" value="Recuperer le mot de passe" class="btn btn-primary align-middle">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

