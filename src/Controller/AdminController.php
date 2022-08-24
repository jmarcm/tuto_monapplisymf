<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
        return $this->render('admin/create.html.twig');
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
