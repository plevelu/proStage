<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Formation;
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $formationIUT = new Formation();
        $formationIUT->setNom("IUT info");
        $formationIUT->setDescription("formation bac+2 technique en informatique");
        $manager->persist($formationIUT);
        $formationLiscence = new Formation();
        $formationLiscence->setNom("license");
        $formationLiscence->setDescription("formation bac+3");
        $manager->persist($formationLiscence);
        $manager->flush();
    }
}
