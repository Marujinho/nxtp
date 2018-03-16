<?php
require_once 'connect.php';
$niveis = array('god');
require_once 'inc/incValidateCookieGod.php';


$getEvent  = mysqli_query($mysqli, "SELECT * FROM events AS e JOIN venue_has_events AS v ON e.event_id = v.event_id WHERE v.venue_id = '1' AND e.status BETWEEN '1' AND '2'");


if(isset($_POST['registerNames'])){
	
	$which = $_POST['whichEvent'];
	$type = $_POST['type'];
	$names = explode(',', strtolower(trim(utf8_decode($_POST['list']))));

	$count = count($names);

	foreach ($names as $name) {
		$insert = mysqli_query($mysqli, "INSERT INTO list (id, event_id, name, discount_type) VALUES (null, '$which', '$name', '$type')");
	}
}



?>