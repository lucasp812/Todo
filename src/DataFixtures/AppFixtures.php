<?php

namespace App\DataFixtures;
use App\Entity\Todo;
use App\Entity\Priority;
use App\Factory\TodoFactory;
use App\Factory\PriorityFactory;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture 

{
    public function load(ObjectManager $manager): void
    {
      TodoFactory::new()->createMany(50);
    PriorityFactory::new()->createMany(50);
      $manager->flush();  
    }

}