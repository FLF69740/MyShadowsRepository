<?php

namespace App\DataFixtures;

use App\Entity\Character;
use App\Entity\Ship;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasher;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{

    private $userPasswordHasher;

    public function __construct(UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->userPasswordHasher = $userPasswordHasher;
    }

    public function load(ObjectManager $manager): void
    {

        $user = new User();
        $user->setEmail("alliance@myShadows.com");
        $user->setRoles(["ROLE_ALLIANCE"]);
        $user->setPassword($this->userPasswordHasher->hashPassword($user, "sylph"));
        $manager->persist($user);

        $user = new User();
        $user->setEmail("corporation@myShadows.com");
        $user->setRoles(["ROLE_CORPORATION"]);
        $user->setPassword($this->userPasswordHasher->hashPassword($user, "shadows"));
        $manager->persist($user);

        $user = new User();
        $user->setEmail("admin@myShadows.com");
        $user->setRoles(["ROLE_ADMIN"]);
        $user->setPassword($this->userPasswordHasher->hashPassword($user, "crew"));
        $manager->persist($user);

        $samantha = new Character();
        $samantha->setName("Samantha");
        $samantha->setEveID(2120472954);
        $samantha->setShipNumber(1);

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
