<?php
function numbersKH($number)
{
    $num = array_map(function ($str) {
        $numeric = [
            0 => '០',
            1 => '១',
            2 => '២',
            3 => '៣',
            4 => '៤',
            5 => '៥',
            6 => '៦',
            7 => '៧',
            8 => '៨',
            9 => '៩'
        ];
        return $numeric[$str];
    }, str_split($number));
    return implode('', $num);
}
function monthsKH($month)
{
    $months = ['មករា', 'កុម្ភៈ', 'មីនា', 'មេសា', 'ឧសភា', 'មិថុនា', 'កក្កដា', 'សីហា', 'កញ្ញា', 'តុលា', 'វិច្ឆិកា', 'ធ្នូ'];
    return $months[--$month];
}
//full KH Date
function KH_Date($date)
{
    $d = numbersKH(date_format($date, 'd'));
    //n is Numeric representation of a month, without leading zeros
    $m = monthsKH(date_format($date, 'n'));
    $y = numbersKH(date_format($date, 'Y'));
    $showing_kh_date = "ថ្ងៃទី $d ខែ $m ឆ្នាំ $y";
    return $showing_kh_date;
}
