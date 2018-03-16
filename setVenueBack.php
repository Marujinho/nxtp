<?php
$niveis = array('god');
require_once 'inc/incValidateCookieGod.php';

if(isset($_POST['registerVenue'])){
	$VenueName = $_POST['venueName'];
	$city = $_POST['venueCity'];
	$type = $_POST['venueType'];

	//>>>>>>>>>>>>>>>>>>>>>

	$name = $_POST['name'];
	$cell = $_POST['cell'];
	$cpf = $_POST['cpf'];
	$employeePass = $_POST['employeePass'];
	

$setVenue = mysqli_query($mysqli, "INSERT INTO venue( venue_id, venue_name, city, type) VALUES (null, '$venueName', '$city', '$type')");

$lastId = mysqli_insert_id($mysqli);

$setResponsable = mysqli_query($mysqli, "INSERT INTO staff(employee_id, name, cell, cpf, position,pass,venue_id) VALUES (null, '$name', '$cell','$cpf', 'adm','$employeePass', '$lastId')");

if($setVenue && $setResponsable){
header("Location:mainMenu.php");	
	}else{
		echo "<script>alert('Erro no cadastro')</script>";
	}
}

?>