<?php

namespace Astrogoat\Paystack;

use Astrogoat\Paystack\Settings\PaystackSettings;

class Paystack
{
    public function initiatePayment($name, $customerEmail, $amount)
    {
        $response = json_decode($this->getAuthorizationUrl($name, $customerEmail, $amount));
        if($response->status) {
            return $response;
        }

        return null;
    }

    public function getAuthorizationUrl($name, $customerEmail, $amount): string
    {
        $url = "https://api.paystack.co/transaction/initialize";

        $fields = [
            'first_name' => $name,
            'email' => $customerEmail,
            'amount' => $amount,
            'callback_url' => settings(PaystackSettings::class, 'callback_url'),
        ];

        $fields_string = http_build_query($fields);

        // open connection
        $ch = curl_init();

        $secretKey = settings(PaystackSettings::class, 'secret_key');

        // set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer ".$secretKey,
            "Cache-Control: no-cache",
        ]);

        // So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // execute post
        $result = curl_exec($ch);

        return $result;
    }

    public function verifyPayment($reference)
    {
        $url = "https://api.paystack.co/transaction/verify/".$reference;

        // open connection
        $ch = curl_init();

        $secretKey = settings(PaystackSettings::class, 'secret_key');

        // set the url
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer ".$secretKey,
        ]);

        // So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //execute post
        $result = curl_exec($ch);

        return $result;
    }
}
