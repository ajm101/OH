<?php

namespace Ovia\Evaluators;


/**
 * Interface EvaluatorInterface
 *
 * @package Ovia\Evaluators
 */
interface EvaluatorInterface {

    /**
     *  Determines if the incentive meets the evaluation criteria
     *
     * @return bool
     */
    public function evaluate(): bool;

    /* Given time, I would probably work to rename the method here. I'm not a
       fan of how the names work within the DataLoggedIncentive class.
    */

}