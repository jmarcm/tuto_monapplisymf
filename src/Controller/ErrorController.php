<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\ErrorHandler\Exception\FlattenException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ErrorController extends AbstractController
{
    
    public function index(): Response
    {
        return $this->render('error/index.html.twig', [
            'controller_name' => 'ErrorController',
        ]);
    }

    /**
     * @Route("/error", name="app_error")
     */
    public function show(FlattenException $exception)
    {
        $message = $exception->getMessage();

        return $this->render('error/index.html.twig', ['message' => $message]);
    }
}
