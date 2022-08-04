<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController {
    /**
     * @Route("/test", name="test", methods={"GET", "POST"})
     */
    public function index(Request $request) {
        
        return $this->render('test/test.html.twig');
    }


    /**
     * @Route("/hello/{age}/{nom}/{prenom}", name="hello")
     */
    public function hello(Request $request, int $age, $nom, $prenom = '') {
        
        return $this->render('test/hello.html.twig', ['nom' => $nom, 'prenom' => $prenom, 'age' => $age]);
    }
}
