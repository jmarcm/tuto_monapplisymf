<?php

namespace App\Controller;

use App\Entity\Distributeur;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Produit;
use Doctrine\Persistence\ManagerRegistry;

class ListeProduitsController extends AbstractController
{

    function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }


    /**
     * @Route("/liste", name="liste")
     */
    public function liste(ManagerRegistry $doctrine)
    {

        // On accède aux produits via le Respository
        $produitsRepository = $this->em->getRepository(Produit::class);

        $listeProduits = $produitsRepository->findAll();

        $lastProduit = $produitsRepository->getLastProduit();

        return $this->render('liste_produits/index.html.twig', [
            'listeProduits' => $listeProduits,
            'lastProduit' => $lastProduit
        ]);
    }


    /**
     * @Route("distributeurs", name="distributeurs")
     */
    public function listeDistributeurs() {

        $repDistributeurs = $this->em->getRepository(Distributeur::class);

        $distributeurs = $repDistributeurs->findAll();

        return $this->render('liste_produits/distributeurs.html.twig',
            ['distributeurs' => $distributeurs]
        );
    }
}
