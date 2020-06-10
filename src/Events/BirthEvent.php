<?php

namespace Ovia\Events;

/**
 * Class BirthEvent
 *
 *  To be fired by some system when a birth is recorded
 *
 * @package Ovia\Events
 */
class BirthEvent extends AbstractOviaEvent {

    /**
     *
     */
    public const NAME = 'child.birth';

    /**
     * @var int
     */
    private int $child_id;

    public function __construct(int $user_id, int $child_id) {
        $this->setUserId($user_id);
        $this->setChildId($child_id);
        $this->setDateTime();
    }

    /**
     * Set the child id the event is associated with
     *
     * @param int $child_id
     */
    protected function setChildId(int $child_id): void {
        $this->child_id = $child_id;
    }

    /**
     * Get the child id the event is associated with
     *
     * @return int
     */
    public function getChildId(): int {
        return $this->child_id;
    }
}