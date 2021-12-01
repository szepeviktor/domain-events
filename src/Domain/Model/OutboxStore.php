<?php

declare(strict_types = 1);

namespace Lingoda\DomainEventsBundle\Domain\Model;

use Lingoda\DomainEventsBundle\Infra\Doctrine\Entity\OutboxRecord;

interface OutboxStore
{
    /**
     * Should emit PreAppendEvent before appending DomainEvent to the event store
     */
    public function append(DomainEvent $domainEvent): void;

    public function replace(DomainEvent $domainEvent): void;

    public function publish(OutboxRecord $outboxRecord): void;

    /**
     * @return iterable<OutboxRecord>
     */
    public function allUnpublished(): iterable;
}
