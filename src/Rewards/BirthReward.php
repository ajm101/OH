<?php

namespace Ovia\Rewards;

/**
 * Create the reward class related to the BirthEvent.
 *
 * @package Ovia\Rewards
 */
class BirthReward extends AbstractReward {

    /**
     * @var int
     */
    private int $child_id;

    /**
     * BirthReward constructor takes an extra argument compared to most rewards
     * as a birth could be associated with one or more users in the system
     *
     * @param int $user_id
     * @param int $child_id
     * @param string $incentive
     */
    public function __construct(int $user_id, int $child_id, string $incentive) {
        $this->setUserId($user_id);
        $this->setIncentive($incentive);
        $this->setChildId($child_id);
    }

    /**
     * Set the child id that is also associated with the reward.
     *
     * @param int $child_id
     */
    public function setChildId(int $child_id): void {
        $this->child_id = $child_id;
    }

}