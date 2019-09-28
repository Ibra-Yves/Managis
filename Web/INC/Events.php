<?php
include_once 'Db.php';
include_once 'Actions.php';
class Events
{
    private $action = null;
    private $rq = null;
    private $db = null;
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
        $this->action->affichageDefaut('#formulaire', $this->lectureForm('inscription'));
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
            $this->action->affichageDefaut( '#formulaire','<script> alert("L utilisateur existe deja")');
            //$this->action->affichageDefaut('#formulaire', $this->lectureForm('inscription'));
        }
        if($idMail){
            $this->action->affichageDefaut( '#formulaire','<script> alert("Le mail existe deja")');
           // $this->action->affichageDefaut('#formulaire', $this->lectureForm('inscription'));
        }
        if($_POST['mdp'] != $_POST['confirmationMdp']){
            $this->action->affichageDefaut( '#formulaire','<script> alert("Les deux mot de passes ne correspondent pas")');
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
        $this->action->affichageDefaut('#formulaire', $this->lectureForm('connexion'));
    }

    private function formConnexion(){
        $this->db->connexion($_POST['pseudo'], $_POST['mdp']);
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