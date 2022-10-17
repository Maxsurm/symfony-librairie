<?php

namespace App\DataFixtures;

use App\Entity\Carousel;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CarouselFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $carousel = new Carousel();
        $carousel->setTag('home');
        $carousel->setImageName('book1.jpg');
        $manager->persist($carousel);

        $carousel = new Carousel();
        $carousel->setTag('home');
        $carousel->setImageName('book2.jpg');
        $manager->persist($carousel);

        $carousel = new Carousel();
        $carousel->setTag('home');
        $carousel->setImageName('book3.jpg');
        $manager->persist($carousel);

        $manager->flush();
    }
}
