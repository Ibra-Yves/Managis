<?php

include_once 'Actions.php';
class Db
{

    private $pdo= null; //Le PDO donc la requete vers la BDD
    private $action = null; //Action qui va reprendre la classe action


    public function __construct()
    {
        $this->action = new Actions(); //Instance de la classe actions
    }

    /**
     * La fonction permet d'effectuer une connexion vers la BDD
     */
    public function connexionBDD(){
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=projet', 'root', '');
        }
        catch (PDOException $e){
            print_r($e);
        }
    }

    /**
     * La fonction permet d'effectuer les requetes aux procèdures dans BDD
     * @param $procName nom de la procèdure
     * @param array $procParams les paramètres qu'on transmet vers la procèdure
     * @return mixed
     */
    public function procCall($procName, $procParams= array()){
        $params= array();
        switch($procName){
            case 'creationUser' :
                array_push($params, '?', '?');
            case 'verifEmail' :
            case 'verifPseudo' :
            case 'espaceMembre' :
            case 'nombreComm' :
            case 'nombreFour' :
            case 'nombreInv' :
            case 'vosEventFutur' :
            case 'vosEventPasse'    :
                array_push($params, '?');
            case 'tousLesUsers' :
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
        switch($procName){
            case 'connexionUser' :
            case 'modifMdp'  :
            case 'ajouterInvites'    :
            case 'ajouterFournitures' :
            case 'ajoutCommentaire' :
            case 'supprCommentaire' :
            case 'supprFourniture' :
            case 'supprInvites' :
            case 'vosInvitFutur' :
            case 'vosInvitPasse' :
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
            break;
        }
        switch($procName) {
            case 'creerEvent' :
            array_push($params, '?', '?', '?');
            case 'listeInvites' :
            case 'listeFourniture' :
            case 'listeCommentaire'    :
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
        }
        switch ($procName){
            case 'ajoutQuantite' :
                array_push($params, '?', '?', '?');
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
        }

    }
}