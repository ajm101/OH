<?php

namespace Ovia\Incentives;

/**
 * Class AbstractIncentive
 *
 * @package Ovia\Incentives
 */
abstract class AbstractIncentive implements IncentiveInterface {

    /**
     * Method to be implemented that has incentive specific logic for determining
     * if the incentive "evaluates" to True based on the Incentive Evaluator
     * logic
     *
     * @return bool
     */
    abstract protected function evaluate(): bool;

    /**
     * Determines if the reward has been earned for the incentive based on
     * - is the user eligible for the incentive
     * - are they still eligible for the reward
     * - did the evaluator return true
     *
     * @return bool
     */
    public function earnedReward(): bool {


        if (!$this->eligibleForIncentive()) {
            return FALSE;
        }
        if (!$this->eligibleForReward()) {
            return FALSE;
        }
        elseif ($this->evaluate()) {
            return TRUE;
        }
        return FALSE;
    }

    /**
     * Determine if the user is even eligible for the incentive program.
     *
     * @return bool
     */
    private function eligibleForIncentive(): bool {
        return TRUE;
    }

    /**
     * Determine if the user is still eligible for the reward.
     *
     * @return bool
     */
    private function eligibleForReward(): bool {
        return TRUE;
    }

}