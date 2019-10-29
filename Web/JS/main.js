$(function(){
    evenements();//On appelle tout le temps cette fonction pour efectuer chaque requete ou evenement
});

//On effecute les requetes
function requetes(event){
    event.preventDefault();//On reste sur la meme page

    $.ajaxSetup({
        processData: false,
        contentType: false
    });

    let request = 'noRequest';
    let envoyerData = new FormData(); //Creation du nouveau formulaire

   switch (true) {
       case Boolean(this.href): //Si la requete contient le lien on recupere toute jusqu'au .php
           request = $(this).attr('href').split('.')[0];
           break;
       case Boolean(this.action): //Si la requete contient une action on recupere le nom de l'action
           request = $(this).attr('action').split('.')[0];
           envoyerData = new FormData(this);
           envoyerData.append('envoiForm', this.id); //On appelle le formualaire envoiForm a chaque fois qu'on submit
           break;
   }


    console.log('rq: ' +request);

    envoyerData.append('request', request); //Le nom de formulaire on le remplace par le nom du vrai formulaire
    $.post('?rq=' + request, envoyerData,  gererDonnes); //Requete ajax vers le php pour lui passer les données de la requete
}

//Ce qu'on recoit du PHP
function gererDonnes(retour){
    retour = lireJSON(retour); //On lit les données envoyés par PHP qui sont encodés en JSON
   console.log(retour);
    retour.forEach(function(action){ //Double boucle pour le retour pour lire les données
        $.each(action, function(actionName, actionDatas){ //Nom de l'action passé en paramètres dans action.php ainsi que les données transmises
            switch(actionName){ //Changements sur le nom de l'action
                //Differents noms d'action
                case 'affiche' : //Affichage par défaut
                    let dest = actionDatas['dest'];
                    $(actionDatas['dest']).html(actionDatas['content']);
                    $('main').html('');
                    evenements(dest);
                    break;

                case 'connexion' : //Gestion de la connexion et remplacement des elements qu'il faut
                    location.reload();
                    $('.panel-heading').replaceWith('<h3> Connexion reussie </h3>');
                    $('.panel-body').replaceWith('<h1>Bienvenue '+actionDatas['pseudo'] + '</h1>');
                    $('body').find('[href="inscription.php"]').html('Créer votre evenement').attr('href', 'addEvent.php');
                    $('body').find('[href="quiSommesNous.php"]').html('Espace Membre').attr('href', 'espaceMembre.php');
                    $('body').find('[href="connexion.php"]').html('deconnexion').attr('href', 'deconnexion.php');
                    $('main').html('');
                    break;

                case 'deconnexion' : //Gestion de la deconnexion
                    $('[href="deconnexion.php"]').on('click', function(){
                        location.reload();
                    });
                    break;

                case 'test' :
                        console.log(actionDatas[1]);
                        let buttonPres= '<input type="button">';
                        $('#'+actionDatas[1]).html(buttonPres);
                    break;

                case 'espaceMembre' : //Espace memebre affiché
                    let content = '';
                    actionDatas.forEach(function(data){
                        content+=
                            '<tr>\n' +
                                '<td class="taillePolice">'+data['pseudo'] +'</td>\n' + //Pseudo de l'user
                                '<td class="taillePolice">'+data['dateCrea']+'</td>\n' + //Date de la création du compte
                                '<td class="taillePolice">'+data['email']+'</td>\n' + //Le mail de l'utilisateur
                            '</tr>';
                    });
                    $('main').html('');
                    $('#infoCompte').html(content); //Affichage sous un tableau
                    break;

                case 'vosEventFutur' : //Affichage des soirées futurs
                    let tableVosEvent = '';
                    let i=1;
                    actionDatas.forEach(function(data){
                        tableVosEvent+=
                            '<tr> \n' +
                                '<th scope="row">'+ i++ +'</th>\n' +
                                '<td class="taillePolice"><a href="'+data['idEvent']+'">'+data['nomEvent']+'</a></td>\n' + //Nom de l'événement
                                '<td class="taillePolice">'+data['hote']+'</td>\n' + //Hote
                                '<td class="taillePolice">'+data['dateEvent']+'</td>\n' + //Date de l'évènement
                                '<td class="taillePolice"><a href="https://maps.google.com/?q='+data['adresse']+'" target="_blank">'+data['adresse']+' </a></td>\n' + //Adresse de l'évent
                            '</tr>';

                    });
                    $('#vosEvent').html(tableVosEvent); //Affichage sous un tableau
                    $('main').html('');
                    evenements('#vosEvent');
                    break;
                case 'vosInvitFutur': //Affiche les invitation de user futurs
                    let tableVosInvit = '';
                    let b=1;
                    actionDatas.forEach(function(data){
                        tableVosInvit+=
                            '<tr> \n' +
                            '<th scope="row">'+ b++ +'</th>\n' +
                            '<td class="taillePolice"><a href="'+data['idEvent']+'">'+data['nomEvent']+'</a></td>\n' + //Nom de l'évént
                            '<td class="taillePolice">'+data['hote']+'</td>\n' + //Hote
                            '<td class="taillePolice">'+data['dateEvent']+'</td>\n' + //Date
                            '<td class="taillePolice"><a href="https://maps.google.com/?q='+data['adresse']+'" target="_blank">'+data['adresse']+'</a> </td>\n' + //Adresse
                            '</tr>';

                    });
                    $('#vosInvit').html(tableVosInvit); //Affichage sous un tableau
                    $('main').html('');
                    evenements('#vosInvit'); //On peut accèder à une page ou submit un formulaire
                    break;

                case 'vosEventPasse' : //Affichage des soirées passées
                    let tableVosEventPasse = '';
                    let c=1;
                    actionDatas.forEach(function(data){
                        tableVosEventPasse+=
                            '<tr> \n' +
                            '<th scope="row">'+ c++ +'</th>\n' +
                            '<td class="taillePolice"><a href="'+data['idEvent']+'">'+data['nomEvent']+'</a></td>\n' +
                            '<td class="taillePolice">'+data['hote']+'</td>\n' +
                            '<td class="taillePolice">'+data['dateEvent']+'</td>\n' +
                            '<td class="taillePolice"><a href="http://maps.google.com/?q='+data['adresse']+'">'+data['adresse']+'</a></td>\n' +
                            '</tr>';

                    });
                    $('#vosEventPasse').html(tableVosEventPasse); //Affichage sous un tableau
                    $('main').html('');
                    evenements('#vosEventPasse');
                    break;
                case 'vosInvitPasse': //Invitation à l'évent passé
                    let tableVosInvitPasse = '';
                    let d=1;
                    actionDatas.forEach(function(data){
                        tableVosInvitPasse+=
                            '<tr> \n' +
                            '<th scope="row">'+ d++ +'</th>\n' +
                            '<td class="taillePolice"><a href="'+data['idEvent']+'">'+data['nomEvent']+'</a></td>\n' +
                            '<td class="taillePolice">'+data['hote']+'</td>\n' +
                            '<td class="taillePolice">'+data['dateEvent']+'</td>\n' +
                            '<td class="taillePolice">'+data['adresse']+' </td>\n' +
                            '</tr>';

                    });
                    $('#vosInvitPasse').html(tableVosInvitPasse); //Affichage sous un tableau
                    $('main').html('');
                    evenements('#vosInvitPasse');
                    break;
                    //Affiche le nombre d'invites commentaires etc. pour l'event
                case 'infoEvent':
                    let tableNombre = '';
                        tableNombre =
                        '<tr>' +
                            '<td class="taillePolice"><a href="afficheInv.php">'+actionDatas[0][0]['nombreInv']+'</a></td>' +
                            '<td class="taillePolice"><a href="afficheFour.php">'+actionDatas[1][0]['nombreFour']+'</a></td>' +
                            '<td class="taillePolice"><a href="afficheComm.php">'+actionDatas[2][0]['nombreComm']+'</a></td>' +
                        '</tr>';
                    $('#infoSupp').html(tableNombre);
                    evenements('#infoSupp');
                    break;
                case 'listeInvites' : //Affichage de liste d'invités
                    let tableInvites= '';
                    let j=0;
                    let o = 0;
                    let p = 1;
                    let q = 2;
                    actionDatas.forEach(function(data){
                    tableInvites+=
                        '<tr> \n' +
                            '<th scope="row" id="'+ o++ +'">'+ j++ +'</th>\n' +
                            '<td class="taillePolice" id="'+ p++ +'">'+data['pseudo']+'</td> \n' +
                            '<td class="taillePolice"><a id="' + q++ +'" href="'+data['pseudo']+'" class="btn btn-primary boutonEvent" style="display: none">-</a></td> \n' +
                            '<td class="taillePolice" id="'+ data['pseudo'] +'"></td> \n' +
                        '</tr>';

                    });

                    $('#invites').html(tableInvites); //Affichage des invités sous le forme de tableau
                    $('#0').remove(); // On n'affiche pas lé premier invité car c'est un hote et si on le supprime faudra remodifier dans la BDD
                    $('#1').remove();
                    $('#2').remove();

                    evenements('#invites');
                    break;

                case 'ajoutInv' : //Ajout des invites
                    $('#intro').html(alert(actionDatas));
                    break;
                case 'tousLesPseudos' : //Affiche tous les pseudos
                    let pseudos = [];
                    actionDatas.forEach(function(data){
                        pseudos.push(data[0]);
                    });
                    //Lorsqu'on est sur le champ ou on met le pseudo, il y aura une proposition avec les pseudos existants par rapport à la lettre mise
                    $('#pseudoInv').autocomplete({
                        source: pseudos
                    });
                    break;

                case 'listeFourniture' : //Liste des fournitures sous forme de tableau
                    let tableFournitures ='';
                    let k=1;
                    actionDatas.forEach(function(data){
                    tableFournitures+=
                        '<tr>\n' +
                            '<th scope="row">'+ k++ +'</th>\n' +
                            '<td class="taillePolice">'+ data['fourniture']+'</td>\n' +
                            '<td class="taillePolice"><input type="number" name="fourniture['+ data['fourniture']+']" value="'+data['quantite']+'"  min="0" style="width: 40px"></td>\n' +
                            '<td class="taillePolice"><a href="'+data['fourniture']+'" class="btn btn-primary boutonEvent" style="display: none">-</a></td> \n' +
                        '</tr>';

                    });
                    $('#listeFournitures').html(tableFournitures);
                    evenements('#listeFournitures');
                    break;

                case 'listeComm' : //Liste des commentaires
                    let listeCommentaire = '';
                    let l=1;
                        actionDatas.forEach(function(data){
                            listeCommentaire+=
                                ' <tr>\n' +
                                    '<th scope="row">'+ l++ +'</th>\n' +
                                    '<td class="taillePolice">'+data['commentaire']+'</td>\n' +
                                    '<td class="taillePolice"><a href="'+data['commentaire']+'" class="btn btn-primary boutonEvent" style="display: none">-</a></td> \n' +
                                '</tr>';
                        });

                    $('#listeCommentaire').html(listeCommentaire);
                    evenements('#listeCommentaire');
                    break;

                case 'afficherSuppr' : //Affichage des liens de suppression en tant que hote
                    $('a').show();
                    $('#formInv').show();
                    $('#suppr').show();
                    break;

                    //On cache toutes les balises nécessaires qui ruisquent d'être modifié dans l'historique des events
                /*case 'hideModif' :
                    //$('a').hide();
                    $('#formInv').css('display', 'none');
                    $('#suppr').hide();
                    $('#ajoutFour').css('display', 'none');
                    $('#ajoutCom').hide();
                    $('#submit').hide();
                    $('#invites a').hide();
                    $('#listeFournitures a').hide();
                    $('#listeCommentaire a').hide();
                    break;*/
                case 'Probleme JSON' : //On affiche si il y a un problème JSON
                    $('#intro').html(actionDatas['donnes']);
                    break;
                    //Gestion des erreurs
                case 'errorUser' :
                case 'errorMail' :
                case 'errorPass' :
                    $('#errorForm').html('<div class="alert alert-danger" role="alert">'+actionDatas);
                    break;
                case 'modifMdp' :
                    $('#errorForm').html('<div class="alert alert-success" role="alert">'+actionDatas);
                    evenements('#errorForm');
                    break;
                case 'errorInv' :
                    $('#errorFormm').html('<div class="alert alert-danger" role="alert">'+actionDatas);
                    break;
                case 'succInv' :
                    $('#errorFormm').html('<div class="alert alert-success" role="alert">'+actionDatas);

                    break;

                case 'errorComm' :
                    $('#errorFormmm').html('<div class="alert alert-danger" role="alert">'+actionDatas);
                    break;

                default :
                   console.log('Action inconnue '+ actionName); //Affichage des actions inconnues
           }
       })
   })
}
function lireJSON(data){ //Decodage de JSON qui vient de action.php
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
function evenements(place = 'html') { //Gestion des evenements effecutes sur les liens et les formulaires
    $(place +' a').on( 'click', requetes);
    $(place +' form').on('submit', requetes);
}