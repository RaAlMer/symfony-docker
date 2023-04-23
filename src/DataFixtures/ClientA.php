<?php

namespace App\DataFixtures;

use App\Entity\Client;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ClientA extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $client = new Client();
        $client->setName('Client A');
        $client->setEmail('clienta@example.com');
        $manager->persist($client);

        $manager->flush();
    }
}