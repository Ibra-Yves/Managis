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
    private $id = null;
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
        'formAjoutInv'
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
        if($idUser || $_POST['mdp'] != $_POST['confirmationMdp'] || $idMail){
           // $this->action->affichageDefaut('#intro', $this->lectureForm('inscription'));
          //  $this->action->ajouterAction( 'wrongPass','L utilisateur et le mail existe deja');
           // $this->action->ajouterAction( 'wrongPass','Mau');
        }
        else {
            $this->db->procCall('creationUser', [$_POST['pseudo'], $_POST['email'], hash('md5', $_POST['mdp'])]);
            $idUser = $this->db->procCall('connexionUser', [$_POST['pseudo'], hash('md5', $_POST['mdp'])]);
            if($idUser){
                $_SESSION['user'] = $idUser;
                $datas = [
                    'pseudo' => $idUser[0]['pseudo']
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
        $_SESSION['soiree'] = [];
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
        if($_POST['newMDP'] !=$_POST['newMDPconfirm'] || !$verifMdp){
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
        $this->action->affichageDefaut('#infoPrecises', $this->lectureForm('pageEventInfos'));
        $users= $this->db->procCall('listeInvites', [$id]);
        $pseudos = $this->db->procCall('tousLesUsers', ['']);
        $this->action->ajouterAction('listeInvites', $users);
        $this->action->ajouterAction('tousLesPseudos', $pseudos);
    }
    private function formAjoutInv(){
       // if((int) $t)
      //  $this->db->procCall('ajouterInvites',[$_POST['pseudoInv'], $id]);
       /* $this->action->ajouterAction('ajoutInv', 'Vous avez ajoute un nouveau invite');
        $this->action->affichageDefaut('#infoPrecises', $this->lectureForm('pageEventInfos'));*/
       // $this->action->ajouterAction('test', $id);
        $user = $this->db->procCall('verifPseudo', [$_POST['pseudoInv']]);
        if($_POST['pseudoInv'] == '' || !$user){
            $this->action->ajouterAction('errorUser', 'Le pseudo n existe pas');
        }
        else {
            $this->action->ajouterAction('modifMdp', 'Le pseudo a été rajouté avec succes');
        }
    }
    private function gestionRequetes($rq= ''){
        if($this->reqValid($rq)){
            $nomFonction = $rq;
            $this->$nomFonction();
        }
        if((int) $rq){
            $this->pageEventInfos($rq);
            //$this->formAjoutInv($rq);
        }
        else {
            return false;
        }
    }
}