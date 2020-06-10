<?php

namespace Ovia\Incentives;

use Ovia\Evaluators\BirthIncentiveEvaluator;
use Ovia\Events\BirthEvent;

/**
 * Class BirthIncentive
 *
 * @package Ovia\Incentives
 */
class BirthIncentive extends AbstractIncentive {

    /**
     * @var \Ovia\Events\BirthEvent
     */
    private BirthEvent $event;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var int
     */
    private int $user_id;

    public function __construct(BirthEvent $event) {
        $this->event = $event;
        $this->name = $event::NAME;
        $this->user_id = $event->getUserId();
    }

    /**
     * {@inheritDoc}
     */
    protected function evaluate(): bool {
        new BirthIncentiveEvaluator($this->event);
    }

}