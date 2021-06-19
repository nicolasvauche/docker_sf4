<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/contact/{email}", name="contact")
     */
    public function contact(Request $request, $email = null): Response
    {
        $editmode = false;

        if ($email) {
            $contactData = $this->getDoctrine()->getRepository(Contact::class)->findOneBy(['email' => $email]);
            if ($contactData) {
                $editmode = true;
            }
        } else {
            $contactData = new Contact();
        }

        $form = $this->createForm(ContactType::class, $contactData);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contactData = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contactData);
            $entityManager->flush();

            $this->addFlash('success', 'Votre message a été enregistré !');

            return $this->redirectToRoute('contact');
        }

        return $this->render('default/contact.html.twig', [
            'form' => $form->createView(),
            'editmode' => $editmode,
        ]);
    }
}
