<?php
$niveis = array('god');
require_once 'inc/incValidateCookieGod.php';
	

//LISTA TODAS BALADAS QUE TENHO
$getVenues = mysqli_query($mysqli, "SELECT * FROM venue");


//CLICAR EM GERAR RELATORIO
if(isset($_POST['generate'])){

$venue = $_POST['venue'];
$from = explode('/', $_POST['from']);
$fromSet = $from[2].'-'.$from[1].'-'.$from[0];
$til = explode('/', $_POST['til']);
$tilSet = $til[2].'-'.$til[1].'-'.$til[0];
$month = $_POST['month'];
$week = $_POST['week'];


//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//TOTAL DE GANHOS DE ENTRADA E BAR

$totEntrance = mysqli_query($mysqli, "SELECT SUM(entrance) AS totE FROM tabs AS t JOIN events AS e 
							  ON t.event_id = e.event_id JOIN venue_has_events AS v ON e.event_id = v.event_id 
							  WHERE v.venue_id = '$venue' AND e.day BETWEEN '$fromSet' AND '$tilSet'")->fetch_assoc();

$totBar = mysqli_query($mysqli, "SELECT SUM(product_price) AS totB FROM booze_sold AS b JOIN events AS e 
							  ON b.event_id = e.event_id JOIN venue_has_events AS v ON e.event_id = v.event_id 
							  WHERE v.venue_id = '$venue' AND e.day BETWEEN '$fromSet' AND '$tilSet'")->fetch_assoc();

$totE = $totEntrance['totE'];
$totB = $totBar['totB'];
$totalMonth = $totE + $totB;

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//TOTAL DE PESSOAS QUE ENTRARAM NA CASA

$getPeople = mysqli_query($mysqli, "SELECT COUNT(tab_number) AS people FROM tabs AS t JOIN events AS e 
							  ON t.event_id = e.event_id JOIN venue_has_events AS v ON e.event_id = v.event_id 
							  WHERE v.venue_id = '$venue' AND e.day BETWEEN '$fromSet' AND '$tilSet'")->fetch_assoc();

$people = $getPeople['people'];

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//TICKET MEDIO POR CLIENTE GASTO BAR

$ticketMedio = $totB/$people;

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//BEBIDAS VENDIDAS
//*** NAO SEI FAZER - QUERO PEGAR A CONTAGEM DE TODOS PRODUTOS VENDIDOS POR PRODUTO, CLASSIFICAÇÃO E QTO CADA GRUPO LUCROU


$BoozeSold = mysqli_query($mysqli, "SELECT * FROM booze_sold AS b LEFT JOIN products AS p ON b.product_id = p.product_id  
									LEFT JOIN events AS e ON e.event_id = b.event_id LEFT JOIN venue_has_products AS v 
									ON v.product_id = p.id_product WHERE v.venue_id = '$venue' 
									AND e.day BETWEEN '$fromSet' AND '$tilSet'");
 				

		
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//QTAS VEZES ABRIU, SEPARA EVENTOS POR ESTILO MUSICAL 
// **** TA DANDO PAU ESSA PORRA - OS EVENTOS DIFERENTES E LISTAR POR ESTILO (talvez colocar o total de lucro na frente de cada um) 

$openVenue = mysqli_query($mysqli, "SELECT COUNT(event_name) AS opened, type_of_music FROM events AS e JOIN 											venue_has_events AS v ON e.event_id = v.event_id WHERE v.venue_id = '$venue' 										AND e.day BETWEEN '$fromSet' AND '$tilSet'");

$getType = mysqli_query($mysqli, "SELECT type_of_music FROM events AS e JOIN venue_has_events AS v 
								  ON e.event_id = v.event_id WHERE v.venue_id = '$venue' AND e.day 
								  BETWEEN '$fromSet' AND '$tilSet' GROUP BY type_of_music");


$o = $openVenue->fetch_assoc();

$opened = $o['opened'];

while ($types = $getType->fetch_assoc()){
	echo $types['type_of_music'].'<br>';
}
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>




}
?>