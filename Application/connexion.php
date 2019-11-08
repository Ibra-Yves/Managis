<?php
    include_once 'Db.php';

    $db = new Db();

    $donnesAppli = file_get_contents('php://input');
    $donnesDecode = json_decode($donnesAppli, true);

    $user = $db->procCall('connexionUser', [$donnesDecode['pseudo'], hash('md5',$donnesDecode['password'])]);

    if($user){
        echo json_encode("Bienvenue ". $user[0]['pseudo']);
    }
    else{
        echo json_encode("L'utilisateur ou mot de passe incorrect");
    }