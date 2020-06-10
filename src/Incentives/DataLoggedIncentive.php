<?php

namespace Ovia\Incentives;

use Ovia\Evaluators\DataLoggedIncentiveEvaluator;
use Ovia\Events\DataLoggedEvent;

/**
 * Class DataLoggedIncentive
 *
 * @package Ovia\Incentives
 */
class DataLoggedIncentive extends AbstractIncentive {

    /**
     * @var int
     */
    private const DAYS_LOGGED = 5;

    /**
     * @var \Ovia\Events\DataLoggedEvent
     */
    private DataLoggedEvent $event;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var int
     */
    private int $user_id;

    public function __construct(DataLoggedEvent $event) {
        $this->event = $event;
        $this->name = $event::NAME;
        $this->user_id = $event->getUserId();
    }

    /**
     * {@inheritDoc}
     */
    protected function evaluate(): bool {

        /* I'm missing the stub for getting the history that any data event was
           logged.  If that's not an existing and accessible data,  we'd need to
           create some sort of temporary data store and associated management for
           the users qualifying for the event.

           I'm also making the assumption that we could pull the event data
           from some "repository" filtered by age or get all if the days_logged
           is null.
        */

        /* array of data from above + assumption we're limiting the query &
           reduced down to a set of DateTimeImmutables
        */

        $data_logged_history = [];
        $evaluator = new DataLoggedIncentiveEvaluator($this->event, $data_logged_history, self::DAYS_LOGGED);
        return $evaluator->evaluate();
    }

}