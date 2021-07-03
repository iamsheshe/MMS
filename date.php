<?php

$increment = 1;		//  # of weeks to increment by

//  First day of the first week of the year
$startdate = strtotime("31 December 2007");
$todaydate = strtotime(date("Y-m-d"));
$nextdate = strtotime("+1 weeks",$startdate);
$nextweek = strtotime("+1 weeks",$todaydate);
$time1 = date($startdate);
$time2 = date("Y-m-d", $nextdate);
$time3 = date("Y-m-d", $todaydate);
$time4 = date("Y-m-d", $nextweek);

echo $startdate. "\r\n\n". "\t\t";
echo $time1. "\r\n\n". "\t\t";

echo $nextdate. "\r\n\n". "\t\t";
echo $time2. "\r\n\n". "\t\t";

echo $todaydate. "\r\n\n". "\t\t";
echo $time3. "\r\n\n". "\t\t";

echo $nextweek. "\r\n\n". "\t\t";
echo $time4. "\r\n\n". "\t\t";

//  $all_weeks[1] is the first partial week of the year
//  $all_weeks[53] is the last partial week of the year
// $all_weeks = array();

// for ($week = 0; $week <= 52; $week += $increment)
// {
//   $week_data = array();

//   $week_data['start'] = strtotime("+$week weeks", $startdate);
//   $week_data['end'] = strtotime("+6 days", $week_data['start']);

//   $all_weeks[$week + 1] = $week_data;
// }

// echo "<pre>";
// echo "Week No.	Start Date	End Date\r\n";

// foreach ($all_weeks as $week => $week_data)
// {
//   echo $week . "\t\t" . date("Y-m-d", $week_data['start']) . 
// 	"\t" . date("Y-m-d", $week_data['end']) . "\r\n";
// }

// echo "</pre>"

?>