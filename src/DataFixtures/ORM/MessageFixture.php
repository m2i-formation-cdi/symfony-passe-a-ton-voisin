<?php

namespace App\DataFixtures\ORM;


use App\Entity\Category;
use App\Entity\Message;
use App\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class MessageFixture extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $message = new Message();
        $message->setTitle("Donne chatons bon état génral")
            ->setText("Adorables mais un peu voraces attention aux doigts")
            ->setAuthor($this->getReference("user_1"))
            ->setCategory($this->getReference("cat_don"))
            ->setClosed(false);
        $manager->persist($message);

        $message = new Message();
        $message->setTitle("Recherche 90000000000 tonnes de bombes")
            ->setText("Perdues à la fin des années 60 dans le sud est asiatique contacter R. Nixon")
            ->setAuthor($this->getReference("user_1"))
            ->setCategory($this->getReference("cat_rech"))
            ->setClosed(false);
        $manager->persist($message);

        $message = new Message();
        $message->setTitle("Donne paire de claques")
            ->setText("Pour vous tenir chaud l'hiver")
            ->setAuthor($this->getReference("user_2"))
            ->setCategory($this->getReference("cat_don"))
            ->setClosed(false);
        $manager->persist($message);

        $message = new Message();
        $message->setTitle("Recherche la réponse ultime")
            ->setText("Je sais qu'il y a un 4 et un 2 mais j'ai oublié l'ordre")
            ->setAuthor($this->getReference("user_3"))
            ->setCategory($this->getReference("cat_rech"))
            ->setClosed(true);
        $manager->persist($message);

        $manager->flush();

    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 2;
    }
}