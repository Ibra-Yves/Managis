<?php

class testInterface extends PHPUnit_Extensions_Selenium2TestCase
{
    protected function setUp(){
      //  $this->timeouts()->implicitWait(10000000);
        $this->setBrowser('chrome');
        $this->setBrowserUrl('http://localhost/Managis/Managis/Web/index.php');
    }

     public function testConnexion(){
        $this->url('http://localhost/Managis/Managis/Web/index.php');
         $connexion = $this->ByLinkText('Connexion');
         $connexion->click();
       //  $this->byId('formConnexion');
         $this->byId('pseudo')->value('toto');
         $this->byId('mdp')->value('ss');
         $this->ById('formConnexion')->submit();
     }

}
