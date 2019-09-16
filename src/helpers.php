<?php

function dateParse($date)
{
    //D/MM/YYYY -> YYYY-MM-DD

    $dateArray = explode('/', $date);
    //[DD, MM, YYYY]
    $dateArray = array_reverse($dateArray);
    //[yyyy, mm, dd ]
    RETURN implode('-', $dateArray);

}

function numberParse($number)
{
    //1.000,50 -> 1000.50
    $newNumber = str_replace('.', '', $number);
    $newNumber = str_replace(',', '.', $newNumber);
    return $newNumber;

}
