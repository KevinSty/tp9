<?php
/**
 * Created by PhpStorm.
 * User: kevin.diaz
 * Date: 11/12/17
 * Time: 15:06
 */

namespace App\Event;
use Symfony\Component\EventDispatcher\Event;

class UserCardEvent extends Event{

    private $userCard;

    /**
     * @return mixed
     */
    public function getUserCard()
    {
        return $this->userCard;
    }

    /**
     * @param mixed $userCard
     */
    public function setUserCard($userCard)
    {
        $this->userCard = $userCard;
    }
}