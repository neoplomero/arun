<?php
namespace Bakery\Components;

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


}