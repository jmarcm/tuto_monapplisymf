<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Produit;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

use Doctrine\ORM\EntityManagerInterface;

use App\DataFixtures\ProduitFixtures;


class AddImageProduitFixtures extends Fixture implements FixtureInterface, ContainerAwareInterface, DependentFixtureInterface
{
    private $container;
    private $em;

    function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager): void
    {
        
        // $product = new Product();
        // $manager->persist($product);

        // $em = $this->container->get('doctrine.orm.entity_manager');
        $repProduit = $this->em->getRepository(Produit::class);

        $listeProduits = $repProduit->findAll();

        foreach ($listeProduits as $monProduit) {
            var_dump($monProduit->getNom());
            switch($monProduit->getNom()) {
                case 'Imprimantes':
                    $monProduit->setLienImage("imprimante.jpg");
                    break;
                case 'Cartouches d\'encre':
                    $monProduit->setLienImage("cartouches.jpg");
                    break;
                case 'Ordinateurs':
                    $monProduit->setLienImage("ordinateur.jpg");
                    break;
                case 'Ecrans':
                    $monProduit->setLienImage("ecran.jpg");
                    break;
                case 'Claviers':
                    $monProduit->setLienImage("clavier.jpg");
                    break;
                case 'Souris':
                    $monProduit->setLienImage("souris.jpg");
                    break;
            }

            $manager->persist($monProduit);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [ProduitFixtures::class];
    }
}
