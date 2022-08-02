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

        $session->getFlashBag()->add('info', 'Message informatif');
        $session->getFlashBag()->add('info', 'Message complément');
        
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

        // récupération des flashbags
        $info = $session->getFlashBag()->get('info');
        $affiche = '';

        foreach ($info as $message) {
            $affiche .= $message . '<br/>';
        }

        return new Response("$affiche");
    }


    /**
     * @Route("/hello/{nom}/{prenom}", name="hello")
     */
    public function hello(Request $request, $nom, $prenom='')
    {
        return new Response("Salut $prenom $nom !");
    }
}
