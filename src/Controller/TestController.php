<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController {
    /**
     * @Route("/test", name="app_test")
     */
    public function index(Request $request) {

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
    public function redirection(Request $request): Response {

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
     * @Route("/hello/{age}/{nom}/{prenom}", name="hello", requirements={"nom"=#[a-z]{2,50}"})
     */
    public function hello(Request $request, int $age, $nom, $prenom = '') {
        
        echo $_ENV['APP_AUTHOR'];
        return $this->render('test/hello.html.twig', ['nom' => $nom, 'prenom' => $prenom, 'age' => $age]);
    }
}
