<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Produit;
use Doctrine\Persistence\ManagerRegistry;

class ListeProduitsController extends AbstractController
{
    /**
     * @Route("/liste", name="liste")
     */
    public function liste(ManagerRegistry $doctrine)
    {

        // On accède aux produits via le Respository
        $listeProduits = $doctrine->getRepository(Produit::class)->findAll();

        return $this->render('liste_produits/index.html.twig', [
            'listeproduits' => $listeProduits
        ]);
    }
}
