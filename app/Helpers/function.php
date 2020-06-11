<?php

if(!function_exists('convertToStandardDate')){
    function convertToStandardDate($date){
        $date = explode('/',$date);
        $standardDate = $date[1].'/'.$date[0].'/'.$date[2];
        return $standardDate;
    }
}
