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
    public function creationUtilisateur($pseudo, $mail, $mdp){
        $mdp = hash('md5', $mdp);
        $query = 'INSERT INTO utilisateurs (nickName, mail, mdp) VALUES('.$pseudo.','.$mail.','.$mdp.')';
        $this->pdo->query($query);
    }
}