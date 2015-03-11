<?php
namespace Bakery\Components;
use Carbon\Carbon;
class Convert {

    public function code($var)
    {
        $var = str_pad($var, 10, "0", STR_PAD_LEFT); 
        return $var;
    }
    public function date($var)
    {
    	$date = date("d-m-Y", strtotime($var));
    	return $date;
    }
    public function getDay($date)
    {
        $days = array(
            0 => 'Sunday',
            1 => 'Monday',
            2 => 'Tuesday',
            3 => 'Wednesday',
            4 => 'Thursday',
            5 => 'Friday',
            6 => 'Saturday',
        );

        $day = Carbon::createFromFormat('Y-m-d', $date)->dayOfWeek;

        return $days[$day];
    }


}