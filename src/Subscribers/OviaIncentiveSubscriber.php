<?php

namespace Ovia\Subscribers;

use Ovia\Events\BirthEvent;
use Ovia\Events\DataLoggedEvent;
use Ovia\Incentives\BirthIncentive;
use Ovia\Incentives\DataLoggedIncentive;
use Ovia\Rewards\BirthReward;
use Ovia\Rewards\DataLoggedReward;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;


/**
 * Subscriber for capturing the OviaEvents fired.
 *
 * @package Ovia\Subscribers
 */
class OviaIncentiveSubscriber implements EventSubscriberInterface {

    /**
     * @return array|string[]
     */
    public static function getSubscribedEvents() {
        return [
            BirthEvent::NAME => 'onBirthEvent',
            DataLoggedEvent::NAME => 'onDataLoggedEvent',
        ];
    }

    /*
     * The replication in the two classes below are an ideal spot for a refactor
     * into some sort of processor class system that takes in incoming event and
     * processes it through each of the steps of
     *  - evaluating the event and if it's earned a reward
     *  - get the associated reward, evaluate if needs to be changed
     *  - persist the new reward state
     *  - queued data processing for reporting (in-house and partner)
     */

    /**
     * Consumer for a birth event.
     *
     * @param \Ovia\Events\BirthEvent $event
     */
    public function onBirthEvent(BirthEvent $event) {

        $incentive = new BirthIncentive($event);
        if ($incentive->earnedReward()) {
            $reward = new BirthReward($event->getUserId(), $event->getUserId(), $event::NAME);
            $reward->setEarned(1);

            // send the updated reward object somewhere to be persisted.
        }
    }

    /**
     * Consumer for a DataLoggedEvent
     *
     * @param \Ovia\Events\DataLoggedEvent $event
     */
    public function onDataLoggedEvent(DataLoggedEvent $event) {
        $incentive = new DataLoggedIncentive($event);
        if ($incentive->earnedReward()) {
            $reward = new DataLoggedReward($event->getUserId(), $event::NAME);
            $reward->setEarned(1);

            // send the updated reward object somewhere to be persisted.
        }
    }

}