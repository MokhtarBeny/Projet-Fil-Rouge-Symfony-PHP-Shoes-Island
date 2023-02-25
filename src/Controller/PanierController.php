<?php

namespace App\Controller;


use App\Entity\Produit;
use App\Entity\Commande;
use App\Entity\DetailCommande;
use App\Repository\ProduitRepository;
use App\Repository\CategorieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use DateTime;
use Sensio\Bundle\FrameworkExtraBundle\EventListener\IsGrantedListener;

class PanierController extends AbstractController
{   
    #[Route('/add/{id}', name: 'app_add')]
    public function add(SessionInterface $session, Produit $id): Response
    {
        $panier = $session->get("panier", []);

        
        $p = null;
        foreach ( $panier as $pro ) {
            if ($pro->getId() == $id->getId()) {
                $p = $pro;
            }
        }
        
        if ($p==null) {  // le produit n'existe pas dans le panier

            $id->quantite = 1;
            $panier[] = $id;
        }
        else { // Le produit existe déjà
            $p->quantite++;
        }

        $session->set("panier", $panier);

        return $this->redirect("/panier");
    }

    #[Route('/panier', name: 'app_panier')]
    public function index( ProduitRepository $produitRepository, CategorieRepository $categorieRepository, SessionInterface $session): Response
    {
        $categories = $categorieRepository->findAll();

        $panier = $session->get("panier", []); 
        
        //On fabrique les données
        $datapanier = [];
        $total = 0;
        //dd($panier);
        
        foreach($panier as $id => $produit)
            {
            // $product = $produitRepository->find($id);
            $datapanier[] = [
                "produit" => $produit,
                "quantite" => $produit->quantite
            ];
            $total += $produit->getPrix() * $produit->quantite;
            }

        return $this->render('panier/index.html.twig',  
        [
            "datapanier" => $datapanier,
            "total" => $total,
            'panier' => $panier,
            'categories' => $categories
            
        ]);
    }

    #[Route('/clear', name: 'app_clear')]
    public function clear(SessionInterface $session): Response
    {
        $session->set("panier", []);

        return $this->redirect("/panier");
    }



    #[Route('/remove/{id}', name: 'app_remove')]
    public function remove(SessionInterface $session, Produit $id): Response
    {
        $panier = $session->get("panier", []);

        
        $p = null;
        $position = 0;
        foreach ( $panier as $i => $pro ) {
            if ($pro->getId() == $id->getId()) {
                $p = $pro;
                $position = $i;
            }
        }
        
        if ($p==null) {  // le produit n'existe pas dans le panier

            
            
        }
        else {
            $p->quantite--;
            if($p->quantite == 0){
                unset($panier[$position]);
            }

        }
        // sauvegarde dans la session
        $session->set("panier", $panier);
        
        // on revient dans l'index
        return $this->redirect("/panier");
    }

    
    // #[IsGranted("ROLE_USER")]
    #[Route('/valid', name: 'app_valid')]
    public function valid(ProduitRepository $repo, SessionInterface $session, EntityManagerInterface $manager): Response
    
    
    
    {
        if (!$this->getUser()){

            return $this->redirect("/login");
        }

        $panier = $session->get("panier", []);

        $com = new Commande();
        $com->setUser($this->getUser());
        $com->setDateCommande(new DateTime());
        $com->setPaye(mt_rand(0, 1));
        $com->setMoyenReglement('paypal');
        $com->setStatutCommande('en cours');
        $manager->persist($com);

        foreach ($panier as $produit) {


            $p = $repo->find($produit->getId());
            $qte = $produit->quantite;
            $sc = new DetailCommande();
            $sc->setCommande($com);
            $sc->setProduit($p);
            $sc->setQuantite($qte);
            $manager->persist($sc);
            $manager->flush();

        }

        $session->set("panier", []);
        
        return $this->redirect("/panier");
       
    }


}
