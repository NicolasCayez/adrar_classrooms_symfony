<?php

namespace App\DataFixtures;

use App\Entity\Niveaux;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class NiveauxFixtures extends Fixture 
{
    public const NIVEAU_REFERENCE_TAG = 'niveau-';
    public const NB_NIVEAU = 3;

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < self::NB_NIVEAU; $i++) {
            $niveau = new Niveaux();
            $niveau->setLibelle(self::NIVEAU_REFERENCE_TAG . $i);
            $manager->persist($niveau);
            $this->addReference(self::NIVEAU_REFERENCE_TAG . $i, $niveau);
        }
        $manager->flush();
    }
}



