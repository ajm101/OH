<?php

namespace Ovia\Evaluators;

use Ovia\Events\BirthEvent;

/**
 * Class BirthIncentiveEvaluator
 *
 * Determines if the birth event occurred
 *
 * @package Ovia\Evaluators
 */
class BirthIncentiveEvaluator implements EvaluatorInterface {

    /**
     * @var \Ovia\Events\BirthEvent
     */
    private BirthEvent $event;

    public function __construct(BirthEvent $event) {

        $this->event = $event;

    }

    /*
     * {@inheritDoc}
     */
    public function evaluate(): bool {

        // set to true for the purposes of the exercise.

        return TRUE;
    }


}