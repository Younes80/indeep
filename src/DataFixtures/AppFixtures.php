<?php

namespace App\DataFixtures;

use App\Entity\Offer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
       

        for($i=0;$i<10;$i++){
            $offer = new Offer();
            $offer->setTitle("Développeur web - React")
            ->setCompany("AFPA")
            ->setVille("Bordeaux")
            ->setContrat("CDI")
            ->setDuree("Temps plein")
            ->setCreatedAt(new \DateTime())
            ->setDetail("Jeune société de services spécialisée dans le web et l'agilité. Notre objectif : recruter des profils à fort potentiel pour en faire des experts dans leur domaine. Nous n'avons pas de commerciaux ni de service de ressources humaines : ce sont des mentors, eux-mêmes consultants qui se chargent du recrutement et de la sélection des clients, pour un niveau de qualité élevé.");

            $manager->persist($offer);
        }

        $manager->flush();
    }
}
