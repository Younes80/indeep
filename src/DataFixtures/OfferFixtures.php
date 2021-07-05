<?php

namespace App\DataFixtures;

use App\Entity\Offer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class OfferFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies()
    {
        return [ContratFixtures::class, ContratTypeFixtures::class];
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create("fr_FR");
        for($i=0;$i<10;$i++){
            $offer = new Offer();
            $offer->setTitle($faker->jobTitle)
            ->setCompany($faker->company)
            ->setVille($faker->city)
            ->setCreatedAt($faker->dateTime())
            ->setDetail($faker->text(200));

            $contrat = $this->getReference("contrat_" . rand(0, 3));
            $offer->setContrats($contrat);

            $contratType = $this->getReference("contrat_type_" . rand(0, 1));
            $offer->setContratType($contratType);


            $manager->persist($offer);
        }

        $manager->flush();
    }
}
