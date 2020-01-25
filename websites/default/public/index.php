<?php
date_default_timezone_set('Europe/London');

function diffForHumans(DateTime $date) {
	$currentDate = new DateTime;

	$difference = $currentDate->diff($date);

	$unit = 'second';
	$count = $difference->s;

	switch(true) {
		case $difference->y > 0:
			$unit = 'year';
			$count = $difference->y;
		break;
		case $difference->m > 0:
			$unit = 'month';
			$count = $difference->m;
		break;
		case $difference->d > 0:
			$unit = 'day';
			$count = $difference->d;
		break;
		case $difference->h > 0:
			$unit = 'hour';
			$count = $difference->h;
		break;
		case $difference->i > 0:
			$unit = 'minute';
			$count = $difference->i;
		break;
	}

	if($count === 0) {
		$count = 1;
	}

	if($count !== 1) {
		//append 's' to units 
		$unit .= 's';
	}

	//check if time is in future or past. if invert property = 0 ? then its future : past
	$inversion = $difference->invert === 0 ? 'from now' : 'ago';

	return "{$count} {$unit} {$inversion}";
	// var_dump($difference);
}

//date from database can be passed into this variable
$date = new DateTime('2020-12-25 18:30:00');
//  var_dump(diffForHumans($date));
echo diffForHumans($date);
