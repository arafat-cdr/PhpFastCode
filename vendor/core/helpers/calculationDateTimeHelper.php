<?php
function num_of_nights($day1, $day2){
    $date1 = new DateTime($day1);
    $date2 = new DateTime($day2);
    // this calculates the diff between two dates,
    //which is the number of nights
    $numberOfNights = $date2->diff($date1)->format("%a");

    return $numberOfNights;
}


/**
***********************************************************
* @return true or false if a date in a given range or not
* accept date formates are below
* date is 12/12/2019
* date is 13/12/2019
* or date is 12-12-2019
* by arafat.dml@gmail.com
* Re Written at : 08 April 2020
***********************************************************
*/
function check_in_range($start_date, $end_date, $date_from_user)
{
    $ck_date_one_month = explode("/", $start_date);
    $ck_date_two_month = explode("/", $end_date);

    $start_month = (int) $ck_date_one_month[1];
    $end_month = (int) $ck_date_two_month[1];

     # checking if it is in Reverse order
     if( $start_month >  $end_month ){
        return chek_reverse_order_entry($start_date, $end_date, $date_from_user);
     }else{
        return core_check_in_range($start_date, $end_date, $date_from_user);
     }
}

/**
**************************************************
* This function check the lessThan GraterThan
* Order Entry check , start, end ...
* @param start date, end date, the date_check
* @return True or False
* by arafat.dml@gmail.com
* Written at : 08 April 2020
**************************************************
*/
function core_check_in_range($start_date, $end_date, $date_from_user)
{
  // Convert to timestamp
  $start_ts = strtotime(str_replace("/", "-", $start_date));
  $end_ts = strtotime(str_replace("/", "-", $end_date));
  $user_ts = strtotime(str_replace("/", "-", $date_from_user));

  // Check that user date is between start & end
  return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
}

/**
**************************************************
* This function check the Reverse Order Entry
* @param start date, end date, the date_check
* @return True or False
* by arafat.dml@gmail.com
* Written at : 08 April 2020
**************************************************
*/
function chek_reverse_order_entry($date1, $date2, $date_from_user)
{
    $end_date_one = "31/12/".date("Y");
    $start_date_one = "01/01/".date("Y");

    $res1 = core_check_in_range($date1, $end_date_one, $date_from_user);
    $res2 = core_check_in_range($start_date_one, $date2, $date_from_user);

    # If any One of This True Then True Otherwise False.
    if($res1 || $res2){
        return true;
    }
    return false;

}


# This function return all the date in a date range
function get_all_date_in_range($begin, $end, $interval = "1 day", $include_end = true, $date_format = "d/m/Y") {
    $all_dates_in_range =  array();

    $begin = new DateTime($begin);
    $end = new DateTime($end);

    if($include_end) {
        // this is include the end
        $end = $end->modify( '+1 day' );
    }

    $interval = DateInterval::createFromDateString($interval);
    $period = new DatePeriod($begin, $interval, $end);

    foreach ($period as $dt) {
      $all_dates_in_range[] = $dt->format($date_format);
    }

    return $all_dates_in_range;
}