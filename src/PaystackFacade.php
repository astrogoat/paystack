<?php

namespace Astrogoat\Paystack;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Astrogoat\Paystack\Paystack
 */
class PaystackFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'paystack';
    }
}
