<?php

$increment = 1;		//  # of weeks to increment by

//  First day of the first week of the year
$startdate = strtotime("31 December 2007");

//  $all_weeks[1] is the first partial week of the year
//  $all_weeks[53] is the last partial week of the year
$all_weeks = array();

for ($week = 0; $week <= 52; $week += $increment)
{
  $week_data = array();

  $week_data['start'] = strtotime("+$week weeks", $startdate);
  $week_data['end'] = strtotime("+6 days", $week_data['start']);

  $all_weeks[$week + 1] = $week_data;
}

echo "<pre>";
echo "Week No.	Start Date	End Date\r\n";

foreach ($all_weeks as $week => $week_data)
{
  echo $week . "\t\t" . date("Y-m-d", $week_data['start']) . 
	"\t" . date("Y-m-d", $week_data['end']) . "\r\n";
}

echo "</pre>"

?>