<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategorieController extends AbstractController
{
    #[Route('/categories', name: 'categories',methods : ['GET'])]
    public function ListeCategorie(CategorieRepository $Categories)
    {
        $Categories=$Categories->findAll();
        return $this->render('categorie/ListeCategorie.html.twig' , ['LesCategories' => $Categories]);
    }

    #[Route('/categorie/{id}', name: 'fichecategorie',methods : ['GET'])]
    public function FicheCategorie(Categorie $Categorie)
    {
        return $this->render('categorie/ficheCategorie.html.twig' , ['LaCategorie' => $Categorie]);
    }

    #[Route('/categories/nbContactsParCat', name: 'nbContactsParCat',methods : ['GET'])]
    public function nbContactsParCat(CategorieRepository $repo)
    {
        $data = "";
        $Categories=$repo->nbContactsParCat();
        foreach ($Categories as $ligne) 
        {$data .= "{y: " . $ligne['nbContacts'] . ", label: '" . $ligne['libelle'] . "'},";}
        $data = substr($data, 0, -1);
        return $this->render('categorie/nbContactsParCat.html.twig' , ['LesCategories' => $Categories, 'data' => $data]);
    }
}
