<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use App\Repository\CommandeRepository;
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

    #[Route('/confirmation', name: 'confirmation')]
    public function confirmation(CommandeRepository $commandeRepository): Response
    {
        $commande = $commandeRepository->findLatestOrderByUser($this->getUser());
        $detailCommandes = $commande->getDetailCommandes();
        $produits = [];
        $total = 0; // Initialiser le total à zéro

        foreach ($detailCommandes as $detailCommande) {
            $produit = $detailCommande->getProduit();
            $produits[] = $produit;

            $total += $detailCommande->getQuantite() * $produit->getPrix();
        }
        return $this->render('checkout/confirmation.html.twig', [
            'commande' => $commande,
            'produits' => $produits,
            'total' => $total,
        ]);
    }

    #[Route('/mescommandes', name: 'mescommandes')]
    public function mesCommandes(CommandeRepository $commandeRepository): Response
    {
        $commandes = $commandeRepository->findByUser($this->getUser());

        $allProduits = [];
        foreach ($commandes as $commande) {
            $detailCommandes = $commande->getDetailCommandes();
            $produits = [];
            foreach ($detailCommandes as $detailCommande) {
                $produit = $detailCommande->getProduit();
                $produits[] = $produit;
            }
            $allProduits[$commande->getId()] = $produits;
        }

        return $this->render('checkout/mescommandes.html.twig', [
            'commandes' => $commandes,
            'allProduits' => $allProduits,  // pass the products to the template
        ]);
    }
}
