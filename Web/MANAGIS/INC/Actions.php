<?php

include_once 'Events.php';
class Actions
{
    private $donnes = [];
    public function affichageDefaut($dest, $content, $type=null ){
        if(!$dest) $dest = 'div';
        if(!$type) $type = 'php';

        $data = [
            'dest' => $dest,
            'content'=> $content,
            'type' => $type
        ];
        $this->ajouterAction('affiche', $data);
    }

    public function ajouterAction($actionName, $actionDatas){
        array_push($this->donnes, [$actionName => $actionDatas]);
    }
    public function send(){
        echo json_encode($this->donnes);
        return json_encode($this->donnes);
    }
}