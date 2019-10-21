<?php


use PHPUnit\Framework\TestCase;

class EventsTest extends TestCase
{
    /**
     * Test au niveau des requetes
     * Verifie si la requete demandé par le client est valide
     * On possède un tableau de requetes autorisés
     * Si la requete demande n'existe pas dans le tableau, on reste sur la meme page
     */
    public function testReqValid()
    {
            //Quelques requetes utilisés dans les events.php
            $reqValides = [
                'validation',
                'inscription',
                'CGU'
            ];
            //Exemple de la requete qui arrive cote client dans ce cas CGU
            $rq = 'CGU';
            //Verification de la requete
            $this->assertContains($rq, $reqValides);//Renvoi true

            //Requete non autorisé
            $rq = 'blabla';
            $this->assertContains($rq, $reqValides);//Renvoi false
    }

    /**
     * Renvoi le contenu des fichiers se trouvant dans INC/
     */
    public function testLectureForm()
    {
            $nomFichier = 'inscription'; //On prends le fichier se trouvant dans le INC
            $path = 'INC/' .$nomFichier.'.php'; //On le chemin vers ce fichier
          //  $renvoiFichier =implode("\n", file($path));
            $this->assertDirectoryExists($path);//Renvoi false car le fichier existe
            $this->assertDirectoryIsReadable($path);//Renvoi false car le fichier est bien readable
    }
}
