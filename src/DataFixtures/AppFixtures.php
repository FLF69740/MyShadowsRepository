<?php

namespace App\DataFixtures;

use App\Entity\Character;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $samantha = new Character();
        $samantha->setName("Samantha");
        $samantha->setEveID(2120472954);

        $manager->persist($samantha);

        $manager->flush();
    }
}
