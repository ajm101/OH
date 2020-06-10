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

}