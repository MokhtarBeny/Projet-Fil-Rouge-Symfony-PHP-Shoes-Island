<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CheckoutController extends AbstractController
{
    #[Route('/livraison', name: 'app_livraison')]
    public function livraison(): Response
    {
        // TODO





        return $this->render('checkout/livraison.html.twig', [
            'controller_name' => 'CheckoutController',
        ]);
    }

    #[Route('/checkout', name: 'app_checkout')]
    public function index(): Response
    {
        return $this->render('checkout/checkout.html.twig', [
            'controller_name' => 'CheckoutController',
        ]);
    }
}
