<?php

use Couchbase\Document;

include_once 'Db.php';
include_once 'Actions.php';
include_once 'Session.php';
class Events
{
    private $action = null;
    private $rq = null;
    private $db = null;
    private $session = null;
    private $rqList = [
        'validation',
        'inscription',
        'connexion',
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
        'commentaire'
        //'ajouterInv'
    ];

    public function __construct()
    {
        $this->action = new Actions();
        $this->session = new Session();
        $this->db = new Db();
        if(isset($_GET['rq'])) $this->rq = $_GET['rq'];
        $this->gestionRequetes($this->rq);
    }

    /**
     * @return null
     */
    public function getRq()
    {
        return $this->rq;
    }
    public function reqValid($rq){
        if(in_array($rq, $this->rqList)) return true;
        return false;
    }

    public function send(){
        $this->action->send();
    }
    public function lectureForm($nomForm){
        $nomFichier = 'INC/'.$nomForm.'.php';
        return implode("\n", file($nomFichier));
    }


    private function inscription(){
        $this->action->affichageDefaut('#intro', $this->lectureForm('inscription'));
    }

    private function validation(){
        $sRequest= '';
        if(isset($_POST['envoiForm'])) $sRequest = $_POST['envoiForm'];
        $this->gestionRequetes($sRequest);
    }

    private function formInscription(){
        $idUser = $this->db->procCall('verifPseudo', [$_POST['pseudo']]);
        $idMail = $this->db->procCall('verifEmail', [$_POST['email']]);
        if($idUser){
            $this->action->ajouterAction( 'errorUser','L utilisateur existe deja');
            //$this->action->affichageDefaut('#formulaire', $this->lectureForm('inscription'));
        }
        if($idMail){
            $this->action->ajouterAction( 'errorMail','Le mail existe deja');
            // $this->action->affichageDefaut('#formulaire', $this->lectureForm('inscription'));
        }
        if($_POST['mdp'] != $_POST['confirmationMdp']){
            $this->action->ajouterAction( 'errorPass','Les deux mots de passes ne correspondent pas');
            //$this->action->affichageDefaut('#formulaire', $this->lectureForm('inscription'));
        }
        else {
            $this->db->procCall('creationUser', [$_POST['pseudo'], $_POST['email'], hash('md5', $_POST['mdp'])]);
            $idUser = $this->db->procCall('connexionUser', [$_POST['pseudo'], hash('md5', $_POST['mdp'])]);
            $_SESSION['user']= $idUser[0];
            $_SESSION['user']['pseudo'] = $idUser[0]['pseudo'];
            $_SESSION['user']['idUser'] = $idUser[0]['idUser'];
            if($idUser){
                $datas = [
                    'pseudo' =>  $_SESSION['user']['pseudo']
                ];
                $this->action->ajouterAction( 'connexion', $datas);
            }
           // $this->action->affichageDefaut( '#intro','Vous vous bien inscrit veuillez passer à la connexion -> <a href="connexion.php"> Connexion </a>');
        }
    }

    private function connexion(){
        $this->action->affichageDefaut('#intro', $this->lectureForm('connexion'));
    }

    private function formConnexion(){
       $user = $this->db->procCall('connexionUser', [$_POST['pseudo'], hash('md5', $_POST['mdp'])]);
       if($user){
           $_SESSION['user'] = $user[0];
           $_SESSION['user']['idUser'] = $user[0]['idUser'];
           $_SESSION['user']['pseudo'] = $user[0]['pseudo'];
           $datas = [
               'pseudo' =>  $_SESSION['user']['pseudo']
           ];
           $this->action->ajouterAction( 'connexion', $datas);
       }
       else {
           $this->action->ajouterAction( 'errorUser',"Utilisateur ou mot de passe incorrect");
          // $this->action->affichageDefaut('#formulaire', $this->lectureForm('connexion'));
       }
    }

    private function deconnexion(){
        $_SESSION['user'] = [];
        $_SESSION['idEvent'] = [];
        $this->action->ajouterAction('deconnexion', '');
    }

    private function addEvent(){
       // $tousLesPseudos = $this->db->procCall('tousLesUsers', ['']);
       $this->action->affichageDefaut('#intro', $this->lectureForm('addEvent'));
      // $this->action->ajouterAction('creaEvent', $tousLesPseudos);
    }


    private function formCreaEvent(){
       // $this->db->procCall('creerEvent', $_POST);
        $this->db->procCall('creerEvent', [$_POST['nomEvent'], $_SESSION['user']['pseudo'], $_POST['adresse'], $_POST['date']]);
        $this->action->ajouterAction('creerEvent', 'Votre soiree a été ajouté avec success');
        $this->vosEvenements();

    }
    private function espaceMembre(){
            $this->action->affichageDefaut('#intro', $this->lectureForm('gestionCompte'));
           $infoMembre=  $this->db->procCall('espaceMembre', [$_SESSION['user']['pseudo']]);
           $this->action->ajouterAction('espaceMembre', $infoMembre);
    }

    private function formNewMdp(){
        $verifMdp = $this->db->procCall('connexionUser', [$_SESSION['user']['pseudo'], hash('md5', $_POST['ancienMDP'])]);
        if($_POST['newMDP'] !=$_POST['confirmationMdp'] || !$verifMdp){
            $this->action->ajouterAction('errorPass', 'L un des mot de passe de correspond pas');
        }
        else {
            $this->db->procCall('modifMdp', [$_SESSION['user']['pseudo'], hash('md5', $_POST['newMDP'])]);
            $this->action->ajouterAction('modifMdp', 'Votre mot de passe a été changé avec success');
        }
    }

    private function vosEvenements(){
        $this->action->affichageDefaut('#intro', $this->lectureForm('pageEvent'));
       $infoSoiree =  $this->db->procCall('infoSoirees', [$_SESSION['user']['idUser']]);
     //  $_SESSION['soiree']['idEvent'] = $infoSoiree[0]['idEvent'];
       //$this->action->ajouterAction('test', $_SESSION['soiree']);
       $this->action->ajouterAction('infoSoiree', $infoSoiree);
    }
    private function pageEventInfos($id){
       // $this->action->ajouterAction('test', $_POST);
        $_SESSION['idEvent'] = $id;
        $this->action->affichageDefaut('#listeInvites', $this->lectureForm('listeInvites'));
        $this->action->affichageDefaut('#fournitures', $this->lectureForm('listeFourniture'));
        $users= $this->db->procCall('listeInvites', [$id]);
        $pseudos = $this->db->procCall('tousLesUsers', ['']);
        $listeFournitures = $this->db->procCall('listeFourniture', [$id]);
        $listeComm = $this->db->procCall('listeCommentaire', [$id]);
        $this->action->ajouterAction('listeFourniture', $listeFournitures);
        $this->action->ajouterAction('listeInvites', $users);
        $this->action->ajouterAction('tousLesPseudos', $pseudos);
        $this->action->ajouterAction('listeComm', $listeComm);
       // return $id;
    }
    private function formAjoutInv(){
        $user = $this->db->procCall('verifPseudo', [$_POST['pseudoInv']]);
        $verifInvite = $this->db->procCall('listeInvites', [$_SESSION['idEvent']]);
        $list =  [];
        foreach($verifInvite as $key){
            $list [] = $key['pseudo'];
        }
        $resultatSansEspaces = array_intersect($list, [$_POST['pseudoInv']]);
        $enleverEspaces = trim($_POST['pseudoInv']);
        $resultatAvecEspaces = array_intersect($list, [$enleverEspaces]);
        if($_POST['pseudoInv'] == '' || !$user || $resultatSansEspaces || $resultatAvecEspaces){
            $this->action->ajouterAction('errorInv', 'Le pseudo n existe pas ou invite se trouve dans la liste');
        }
        else {
            $this->db->procCall('ajouterInvites',[$_POST['pseudoInv'], $_SESSION['idEvent']]);
            $invites= $this->db->procCall('listeInvites', [$_SESSION['idEvent']]);
            $this->action->affichageDefaut('#listeInvites', $this->lectureForm('listeInvites'));
            $this->action->ajouterAction('succInv', 'Le pseudo a été rajouté avec succes');
            $pseudos = $this->db->procCall('tousLesUsers', ['']);
            $this->action->ajouterAction('tousLesPseudos', $pseudos);
            $this->action->ajouterAction('listeInvites', $invites);
        }
    }
    private function formFournitures(){
        $verifFourniture= $this->db->procCall('listeFourniture', [$_SESSION['idEvent']]);
        $list =  [];
        foreach($verifFourniture as $key){
            $list [] = $key['fourniture'];
        }

        $resultatSansEspaces = array_intersect($list, [$_POST['fourniture']]);
        $enleverEspaces= trim($_POST['fourniture']);
        $resultatAvecEspaces = array_intersect($list, [$enleverEspaces]);
        if($_POST['fourniture'] == ''  || $resultatSansEspaces || $resultatAvecEspaces){
            $this->action->ajouterAction('errorUser', 'Fourniture se trouve deja dans la liste');
        }

        else {
            $this->db->procCall('ajouterFournitures', [$_SESSION['idEvent'], $_POST['fourniture']]);
            $this->action->affichageDefaut('#fournitures', $this->lectureForm('listeFourniture'));
            $this->action->ajouterAction('modifMdp', 'La fourniture a été ajouté avec succes');
            $listeFournitures = $this->db->procCall('listeFourniture', [$_SESSION['idEvent']]);
            $listeComm = $this->db->procCall('listeCommentaire', [$_SESSION['idEvent']]);
            $this->action->ajouterAction('listeFourniture', $listeFournitures);
            $this->action->ajouterAction('listeComm', $listeComm);
        }
    }

    private function commentaire(){
        $commentaire = $_POST['commentaire'];
        if(empty($_POST['commentaire'])){
            $this->action->ajouterAction('errorComm', 'Le commentaire ne peut pas être nul');
        }
        else {
            $this->db->procCall('ajoutCommentaire', [$_SESSION['idEvent'], $commentaire]);
            //$this->action->ajouterAction('test', $commentaire);
            $this->action->affichageDefaut('#fournitures', $this->lectureForm('listeFourniture'));
            $listeComm = $this->db->procCall('listeCommentaire', [$_SESSION['idEvent']]);
            $listeFournitures = $this->db->procCall('listeFourniture', [$_SESSION['idEvent']]);
            $this->action->ajouterAction('listeComm', $listeComm);
            $this->action->ajouterAction('listeFourniture', $listeFournitures);
        }
    }

    private function mdpOublie(){
       // $this->lectureForm('#intro', $this->lectureForm('mdpOublie'));
        $this->action->affichageDefaut('#intro', $this->lectureForm('mdpOublie'));
    }
    private function formMdpOublie()
    {
        $verifPseudo = $this->db->procCall('verifPseudo', [$_POST['pseudo']]);
        $verifMail = $this->db->procCall('verifEmail', [$_POST['email']]);
        $mail = $_POST['email'];
        $pseudo = $_POST['pseudo'];
        if (!$verifMail || !$verifPseudo || $_POST['pseudo'] = '' || $_POST['email'] = '') {
            $this->action->ajouterAction('errorUser', 'Pseudo ou mail incorrect');
        } else {
            $this->action->ajouterAction('modifMdp', 'Votre mot de passe vous a été envoyé par mail passez à la connexion');
            $chaineNewMdp = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $melangeChaine = str_shuffle($chaineNewMdp);
            $nouveauMdp = substr($melangeChaine, 0, 8);
            $this->db->procCall('modifMdp', [$pseudo, hash('md5', $nouveauMdp)]);
            mail($mail, 'Recuperation du mot de passe', 'Bonjour ' . $pseudo . ' voici votre nouveau mot de passe: ' . $nouveauMdp);
        }
    }
    private function gestionRequetes($rq= ''){
        if($this->reqValid($rq)){
            $nomFonction = $rq;
            $this->$nomFonction();
          //  array_push($this->id, $rq);
        }
        if((int) $rq){
            $this->pageEventInfos($rq);
        }
        else {
            return false;
        }
    }
}