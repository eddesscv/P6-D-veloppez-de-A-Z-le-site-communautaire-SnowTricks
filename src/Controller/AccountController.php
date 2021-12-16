<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class AccountController extends AbstractController
{
    /**
     * @Route("/inscription", name="account_registration")
     */
    /* public function registration(Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();

        $form = $this->createForm(RegistrationType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $hash = $encoder->encodePassword($user, $user->getPassword());

            $user->setPassword($hash);

            $manager->persist($user);
            $manager->flush();

            return $this->redirectToRoute('account_login');
        }

        return $this->render('account/registration.html.twig', [
            'form' => $form->createView()
        ]);
    } */

    public function registration(Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();

        $form = $this->createForm(RegistrationType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $user->getFile();
            // Créer un nom unique pour le fichier
            $name = md5(uniqid()) . '.' . $file->guessExtension();
            // Déplace le fichier
            $path = 'uploads/img/users';
            $file->move($path, $name);
            // Donner le path et le nom au fichier dans la base de données
            $user->setImagePath($path);
            $user->setImageName($name);

            $password = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($password)
                ->setCreatedAt(new \DateTime)
                ->setActivated(false)
                ->setToken(md5(random_bytes(10)));

            $manager->persist($user);
            $manager->flush();

            $this->addFlash(
                'success',
                "Compte crée avec succès !"
            );

            return $this->redirectToRoute('account_login');
        }

        return $this->render('account/registration.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/connexion", name="account_login")
     */

    public function login()
    {
        return $this->render('account/login.html.twig');
    }

    /**
     * @Route("/deconnexion", name="account_logout")
     */

    public function logout()
    {
        return $this->render('account/logout.html.twig');
    }
}
