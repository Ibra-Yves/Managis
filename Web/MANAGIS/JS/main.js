$(function(){
    evenements();
});

function requetes(event){
    event.preventDefault();

    $.ajaxSetup({
        processData: false,
        contentType: false
    });

    let request = 'noRequest';
    let envoyerData = new FormData();

   switch (true) {
       case Boolean(this.href):
           request = $(this).attr('href').split('.')[0];
       break;

       case Boolean(this.action):
           request = $(this).attr('action').split('.')[0];
           envoyerData = new FormData(this);
           envoyerData.append('envoiForm', this.id);
           break;
   }

   console.log('rq: ' +request);

   envoyerData.append('request', request);
    $.post('?rq=' + request, envoyerData,  gererDonnes);
}

function gererDonnes(retour){
    retour = lireJSON(retour);
   console.log(retour);
    retour.forEach(function(action){
        $.each(action, function(actionName, actionDatas){
            switch(actionName){
                case 'affiche' :
                    let dest = actionDatas['dest'];
                    $(actionDatas['dest']).html(actionDatas['content']);
                    evenements(dest);
                    break;
                case 'connexion' :
                    location.reload();
                    $('.panel-heading').replaceWith('<h3> Connexion reussie </h3>');
                    $('.panel-body').replaceWith('<h1>Bienvenue '+actionDatas['pseudo'] + '</h1>');
                    //$('[href="connexion.php"]').replaceWith('<a href="deconnexion.php">Deconnexion</a>');
                   // $('[href="inscription.php"]').replaceWith('<a href="acceuil.php">Acceuil</a>');
                    //evenements('body');
                    $('body').find('[href="inscription.php"]').html('acceuil').attr('href', 'acceuil.php');
                    $('body').find('[href="quiSommesNous.php"]').html('Espace Membre').attr('href', 'espaceMembre.php');
                    $('body').find('[href="connexion.php"]').html('deconnexion').attr('href', 'deconnexion.php');
                    //evenements('a');
                    break;
                case 'deconnexion' :
                    //$('body').html('Deconnexion');
                    $('[href="deconnexion.php"]').on('click', function(){
                        location.reload();
                    });
                    break;
               /* case 'stillConnected' :
                    $('body').replaceWith('<h1> Toujours connecté </h1>');
                    break;*/
                case 'Probleme JSON' :
                    $('#error').html(actionDatas['donnes']);
                    break;
                case 'wrongUser' :
                case 'wrongMail' :
                case 'wrongPass'   :
                    $('#'+actionName).html(actionDatas);
                    break;
                default :
                   console.log('Action inconnue '+ actionName);
           }
       })
   })
}
function lireJSON(data){
    let decode;
    // var error;
    try {
        decode = JSON.parse(data);
    }
    catch (e) {
        decode = [
            {
                'Probleme JSON': {
                    'erreur' : e,
                    'donnes' : data
                }
            }
        ];

    }
    return decode;
}
function evenements(place = 'html') {
    $(place +' a').on( 'click', requetes);
    $(place +' form').on('submit', requetes);
}