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

        $session = $request->getSession();
        $auteur = $session->set('auteur', 'JMarc');
        return $this->render('test/test.html.twig');
    }


    /**
     * @Route("/hello/{age}/{nom}/{prenom}", name="hello")
     */
    public function hello(Request $request, int $age, $nom, $prenom = '') {

        return $this->render('test/hello.html.twig', [
            'nom' => $nom,
            'prenom' => $prenom,
            'age' => $age,
            'messageHtml' => '<h3>Je vais tester le filtre raw</h3>',
            'monTableau' => [
                'profession' => 'formateur',
                'spécialité' => 'Symfony'
            ]
        ]);
    }

    /**
     * @Route("/langue/{_locale}", name="langue",requirements={"_locale"="en|fr|de"})
     */
    // requirements est conseillé pour contrôler les langues autorisées dans l'application
    public function langue(Request $request)
    {
        // récupère la locale du projet
        $locale = $request->getLocale();

        return new Response("Langue parlée : $locale");
    }
}
