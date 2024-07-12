<?php
require(__DIR__."/vendor/autoload.php");

use Carbon\Carbon;

/*=========================================
=            Example by arafat            =
=========================================*/

/**
 * Get the Current Date and Time using carbon
 * get_carbon_date
 * @param $timeZone, $echo
 * @return current time based on time Zone
 * @package arafat framework
 * @author arafat.dml@gmail.com
 */


function get_carbon_date($echo = true, $timeZone = false){
    # if timeZone not passed then set the default one
    if(!$timeZone){
        $timeZone = APP_TIME_ZONE;
    }
    // pr($timeZone);
    $carbon = Carbon::now($timeZone);
    if($echo){
        echo $carbon;
    }else{
       return $carbon;
    }
}

/**
 * Get the Current Date
 * get_carbon_date
 * @param $timeZone, $echo
 * @return current time based on time Zone
 * @package arafat framework
 * @author arafat.dml@gmail.com
 */


function get_carbon_date_only($echo = true, $timeZone = false){
    # if timeZone not passed then set the default one
    if(!$timeZone){
        $timeZone = APP_TIME_ZONE;
    }
    // pr($timeZone);
    $carbon = Carbon::now($timeZone)->format("Y-m-d");
    if($echo){
        echo $carbon;
    }else{
       return $carbon;
    }
}

/**
 * Get the Current Date and Time in a formate using carbon
 * if you need to pass a format pass it
 * format -->  Monday, May 18, 2020 10:54 AM
 * get_carbon_date
 * @param $format, $timeZone, $echo
 * @return current time based on time Zone
 * @package arafat framework
 * @author arafat.dml@gmail.com
 */

function get_carbon_date_format($format = "LLLL", $echo = true, $timeZone = false){
    # if timeZone not passed then set the default one
    if(!$timeZone){
        $timeZone = APP_TIME_ZONE;
    }
    $carbon = Carbon::now($timeZone)->isoFormat($format);
    if($echo){
        echo $carbon;
    }else{
       return $carbon;
    }
}

/**
 * Get A Date and Time in a formate using carbon
 * if you need to pass a format pass it
 * format -->  Monday, May 18, 2020 10:54 AM
 * get_carbon_date
 * @param $date, $format, $timeZone, $echo
 * @return $date based on time Zone and Format
 * @package arafat framework
 * @author arafat.dml@gmail.com
 */

function get_carbon_on_date_format($date, $format = "LLLL", $echo = true, $timeZone = false)
{
    # if timeZone not passed then set the default one
    if(!$timeZone){
        $timeZone = APP_TIME_ZONE;
    }
    $carbon = Carbon::createFromDate($date, $timeZone)->isoFormat($format);
    if($echo){
        echo $carbon;
    }else{
       return $carbon;
    }
}

/**
 *
 * @author arafat.dml@gmail.com
 * @package personal framework
 *
 */

function get_carbon_on_date_diff_human($date, $echo = true, $timeZone = false)
{
    # if timeZone not passed then set the default one
    if(!$timeZone){
        $timeZone = APP_TIME_ZONE;
    }
    $datetime = Carbon::createFromDate($date, $timeZone);
    $carbon = $datetime->diffForHumans();
    if($echo){
        echo $carbon;
    }else{
       return $carbon;
    }
}
/**
 *
 * @author arafat.dml@gmail.com
 * @package personal framework
 *
 */
function get_carbon_on_date_diff_day($date, $echo = true, $timeZone = false)
{
    # if timeZone not passed then set the default one
    if(!$timeZone){
        $timeZone = APP_TIME_ZONE;
    }
    $datetime = Carbon::createFromDate($date, $timeZone);

    $extra = " days ago ";
    if(get_carbon_date(false) < $datetime){
        $extra = " days remain ";
    }

    $carbon = $datetime->diffInDays().$extra;
    if($echo){
        echo $carbon;
    }else{
       return $carbon;
    }
}
/**
 *
 * @author arafat.dml@gmail.com
 * @package personal framework
 *
 */
function get_carbon_on_date_diff_hour($date, $echo = true, $timeZone = false)
{
    # if timeZone not passed then set the default one
    if(!$timeZone){
        $timeZone = APP_TIME_ZONE;
    }
    $datetime = Carbon::createFromDate($date, $timeZone);
    $extra = " hours ago ";
    if(get_carbon_date(false) < $datetime){
        $extra = " hours remain ";
    }
    $carbon = $datetime->diffInHours().$extra;
    if($echo){
        echo $carbon;
    }else{
       return $carbon;
    }
}
/**
 *
 * @author arafat.dml@gmail.com
 * @package personal framework
 *
 */
function get_carbon_on_date_diff_real_hour($date, $echo = true, $timeZone = false)
{
    # if timeZone not passed then set the default one
    if(!$timeZone){
        $timeZone = APP_TIME_ZONE;
    }
    $datetime = Carbon::createFromDate($date, $timeZone);
    $extra = " hours ago ";
    if(get_carbon_date(false) < $datetime){
        $extra = " hours remain ";
    }
    $carbon = $datetime->diffInRealHours().$extra;
    if($echo){
        echo $carbon;
    }else{
       return $carbon;
    }
}
/**
 *
 * @author arafat.dml@gmail.com
 * @package personal framework
 *
 */
function get_carbon_on_date_diff_minute($date, $echo = true, $timeZone = false)
{
    # if timeZone not passed then set the default one
    if(!$timeZone){
        $timeZone = APP_TIME_ZONE;
    }
    $datetime = Carbon::createFromDate($date, $timeZone);
    $extra = " minutes ago ";
    if(get_carbon_date(false) < $datetime){
        $extra = " minutes remain ";
    }
    $carbon = $datetime->diffInMinutes().$extra;
    if($echo){
        echo $carbon;
    }else{
       return $carbon;
    }
}
/**
 *
 * @author arafat.dml@gmail.com
 * @package personal framework
 *
 */
function get_carbon_on_date_diff_second($date, $echo = true, $timeZone = false)
{
    # if timeZone not passed then set the default one
    if(!$timeZone){
        $timeZone = APP_TIME_ZONE;
    }
    $datetime = Carbon::createFromDate($date, $timeZone);
    $extra = " seconds ago ";
    if(get_carbon_date(false) < $datetime){
        $extra = " seconds remain ";
    }
    $carbon = $datetime->diffInSeconds().$extra;
    if($echo){
        echo $carbon;
    }else{
       return $carbon;
    }
}

/**
 * add Date to Current Date
 * carbon_add_date_only
 * @param $timeZone, $echo
 * @return current time based on time Zone
 * @package arafat framework
 * @author arafat.dml@gmail.com
 */


function carbon_add_date_only($num_date_to_add, $echo = true, $timeZone = false){
    # if timeZone not passed then set the default one
    if(!$timeZone){
        $timeZone = APP_TIME_ZONE;
    }
    // pr($timeZone);
    $carbon = new Carbon();
    // Now add the days we want
    $carbon->addDays($num_date_to_add);
    $carbon = $carbon->format("m/d/Y");

    if($echo){
        echo $carbon;
    }else{
       return $carbon;
    }
}


/*printf("Carbon Now: %s", Carbon::now()->isoFormat('LLLL'));
echo "<br/>";
printf("%s",  Carbon::createFromDate("2020-05-18 10:33:24", 'Asia/Dhaka')->isoFormat('LLLL'));
echo "<br/>";
//printf("Carbon Now: %s", Carbon::now());
echo "<br/>";
$datetime = Carbon::createFromDate("2020-04-18 10:33:24", 'Asia/Dhaka');
printf("%s", $datetime->diffForHumans());
echo "<br/>";
printf("%s days ago", $datetime->diffInDays());

die();*/

/*=====  End of Example by arafat  ======*/

