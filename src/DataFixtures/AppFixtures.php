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
        for ($i=1; $i<=10; $i++)
        {
          $formation = new Formation();
          $formation->setNom($faker->realText($maxNbChars = 10,$indexSize = 2));
          $formation->setDescription($faker->realText($maxNbChars = 15,$indexSize = 2));
          $manager->persist($formation);
        }
        //génération entreprise
        for ($i=1; $i<=10; $i++)
        {
          $entreprise = new Entreprise();
          $entreprise->setNom($faker->realText($maxNbChars = 10,$indexSize = 2));
          $entreprise->setActivite($faker->realText($maxNbChars = 15,$indexSize = 2));
          $entreprise->setAdresse($faker->realText($maxNbChars = 15,$indexSize = 2));
          $manager->persist($entreprise);
        }
        $manager->flush();
    }
}
