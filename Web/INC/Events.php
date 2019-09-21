<?php
include_once 'Db.php';
include_once 'Actions.php';
class Events
{
    private $action = null;
    private $rq = null;
    private $rqList = [
        'inscription',
        'connexion',
        'validation'
    ];

    public function __construct()
    {
        $this->action = new Actions();
        if(isset($_GET['rq'])) $this->rq = $_GET['rq'];
        if($this->reqValid($this->rq)){
            $nomFonction = $this->rq;
            $this->$nomFonction();
        }
        else {
            return false;
        }
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

    public function validation(){
        if(isset($_POST)) $this->rq = $_POST;
        $this->action->affichageDefaut('#formulaires', 'alo');
    }

    public function inscription(){
        $this->action->affichageDefaut('#formulaire', $this->lectureForm('inscription'));
    }

    public function connexion(){
        $this->action->affichageDefaut('#formulaire', $this->lectureForm('connexion'));
       // $this->validation();
    }

}