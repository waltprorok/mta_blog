<?php

if(! function_exists('remove:spaces')) {
    function remove_spaces($string) {
        $result = str_replace(' ', '', $string);
        return $result;
    }
}
