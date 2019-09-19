<?php


class Db
{
    private $pdo= null;
    public function connexionBDD(){
        try {
            $this->pdo = new PDO('mysql:host= localhost; dbname=projet', 'root', '');
        }
        catch (PDOException $e){
            print_r($e);
        }
    }
    public function inscription(){
        if($_GET['mdp'] != $_GET['confirmationMdp']){

        }
    }
}