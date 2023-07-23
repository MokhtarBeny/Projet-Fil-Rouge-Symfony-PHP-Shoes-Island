<?php

namespace App\Controller;


use App\Entity\Produit;
use App\Entity\Categorie;
use App\Entity\SousCategorie;
use App\Repository\ProduitRepository;
use App\Repository\CategorieRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\SousCategorieRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function cat( CategorieRepository $categorieRepository): Response

    {
        $categories = $categorieRepository->findAll();
        
        return $this->render('accueil/index.html.twig', [

            "categories" => $categories  
        ]);
    }
    
    #[Route('/categorie/{categorie}', name: 'categorie')]
    public function categorie(Categorie $categorie): Response
    {       

        

        return $this->render('accueil/categorie.html.twig', [
            'categorie' => $categorie
            
        ]);
    }

    #[Route('/souscategorie/{souscategorie}', name: 'Produit')]
    public function produits(SousCategorie $souscategorie ): Response
    {       
        return $this->render('accueil/souscategorie.html.twig', [
            "produits" => $souscategorie->getProduits()            
        ]);
    }

     #[Route('/produit/{id}', name: 'produitdesc')]
    public function produit(ProduitRepository $produitRepository, int $id): Response

    {        
        return $this->render('produit/produit_desc.html.twig', [
            'produit' => $produitRepository->find($id)            
        ]);
    }
    #[Route('/apropos', name: 'apropos')]
    public function apropos(): Response
    {
        return $this->render('accueil/apropos.html.twig', [
            
        ]);
    }  
    }
