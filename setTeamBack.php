<?php

require_once 'connect.php';
$niveis = array('adm');
require_once 'inc/inc.validateCookie.php';



if(isset($_POST['registerTeam'])){
	$name = $_POST['name'];
	$cell = $_POST['cell'];
	$cpf = $_POST['cpf'];
	$employeePass = $_POST['employeePass'];
	$position = $_POST['position'];

	$insertEmployee = mysqli_query($mysqli, "INSERT INTO staff(employee_id, name, cell, cpf, position,pass,venue_id) VALUES (null, '$name', '$cell','$cpf', '$position','$employeePass', '$venueId')");

}

$getStaff = mysqli_query($mysqli, "SELECT * FROM staff WHERE venue_id = '$venueId'");



?>