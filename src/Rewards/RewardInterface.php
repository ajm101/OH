<?php

namespace Ovia\Rewards;

/**
 * Interface RewardInterface
 *
 * @package Ovia\Rewards
 */
interface  RewardInterface {

    /**
     * Return if the incentive has been earned or not.
     *
     * @return bool
     */
    public function getEarned(): bool;

    /**
     * Set the earned state of the incentive.
     *
     * @param int $earned
     */
    public function setEarned(int $earned): void;

    /**
     * Set the incentive name, typically the same as the event.
     *
     * @param string $incentive
     *
     * @return mixed
     */
    public function setIncentive(string $incentive);

    /**
     * Set the user that the reward is associated with.
     *
     * @param int $user_id
     */
    public function setUserId(int $user_id): void;
}