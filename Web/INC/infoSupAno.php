<?php
 function infoSoiree($idEvent)
{
    $db = new Db();
    $infoSoiree = $db->procCall('vosInvitAno', [$idEvent]);
    $tabInfoSoiree = '';
    $tabInfoSoiree .=
        '<div class="transparent">
                                     <div class="table-responsive">
                                         <table class="table table-striped">
                                             <thead>
                                             <tr>
                                                 <th style="width: 25%" scope="col" class="taillePoliceTitre">Nom de l\'événement</th>
                                                 <th style="width: 25%" scope="col" class="taillePoliceTitre">Nom de l\'hôte</th>
                                                 <th style="width: 20%" scope="col" class="taillePoliceTitre">Date de l\'événement</th>
                                                 <th style="width: 25%" scope="col" class="taillePoliceTitre">Adresse</th>
                                             </tr>
                                             </thead>
                                             <tbody id="vosEvent" align="left"><tr>';
    $tabInfoSoiree .= '<td>' . $infoSoiree[0]['nomEvent'] . '</td>' .
        '<td>' . $infoSoiree[0]['hote'] . '</td>' .
        '<td>' . $infoSoiree[0]['dateEvent'] . '</td>' .
        '<td>' . $infoSoiree[0]['adresse'] . '</td>';

    $tabInfoSoiree .= '</tr></tbody></table></div></div>';
    echo $tabInfoSoiree;
}

function listeInvites($idEvent)
{
    $db = new Db();
    $listeInvites = $db->procCall('listeInvites', [$idEvent]);
    $tabListeInv = '';
    $tabListeInv .= '<div class="col-md-6  text-center" >
        <div class="transparent mb-3" style="max-width: 110rem;">
            <div class="card-header transparent gestionDeCompteSousTitre">Listes des invités</div>
            <div class="card-body transparent">
                <div class="table-responsive" style="max-height: 250px">
                    <table class="table table-striped">
                        <thead style="position: sticky; top: 0;">
                        <tr>
                            <th style="width: 95%" scope="col" class="taillePoliceTitre">Nom de l\'invité</th>     
                        </tr>
                        </thead>
                        <tbody style="height: 10px !important; overflow: scroll;" id="invites" align="left">';
    foreach ($listeInvites as $key => $value) {
        $i = 0;
        $tabListeInv .= '<tr><td>' . $listeInvites[$key]['pseudo'] . '</td></tr>';
    }
    $tabListeInv .= '</tbody></table></div></div></div></div></div>';
    echo $tabListeInv;
}

function listeParticipant($idEvent)
{
    $db = new Db();
    $listeParticipant = $db->procCall('listeParticipant', [$idEvent]);
    $tabListePart = '';
    $tabListePart .= '<div class="row text-center">
    <div class="col-md-6  text-center" >
        <div class="transparent mb-3" style="max-width: 110rem;">
            <div class="card-header transparent gestionDeCompteSousTitre">Liste des participants</div>
            <div class="card-body transparent">
                <div class="table-responsive" style="max-height: 250px">
                    <table class="table table-striped">
                        <thead style="position: sticky; top: 0;">
                        <tr>
                            <th style="width: 95%" scope="col" class="taillePoliceTitre">Participants</th>
                        </tr>
                        </thead>
                        <tbody style="height: 10px !important; overflow: scroll;" id="participants" align="left">';
    foreach ($listeParticipant as $key => $value) {
        $tabListePart .= '<tr><td>' . $listeParticipant[$key]['pseudo'] . '</td></tr>';
    }
    $tabListePart .= '</tbody></table></div></div></div></div></div>';
    echo $tabListePart;
}
?>
