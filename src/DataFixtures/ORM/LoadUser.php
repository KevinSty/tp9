<?php

namespace App\DataFixtures\ORM;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadUser extends Fixture {
    const USER_PASSWORD = 'user';

    public function load(ObjectManager $manager) {

        //user 1
        $user = new User();
        $user->setFirstname('User');
        $user->setLastname('User');
        $user->setEmail('user@user.fr');
        $user->setBirthday(new \DateTime('2000/01/01'));
        $password = $this->container->get('security.password_encoder')->encodePassword($user, self::USER_PASSWORD);
        $user->setPassword($password);
        $this->addReference('user', $user);
        $manager->persist($user);

        //user 2
        $user = new User();
        $user->setFirstname('User2');
        $user->setLastname('User2');
        $user->setEmail('user2@user2.fr');
        $user->setBirthday(new \DateTime('2000/01/01'));
        $password = $this->container->get('security.password_encoder')->encodePassword($user, self::USER_PASSWORD);
        $user->setPassword($password);
        $this->addReference('user2', $user);
        $manager->persist($user);

        //user 3
        $user = new User();
        $user->setFirstname('User3');
        $user->setLastname('User3');
        $user->setEmail('user3@user3.fr');
        $user->setBirthday(new \DateTime('2000/01/01'));
        $password = $this->container->get('security.password_encoder')->encodePassword($user, self::USER_PASSWORD);
        $user->setPassword($password);
        $this->addReference('user3', $user);
        $manager->persist($user);

        $manager->flush();
    }
}
