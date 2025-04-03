<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Contact;
use App\Entity\Categorie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use SebastianBergmann\CodeCoverage\Report\Html\Facade;

class ContactsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $categories = [];

        $categorie = new Categorie();
        $categorie->setLibelle("Professionnel");
        $categorie->setImage("images/categories/Professionel.jpg");
        $categorie->setDescription($faker->text());
        $manager->persist($categorie);
        $categories[] = $categorie;

        $categorie = new Categorie();
        $categorie->setLibelle("Sport");
        $categorie->setImage("images/categories/Sport.jpg");
        $categorie->setDescription($faker->text());
        $manager->persist($categorie);
        $categories[] = $categorie;

        $categorie = new Categorie();
        $categorie->setLibelle("Privé");
        $categorie->setImage("images/categories/Privee.jpg");
        $categorie->setDescription($faker->text());
        $manager->persist($categorie);
        $categories[] = $categorie;

        $genres = ["male","female"];
        for ($i = 1; $i <= 100; $i++)
        {
            $sexe = mt_rand(0, 1);
            if ($sexe==0)
                {$type="men";}
            else
                {$type="women";}
            $contact = new Contact();
            $contact->setNom($faker->lastName());
            $contact->setPrenom($faker->firstName($genres[$sexe]));
            $contact->setRue($faker->streetAddress());
            $contact->setCp($faker->numberBetween(75000, 92000));
            $contact->setVille($faker->city());
            $contact->setMail($faker->email());
            $contact->setSexe($sexe);
            $contact->setCategorie($categories[mt_rand(0,2)]);
            $contact->setAvatar("https://randomuser.me/api/portraits/" .$type."/" .$i.".jpg");
            $manager->persist($contact);   
        }    
        $manager->flush();     
    }
}
