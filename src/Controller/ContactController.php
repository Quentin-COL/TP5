<?php

namespace App\Controller;

use App\Entity\Contact;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    #[Route('/contacts', name: 'contacts',methods : ['GET'])]
    public function ListeContacts(): Response
    {
        $manager=$this->getDoctrine()->getManager();
        $repo=$manager->getRepository(Contact::class);
        $Contacts=$repo->findAll();
        return $this->render('contact/ListeContacts.html.twig', ['LesContacts' => $Contacts]);
    }
}
