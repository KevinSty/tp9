<?php

namespace App\Controller;

use App\AppAccess;
use App\AppEvent;
use App\Entity\Card;
use App\Entity\UserCard;
use App\Event\UserCardEvent;
use App\Form\UserCardType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class UserCardController extends Controller {

    /**
     * @Route(
     *     path="/new",
     *     name="user_new"
     * )
     */
    public function newUserCard(Request $request, Card $card, UserCardEvent $userCardEvents) {

        $userCard = $this->get(\App\Entity\UserCard::class);
        $userCard->setCard($card);
        $form = $this->createForm(UserCardType::class, $userCard, ['card' => $card->getId()]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $userCardEvent = $userCardEvents;
            $userCard->setCard($card);
            $userCardEvent->setUserCard($userCard);
            $dispatcher = $this->get('event_dispatcher');
            $dispatcher->dispatch(AppEvent::USERCARD_ADD, $userCardEvent);
            return $this->redirectToRoute("userCard_index");
        }

        return $this->render('UserCard/new.html.twig', array('form' => $form->createView()));

    }
}