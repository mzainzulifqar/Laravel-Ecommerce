<?php



function priceFormat($value){
    return '$' . number_format($value);
}

function oldformat($value)
{
	$a = str_replace(',','',$value);
	return $a;
}