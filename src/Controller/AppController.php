<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /**
     * @Route("/", name="app")
     */
    public function index(): Response
    {
        $offer_list = [
            [
                "title" => "Développeur web - React",
                "company" => "AFPA",
                "ville" => "Bordeaux",
                "contrat" => "CDI",
                "duree" => "Temps plein",
                "date" => "30/06/21",
            ],
            [
                "title" => "Concepteur développeur d'appplications",
                "company" => "Thales",
                "ville" => "Bordeaux",
                "contrat" => "Freelance",
                "duree" => "Temps plein",
                "date" => "30/06/21",
            ],
            [
                "title" => "Développeur web - Front",
                "company" => "Cdiscount",
                "ville" => "Bordeaux",
                "contrat" => "CDI",
                "duree" => "Temps plein",
                "date" => "30/06/21",
            ],
            [
                "title" => "Développeur web - FullStack",
                "company" => "ImagineCom",
                "ville" => "Bordeaux",
                "contrat" => "CDD",
                "duree" => "Temps plein",
                "date" => "30/06/21",
            ],
            [
                "title" => "Développeur web - React",
                "company" => "MacDonald",
                "ville" => "Bordeaux",
                "contrat" => "CDI",
                "duree" => "Temps plein",
                "date" => "30/06/21",
            ],
        ];
        return $this->render('app/index.html.twig', [
            'offer_list' => $offer_list,
        ]);
    }

    /**
     * @Route("/offer", name="offer")
     */
    public function showOffer()
    {
        $offer = [
            "title" => "Développeur web - React",
            "company" => "MacDonald",
            "ville" => "Bordeaux",
            "contrat" => "CDI",
            "duree" => "Temps plein",
            "date" => "30/06/21",
            "detail" => "Jeune société de services spécialisée dans le web et l'agilité.

            Notre objectif : recruter des profils à fort potentiel pour en faire des experts dans leur domaine.
            
            Nous n'avons pas de commerciaux ni de service de ressources humaines : ce sont des mentors, eux-mêmes consultants qui se chargent du recrutement et de la sélection des clients, pour un niveau de qualité élevé.
            
            Description du poste
            En tant que développeur ayant une première expérience dans les environnements ReactJS ou React Native, vous intervenez dans les équipes de nos clients, startups ou grand comptes de la région bordelaise, sur des projets web d'envergure."
        ];
        return $this->render('app/offer.html.twig', [
            'offer' => $offer,
        ]);
    }
}
