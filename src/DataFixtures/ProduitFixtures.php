<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Data\ListeProduits;

// Pour récupérer la classe Produit
use App\Entity\Produit;

class ProduitFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        foreach (ListeProduits::$mesProduits as $monProduit) {

            // Pour instancier des entités
            $produit = new Produit();

            // Insertion des propriétés
            $produit->setNom($monProduit['nom']);
            $produit->setPrix($monProduit['prix']);
            $produit->setQuantite($monProduit['quantite']);
            $produit->setRupture($monProduit['rupture']);

            $manager->persist($produit);
        }

        $manager->flush();
    }
}
