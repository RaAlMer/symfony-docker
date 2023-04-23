<?php

namespace App\DataFixtures;

use App\Entity\Client;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ClientC extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $client = new Client();
        $client->setName('Client C');
        $client->setEmail('clientc@example.com');
        $manager->persist($client);

        $manager->flush();
    }
}