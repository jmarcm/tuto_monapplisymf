<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="app_test")
     */
    public function index(Request $request): Response
    {

        // L'objet Request est instancié automatiquement
        echo $request->query->get('info') . '<br/>';
        // return $this->render('test/index.html.twig', [
        //     'controller_name' => 'TestController',
        // ]);
        $response = new Response();
        $response->setContent('Bienvenue dans Symfony');
        $response->headers->set('Content-Type', 'text/plain');
        $response->setStatusCode(Response::HTTP_NOT_FOUND);
        $response->setCharset('ISO-8859-1');

        $response->headers->setCookie(Cookie::create('foo', 'bar'));
        return $response;
    }
}
