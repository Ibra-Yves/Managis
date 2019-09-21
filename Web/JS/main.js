$(function(){
    evenements();
});

function requetes(event){
    event.preventDefault();
   var request = $(this).attr('href').split('.')[0];
   var envoyerData = {
       'request' :  request
   };
   $.post('?rq=' + request, envoyerData,  gererDonnes);
}

function gererDonnes(retour){
    retour = lireJSON(retour);
  // console.log(retour[0]["Probleme JSON"]["donnes"]);
   console.log(retour);
    retour.forEach(function(action){
        $.each(action, function(actionName, actionDatas){
            switch(actionName){
                case 'affiche' :
                    $(actionDatas['dest']).html(actionDatas['content']);
                    break;
               default :
                   console.log('Action inconnue'+ actionName);
           }
       })
   })
}
function lireJSON(data){
    var decode;
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
function evenements() {
    $('a').on('click', requetes);
   // $(place + ' a:not([href^="mailto:"])').on('click', requetes);
}