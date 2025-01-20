<?php

namespace App\DataFixtures;

use App\Entity\Langages;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class LangagesFixtures extends Fixture 
{
    public const LANGAGE_REFERENCE_TAG = 'langage-';
    public const NB_LANGAGES = 10;

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < self::NB_LANGAGES; $i++) {
            $langage = new Langages();
            $langage->setLibelle(self::LANGAGE_REFERENCE_TAG . $i);
            $manager->persist($langage);
            $this->addReference(self::LANGAGE_REFERENCE_TAG . $i, $langage);
        }
        $manager->flush();
    }
}

