<?php
include_once 'Db.php';
include_once 'Actions.php';
class Events
{
    private $action = null;
    private $rq = null;
    private $rqList = [
        'validation',
        'inscription',
        'connexion'
    ];

    public function __construct()
    {
        $this->action = new Actions();
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

    private function validation(){
        $sRequest= '';
        if(isset($_POST['senderForm'])) $sRequest = $_POST['senderForm'];
        $this->gestionRequetes($sRequest);
    }

    private function inscription(){
        $this->action->affichageDefaut('#formulaire', $this->lectureForm('inscription'));
    }

    private function formInscription(){
        echo 'yolo';
    }

    private function connexion(){
        $this->action->affichageDefaut('#formulaire', $this->lectureForm('connexion'));
    }

    private function formConnexion(){
        echo 'yolo';
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