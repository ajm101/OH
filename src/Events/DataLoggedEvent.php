<?php

namespace Ovia\Events;

use Symfony\Contracts\EventDispatcher\Event;

/**
 * Class DataLoggedEvent
 *
 * To be fired when data is logged.
 *
 * @package Ovia\Events
 */
class DataLoggedEvent extends AbstractOviaEvent {

    /*  Note: the implementation here, would probably benefit from also being
        able to log a specific type of data type (sleep, diapers, etc) and have an
        unified approach for dealing with the log of a data of a type or a log of
        any data.
    */

    public const NAME = 'data.logged';

    public function __construct(int $user_id) {
        $this->setUserId($user_id);
        $this->setDateTime();
    }

}