<?php


namespace App\Helper;

if (!function_exists('formatDate')) {
    function formatDate($date, $format = 'Y-m-d')
    {
        return \Carbon\Carbon::parse($date)->format($format);
    }
}
