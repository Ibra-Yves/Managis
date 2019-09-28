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

    public function procCall($procName, $procParams= array()){
        $params= array();
        $this->connexionBDD();
        switch($procName){
            case 'creationUser' :
            case 'connexionUser' :
                array_push($params, '?', '?');
            case 'verifEmail' :
            case 'verifPseudo' :
                array_push($params, '?');

                try {
                    $callProc = 'call '. $procName.'('.join(',', $params).')';
                    $request = $this->pdo->prepare($callProc);
                    $request->execute($procParams);
                    return $request->fetchAll();
                }
                catch (PDOException $e){
                    $e->getMessage();
                }
                break;
            default : $this->action->affichageDefaut('div', 'procedure introuvable');
        }

    }
}