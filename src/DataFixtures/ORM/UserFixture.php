<?php

namespace App\DataFixtures\ORM;


use App\Entity\Category;
use App\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixture extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $password = password_hash("123", PASSWORD_BCRYPT);

        $user = new User();
        $user   ->setName("User 1")
                ->setEmail("user1@mail.com")
                ->setPassword($password);
        $manager->persist($user);
        $this->addReference("user_1", $user);

        $user = new User();
        $user   ->setName("User 2")
            ->setEmail("user2@mail.com")
            ->setPassword($password);
        $manager->persist($user);
        $this->addReference("user_2", $user);

        $user = new User();
        $user   ->setName("User 3")
            ->setEmail("user3@mail.com")
            ->setPassword($password);
        $manager->persist($user);
        $this->addReference("user_3", $user);


        $manager->flush();

    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 1;
    }
}