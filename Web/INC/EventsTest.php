<?php

use PHPUnit\Framework\TestCase;
include_once 'Events.php';
class EventsTest extends TestCase
{
    /**
     * Test au niveau des requetes
     * Verifie si la requete demandé par le client est valide
     * On possède un tableau de requetes autorisés
     * Renvoi true si la requete passé correspond à celle du tableau des requetes autorisés
     */
    public function testReqValidTrue()
    {
        $events = new Events();
        //Exemple de la requete qui arrive cote client dans ce cas CGU
        $rq = 'CGU';
        //Verification de la requete
        $this->assertTrue($events->reqValid($rq));//Renvoi true

    }

    /**
     * Test d'une requete qui n'est pas autorisé
     * Renvoi false si la requete n'est pas bonne
     */
    public function testReqValidFalse() {
        $events = new Events();
        //Requete non autorisé
        $rq = 'BLABLA';
        $this->assertFalse($events->reqValid($rq));//Renvoi true
    }

}
