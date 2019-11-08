<?php
    include_once 'Db.php';

    $db = new Db();
    $donnesAppli = file_get_contents('php://input');
    $donnesDecode = json_decode($donnesAppli, true);

    $verifPseudo = $db->procCall('verifPseudo', [$donnesDecode['pseudo']]);
    $verifMail = $db->procCall('verifEmail', [$donnesDecode['mail']]);

    if($verifPseudo || $verifMail){
        echo json_encode('Le pseudo ou le mail existe déjà');
    }

    else {
        $db->procCall('creationUser', [$donnesDecode['pseudo'], $donnesDecode['mail'], hash('md5',$donnesDecode['password'])]);
        echo json_encode("L'utilisateur a été créé avec succes");
    }