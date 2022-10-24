<?php

namespace App\DataFixtures;

use App\Entity\TypeOfBook;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class TypeOfBookFixtures extends Fixture
{
        // -----Propriétés-----
        public const ROMAN_POLICIER = "roman policier";
        public const ROMAN = "roman";
        public const BANDE_DESSINEE = "bande dessinée";
        public const LIVRE_ART = "livre art";
        public const SCIENCE_FICTION = "science fiction";
        public const CUISINE = "cuisine";
    
        // -----Methodes-----
    public function load(ObjectManager $manager): void
    {
        $typeOfBook = new TypeOfBook();
        $typeOfBook->setTypeName('Roman Policier');
        $manager->persist($typeOfBook);
        $this->setReference(self::ROMAN_POLICIER, $typeOfBook);

        $typeOfBook = new TypeOfBook();
        $typeOfBook->setTypeName('Roman');
        $manager->persist($typeOfBook);
        $this->setReference(self::ROMAN, $typeOfBook);

        $typeOfBook = new TypeOfBook();
        $typeOfBook->setTypeName('Bande dessinée');
        $manager->persist($typeOfBook);
        $this->setReference(self::BANDE_DESSINEE, $typeOfBook);

        $typeOfBook = new TypeOfBook();
        $typeOfBook->setTypeName('Livre d\'art');
        $manager->persist($typeOfBook);
        $this->setReference(self::LIVRE_ART, $typeOfBook);

        $typeOfBook = new TypeOfBook();
        $typeOfBook->setTypeName('science fiction');
        $manager->persist($typeOfBook);
        $this->setReference(self::SCIENCE_FICTION, $typeOfBook);

        $typeOfBook = new TypeOfBook();
        $typeOfBook->setTypeName('Cuisine');
        $manager->persist($typeOfBook);
        $this->setReference(self::CUISINE, $typeOfBook);

        $manager->flush();
    }
}
