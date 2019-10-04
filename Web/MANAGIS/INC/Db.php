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
        switch($procName){
            case 'creationUser' :
                array_push($params, '?', '?');
            case 'verifEmail' :
            case 'verifPseudo' :
            case 'pseudoInvite':
                array_push($params, '?');
                try {
                    $this->connexionBDD();
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
        if($procName = 'connexionUser'){
            array_push($params, '?', '?');
            try {
                $this->connexionBDD();
                $callProc = 'call '. $procName.'('.join(',', $params).')';
                $request = $this->pdo->prepare($callProc);
                $request->execute($procParams);
                return $request->fetchAll();
            }
            catch (PDOException $e){
                $e->getMessage();
            }
        }

    }
}