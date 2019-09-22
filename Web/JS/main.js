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
           envoyerData.append('senderForm', this.id);
         //  console.log(envoyerData);
       break;
   }

   console.log('rq: ' +request);

   envoyerData.append('request', request);
  // console.log(envoyerData);
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
    $(place + ' a').on( 'click', requetes);
    $('#formulaire').on('submit', requetes);
   // $(place + ' a:not([href^="mailto:"])').on('click', requetes);
}