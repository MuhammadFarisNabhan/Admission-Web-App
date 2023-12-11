<?php

if (!function_exists('generate_days')) {
    function generate_days($startDay, $endDay)
    {
        $days = [];
        for ($day = $startDay; $day <= $endDay; $day++) {
            $days[] = $day;
        }
        return $days;
    }
}
