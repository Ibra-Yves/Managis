<?php


class Session
{

    public function __construct()
    {
        session_start(); //On démarre la session pour qu'on sache utiliser la superglobale

        if($this->sessionStarted()){
            $_SESSION['start'] = date('YmdHis'); //La date du moment du commencement de la session
            $_SESSION['user']= []; //User qui est vide
            $_SESSION['idEvent'] = []; //Id de l'evenement
        }

    }

    /**
     * On démarre la session
     * @return bool
     */
    public function sessionStarted(){
        if(isset($_SESSION['start'])) return true;
        return false;
    }
}