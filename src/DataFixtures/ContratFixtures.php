<?php

namespace App\DataFixtures;

use App\Entity\Contrat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ContratFixtures extends Fixture
{
    const CONTRATS = [ "CDI", "CDD", "FREELANCE", "ALTERNANT" ];
    
    public function load(ObjectManager $manager)
    {
        foreach(self::CONTRATS as $key => $value){
            $contrat = new Contrat();
            $contrat->setName($value);

            $this->addReference("contrat_$key", $contrat);

            $manager->persist($contrat);
        }

        $manager->flush();
    }
}