<?php

namespace App\Symfony;

use App\Entity\MetaTimestampsInterface;
use Doctrine\Persistence\Event\LifecycleEventArgs;

class TimestampsPrePersistEventListener
{
    public function prePersist(LifecycleEventArgs $event): void
    {
        $entity = $event->getObject();

        if ($entity instanceof MetaTimestampsInterface) {
            $entity->setCreatedAt();
            $entity->setUpdatedAt();
        }
    }
}