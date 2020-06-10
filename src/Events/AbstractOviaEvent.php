<?php

namespace Ovia\Events;

use DateTimeImmutable;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * Class AbstractEvent
 *
 * Defines an abstract class for which to instantiate Ovia Event classes so that
 * there is common methods definitions (from OviaEventInterface) and then shared
 * implementations in this class.
 *
 * @package Ovia\Events
 */
abstract class AbstractOviaEvent extends Event implements OviaEventInterface {

    /**
     * @var int
     */
    private int $user_id;

    /**
     * @var \DateTimeImmutable
     */
    private DateTimeImmutable $datetime;

    /**
     * {@inheritDoc}
     */
    public function getUserId(): int {
        return $user_id;
    }

    /**
     * Set the user id associated with the event.
     *
     * @param $user_id
     */
    protected function setUserId($user_id): void {
        $this->user_id = $user_id;
    }

    /**
     * Automatically set the datetime that the event occurred.
     */
    protected function setDateTime(): void {
        $this->datetime = new DateTimeImmutable('now');
    }

    /**
     * {@inheritDoc}
     */
    public function getDatetime(): DateTimeImmutable {
        return $this->datetime;
    }

}