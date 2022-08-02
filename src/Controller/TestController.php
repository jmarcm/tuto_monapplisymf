<?php

namespace App\Controller;

use phpDocumentor\Reflection\DocBlock\Tags\Var_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="app_test")
     */
    public function index()
    {

        // return $this->render('test/index.html.twig', [
        //     'controller_name' => 'TestController',
        // ]);
        $response = new StreamedResponse();
        $response->setCallback(function () {
            var_dump('Hello World');
            flush();
            sleep(2);
            var_dump('Hello World');
            flush();
        });
        $response->send();
    }
}
