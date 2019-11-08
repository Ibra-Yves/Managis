<?php


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
    public function procCall($procName, $procParams= array())
    {
        $params = array();
        switch ($procName) {
            case 'creationUser' :
                array_push($params, '?', '?');
            case 'verifEmail' :
            case 'verifPseudo' :
                array_push($params, '?');

                try {
                    $this->connexionBDD();
                    $callProc = 'call ' . $procName . '(' . join(',', $params) . ')';
                    $request = $this->pdo->prepare($callProc);
                    $request->execute($procParams);
                    return $request->fetchAll();
                } catch (PDOException $e) {
                    $e->getMessage();
                }
                break;
            default :
                echo json_encode('Procèdure introuvable');
        }
        switch($procName){
            case 'connexionUser' :
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
            default:
                echo json_encode('Procèdure introuvable');
        }
    }
}