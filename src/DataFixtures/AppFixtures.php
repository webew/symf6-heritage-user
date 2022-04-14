<?php

namespace App\DataFixtures;

use App\Entity\Medecin;
use App\Entity\Patient;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordHasherInterface $userPasswordHasherInterface)
    {
        $this->passwordEncoder = $userPasswordHasherInterface;
    }

    public function load(ObjectManager $manager): void
    {
        $patient = new Medecin();
        $patient->setEmail("toto@toto.fr");
        $patient->setSpecialite("truc");
        $patient->setPassword($this->passwordEncoder->hashPassword($patient, "toto"));

        $manager->persist($patient);

        $manager->flush();
    }
}
