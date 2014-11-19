<?php
namespace Bakery\Components;

class Convert {

    public function code($var)
    {
        $var = str_pad($var, 10, "0", STR_PAD_LEFT); 
        return $var;
    }


}