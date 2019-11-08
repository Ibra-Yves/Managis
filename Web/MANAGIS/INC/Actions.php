<?php

include_once 'Events.php';
class Actions
{
    private $donnes = []; //Donnes reçus par la fonction event

    /** Affichage par défaut
     * @param $dest destination de la balise HTML
     * @param $content le contenu qu'on souhaite envoyer vers la balise HTML
     * @param null $type du document si c est du php ou html
     */

    public function affichageDefaut($dest, $content, $type=null ){
        if(!$dest) $dest = 'div'; //Par défaut on met le contenu dans la div
        if(!$type) $type = 'php'; //Par défaut le type est du php

        //Envoi de ces données dans un tableau de data
        $data = [
            'dest' => $dest,
            'content'=> $content,
            'type' => $type
        ];
        $this->ajouterAction('affiche', $data);
    }

    /** On envoie l'action vers le main.js qu'on stock dans le tableau $donnes
     * @param $actionName nom de l'action qu'on souhaite envoyer
     * @param $actionDatas les données qu'on souhaite envoyer
     */

    public function ajouterAction($actionName, $actionDatas){
        array_push($this->donnes, [$actionName => $actionDatas]);
    }

    /** Envoi de tous ces données dans dans un tableau encode en JSON
     * @return false|string
     */

    public function send(){
        echo json_encode($this->donnes);
        return json_encode($this->donnes);
    }
}