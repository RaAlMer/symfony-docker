<?php

namespace App\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use App\Entity\User;

class UserUpdateListener
{
    public function preUpdate(User $user, LifecycleEventArgs $event): void
    {
        $user->setUpdatedAt(new \DateTime());
    }
}
