<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use App\Form\ContactFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="app_contact")
     */
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ContactFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $content = $data['name'] . ' a envoyé le message : ' . $data['message'];
            $email = (new Email())
                ->from('noreply@mysite.com')
                ->to('siteadmin@hotmail.fr')
                ->subject('Message depuis le site internet')
                ->html($content);
            $mailer->send($email);

            $this->addFlash('success', 'Votre formulaire a bien etait envoyer');
        }

        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController', 
            'form' => $form->createView(),
        ]);
    }
}
