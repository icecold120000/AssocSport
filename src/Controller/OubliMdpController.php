<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OubliMdpController extends AbstractController
{
    /**
     * @Route("/oubli/mdp", name="oubli_mdp")
     */
    public function index(): Response
    {
        return $this->render('oubli_mdp/index.html.twig', [
            'controller_name' => 'OubliMdpController',
        ]);
    }

    /**
     * @Route("/oubli/mdp", name="oubli_mdp_new", methods={"GET","POST"})
     */
    public function newUser(Request $request): Response
    {
        $user = new Utilisateur();
        $form = $this->createForm(OubliMdpType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            MailerController::user;

            return $this->redirectToRoute('app_login');
        }

        return $this->render('oubli_mdp/oubli.html.twig', [
            'utilisateur' => $user,
            'form' => $form->createView(),
        ]);
    }

}
