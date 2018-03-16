<?php
require_once 'setEventsBack.php';
require_once 'connect.php';

$todayDay = getDate();
$todayOne = $todayDay['mday']+1;
$killDay = $todayDay['year'].'-'.$todayDay['mon'].'-'.$todayOne;

echo $today;exit;


$killStatus = mysqli_query($mysqli,"UPDATE events SET status = '0' WHERE event_id = 5");


?>