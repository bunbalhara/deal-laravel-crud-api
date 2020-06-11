<?php

if(!function_exists('customCheckDate')){
    function customCheckDate($date){
        $date = explode('/',$date);
        $standardDate = $date[1].'/'.$date[0].'/'.$date[2];
        return time()>strtotime($standardDate);
    }
}
