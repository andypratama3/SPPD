<?php

use Carbon\Carbon;



if (!function_exists('convertAndAddHours')) {
    function convertAndAddHours($timeString, $timezone, $hoursToAdd) {
        // Convert the time to a Carbon instance
        $carbonTime = Carbon::parse($timeString, $timezone);

        // Add hours to the Carbon instance
        $carbonTime->addHours($hoursToAdd);

        // Return the formatted time string
        return $carbonTime->toDateTimeString();
    }
}
