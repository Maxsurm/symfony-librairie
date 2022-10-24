<?php

namespace App\DataFixtures;

use App\Entity\Book;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class BookFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $book = new Book();
        $book->setTitle('L\'échappée Bill');
        $book->setSlug('l-échappée-bill');
        $book->setImageName('lechappee-bill.jpg');
        $book->setAuthor($this->getReference(AuthorFixtures::JEAN_ROBA));
        $book->setTypeOfBook($this->getReference(TypeOfBookFixtures::BANDE_DESSINEE));
        $book->setIsActive(true);
        $manager->persist($book);

        $book = new Book();
        $book->setTitle('Royal taquin');
        $book->setSlug('royal-taquin');
        $book->setImageName('royaltaquin.jpg');
        $book->setAuthor($this->getReference(AuthorFixtures::JEAN_ROBA));
        $book->setTypeOfBook($this->getReference(TypeOfBookFixtures::BANDE_DESSINEE));
        $book->setIsActive(true);
        $manager->persist($book);

        $book = new Book();
        $book->setTitle('Bill se tient à Caro');
        $book->setSlug('bill-se-tient-a-caro');
        $book->setImageName('billcaro.jpg');
        $book->setAuthor($this->getReference(AuthorFixtures::JEAN_ROBA));
        $book->setTypeOfBook($this->getReference(TypeOfBookFixtures::BANDE_DESSINEE));
        $book->setIsActive(true);
        $manager->persist($book);

        $book = new Book();
        $book->setTitle('Les Miserables');
        $book->setSlug('les-miserables');
        $book->setImageName('lesmiserables.jpg');
        $book->setAuthor($this->getReference(AuthorFixtures::VICTOR_HUGO));
        $book->setTypeOfBook($this->getReference(TypeOfBookFixtures::ROMAN));
        $book->setIsActive(true);
        $manager->persist($book);

        $book = new Book();
        $book->setTitle('Les Chatiments');
        $book->setSlug('les-chatiments');
        $book->setImageName('chatiments.jpg');
        $book->setAuthor($this->getReference(AuthorFixtures::VICTOR_HUGO));
        $book->setTypeOfBook($this->getReference(TypeOfBookFixtures::ROMAN));
        $book->setIsActive(true);
        $manager->persist($book);$book = new Book();

        $book->setTitle('Délivrance');
        $book->setSlug('delivrance');
        $book->setImageName('delivrance.jpeg');
        $book->setAuthor($this->getReference(AuthorFixtures::ALDER_OLSEN));
        $book->setTypeOfBook($this->getReference(TypeOfBookFixtures::ROMAN_POLICIER));
        $book->setIsActive(true);
        $manager->persist($book);

        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            TypeOfBookFixtures::class,
        ];
    }
}
