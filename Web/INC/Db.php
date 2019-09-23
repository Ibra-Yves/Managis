<?php

include_once 'Actions.php';
class Db
{
    private $pdo= null;
    private $action = null;

    public function __construct()
    {
        $this->action = new Actions();
    }

    public function connexionBDD(){
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=projet', 'root', '');
        }
        catch (PDOException $e){
            print_r($e);
        }
    }
    public function creationUtilisateur($pseudo, $mail, $mdp){
        $this->connexionBDD();
        $mdp = hash('md5', $mdp);
        $requete = $this->pdo->prepare('INSERT INTO users (pseudo, mail, mdp) VALUES(?, ?, ?)');
        $requete->execute(array($pseudo, $mail, $mdp));
    }
    public function verifUtilisateur($pseudo,$mail){
        $this->connexionBDD();
        $requete = $this->pdo->prepare('SELECT pseudo, mail FROM users WHERE pseudo = ? AND mail = ?');
        $requete->execute(array($pseudo, $mail));
        while($donnes = $requete->fetch()){
            $this->action->affichageDefaut('#formulaire', $donnes['mail']);
        }
    }
    public function connexion($pseudo, $mdp){
        $mdp = hash('md5', $mdp);
        $this->connexionBDD();
        $requete = $this->pdo->query('SELECT pseudo FROM users WHERE pseudo = "'.$pseudo.'" AND mdp = "'.$mdp.'"');
        while ($donnes = $requete->fetch()){
               // $this->action->affichageDefaut('#formulaire', $donnes);
           if($donnes['pseudo']){
               $this->action->affichageDefaut('#inscription', 'connexion');
           }
        }
    }
}