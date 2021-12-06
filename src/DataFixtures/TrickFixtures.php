<?php

namespace App\DataFixtures;

use App\Entity\Trick;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TrickFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $trick = new Trick();
            $trick->setTitle("Titre de le la figure n°$i")
                ->setDescription("<p>Contenu de la figure n°$i</p>")
                ->setSlug("Slug n° $i")
                ->setCreatedAt(new \DateTime());

            $manager->persist($trick);

            $manager->flush();
        }
    }
}
