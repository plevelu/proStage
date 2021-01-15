<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Formation;
use App\Entity\Entreprise;
use App\Entity\Stage;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //générateur données faker
        $faker = \Faker\Factory::create('fr_FR');
        //génération formation
          $IUTinfo = new Formation();
          $IUTinfo->setNom("IUT INFO");
          $IUTinfo->setDescription("formation technique en informatique niveau bac+2");
          $IUTgeei = new Formation();
          $IUTgeei->setNom("IUT GEEI");
          $IUTgeei->setDescription("formation technique en génie industrielle niveau bac+2");
          $liscencePA = new Formation();
          $liscencePA->setNom("Liscence PA");
          $liscencePA->setDescription("formation en informatique niveau bac+3");
          $tabFormations = array($IUTinfo,$IUTgeei,$liscencePA); //staockages des formations dans un tableau
          foreach ($tabFormations as $formation) { //parcours du tableau
            $manager->persist($formation); //enregistrement des formations
          }
        //génération entreprises
          $listeEntreprises = array(
            "kodibear" => "développement Android",
            "swingingSeal" => "développement Android",
            "FuturaKode" => "Programmation web",
            "Armée404" => "cyber sécurité"
          );
          foreach ($listeEntreprises as $nomETP => $activiteETP) { //parcours du tableau des entreprises
            $entreprise = new Entreprise();
            $entreprise->setNom($nomETP);
            $entreprise->setActivite($activiteETP);
            $entreprise->setAdresse($faker->realText($maxNbChars = 15,$indexSize = 2));
            $manager->persist($entreprise); //enregistrement des entreprises
          }
        //génération des stages
          $stage = new Stage();
          $stage->setIntitule($faker->realText($maxNbChars = 15,$indexSize = 2));
          $stage->setMission($faker->realText($maxNbChars = 15,$indexSize = 2));
          $stage->setAdresseMail($faker->realText($maxNbChars = 15,$indexSize = 2));
        $manager->flush();
    }
}
