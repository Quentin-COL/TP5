<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Contact;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use SebastianBergmann\CodeCoverage\Report\Html\Facade;

class ContactsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $genres = ["male","femelle"];
        $faker = Factory::create('fr_FR');
        $contact = new Contact();
        $contact->setNom($faker->lastName());
        $contact->setPrenom($faker->firstName($genres[mt_rand(0, 1)]));
        $contact->setRue($faker->streetAddress());
        $contact->setCp($faker->postcode());
        $contact->setVille($faker->city());
        $contact->setAvatar($faker->imageUrl());
        $contact->setMail($faker->email());
        $contact->setSexe($faker->randomElement([0, 1]));


        $manager->flush();
    }
}
