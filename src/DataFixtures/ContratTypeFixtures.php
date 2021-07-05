<?php

namespace App\DataFixtures;

use App\Entity\ContratType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ContratTypeFixtures extends Fixture
{
    const CONTRATS_TYPE = [ "Temps plein", "Temps partiel" ];
    
    public function load(ObjectManager $manager)
    {
        foreach(self::CONTRATS_TYPE as $key => $value){
            $contratType = new ContratType();
            $contratType->setName($value);

            $this->addReference("contrat_type_$key", $contratType);

            $manager->persist($contratType);
        }

        $manager->flush();
    }
}
