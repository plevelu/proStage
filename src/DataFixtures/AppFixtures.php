<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Formation;
use App\Entity\Entreprise;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //générateur données faker
        $faker = \Faker\Factory::create('fr_FR');
        //génération formation
          $formation = new Formation();
          $formation->setNom("IUT INFO");
          $formation->setDescription("formation technique en informatique niveau bac+2");
          $manager->persist($formation);
          $formation = new Formation();
          $formation->setNom("IUT GEEI");
          $formation->setDescription("formation technique en génie industrielle niveau bac+2");
          $manager->persist($formation);
          $formation = new Formation();
          $formation->setNom("Liscence PA");
          $formation->setDescription("formation en informatique niveau bac+3");
          $manager->persist($formation);
        //génération entreprises
          $entreprise = new Entreprise();
          $entreprise->setNom("FuturaKode");
          $entreprise->setActivite("Programmation web");
          $entreprise->setAdresse($faker->realText($maxNbChars = 15,$indexSize = 2));
          $manager->persist($entreprise);
          $entreprise = new Entreprise();
          $entreprise->setNom("Armée404");
          $entreprise->setActivite("cyber sécurité");
          $entreprise->setAdresse($faker->realText($maxNbChars = 15,$indexSize = 2));
          $manager->persist($entreprise);

        $manager->flush();
    }
}
