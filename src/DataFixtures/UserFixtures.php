<?php

namespace App\DataFixtures;

use App\Entity\Cours;
use App\Entity\Langages;
use App\Entity\Niveaux;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

use function Symfony\Component\Clock\now;

class UserFixtures extends Fixture
{
    public const USER_REFERENCE_TAG = 'user-';
    public const NB_USER = 20;

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        //admin
        $i = 0;
        $user = new User();
        $user->setEmail('nicolascayez@gmail.com');
        $user->setRoles(["ROLE_USER","ROLE_ADMIN"]);
        $password = '123456';
        $user->setPassword($password);
        $user->setNom($password);
        $user->setPrenom('Nicolas');
        $manager->persist($user);
        $this->addReference(self::USER_REFERENCE_TAG . $i, $user);
        $manager->flush();

        //other users
        for ($i = 1; $i < self::NB_USER; $i++) {
            $user = new User();
            $user->setEmail($faker->email());
            $user->setRoles(["ROLE_USER"]);
            $password = $faker->password(10);
            $user->setPassword(password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]));
            $user->setNom($password);
            $user->setPrenom($faker->firstName());

            $manager->persist($user);
            $this->addReference(self::USER_REFERENCE_TAG . $i, $user);
        }
        $manager->flush();
    }
}

