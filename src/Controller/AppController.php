<?php

namespace App\Controller;

use App\Entity\Offer;
use App\Repository\OfferRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /**
     * @Route("/", name="app")
     */
    public function index(OfferRepository $repo): Response
    {
        $offers = $repo->findAll();
        // dump($offers);
        // dump($offers[0]);
        // exit;
        return $this->render('app/index.html.twig', [
            'offers' => $offers,
        ]);
    }

    /**
     * @Route("/offer/{id}", name="offer")
     */
    // public function showOffer(OfferRepository $repo, Request $request, Offer $offer )
    // {
    // //    $offer = $repo->findOneBy(["id" => $request->attributes->get("id")]);
    //     return $this->render('app/offer.html.twig', [
    //         'offer' => $offer,
    //     ]);
    // }
    /**
     * @Route("/offer/{id}", name="offer")
     */
    public function showOffer(OfferRepository $repo, Request $request )
    {
       $offer = $repo->findOneBy(["id" => $request->attributes->get("id")]);
        return $this->render('app/offer.html.twig', [
            'offer' => $offer,
        ]);
    }
}
