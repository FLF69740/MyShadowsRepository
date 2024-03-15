<?php

namespace App\DataFixtures;

use App\Entity\Character;
use App\Entity\Ship;
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

        $gallenteShuttle = new Ship;
        $gallenteShuttle->setOwner($samantha);
        $gallenteShuttle->setCapacity(10);
        $gallenteShuttle->setEveId(11129);
        $gallenteShuttle->setDescription("Gallente Shuttle");
        $gallenteShuttle->setName("Gallente Shuttle");
        $gallenteShuttle->setPhotoUrl("https://images.evetech.net/types/11129/render");
        $gallenteShuttle->setGroupId(31);

        $manager->persist($gallenteShuttle);

        $manager->flush();
    }
}
