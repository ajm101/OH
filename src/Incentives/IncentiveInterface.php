<?php

namespace Ovia\Incentives;

/**
 * Interface IncentiveInterface
 *
 * @package Ovia\Incentives
 */
interface IncentiveInterface {

    /**
     * Determine if criteria for earning the incentives reward has been met.
     *
     * @return bool
     */
    public function earnedReward(): bool;

}