<?php

use Akaunting\Money\Currency;
use Akaunting\Money\Money;

if (!function_exists('money')) {
    function money(mixed $amount, string $currency = null, bool $convert = false): Money
    {

        if (is_numeric($amount)) {
            $int   = (int)$amount;
            $float = (float)$amount;
    
            $value = ($int == $float) ? $int : $float;
            
        } else {
            $value =  $amount;
        }
        
        if (is_null($currency)) {
            /** @var string $currency */
            $currency = env('DEFAULT_CURRENCY', 'USD');
        }

        return new Money($value, currency($currency), $convert);
    }
}

if (!function_exists('currency')) {
    function currency(string $currency): Currency
    {
        return new Currency($currency);
    }
}
