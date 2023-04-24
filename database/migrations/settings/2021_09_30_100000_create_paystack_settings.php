<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreatePaystackSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('paystack.enabled', false);
        $this->migrator->add('paystack.secret_key', '');
        // $this->migrator->addEncrypted('paystack.access_token', '');
    }

    public function down()
    {
        $this->migrator->delete('paystack.enabled');
        $this->migrator->delete('paystack.secret_key');
        // $this->migrator->delete('paystack.access_token');
    }
}
