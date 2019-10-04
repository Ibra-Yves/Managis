<?php


class Session
{

    public function __construct()
    {
        session_start();

        if($this->sessionStarted()){
            $_SESSION['start'] = date('YmdHis');
            $_SESSION['user'] = [];
            $_SESSION['pseudos'] = [];
        }

    }

    public function sessionStarted(){
        if(isset($_SESSION['start'])) return true;
        return false;
    }
}