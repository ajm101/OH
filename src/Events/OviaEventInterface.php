<?php

namespace Ovia\Events;

use DateTimeImmutable;

/**
 * Interface OviaEventInterface
 *
 * @package Ovia\Events
 */
interface OviaEventInterface {

    /**
     * Returns the date of the event.
     *
     * @return \DateTimeImmutable
     */
    public function getDateTime(): DateTimeImmutable;

    /**
     * Returns the user associated with the event.
     *
     * @return int
     */
    public function getUserId(): int;

}