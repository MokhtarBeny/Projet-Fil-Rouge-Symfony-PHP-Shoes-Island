<?php

namespace App\DataFixtures;

use App\Entity\Commande;
use App\Entity\DetailCommande;
use App\Entity\User;
use App\Entity\Produit;
use App\Entity\Categorie;
use App\Entity\SousCategorie;
use DateTime;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{

    private $hasher;
    public function __construct(UserPasswordHasherInterface $h) {

        $this->hasher = $h;
    }
    public function load(ObjectManager $manager): void
    {



        $u1 = new User ();
        $u1->setEmail("mokti@gmail.com");
        $u1->setRoles(["ROLE_USER"]);
        $u1->setPassword($this->hasher->hashPassword($u1, "mokti"));
        $manager->persist($u1);

        $u2 = new User ();
        $u2->setEmail("admin@gmail.com");
        $u2->setRoles(["ROLE_ADMIN"]);
        $u2->setPassword($this->hasher->hashPassword($u2, "admin"));
        $manager->persist($u2);

        $Categorie1 = new Categorie();
        $Categorie1->setCategorieNom("Homme");
        $Categorie1->setCategorieType("Type1");
        $Categorie1->setImagesrc("/imgcat1.jpg");
        $manager->persist($Categorie1);

        $Categorie2 = new Categorie();
        $Categorie2->setCategorieNom("Femme");
        $Categorie2->setCategorieType("Type2");
        $Categorie2->setImagesrc("/imgcat2.png");
        $manager->persist($Categorie2);

        $Categorie3 = new Categorie();
        $Categorie3->setCategorieNom("Enfant");
        $Categorie3->setCategorieType("Type3");
        $Categorie3->setImagesrc("/imgcat3.png");
        $manager->persist($Categorie3);


                $SousCategorie1 = new SousCategorie();
                $SousCategorie1->setSousCategorieNom("Sneakers");
                $SousCategorie1->setSousCategorieType("Street");
                $SousCategorie1->setImagesrc("imgsouscat1.jpg");
                $SousCategorie1->setCategorie($Categorie1);
                $manager->persist($SousCategorie1);

                $SousCategorie2 = new SousCategorie();
                $SousCategorie2->setSousCategorieNom("Running");
                $SousCategorie2->setSousCategorieType("Sport");
                $SousCategorie2->setImagesrc("imgsouscat2.jpg");
                $SousCategorie2->setCategorie($Categorie1);
                $manager->persist($SousCategorie2);
                
                $SousCategorie3 = new SousCategorie();
                $SousCategorie3->setSousCategorieNom("Sneakers");
                $SousCategorie3->setSousCategorieType("Street");
                $SousCategorie3->setImagesrc("imgsouscat3.jpg");
                $SousCategorie3->setCategorie($Categorie2);
                $manager->persist($SousCategorie3);

                $SousCategorie4 = new SousCategorie();
                $SousCategorie4->setSousCategorieNom("Running");
                $SousCategorie4->setSousCategorieType("Sport");
                $SousCategorie4->setImagesrc("imgsouscat4.jpg");
                $SousCategorie4->setCategorie($Categorie2);
                $manager->persist($SousCategorie4);

                $SousCategorie5 = new SousCategorie();
                $SousCategorie5->setSousCategorieNom("Sneakers");
                $SousCategorie5->setSousCategorieType("Street");
                $SousCategorie5->setImagesrc("imgsouscat5.jpg");
                $SousCategorie5->setCategorie($Categorie3);
                $manager->persist($SousCategorie5);

                $SousCategorie6 = new SousCategorie();
                $SousCategorie6->setSousCategorieNom("Running");
                $SousCategorie6->setSousCategorieType("Sport");
                $SousCategorie6->setImagesrc("imgsouscat6.jpg");
                $SousCategorie6->setCategorie($Categorie3);
                $manager->persist($SousCategorie6);

                

                    $Produit1 = new Produit();
                    $Produit1->setNom("Air Jordan1");
                    $Produit1->setStockPhysique("12");
                    $Produit1->setDescription("stylé et confort");
                    $Produit1->setImage("#1");
                    $Produit1->setActif(0);
                    $Produit1->setPrix(90);
                    $Produit1->setImgsrc("jordan1.png");
                    $Produit1->setSousCategorie($SousCategorie1);
                    $manager->persist($Produit1);

                    $Produit7 = new Produit();
                    $Produit7->setNom("Sneakers Retour sur le futur");
                    $Produit7->setStockPhysique("9");
                    $Produit7->setDescription("stylé et confort");
                    $Produit7->setImage("#1");
                    $Produit7->setActif(0);
                    $Produit7->setPrix(120);
                    $Produit7->setImgsrc("snk4.png");
                    $Produit7->setSousCategorie($SousCategorie1);
                    $manager->persist($Produit7);

                    
                    $Produit9 = new Produit();
                    $Produit9->setNom("Sneakers rouge et beige édition limité");
                    $Produit9->setStockPhysique("4");
                    $Produit9->setDescription("stylé et confort");
                    $Produit9->setImage("#1");
                    $Produit9->setActif(0);
                    $Produit9->setPrix(169);
                    $Produit9->setImgsrc("jordan8.png");
                    $Produit9->setSousCategorie($SousCategorie1);
                    $manager->persist($Produit9);

                    $Produit10 = new Produit();
                    $Produit10->setNom("Sneakers Arc-en-ciel Summer édition ");
                    $Produit10->setStockPhysique("5");
                    $Produit10->setDescription("stylé et confort");
                    $Produit10->setImage("#1");
                    $Produit10->setActif(0);
                    $Produit10->setPrix(179);
                    $Produit10->setImgsrc("jordan7.png");
                    $Produit10->setSousCategorie($SousCategorie1);
                    $manager->persist($Produit10);

                    $Produit2 = new Produit();
                    $Produit2->setNom("Oasics1");
                    $Produit2->setStockPhysique("14");
                    $Produit2->setDescription("Pour courir vite");
                    $Produit2->setImage("#2");              
                    $Produit2->setActif(0);
                    $Produit2->setPrix(60);
                    $Produit2->setImgsrc("jordan3.png");
                    $Produit2->setSousCategorie($SousCategorie2);
                    $manager->persist($Produit2);

                    $Produit8 = new Produit();
                    $Produit8->setNom("Sneakers orange pour femme");
                    $Produit8->setStockPhysique("3");
                    $Produit8->setDescription("stylé et confort");
                    $Produit8->setImage("#1");
                    $Produit8->setActif(0);
                    $Produit8->setPrix(129);
                    $Produit8->setImgsrc("jordan6.png");
                    $Produit8->setSousCategorie($SousCategorie3);
                    $manager->persist($Produit8);

                    $Produit3 = new Produit();
                    $Produit3->setNom("Air Jordan2");
                    $Produit3->setStockPhysique("10");
                    $Produit3->setDescription("stylé et confort");
                    $Produit3->setImage("#3");
                    $Produit3->setActif(0);
                    $Produit3->setPrix(100);
                    $Produit3->setImgsrc("jordan1.png");
                    $Produit3->setSousCategorie($SousCategorie3);
                    $manager->persist($Produit3);

                    $Produit4 = new Produit();
                    $Produit4->setNom("Oasics2");
                    $Produit4->setStockPhysique("8");
                    $Produit4->setDescription("Pour courir vite");
                    $Produit4->setImage("#4");
                    $Produit4->setActif(0);
                    $Produit4->setPrix(70);
                    $Produit4->setImgsrc("jordan3.png");
                    $Produit4->setSousCategorie($SousCategorie4);
                    $manager->persist($Produit4);

                

                    $Produit5 = new Produit();
                    $Produit5->setNom("Air Jordan3");
                    $Produit5->setStockPhysique("15");
                    $Produit5->setDescription("stylé et confort");
                    $Produit5->setImage("#5");
                    $Produit5->setActif(0);
                    $Produit5->setPrix(80);
                    $Produit5->setImgsrc("jordan1.png");
                    $Produit5->setSousCategorie($SousCategorie5);
                    $manager->persist($Produit5);

                    $Produit6 = new Produit();
                    $Produit6->setNom("Oasics3");
                    $Produit6->setStockPhysique("9");
                    $Produit6->setDescription("Pour courir vite");
                    $Produit6->setImage("#6");
                    $Produit6->setActif(0);
                    $Produit6->setPrix(80);
                    $Produit6->setImgsrc("jordan3.png");
                    $Produit6->setSousCategorie($SousCategorie6);
                    $manager->persist($Produit6);

                    $com1 = new Commande();
                    $com1->setUser($u1);
                    $com1->setDateCommande(new DateTime());
                    $com1->setPaye(mt_rand(0, 1));
                    $com1->setMoyenReglement('paypal');
                    $com1->setStatutCommande('en cours');
                    $manager->persist($com1);

                    $sc1 = new DetailCommande();
                    $sc1->setProduit($Produit1);
                    $sc1->setCommande($com1);
                    $sc1->setQuantite(5);
                    $manager->persist($sc1);

                    $sc2 = new DetailCommande();
                    $sc2->setProduit($Produit2);
                    $sc2->setCommande($com1);
                    $sc2->setQuantite(2);
                    $manager->persist($sc2);



      $manager->flush();
    }
}