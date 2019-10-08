<div class="container">
  <div id="infoCompte">
  </div>
  <div>
    <h2>Voulez-vous changer de mot de passe ?</h2>
      <form id="formNewMdp" class="formNewMdp" name="formNewMdp" method="post" action="validation.php">
          <div id="errorForm"></div>
        <input type="password" name="ancienMDP" id ="ancienMDP" placeholder="Ancien mot de passe">
        <input type="password" name="newMDP" id="newMDP" placeholder="Nouveau mot de passe">
        <input type="password" name="newMDPconfirm" id="newMDPconfirm" placeholder="Nouveau mot de passe">
        <br>
        <input type="submit" id="changerMDP" value="Changez votre mot de passe" class="btn btn-primary">
      </form>
  </div>
</div>
