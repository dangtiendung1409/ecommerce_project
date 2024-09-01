<?php
function prx($arr)
{
    echo "<pre>";
    print_r($arr);
    die();
}
function replaceStr($str)
{
    return preg_replace('/\s+/', '_', $str);
}

