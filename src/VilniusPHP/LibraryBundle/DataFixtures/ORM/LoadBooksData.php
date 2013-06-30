<?php

namespace VilniusPHP\LibraryBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use VilniusPHP\LibraryBundle\Entity\Book;

class LoadEventsData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $this->loadBook1($manager);
        $this->loadBook2($manager);
    }

    protected function loadBook1(ObjectManager $manager)
    {
        $book = new Book;
        $book->setTitle('Distributed Network Data');
        $book->setSlug('distributed-network-data');
        $book->setSubtitle('From Hardware to Data to Visualization');
        $book->setAuthor('Alasdair Allan & Kipp Bradford');
        $book->setEdition('First Edition');
        $book->setHomepage('http://shop.oreilly.com/product/0636920028802.do');
        $book->setDescription('Build your own distributed sensor network to 
            collect, analyze, and visualize real-time data about our human 
            environment—including noise level, temperature, and people flow. 
            With this hands-on book, you’ll learn how to turn your project idea 
            into working hardware, using the easy-to-learn Arduino 
            microcontroller and off-the-shelf sensors.');

        $manager->persist($book);
        $manager->flush();
    }

    protected function loadBook2(ObjectManager $manager)
    {
        $book = new Book;
        $book->setTitle('Learning PHP Design Patterns');
        $book->setSlug('learning-php-design-patterns');
        $book->setSubtitle('Object-Oriented Programming for Dynamic Projects');
        $book->setAuthor('William Sanders');
        $book->setEdition('First Edition');
        $book->setHomepage('http://shop.oreilly.com/product/0636920028062.do');
        $book->setDescription('Build server-side applications more 
            efficiently—and improve your PHP programming skills in the 
            process—by learning how to use design patterns in your code. This 
            book shows you how to apply several object-oriented patterns 
            through simple examples, and demonstrates many of them in 
            full-fledged working applications.');

        $manager->persist($book);
        $manager->flush();
    }
}
