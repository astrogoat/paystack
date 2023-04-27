<?php

namespace Astrogoat\Paystack\Settings;

use Astrogoat\Paystack\Actions\PaystackAction;
use Helix\Lego\Settings\AppSettings;
use Illuminate\Validation\Rule;

class PaystackSettings extends AppSettings
{
     public string $secret_key;
     public string $callback_url;

    public function rules(): array
    {
        return [
             'secret_key' => Rule::requiredIf($this->enabled === true),
             'callback_url' => Rule::requiredIf($this->enabled === true),
        ];
    }

    // protected static array $actions = [
    //     PaystackAction::class,
    // ];

    // public static function encrypted(): array
    // {
    //     return ['access_token'];
    // }

    public function description(): string
    {
        return 'Interact with Paystack.';
    }

    public static function group(): string
    {
        return 'paystack';
    }
}
