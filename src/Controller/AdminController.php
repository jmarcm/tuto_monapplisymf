<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Form\ProduitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


/**
 * @Security("is_granted('ROLE_ADMIN') or is_granted('ROLE_SUPER_ADMIN')")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/insert", name="insert")
     */
    public function insert(Request $request)
    {

        $produit = new Produit();
        
        $formProduit = $this->createForm(ProduitType::class, $produit);

        // crée le bouton pour la soumission
        $formProduit->add('creer', SubmitType::class, ['label' => "Insertion d'un produit"]);



        if ($request->isMethod('post')) {
            return new JsonResponse($request->request->all());
        }

        return $this->render('admin/create.html.twig', ['my_form' => $formProduit->createView()]);
    }

    /**
     * @Route("/update/{id}", name="update")
     */
    public function update(Request $request, $id)
    {
        return $this->render('admin/create.html.twig');
    }

    /**
     * @Route("/delete/{id}", name="delete")
     */
    function delete(Request $request, $id)
    {
        return $this->render('admin/create.html.twig');
    }
}
