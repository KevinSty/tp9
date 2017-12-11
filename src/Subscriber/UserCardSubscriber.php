<?php

namespace App\Subscriber;

use App\AppEvent;
use App\Event\UserCardEvent;
use Doctrine\ORM\EntityManager;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class PlayerSubscriber implements EventSubscriberInterface {

    private $entityManager;

    /**
     * @param $entityManager
     */
    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }

    public static function getSubscribedEvents() {
        return array(
            AppEvent::USERCARD_ADD => 'userCardAdd',
            AppEvent::USERCARD_EDIT => 'userCardEdit',
            AppEvent::USERCARD_DELETE => 'userCardDelete');
    }

    public function userCardAdd(UserCardEvent $UserCardEvent) {
        $this->entityManager->persist($UserCardEvent->getUserCard());
        $this->entityManager->flush();
    }

    public function userCardEdit(UserCardEvent $UserCardEvent) {
        $this->entityManager->persist($UserCardEvent->getUserCard());
        $this->entityManager->flush();
    }

    public function userCardDelete(UserCardEvent $UserCardEvent) {
        $this->entityManager->persist($UserCardEvent->getUserCard());
        $this->entityManager->flush();
    }
}