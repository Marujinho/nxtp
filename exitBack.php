<?php

$niveis = array('adm', 'host', 'caixa');
require_once 'inc/inc.validateCookie.php';


if(isset($_POST['checkIt'])){

	$tabNumber = $_POST['tabNumber'];

	$checkTab = mysqli_query($mysqli, "SELECT * FROM tabs WHERE venue_id = '$venueId' AND tab_number = '$tabNumber'")->fetch_assoc();
	//echo $checkTab['tab_number'];
	$status = $checkTab['tab_status'];
	//echo 'acuz';exit;
}

?>