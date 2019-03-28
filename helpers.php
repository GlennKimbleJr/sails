<?php

if (! function_exists('dollar_to_integer')) {
    function dollar_to_integer($amount)
    {
        return trim(preg_replace('/[^0-9.]/', '', $amount)) * 100;
    }
}
