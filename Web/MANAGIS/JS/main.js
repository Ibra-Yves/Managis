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
                    $('main').html('');
                    evenements(dest);
                    break;
                case 'connexion' :
                    location.reload();
                    //console.log(actionDatas);
                    $('.panel-heading').replaceWith('<h3> Connexion reussie </h3>');
                    $('.panel-body').replaceWith('<h1>Bienvenue '+actionDatas['pseudo'] + '</h1>');
                    //$('[href="connexion.php"]').replaceWith('<a href="deconnexion.php">Deconnexion</a>');
                   // $('[href="inscription.php"]').replaceWith('<a href="acceuil.php">Acceuil</a>');
                    //evenements('body');
                    $('body').find('[href="inscription.php"]').html('Créer votre evenement').attr('href', 'addEvent.php');
                    $('body').find('[href="quiSommesNous.php"]').html('Espace Membre').attr('href', 'espaceMembre.php');
                    $('body').find('[href="connexion.php"]').html('deconnexion').attr('href', 'deconnexion.php');
                    $('main').html('');
                    //evenements('a');
                    break;
                case 'deconnexion' :
                    //$('body').html('Deconnexion');
                    $('[href="deconnexion.php"]').on('click', function(){
                        location.reload();
                    });
                    break;
                case 'creerEvent' :
                   /* let pseudos = [];
                    actionDatas.forEach(function(data){
                        pseudos.push(data[0]);
                    });
                    $('#invite').autocomplete({
                        source: pseudos
                    });*/
                   alert(actionDatas);
                    break;
                case 'test' :
                        console.log(actionDatas);
                    break;
                case 'espaceMembre' :
                    let content = '';
                    actionDatas.forEach(function(data){
                        content+= ' <tr>\n' +
                            '                <td class="taillePolice">'+data['pseudo'] +'</td>\n' +
                            '                    <td class="taillePolice">'+data['dateCrea']+'</td>\n' +
                            '                <td class="taillePolice">'+data['email']+'</td>\n' +
                            '                    </tr>';
                    });
                    $('main').html('');
                    $('#infoCompte').html(content);
                    break;
                case 'infoSoiree' :
                    let tableSoirees = '';
                    let i=1;
                    actionDatas.forEach(function(data){
                        tableSoirees+= ' <tr> \n' +
                            '                                    <th scope="row">'+ i++ +'</th>\n' +
                            '                                    <td class="taillePolice"><a href="'+data['idEvent']+'">'+data['nomEvent']+'</a></td>\n' +
                            '                                    <td class="taillePolice">'+data['hote']+'</td>\n' +
                            '                                    <td class="taillePolice">'+data['dateEvent']+'</td>\n' +
                            '                                    <td class="taillePolice">'+data['adresse']+'</td>\n' +
                            '                                </tr>';

                    });
                    $('#infoSoiree').html(tableSoirees);
                    $('main').html('');
                    evenements('#infoSoiree');
                    break;
                case 'listeInvites' :
                    let tableInvites= '';
                     let j=1;
                    actionDatas.forEach(function(data){
                    tableInvites+= '<tr> \n' +
                        '<th scope="row">'+ j++ +'</th>\n' +
                        '<td class="taillePolice">'+data['pseudo']+'</td>\n'
                    });
                    $('#invites').html(tableInvites);
                    evenements('#invites');
                    break;
                case 'ajoutInv' :
                    $('#intro').html(alert(actionDatas));
                    break;
                case 'tousLesPseudos' :
                    let pseudos = [];
                    actionDatas.forEach(function(data){
                        pseudos.push(data[0]);
                    });
                    $('#pseudoInv').autocomplete({
                        source: pseudos
                    });
                    break;
                case 'Probleme JSON' :
                    $('#error').html(actionDatas['donnes']);
                    break;
                case 'errorUser' :
                case 'errorMail' :
                case 'errorPass' :
                    $('#errorForm').html('<div class="alert alert-danger" role="alert">'+actionDatas);
                    break;
                case 'modifMdp' :
                    $('#errorForm').html('<div class="alert alert-success" role="alert">'+actionDatas);
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