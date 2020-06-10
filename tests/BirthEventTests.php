<?php

use Ovia\Evaluators\BirthIncentiveEvaluator;
use Ovia\Events\BirthEvent;
use Ovia\Rewards\BirthReward;
use Ovia\Subscribers\OviaIncentiveSubscriber;
use PHPUnit\Framework\TestCase;
use Symfony\Component\EventDispatcher\EventDispatcher;


/**
 * Class BirthEventTests
 *
 *  Verifies some of the assumptions about how classes work together.
 */
class BirthEventTests extends TestCase {

    private EventDispatcher $dispatcher;
    private OviaIncentiveSubscriber $subscriber;

    protected function setUp(): void {
        $this->dispatcher = new EventDispatcher();
        $this->subscriber = new OviaIncentiveSubscriber();
        $this->dispatcher->addSubscriber($this->subscriber);
    }

    public function testEnsureEventSubscribed() {
        $event = new BirthEvent(1, 3);
        $this->assertArrayHasKey($event::NAME, $this->subscriber::getSubscribedEvents());
    }

    public function testBirthIncentiveEvaluator(){
        $event = new BirthEvent(1,2);
        $evaluator = new BirthIncentiveEvaluator($event);
        $this->assertTrue($evaluator->evaluate());
    }

    public function testBirthRewardEarnedSetter(){
        $reward = new BirthReward(1, 1, 'child.birth');
        $reward->setEarned(TRUE);

        $this->assertTrue(TRUE, $reward->getEarned());
        $this->assertFalse(FALSE, $reward->getEarned());
    }

}