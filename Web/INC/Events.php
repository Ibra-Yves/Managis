<?php

use Couchbase\Document;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

include_once 'Db.php';
include_once 'Actions.php';
include_once 'Session.php';
include_once 'Facebook/autoload.php';
class Events
{
    private $action = null;
    private $rq = null;
    private $db = null;
    private $session = null;
    private $rqList = [ //Liste des requetes qu'on peut effectuer sur le serveur
        'validation',
        'inscription',
        'CGU',
        'connexion',
        'quiSommesNous',
        'formInscription',
        'formConnexion',
        'deconnexion',
         'acceuil',
        'espaceMembre',
        'addEvent',
        'formCreaEvent',
        'formNewMdp',
        'vosEvenements',
        'pageEventInfos',
        'formAjoutInv',
        'formFournitures',
        'mdpOublie',
        'formMdpOublie',
        'commentaire',
        'formQuantite',
        'afficheInv',
        'afficheFour',
        'afficheComm',
        'fbCallback',
        'historiqueEvents'
    ];

    public function __construct()
    {
        $this->action = new Actions(); //Instance de la classe d'action
        $this->session = new Session(); //Instance de la classe de la session
        $this->db = new Db(); //Instance de la classe db
        if(isset($_GET['rq'])) $this->rq = $_GET['rq'];
        $this->gestionRequetes($this->rq);
    }

    /**
     * Accessseur qui va servir dans index.php
     * Contient la requête passé au serveur
     *    @return null
     */

    public function getRq()
    {
        return $this->rq;
    }

    /**
     * Fonction qui verifie si la requete passée est dans le tableau des requetes
     * @param $rq requete effectue
     * @return bool
     */
    public function reqValid($rq){
        if(in_array($rq, $this->rqList)) return true;
        return false;
    }

    /**
     * Envoie les données vers le send d'action
     */
    public function send(){
        $this->action->send();
    }

    /**
     * Lecture des fichiers se trouvant dans le INC
     * @param $nomForm nom du formulaire ou la page passe
     * @return string le fichier
     */
    public function lectureForm($nomForm){
        $nomFichier = 'INC/'.$nomForm.'.php';
        return implode("\n", file($nomFichier));
    }

    /**
     * Renvoie la page qui sommes nous
     */
    private function quiSommesNous(){
        $this->action->affichageDefaut('#intro', $this->lectureForm('quiSommesNous'));
    }

    /**
     * Renvoie la page d'inscription
     */
    private function inscription(){
        $fb = new Facebook\Facebook([
            'app_id' => '730903687321089',
            'app_secret' => '0fdb5fe6b65924b62fb3c40e91480227',
            'default_graph_version' => 'v2.10'
        ]);
        $helper = $fb->getRedirectLoginHelper();
        $redirectURL = "http://localhost/Managis/Web/fbCallback";
        $permission = ['email'];
        $loginURL = $helper->getLoginUrl($redirectURL, $permission);
        $this->action->affichageDefaut('#intro', $this->lectureForm('inscription'));
        //$this->action->affichageDefaut('#intro', $_SESSION['facebook']['url']);
    }

    private function fbCallback(){
        $fb = new Facebook\Facebook([
            'app_id' => '730903687321089',
            'app_secret' => '0fdb5fe6b65924b62fb3c40e91480227',
            'default_graph_version' => 'v2.10'
        ]);
        $helper = $fb->getRedirectLoginHelper();
        try {
            $accessToken = $helper->getAccessToken();
        }
        catch(FacebookResponseException $e){
            $this->action->affichageDefaut('#intro', $e->getMessage());
            exit();
        }
        catch(FacebookSDKException $e) {
            $this->action->affichageDefaut('#intro', $e->getMessage());
            exit();
        }
        if(!$accessToken){
            $this->action->affichageDefaut('#intro', $this->lectureForm('inscription'));
        }
        $oAuth2Client = $fb->getOAuth2Client();
        if(!$accessToken->isLongLived()) $oAuth2Client->getLongLivedAccessToken();

        $response = $fb->get("/me?fields=first_name,email", $accessToken);
        $userData = $response->getGraphNode()->asArray();
        $this->action->affichageDefaut('#intro', $userData);
    }
    /**
     * Rnvoie la page des conditions generales
     */
    private function CGU(){
        $this->action->affichageDefaut('#intro', $this->lectureForm('CGU'));
    }

    /**
     * La sous requete qui est la validation de chaque formulaire
     */
    private function validation(){
        $sRequest= '';
        if(isset($_POST['envoiForm'])) $sRequest = $_POST['envoiForm']; //Recupere le nm du formulaire
        $this->gestionRequetes($sRequest); //On renvoie vers la fonction qui gère les requetes
    }

    /**
     * Gestion de l'inscription au moment de validation du formulaire
     */
    private function formInscription(){
        $idUser = $this->db->procCall('verifPseudo', [$_POST['pseudo']]); //On appelle la procèdure qui va verifier le pseudo
        $idMail = $this->db->procCall('verifEmail', [$_POST['email']]); //On appelle la procèdure qui va verifier le mail

        //Captcha
        $reponse = [];
        $clePriv = "6Ldy2r0UAAAAAFaQRBM9ungieu74xM2W2fnYOFcj";
        $rep = $_POST['g-recaptcha-response'];
        $remoteIp = $_SERVER['REMOTE_ADDR'];

        $api_url = "https://www.google.com/recaptcha/api/siteverify?secret="
            . $clePriv
            . "&response=" . $rep
            . "&remoteip=" . $remoteIp;

        $decode = json_decode(file_get_contents($api_url, true));
        foreach ($decode as $key => $value){
            $reponse [] = $value;
        }

        //Verification si le user existe deja au moment de la verification
        if($idUser || $idMail){
            $this->action->affichageDefaut('#intro', $this->lectureForm('inscription'));
            $this->action->ajouterAction( 'errorUser','Le pseudo ou le mail est déjà utilisé');//On renvoie vers la balise error user avec le texte a afficher
           // $this->action->affichageDefaut('#intro', $this->lectureForm('inscription'));
        }

        else if($reponse[0] == false){
            $this->action->ajouterAction('errorUser', 'Veuillez valider le reCAPTCHA');
        }

        //On verifie si les deux champs de mot de passe existe
        else if($_POST['mdp'] != $_POST['confirmationMdp']){
            $this->action->affichageDefaut('#intro', $this->lectureForm('inscription'));
            $this->action->ajouterAction( 'errorPass','Les deux mots de passes ne correspondent pas');
        }


        //Sinon on peut effectuer l'inscription
        else {
            $this->db->procCall('creationUser', [$_POST['pseudo'], $_POST['email'], hash('md5', $_POST['mdp'])]); //On crée le user avec les champs recupères
            $idUser = $this->db->procCall('connexionUser', [$_POST['pseudo'], hash('md5', $_POST['mdp'])]); //On effectue la connexion de user pour qu'il soit deja connecte au moment de l'inscriptioin
            //On memorise les valeurs recuperés de la procèdure dans la superglobale
            $_SESSION['user']= $idUser[0];
            $_SESSION['user']['pseudo'] = $idUser[0]['pseudo'];
            $_SESSION['user']['idUser'] = $idUser[0]['idUser'];
            if($idUser){
                $datas = [
                    'pseudo' =>  $_SESSION['user']['pseudo']
                ];
                $this->action->ajouterAction( 'connexion', $datas);
            }
        }
    }

    /**
     * On renvoie le formulaire de connexion
     */
    private function connexion(){
        $this->action->affichageDefaut('#intro', $this->lectureForm('connexion'));
    }

    /**
     * Gestion de la connexion
     */
    private function formConnexion(){
       $user = $this->db->procCall('connexionUser', [$_POST['pseudo'], hash('md5', $_POST['mdp'])]); //Porcedure qui permet de se connecter appellé

       //Si la procèdure renvoie quelque chose
       if($user){
           //On memorise les données retournés dans la superglobale
           $_SESSION['user'] = $user[0];
           $_SESSION['user']['idUser'] = $user[0]['idUser'];
           $_SESSION['user']['pseudo'] = $user[0]['pseudo'];
           $datas = [
               'pseudo' =>  $_SESSION['user']['pseudo']
           ];
           $this->action->ajouterAction( 'connexion', $datas); //On envoie vers le JS le données du user
       }
       //Sinon on renvoie ceci à l'utilisateur
       else {
           $this->action->ajouterAction( 'errorUser',"Utilisateur ou mot de passe incorrect");
       }
    }

    /**
     * Gestion de la deonnexion
     */
    private function deconnexion(){
        //On vide les superglobales pour eviter d'avoir des erreurs
        $_SESSION['user'] = [];
        $_SESSION['idEvent'] = [];
        $this->action->ajouterAction('deconnexion', '');
    }

    /**
     * Renvoie le formulaire d'ajout de l'evenement
     */
    private function addEvent(){
       $this->action->affichageDefaut('#intro', $this->lectureForm('addEvent'));
    }

    /**
     * Creation de l'evenement
     */
    private function formCreaEvent(){
        $this->db->procCall('creerEvent', [$_POST['nomEvent'], $_SESSION['user']['pseudo'], $_POST['adresse'], $_POST['date']]);//Appel de la procèdure qui va servir de creation de l'evenement
        $this->action->ajouterAction('creerEvent', 'Votre soiree a été ajouté avec success');
        $this->vosEvenements(); //On appelle directement vos evenements

    }

    /**
     * Espace membre pour l'utilisateur
     */
    private function espaceMembre(){
            $this->action->affichageDefaut('#intro', $this->lectureForm('gestionCompte')); //On affiche la page de gestion de compte
           $infoMembre=  $this->db->procCall('espaceMembre', [$_SESSION['user']['pseudo']]); //On appelle la procedure qui affiche les donnes du client
           $this->action->ajouterAction('espaceMembre', $infoMembre); //On affiche au niveau de l'utilisateur les infos
    }

    /**
     * Changement du mot de passe
     */
    private function formNewMdp(){
        $verifMdp = $this->db->procCall('connexionUser', [$_SESSION['user']['pseudo'], hash('md5', $_POST['ancienMDP'])]); //On verifier si l'ancien mot de passe mis est bien celui la
        if($_POST['newMDP'] !=$_POST['confirmationMdp'] || !$verifMdp){ //Verification des donnes transmis dans le formulaire
            $this->action->ajouterAction('errorPass', 'L un des mot de passe de correspond pas');
        }
        //On change de mot de passe pour l'utilisatur
        else {
            $this->db->procCall('modifMdp', [$_SESSION['user']['pseudo'], hash('md5', $_POST['newMDP'])]);
            $this->action->affichageDefaut('#intro', $this->lectureForm('gestionCompte'));
            $infoMembre=  $this->db->procCall('espaceMembre', [$_SESSION['user']['pseudo']]); //On appelle la procedure qui affiche les donnes du client
            $this->action->ajouterAction('espaceMembre', $infoMembre); //On affiche au niveau de l'utilisateur les infos
            $this->action->ajouterAction('modifMdp', 'Votre mot de passe a été changé avec success');
        }
    }

    /**
     * Renvoie la page de l'evenement
     */
    private function vosEvenements(){
        $this->action->affichageDefaut('#intro', $this->lectureForm('pageEvent'));//Charge la page

        $vosInvit =  $this->db->procCall('vosInvit', [$_SESSION['user']['idUser'],$_SESSION['user']['pseudo']]); //Appelle la procèdure juste avec les evenements ou le user a ete invite
        $vosEvent = $this->db->procCall('vosEvent', [$_SESSION['user']['pseudo']]); //Appelle la procedure juste avec les evenements du user

        $this->action->ajouterAction('vosEvent', $vosEvent);//On envois les données vers le client
        $this->action->ajouterAction('vosInvit', $vosInvit);//On envbois les données vers ke client
    }
    private function historiqueEvents(){
        $this->action->affichageDefaut('#intro', $this->lectureForm('historiqueEvents'));
    }

    /**
     * Page à propos de l'evenement qui renvoie les 3 formulaires
     * les 3 formulaires sont : la liste d'invités, liste des commentaires et la liste de fourniture
     * @param $id de l'evenement
     */
    private function pageEventInfos($id){
        //On mémorise l'id du event dans la superglobale
        $_SESSION['idEvent'] = $id;

        $this->action->affichageDefaut('#nombreInvFourComm', $this->lectureForm('infoSup'));
        $this->action->affichageDefaut('#afficheInfos', '');
        $invites= $this->db->procCall('listeInvites', [$id]); //Affichage de liste d'invites
        $nombreInv = $this->db->procCall('nombreInv', [$id]);
        $nombreComm = $this->db->procCall('nombreComm', [$id]);
        $nombreFour = $this->db->procCall('nombreFour', [$id]);

        $this->action->ajouterAction('infoEvent', [$nombreInv, $nombreFour, $nombreComm]);
    }

    private function afficheInv(){
       $afficheInv =  $this->db->procCall('listeInvites', [$_SESSION['idEvent']]);
        $tousLesUser = $this->db->procCall('tousLesUsers', ['']);
        $afficherSuppr = array_intersect([$afficheInv[0]['pseudo']], [$_SESSION['user']['pseudo']]);
       $this->action->affichageDefaut('#afficheInfos', $this->lectureForm('listeInvites'));
        $this->action->ajouterAction('listeInvites', $afficheInv);
        $this->action->ajouterAction('tousLesPseudos', $tousLesUser);
        if($afficherSuppr) $this->action->ajouterAction('afficherSuppr', '');
    }

    private function afficheFour(){
        $verifInvite = $this->db->procCall('listeInvites', [$_SESSION['idEvent']]);
        $listeFour = $this->db->procCall('listeFourniture',[$_SESSION['idEvent']]);

        $afficherSuppr = array_intersect([$verifInvite[0]['pseudo']], [$_SESSION['user']['pseudo']]);
        $this->action->affichageDefaut('#afficheInfos', $this->lectureForm('listeFourniture'));

        $this->action->ajouterAction('listeFourniture', $listeFour);
        if($afficherSuppr) $this->action->ajouterAction('afficherSuppr', '');
    }

    private function afficheComm(){
        $verifInvite = $this->db->procCall('listeInvites', [$_SESSION['idEvent']]);
        $listeComm = $this->db->procCall('listeCommentaire',[$_SESSION['idEvent']]);

        $afficherSuppr = array_intersect([$verifInvite[0]['pseudo']], [$_SESSION['user']['pseudo']]);
        $this->action->affichageDefaut('#afficheInfos', $this->lectureForm('listeCommentaire'));

        $this->action->ajouterAction('listeComm', $listeComm);
        if($afficherSuppr) $this->action->ajouterAction('afficherSuppr', '');
    }
    /**
     * Ajout de l'invite
     */
    private function formAjoutInv(){
        $user = $this->db->procCall('verifPseudo', [$_POST['pseudoInv']]);
        $verifInvite = $this->db->procCall('listeInvites', [$_SESSION['idEvent']]);

        $list =  [];

        foreach($verifInvite as $key){
            $list [] = $key['pseudo'];
        }

        //Verifie si le pseudo mis dans le formulaire existe dans la BDD
        $resultatSansEspaces = array_intersect($list, [$_POST['pseudoInv']]);
        $enleverEspaces = trim($_POST['pseudoInv']);
        $resultatAvecEspaces = array_intersect($list, [$enleverEspaces]);
        $afficherSuppr = array_intersect([$verifInvite[0]['pseudo']], [$_SESSION['user']['pseudo']]);
        //On renvoie vers le client le message d'erreur si le pseudo transmis n'existe pas
        if($_POST['pseudoInv'] == '' || !$user || $resultatSansEspaces || $resultatAvecEspaces){
            $this->action->ajouterAction('errorInv', 'Le pseudo n existe pas ou invite se trouve dans la liste');
        }

        //Sinon on rajoute l'invite et on l'affiche dans la liste
        else {
            $this->db->procCall('ajouterInvites',[$_POST['pseudoInv'], $_SESSION['idEvent']]);
            $invites= $this->db->procCall('listeInvites', [$_SESSION['idEvent']]);
            $this->action->affichageDefaut('#listeInvites', $this->lectureForm('listeInvites'));
            $this->action->ajouterAction('succInv', 'Le pseudo a été rajouté avec succes');
            $pseudos = $this->db->procCall('tousLesUsers', ['']);
            $this->action->ajouterAction('tousLesPseudos', $pseudos);
            $this->action->ajouterAction('listeInvites', $invites);
            if($afficherSuppr) $this->action->ajouterAction('afficherSuppr', '');
        }
    }

    /**
     * Formulaire des fournitures
     */
    private function formFournitures(){
        $verifFourniture= $this->db->procCall('listeFourniture', [$_SESSION['idEvent']]);
        $verifInvite = $this->db->procCall('listeInvites', [$_SESSION['idEvent']]);
        $list =  [];

        foreach($verifFourniture as $key){
            $list [] = $key['fourniture'];
        }

        //On verifie si la fourniture transmise se trouve déjà dans la BDD
        $resultatSansEspaces = array_intersect($list, [$_POST['fourniture']]);
        $enleverEspaces= trim($_POST['fourniture']);
        $resultatAvecEspaces = array_intersect($list, [$enleverEspaces]);
        $afficherSuppr = array_intersect([$verifInvite[0]['pseudo']], [$_SESSION['user']['pseudo']]); //Droits d'admin
        //On renvoie le message d'erreur au client
        if($_POST['fourniture'] == ''  || $resultatSansEspaces || $resultatAvecEspaces){
            $this->action->ajouterAction('errorUser', 'Fourniture se trouve deja dans la liste');
        }

        //Sinon on ajoute la fourniture à la liste et on la fait afficher
        else {
            $this->db->procCall('ajouterFournitures', [$_SESSION['idEvent'], $_POST['fourniture']]);
            $this->action->affichageDefaut('#fournitures', $this->lectureForm('listeFourniture'));
            $this->action->ajouterAction('modifMdp', 'La fourniture a été ajouté avec succes');
            $listeFournitures = $this->db->procCall('listeFourniture', [$_SESSION['idEvent']]);
            $listeComm = $this->db->procCall('listeCommentaire', [$_SESSION['idEvent']]);
            $this->action->ajouterAction('listeFourniture', $listeFournitures);
            $this->action->ajouterAction('listeComm', $listeComm);
            if($afficherSuppr) $this->action->ajouterAction('afficherSuppr', '');
        }
    }

    /**
     * Formulaire des quantites souhaités pour le event
     */
    private function formQuantite(){
        $listeQuantite = [];
        //On envoie les clés(nom de fourniture) et valeurs(quantite desiré) vers la BDD
        foreach ($_POST['fourniture'] as $key => $value){
            $listeQuantite['valeurs'] = $_POST['fourniture'][$key];
            $listeQuantite['cle'] = $key;
            $this->db->procCall('ajoutQuantite', [$_SESSION['idEvent'], $listeQuantite['cle'],$listeQuantite['valeurs']]);
        }

    }

    /**
     * Ajout des commentaires par rapport à l'event
     */
    private function commentaire(){
        $commentaire = $_POST['commentaire'];
        $verifInvite = $this->db->procCall('listeInvites', [$_SESSION['idEvent']]); //Droits d'admin
        $afficherSuppr = array_intersect([$verifInvite[0]['pseudo']], [$_SESSION['user']['pseudo']]);//Droits d'admin
        //Verification si le commentaires n'est pas nul
        if(empty($_POST['commentaire'])){
            $this->action->ajouterAction('errorComm', 'Le commentaire ne peut pas être nul');
        }
        //Sinon on ajoute le commentaire à la liste et on l'affiche
        else {
            $this->db->procCall('ajoutCommentaire', [$_SESSION['idEvent'], $commentaire]);
            $this->action->affichageDefaut('#fournitures', $this->lectureForm('listeFourniture'));
            $listeComm = $this->db->procCall('listeCommentaire', [$_SESSION['idEvent']]);
            $listeFournitures = $this->db->procCall('listeFourniture', [$_SESSION['idEvent']]);
            $this->action->ajouterAction('listeComm', $listeComm);
            $this->action->ajouterAction('listeFourniture', $listeFournitures);
            if($afficherSuppr) $this->action->ajouterAction('afficherSuppr', '');
        }
    }

    /**
     * Renvoie le formulaire de mot de passe oublié
     */
    private function mdpOublie(){
        $this->action->affichageDefaut('#intro', $this->lectureForm('mdpOublie'));
    }

    /**
     * On gere le formulaire de mot de passe oublié
     */
    private function formMdpOublie()
    {
        $verifPseudo = $this->db->procCall('verifPseudo', [$_POST['pseudo']]);
        $verifMail = $this->db->procCall('verifEmail', [$_POST['email']]);

        $mail = $_POST['email'];
        $pseudo = $_POST['pseudo'];

        //On verifie l'existence et du mail transmis dans le formulaire
        if (!$verifMail || !$verifPseudo || $_POST['pseudo'] = '' || $_POST['email'] = '') {
            $this->action->ajouterAction('errorUser', 'Pseudo ou mail incorrect');
        }
        //Sinon on genere le nouveau mot de passe et on le transmet par mail du user
        else {
            $this->action->ajouterAction('modifMdp', 'Votre mot de passe vous a été envoyé par mail passez à la connexion <a href="connexion.php"> Connectez vous! </a>');
            $chaineNewMdp = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $melangeChaine = str_shuffle($chaineNewMdp);
            $nouveauMdp = substr($melangeChaine, 0, 8);
            $this->db->procCall('modifMdp', [$pseudo, hash('md5', $nouveauMdp)]);
            mail($mail, 'Recuperation du mot de passe', 'Bonjour ' . $pseudo . ' voici votre nouveau mot de passe: ' . $nouveauMdp);
        }
    }

    /**
     * Suppression du commentaire
     * @param $req requete effecuté par le client
     */
    private function supprimerCommentaire($req){
        $verifInvite = $this->db->procCall('listeInvites', [$_SESSION['idEvent']]);
        $afficherSuppr = array_intersect([$verifInvite[0]['pseudo']], [$_SESSION['user']['pseudo']]);
        $requeteComm = [];

        foreach ($req as $key => $value){
            $requeteComm = $value;
        }
        //On retire le commentaire de la liste
        $this->db->procCall('supprCommentaire', [$_SESSION['idEvent'],$requeteComm]);
        $this->action->affichageDefaut('#commentaires', $this->lectureForm('listeCommentaire'));
        $listeComm = $this->db->procCall('listeCommentaire', [$_SESSION['idEvent']]);
        $this->action->ajouterAction('listeComm', $listeComm);
        if($afficherSuppr) $this->action->ajouterAction('afficherSuppr', '');

    }

    /**
     * Suppression de la fourniture
     * @param $req requete effecuté par le client
     */
    private function supprimerFourniture($req){
        $verifInvite = $this->db->procCall('listeInvites', [$_SESSION['idEvent']]);
        $afficherSuppr = array_intersect([$verifInvite[0]['pseudo']], [$_SESSION['user']['pseudo']]);
        $requeteFour = [];

        foreach ($req as $key => $value){
            $requeteFour = $value;
        }
        //On retire la fourniture de la liste
        $this->db->procCall('supprFourniture', [$_SESSION['idEvent'],$requeteFour]);
        $this->action->affichageDefaut('#fournitures', $this->lectureForm('listeFourniture'));
        $listeFourniture = $this->db->procCall('listeFourniture', [$_SESSION['idEvent']]);
        $this->action->ajouterAction('listeFourniture', $listeFourniture);
        if($afficherSuppr) $this->action->ajouterAction('afficherSuppr', '');
    }

    /**
     * Suppression de l'invite
     * @param $req requete effecuté par le client
     */
    private function supprimerInvite($req){
        $verifInvite = $this->db->procCall('listeInvites', [$_SESSION['idEvent']]);
        $tousLesUser = $this->db->procCall('tousLesUsers', ['']);
        $afficherSuppr = array_intersect([$verifInvite[0]['pseudo']], [$_SESSION['user']['pseudo']]);
        $requeteInv = [];

        foreach ($req as $key => $value){
            $requeteInv = $value;
        }
        //On enleve l'invite de la liste
        $this->db->procCall('supprInvites', [$_SESSION['idEvent'],$requeteInv]);
        $this->action->affichageDefaut('#listeInvites', $this->lectureForm('listeInvites'));
        $listeInv = $this->db->procCall('listeInvites', [$_SESSION['idEvent']]);
        $this->action->ajouterAction('listeInvites', $listeInv);
        $this->action->ajouterAction('tousLesPseudos', $tousLesUser);
        if($afficherSuppr) $this->action->ajouterAction('afficherSuppr', '');
    }

    /**
     * Gestionnaire de toutes les requetes effectués
     * @param string $rq la requete reçue
     * @return bool
     */
    private function gestionRequetes($rq= ''){
        // Verifie si la requete est valide et la transmet à la fonction convenue
        if($this->reqValid($rq)){
            $nomFonction = $rq;
            $this->$nomFonction();
        }

        //Si on se trouve dans un event on peut supprimer les commentaires ou invite ou fourniture
        if(!empty($_SESSION['idEvent'])){

            $listeComm = $this->db->procCall('listeCommentaire', [$_SESSION['idEvent']]);
            $listeFour = $this->db->procCall('listeFourniture', [$_SESSION['idEvent']]);
            $listeInv = $this->db->procCall('listeInvites', [$_SESSION['idEvent']]);

            $listeCommentaires = [];
            $listeFournitures = [];
            $listeInvites = [];

            foreach ($listeComm as $key){
                $listeCommentaires [] = $key['commentaire'];
            }

            $requeteComm = array_intersect($listeCommentaires, [$rq]);//Verification de la requete avec la liste des commentaires

            if($requeteComm){
                $this->supprimerCommentaire($requeteComm);//Si c'est correct on l'envoie vers la fonction adéquate
            }

            foreach ($listeFour as $key){
                $listeFournitures[] = $key['fourniture'];
            }
            $requeteFour = array_intersect($listeFournitures, [$rq]);//Verification de la requete avec la liste des fournitures

            if($requeteFour){
                $this->supprimerFourniture($requeteFour);//Si c'est correct on l'envoie vers la fonction adéquate
            }

            foreach ($listeInv as $key){
                $listeInvites [] = $key['pseudo'];
            }

            $requeteInv = array_intersect($listeInvites, [$rq]);//Verification de la requete avec la liste des invites

            if($requeteInv){
                $this->supprimerInvite($requeteInv);//Si c'est correct on l'envoie vers la fonction adéquate
            }

        }

        //Si la requete est un int on la renvoie vers la fonction
        if((int) $rq){
            $this->pageEventInfos($rq);
        }

        else {
            return false;
        }

    }
}