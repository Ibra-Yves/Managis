<?php


use PHPUnit\Framework\TestCase;

class EventsTest extends TestCase
{

    public function testReqValid()
    {
            $reqValides = [
                'validation',
                'inscription',
                'CGU'
            ];
            $rq = 'CGU';
            $this->assertContains($rq, $reqValides);
            $rq = 'blabla';
            $this->assertContains($rq, $reqValides);
    }

    public function testLectureForm()
    {
            $nomFichier = 'inscription';
            $path = 'INC/'. $nomFichier;
    }
}
