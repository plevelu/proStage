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
            "kodibear" => array("développement Android" => "une adresse"),
            "swingingSeal" => array("développement Android" => "une autre adresse"),
            "FuturaKode" => array("Programmation web" => "toujour une adresse tu t'attendais à quoi ?"),
            "Armée404" => array("cyber sécurité" => "j'en ai marre")
          );
          foreach ($listeEntreprises as $nomETP => $infoETP) { //parcours du tableau des entreprises
            $entreprise = new Entreprise();
            $entreprise->setNom($nomETP);
            foreach ($infoETP as $activiteETP => $adresseETP) {
              $entreprise->setActivite($activiteETP);
              $entreprise->setAdresse($adresseETP);
            }
            $manager->persist($entreprise); //enregistrement des entreprises
          }
        //génération des stages
        //commencont par en faire un fonctionelle
          $stage = new Stage();
          $stage->setIntitule("stage test 1");
          $stage->setMission($faker->realText($maxNbChars = 15,$indexSize = 2));
          $stage->setAdresseMail($faker->realText($maxNbChars = 15,$indexSize = 2));
          $stage->addFormation($tabFormations[1]);
          $manager->persist($stage);
        $manager->flush();
    }
}
