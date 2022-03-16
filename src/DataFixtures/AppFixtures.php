<?php

namespace App\DataFixtures;

use App\Entity\Patient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
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
        $patient = new Patient();
        $patient->setEmail("toto@toto.fr");
        $patient->setNom("toto");
        $patient->setPassword($this->passwordEncoder->hashPassword($patient, "toto"));

        $manager->persist($patient);

        $manager->flush();
    }
}
