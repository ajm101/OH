<?php

use Ovia\Evaluators\DataLoggedIncentiveEvaluator;
use Ovia\Events\DataLoggedEvent;
use PHPUnit\Framework\TestCase;

class DataLoggedIncentiveEvaluatorTests extends TestCase {

    private DataLoggedEvent $event;

    public function test1() {

        foreach ($this->cases() as $testCase) {
            $evaluator = new DataLoggedIncentiveEvaluator($this->event, $testCase['history'], 5);
            $this->assertEquals($testCase['outcome'], $evaluator->evaluate());
        }
    }

    /**
     * Get a set of test cases to evaluate.
     *
     * @return array|array[]
     */
    private function cases(): array {
        $now = new DateTimeImmutable('now');

        return [
            // perfect case
            [
                'outcome' => TRUE,
                'history' => [
                    $now->modify('-1 days'),
                    $now->modify('-2 days'),
                    $now->modify('-4 days'),
                    $now->modify('-3 days'),
                ],
            ],
            // no history
            [
                'outcome' => FALSE,
                'history' => [],
            ],

            // one value
            [
                'outcome' => FALSE,
                'history' => [
                    $now->modify('-1 days'),
                ],
            ],

            // same length, repeat with miss
            [
                'outcome' => FALSE,
                'history' => [
                    $now->modify('-1 days'),
                    $now->modify('-1 days'),
                    $now->modify('-4 days'),
                    $now->modify('-3 days'),
                ],
            ],

            // same length, no break, repeats
            [
                'outcome' => FALSE,
                'history' => [
                    $now->modify('-1 days'),
                    $now->modify('-2 days'),
                    $now->modify('-3 days'),
                    $now->modify('-3 days'),
                ],
            ],

            // longer, no break, repeats
            [
                'outcome' => TRUE,
                'history' => [
                    $now->modify('-1 days'),
                    $now->modify('-2 days'),
                    $now->modify('-4 days'),
                    $now->modify('-3 days'),
                    $now->modify('-6 days'),

                ],
            ],

            // longer, break, repeats
            [
                'outcome' => FALSE,
                'history' => [
                    $now->modify('-1 days'),
                    $now->modify('-12 days'),
                    $now->modify('-4 days'),
                    $now->modify('-3 days'),
                    $now->modify('-6 days'),

                ],
            ],

        ];
    }

    protected function setUp(): void {
        $this->event = new DataLoggedEvent(1);
    }

}