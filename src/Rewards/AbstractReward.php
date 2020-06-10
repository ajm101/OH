<?php

namespace Ovia\Rewards;

/**
 * An abstract class for the rewards that has the basics we want to be
 * in each concrete class while not allowing this class to be instantiated.
 *
 * @package Ovia\Rewards
 */
abstract class AbstractReward implements RewardInterface {

    /**
     * @var int
     */
    private int $user_id;

    /**
     * @var string
     */
    private string $incentive;

    /**
     * @var bool
     */
    private bool $earned = FALSE;

    /**
     * {@inheritdoc}
     */
    public function getEarned(): bool {
        return $this->earned;
    }

    /**
     * {@inheritdoc}
     */
    public function setEarned(int $earned): void {
        $this->earned = $earned;
    }

    /**
     * {@inheritdoc}
     */
    public function setIncentive(string $incentive): void {
        $this->incentive = $incentive;
    }

    /**
     * {@inheritdoc}
     */
    public function setUserId(int $user_id): void {
        $this->user_id = $user_id;
    }
}