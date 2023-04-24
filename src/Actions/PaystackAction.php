<?php

namespace Astrogoat\Paystack\Actions;

use Helix\Lego\Apps\Actions\Action;

class PaystackAction extends Action
{
    public static function actionName(): string
    {
        return 'Paystack action name';
    }

    public static function run(): mixed
    {
        return redirect()->back();
    }
}
