<?php

namespace App\DataFixtures;
use App\Entity\Todo;
use App\Entity\Priority;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture 

{


    public function load(ObjectManager $manager): void
    {

    }

}