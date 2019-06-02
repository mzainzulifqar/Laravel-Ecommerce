<?php



function priceFormat($value){
    return '$' . number_format($value);
}

function oldformat($value)
{
	$a = str_replace(',','',$value);
	return $a;
}

function removeComaDollar($value)
{
	$a = str_replace(',','',$value);
	$a = str_replace('$','',$a);
	return $a;
}

function currentyear()
{
	return date('Y');
}