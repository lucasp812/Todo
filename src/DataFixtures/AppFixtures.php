<?php

namespace App\DataFixtures;
use App\Entity\Todo;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 20; $i++) {
            $rand = random_int(0, 100);
            $todo = new Todo();
            $todo->setName('todo'.$rand);
            $todo->setDescription('lol');
            $manager->persist($todo);
        }
        $manager->flush();

    }
}
