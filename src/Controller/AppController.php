<?php

namespace App\Controller;

use App\Entity\Offer;
use App\Repository\OfferRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /**
     * @Route("/", name="app")
     */
    public function index(OfferRepository $ripo): Response
    {
        $offers = $ripo->findAll();
        return $this->render('app/index.html.twig', [
            'offers' => $offers,
        ]);
    }

    /**
     * @Route("/offer/{id}", name="offer")
     */
    public function showOffer(Offer $offer)
    {
        return $this->render('app/offer.html.twig', [
            'offer' => $offer,
        ]);
    }
}
