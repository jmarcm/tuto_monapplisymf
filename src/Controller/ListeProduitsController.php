<?php

namespace App\Controller;

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

        return $this->render('liste_produits/index.html.twig', [
            'listeproduits' => $listeProduits
        ]);
    }
}
