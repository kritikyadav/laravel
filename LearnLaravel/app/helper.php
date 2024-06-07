<?php

// Important functions.

if(!function_exists('get_formatted_date')){
    function get_formatted_date($date, $format){
        if($date != ''){
            $fromattedDate = date($format, strtotime($date));
            return $fromattedDate; 
        }else{
            return $date;
        }
    }
}
/*
if (!function_exists('get_formatted_date')) {
    function get_formatted_date($date, $format = 'd-M-Y')
    {
        return $date != "" ? date($format, strtotime($date)) : "";
    }
}
*/


?>