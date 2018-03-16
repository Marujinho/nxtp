<?php
require_once 'connect.php';
ini_set('default_charset', 'UTF-8');

$getEvent  = mysqli_query($mysqli, "SELECT * FROM events AS e JOIN venue_has_events AS v ON e.event_id = v.event_id WHERE v.venue_id = '1' AND e.status BETWEEN '1' AND '2'");


if(isset($_POST['enviarNome'])){
	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$qual = $_POST['qualFesta'];


	$nomeVdd = utf8_decode($nome).' '.utf8_decode($sobrenome);

	$nomeTd = trim($nomeVdd);

	$enviar = mysqli_query($mysqli, "INSERT INTO list (id, event_id, name, discount_type) 
		                            VALUES (null ,'$qual', '$nomeTd', 1 )");

	if($enviar){
		echo "<script>alert('enviado com sucesso')</script>";
	}else{
		echo "<script>alert('erro')</script>";
	}

}
?>