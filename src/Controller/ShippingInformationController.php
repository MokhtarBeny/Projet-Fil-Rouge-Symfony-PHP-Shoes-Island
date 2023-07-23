<?php

namespace App\Controller;

use App\Entity\Livraison;
use App\Form\LivraisonType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ShippingInformationController extends AbstractController
{
    
    #[Route('/shipping_information', name: 'shipping_information')]
    public function index(Request $request)
    {
        $livraison = new Livraison();
        $form = $this->createForm(LivraisonType::class, $livraison);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($livraison);
            $entityManager->flush();

            // Redirect to the checkout page, or wherever you want the user to go next
            return $this->redirectToRoute('checkout');
        }

        return $this->render('shipping_information/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
