<?php

namespace Ovia\Rewards;

/**
 * The reward class related to the DataLoggedEvent.
 *
 * @package Ovia\Rewards
 */
class DataLoggedReward extends AbstractReward {

    public function __construct(int $user_id, string $incentive) {
        $this->setUserId($user_id);
        $this->setIncentive($incentive);
    }

}