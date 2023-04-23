<?php

namespace App\DataFixtures;

use App\Entity\Client;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ClientB extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $client = new Client();
        $client->setName('Client B');
        $client->setEmail('clientb@example.com');
        $manager->persist($client);

        $manager->flush();
    }
}