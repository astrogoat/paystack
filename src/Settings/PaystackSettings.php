<?php

namespace Astrogoat\Paystack\Settings;

use Astrogoat\Paystack\Actions\PaystackAction;
use Helix\Lego\Settings\AppSettings;
use Illuminate\Validation\Rule;

class PaystackSettings extends AppSettings
{
    // public string $url;

    public function rules(): array
    {
        return [
            // 'url' => Rule::requiredIf($this->enabled === true),
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
