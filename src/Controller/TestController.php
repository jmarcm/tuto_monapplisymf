<?php

namespace App\Controller;

use phpDocumentor\Reflection\DocBlock\Tags\Var_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="app_test")
     */
    public function index(Request $request)
    {

        // session_start()
        $session = $request->getSession();
        $session->set('nom_user', 'jmarcm');
        
        $url = $this->generateUrl('redirection');
        return $this->redirect($url);
    }


    /**
     * @Route("/redirection", name="redirection")
     */
    public function redirection(Request $request): Response
    {

        // récupération de la session
        $session = $request->getSession();

        // récupération du nom de l'utilisateur
        $nom_user = $session->get('nom_user');

        return new Response("Ici redirection ; variable de session : $nom_user");
    }
}
