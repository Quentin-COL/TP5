<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    #[Route('/contacts', name: 'contacts',methods : ['GET'])]
    public function ListeContacts(ContactRepository $repo)
    {
        $Contacts=$repo->findAll();
        return $this->render('contact/ListeContacts.html.twig', ['LesContacts' => $Contacts]);
    }

    #[Route('/contact/{id}', name: 'ficheContact',methods : ['GET'])]
    public function ficheContact(Contact $Contact)
    {
        return $this->render('contact/ficheContact.html.twig', ['LeContact' => $Contact]);
    }
}

