<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/insert", name="insert")
     */
    public function insert(Request $request)
    {

        $form = $this->createFormBuilder()
            ->add('nom', TextType::class)
            ->add('date', DateType::class)
            ->add('save', SubmitType::class, ['label' => 'Insérer un produit'])
            ->getForm();

        if ($request->isMethod('post')) {
            return new JsonResponse($request->request->all());
        }

        return $this->render('admin/create.html.twig', ['my_form' => $form->createView()]);
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
