<?php

namespace App\DataFixtures;

use App\Entity\Chapitres;
use App\Entity\Cours;
use App\Entity\Niveaux;
use Container0mSPOdt\getNiveauxControllerService;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

use function Symfony\Component\Clock\now;

class ChapitresFixtures extends Fixture implements DependentFixtureInterface
{
    public const CHAPITRE_REFERENCE_TAG = 'cours-';
    public const NB_CHAPITRE = 20;

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < self::NB_CHAPITRE; $i++) {
            $chapitre = new Chapitres();
            $chapitre->setIdCours($this->getReference(CoursFixtures::COURS_REFERENCE_TAG . rand(0, CoursFixtures::NB_COURS - 1), Cours::class));
            $chapitre->setTitre(self::CHAPITRE_REFERENCE_TAG . $i);
            $chapitre->setContenu($faker->text());
            $chapitre->setPosition(rand(1,5));

            $manager->persist($chapitre);
            $this->addReference(self::CHAPITRE_REFERENCE_TAG . $i, $chapitre);
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            CoursFixtures::class
        ];
    }
}

