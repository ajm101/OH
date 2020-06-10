<?php

namespace Ovia\Evaluators;

use DateTimeImmutable;
use Ovia\Events\DataLoggedEvent;

/**
 * Class DataLoggedIncentiveEvaluator
 *
 * Will determine if the data logged event meets the criteria of being logged
 * some N days in a row.
 *
 * @package Ovia\Evaluators
 */
class DataLoggedIncentiveEvaluator implements EvaluatorInterface {

    /**
     * @var \Ovia\Events\DataLoggedEvent
     */
    private DataLoggedEvent $event;

    /**
     * @var \DateTimeImmutable
     */
    private DateTimeImmutable $event_datetime;

    /**
     * @var int|null
     */
    private ?int $days_logged;

    /**
     * @var array|null
     */
    private ?array $dateTimes_logged_history;

    public function __construct(DataLoggedEvent $event, array $dateTimes_logged_history, int $days_logged = NULL) {
        $this->event = $event;
        $this->event_datetime = $this->event->getDatetime();
        $this->days_logged = $days_logged;
        $this->dateTimes_logged_history = $dateTimes_logged_history;
    }

    /**
     * {@inheritDoc}
     */
    public function evaluate(): bool {

        $diff_days_logged = array_map(function ($dateTimeImmutable) {
            return $this->event_datetime->diff($dateTimeImmutable)->days;
        }, $this->dateTimes_logged_history);

        $unique_diff_days_logged = array_unique($diff_days_logged);

        asort($unique_diff_days_logged, SORT_NUMERIC);

        if (count($unique_diff_days_logged) < ($this->days_logged - 1)) {
            return FALSE;
        }

        $unique_diff_days_logged = array_values($unique_diff_days_logged);

        for ($i = 1; $i < $this->days_logged - 1; $i++) {
            if ($unique_diff_days_logged[$i] != ($unique_diff_days_logged[$i - 1] + 1)) {
                return FALSE;
            }
        }

        return TRUE;
    }

}