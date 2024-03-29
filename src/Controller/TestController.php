<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

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
     * @Route("/langue/{_locale}", name="langue", requirements={"_locale"="en|fr|de"})
     */
    // requirements est conseillé pour contrôler les langues autorisées dans l'application
    public function langue(Request $request, TranslatorInterface $translator)
    {
        return $this->render('test/index.html.twig');
    }


    /**
     * @Route("/test-langue", name="test_langue")
     */
    public function test_langue(Request $request)
    {
        $request->setLocale('de');
        $locale = $request->getLocale();
        
        return new Response("Langue parlée : $locale");
    }
}
