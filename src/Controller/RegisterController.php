<?php

namespace App\Controller;

use App\Entity\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;


class RegisterController extends AbstractController
{

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
    /**
     * @Route("/register", name="app_register")
     */
    // public function index(): Response
    // {
    //     return $this->render('register/index.html.twig', [
    //         'controller_name' => 'RegisterController',
    //     ]);
    // }
    public function register(Request $request, UserPasswordHasherInterface $passwordHasher)
    {
        $form = $this->createFormBuilder()
            ->add('username')
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'required' => true,
                'first_options' => [
                    'label' => "Mot de passe"
                ],
                'second_options' => [
                    'label' => "Confirmation du mot de passe"
                ]
            ])
            ->add('roles', ChoiceType::class, [
                'choices' => [
                    'Utilisateur' => 'ROLE_USER',
                    'Administrateur' => 'ROLE_ADMIN',
                    'Super administrateur' => 'ROLE_SUPER_ADMIN'
                ],
                'multiple' => true
            ])
            ->add('register', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-success'
                ]
            ])
            ->getForm();

        $form->handleRequest($request);

        if ($request->isMethod('post') && $form->isValid()) {
            $data = $form->getData();

            $user = new User();

            $user->setUsername($data['username']);

            $hashedPassword = $passwordHasher->hashPassword(
                $user,
                $data['password']
            );
            $user->setPassword($hashedPassword);

            $user->setRoles($data['roles']);


            // $em = $this->em->getmanager();
            $this->em->persist($user);
            $this->em->flush();

            return $this->redirect($this->generateUrl('app_login'));
        }

        return $this->render(
            'register/index.html.twig',
            [
                'formRegister' => $form->createView()
            ]
            );
    }


}
