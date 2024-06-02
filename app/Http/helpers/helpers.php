<?php
/*
 * Date helpers
 * */

const CHECK_OUT = 'Check Out';
const PENDING = 'pending';
const CANCEL = 'Cancel';
const CHECK_IN = 'Check In';
const CONFIRM = 'Confirm';
const UPLOAD_FILE_SIZE = 80000;

function ymd($date =null)
{
    return !is_null($date) ? explode(' ',  $date)[2].'-'.date('m-d', strtotime($date)): '';
}

function dMYHMS($date = null)
{
    return !is_null($date) ? date('Y-m-d h:i:s', strtotime($date)): '';
}


function dMY($date = null)
{
    return !is_null($date) ? date('d M y', strtotime($date)): '';
}
function MY($date = null)
{
    return !is_null($date) ? date('M Y', strtotime($date)) : '';
}
function dayOfMonth($date = null)
{
    return !is_null($date) ? date('d', strtotime($date)) : '';
}
//Calculate Difference in Day
function dateDifinDay($dateStart,$dateEnd)
{
    if(is_null($dateStart)||is_null($dateEnd)){
        return 0;
    }
    $start_date = new DateTime($dateStart);
    $end_date = new DateTime($dateEnd);
    $start_date->setTime(12, 0, 0); // set start time to 12:00 PM

    if ($end_date->format('H:i:s') >= '12:00:00') {
        $end_date->modify('+1 day'); // add one more day if end time is after 12:00 PM
    }
    $end_date->setTime(12, 0, 0); // set end time to 12:00 PM

    $interval = $end_date->diff($start_date);
    $days = $interval->days;

    return $days;
}


function dateTimeDifinDay()
{
    date_default_timezone_set('Asia/Dhaka');

// Set the check-in and check-out dates and times
    $checkin_datetime = new DateTime('2023-02-20 02:00 PM');
    $checkout_datetime = new DateTime('2023-02-21 11:01 AM');

// If checkout time is after 12:00 PM, count an extra day
    if ($checkout_datetime->format('H:i') > '12:00') {
        $checkout_datetime->modify('+1 day');
    }

// Calculate the interval between check-in and check-out dates
    $interval = $checkin_datetime->diff($checkout_datetime);

// Output the interval in days and hours
    // Calculate the total number of days
    $total_days = $interval->days;

    return $total_days;
}
//For get Date From Date Range
function getDatesFromRange($start, $end ) {
    $format = 'Y/m/d';
    $array = array();
    $interval = new DateInterval('P1D');

    $realEnd = new DateTime($end);
    $realEnd->add($interval);

    $period = new DatePeriod(new DateTime($start), $interval, $realEnd);

    foreach($period as $date) {
        $array[] = $date->format($format);
    }

    return $array;
}

function convertDateToString($date = null)
{
    if(is_null($date)){
        return null;
    }
   return $date->day.' '.config('settings.months')[$date->month].', '. $date->year;
}

////////End of date functions

/*
 * Other helpers
 * */

function rankShortForm($rank)
{
    if(isset( explode("(", $rank)[1])){
        return explode(')', explode("(", $rank)[1])[0];
    }else{
        return $rank;
    }
}

function bafDateFormat3($date)
{

    $date_arr = explode('-', $date);
    $day = ltrim($date_arr[0], '0');


    $word_month =   ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    $number_month = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
    $month = str_replace($number_month, $word_month, $date_arr[1]);

    $year = preg_split("/[\s]/", $date_arr[2], 0, PREG_SPLIT_NO_EMPTY);

    $valid_date = $day . '-' . $month . '-' . $year[0];
    return $valid_date;
}






