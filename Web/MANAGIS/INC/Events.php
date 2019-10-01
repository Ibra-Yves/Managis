<?php
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
        'formConnexion'
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
            $this->action->ajouterAction( 'wrongUser','L utilisateur existe deja');
            //$this->action->affichageDefaut('#formulaire', $this->lectureForm('inscription'));
        }
        if($idMail){
            $this->action->ajouterAction( 'wrongMail','Le mail existe deja');
           // $this->action->affichageDefaut('#formulaire', $this->lectureForm('inscription'));
        }
        if($_POST['mdp'] != $_POST['confirmationMdp']){
            $this->action->ajouterAction( 'wrongPass','Le mot de passe ne correspond pas');
            //$this->action->affichageDefaut('#formulaire', $this->lectureForm('inscription'));
        }
        if($idUser || $_POST['mdp'] != $_POST['confirmationMdp'] || $idMail){
            $this->action->affichageDefaut('#formulaire', $this->lectureForm('inscription'));
        }
        else {
            $this->db->procCall('creationUser', [$_POST['pseudo'], $_POST['email'], hash('md5', $_POST['mdp'])]);
            $this->action->affichageDefaut( '#formulaire','Vous vous bien inscrit veuillez passer à la connexion -> <a href="connexion.php"> Connexion </a>');
        }
    }

    private function connexion(){
        $this->action->affichageDefaut('#intro', $this->lectureForm('connexion'));
    }

    private function formConnexion(){
       $idUser = $this->db->procCall('connexionUser', [$_POST['pseudo'], hash('md5', $_POST['mdp'])]);
       if($idUser){
           $_SESSION['user'] = $idUser;
           $datas = [
               'email' => $idUser[0]['email'],
               'pseudo' => $idUser[0]['pseudo']
           ];
           $this->action->ajouterAction( 'connexion', $datas);
       }
       else {
           $this->action->ajouterAction( 'wrongUser',"Utilisateur ou mot de passe incorrect");
           $this->action->affichageDefaut('#formulaire', $this->lectureForm('connexion'));
       }
    }

    private function deconnexion(){
        $_SESSION['user'] = [];
        $this->action->ajouterAction('deconnexion', '');
    }

    private function acceuil(){
        $this->action->affichageDefaut('#error', '<h1> salut </h1>');
    }

    private function gestionRequetes($rq= ''){
        if($this->reqValid($rq)){
            $nomFonction = $rq;
            $this->$nomFonction();
        }
        else {
            return false;
        }
    }
}