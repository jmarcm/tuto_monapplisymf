<?php

namespace App\DataFixtures;

use App\Entity\Produit;
use App\Entity\Distributeur;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class JoinDistributeurFixtures extends Fixture implements FixtureInterface, ContainerAwareInterface
{
    private $container;

    public function setContainer(ContainerInterface $container=null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $em = $this->container->get('doctrine.orm.entity_manager');

        $repProduit = $em->getRepository(Produit::class);


        // Les distributeurs

        $desktop = new Distributeur();
        $desktop->setNom('Desktop');

        $logitech = new Distributeur();
        $logitech->setNom('Logitech');

        $hp = new Distributeur();
        $hp->setNom('HP');

        $epson = new Distributeur();
        $epson->setNom('Epson');

        $dell = new Distributeur();
        $dell->setNom('Dell');

        $acer = new Distributeur();
        $acer->setNom('Acer');


        // les jointures

        $produit = $repProduit->findOneBy(['nom' => 'Souris']);
        $produit->addDistributeur($hp);
        $produit->addDistributeur($logitech);

        $manager->persist($produit);


        $produit = $repProduit->findOneBy(['nom' => 'Ecrans']);
        $produit->addDistributeur($hp);
        $produit->addDistributeur($dell);

        $manager->persist($produit);


        $produit = $repProduit->findOneBy(['nom' => 'Claviers']);
        $produit->addDistributeur($hp);
        $produit->addDistributeur($logitech);

        $manager->persist($produit);


        $produit = $repProduit->findOneBy(['nom' => 'Ordinateurs']);
        $produit->addDistributeur($hp);
        $produit->addDistributeur($dell);
        $produit->addDistributeur($acer);

        $manager->persist($produit);


        $produit = $repProduit->findOneBy(['nom' => 'Cartouches d\'encre']);
        $produit->addDistributeur($epson);

        $manager->persist($produit);


        $produit = $repProduit->findOneBy(['nom' => 'Imprimantes']);
        $produit->addDistributeur($hp);
        $produit->addDistributeur($epson);

        $manager->persist($produit);

        $manager->flush();

    }
}