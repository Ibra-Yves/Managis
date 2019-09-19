$(function(){
    evenements();
});

function requetes(event){
    event.preventDefault();
   var requete = $(this).attr('href').split('.')[0];
   var envoyerData = {
       'requete' :  requete
   };
   $.post('?rq='+requete, envoyerData,  gererDonnes(requete));
}
function evenements() {
    $('a').on('click', requetes);
}

function gererDonnes(retour){
  console.log(retour);
    switch (retour) {
        case 'inscription' : $('<div>').appendTo('body').load('INC/connexion.php');
        case 'connexion' :  $('<div>').appendTo('body').load('INC/inscription.php');
        break;
        default : console.log('alo');
    }

}