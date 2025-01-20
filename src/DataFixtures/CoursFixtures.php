<?php

namespace App\DataFixtures;

use App\Entity\Cours;
use App\Entity\Niveaux;
use Container0mSPOdt\getNiveauxControllerService;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

use function Symfony\Component\Clock\now;

class CoursFixtures extends Fixture implements DependentFixtureInterface
{
    public const COURS_REFERENCE_TAG = 'cours-';
    public const NB_COURS = 20;

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < self::NB_COURS; $i++) {
            $cours = new Cours();
            $cours->setTitre(self::COURS_REFERENCE_TAG . $i);
            $cours->setIdNiveau($this->getReference(NiveauxFixtures::NIVEAU_REFERENCE_TAG . rand(0, NiveauxFixtures::NB_NIVEAU - 1), Niveaux::class));

            $cours->setSynopsis($faker->text());
            $cours->setTempsEstime(random_int(1,15));
            $cours->setDate(now());
            $cours->setCree($faker->boolean());

            $manager->persist($cours);
            $this->addReference(self::COURS_REFERENCE_TAG . $i, $cours);
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            LangagesFixtures::class, NiveauxFixtures::class
        ];
    }
}

