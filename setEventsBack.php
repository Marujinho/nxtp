<?php

require_once 'inc/inc.validateCookie.php';

//--------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------
//DOOR >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>


//PEGA DATA DO DIA ATUAL
$today = $todayDay['year'].'-'.$todayDay['mon'].'-'.$todayDay['mday'];

$getEvent  = mysqli_query($mysqli, "SELECT * FROM events AS e JOIN venue_has_events AS v ON e.event_id = v.event_id WHERE v.venue_id = '$venueId' AND e.status = '2'")->fetch_assoc();

$eventId = $getEvent['event_id'];

$getPrices = mysqli_query($mysqli, "SELECT * FROM events WHERE event_id = '$eventId' AND status BETWEEN 1 AND 2")->fetch_assoc();

$eventAge = $getEvent['ageAllowed'];


//POE OS CLIENTES NA TB DE CLIENTES E ABRE COMANDA// TBM ABRE TABELA DE PROBLEMAS COM NOME DOS CLIENTES E O NUM DA COMANDA QUE ELES ESTÃO.

if(isset($_POST['register'])){

	$bdayF = explode('/', $_POST['bday']);
	$bday = $bdayF[2].'-'.$bdayF[1].'-'.$bdayF[0];
	$bdayCalc = $bdayF[1].'-'.$bdayF[0].'-'.$bdayF[2];
	$tabNumber = $_POST['tabNumber'];
	$patronName = $_POST['patronName'];
	$patronCell = $_POST['patronCell'];
	$rg = $_POST['rg'];
		
	$curYear =  mktime(0, 0, 0, date('m'), date('d'), date('Y'));
	
	$wasBorn = mktime( 0, 0, 0, $bdayF[1], $bdayF[0], $bdayF[2]);

	$age = floor((((($curYear - $wasBorn) / 60) / 60) / 24) / 365.25);

	if($age<$eventAge){
		echo "<script>window.location = 'idade.php'</script>";
	}else{


	$checkList = mysqli_query($mysqli, "SELECT * FROM list WHERE name LIKE '%$patronName' AND event_id = '$eventId'");
	$resultCheck = mysqli_num_rows($checkList);

	$checkListType = $checkList->fetch_assoc();
	$listType = $checkListType['discount_type'];

	if(($resultCheck > 0)&&($listType == 1)){
		$entrancePrice = $getPrices['priceList'];
	}elseif(($resultCheck > 0)&&($listType == 0)){
		$entrancePrice = 0;
	}elseif(($resultCheck > 0)&&($listType == 2)){
		$entrancePrice = 5;
	}else{
		
		$entrancePrice = $getPrices['priceNoList'];
	}

	$getList = mysqli_query($mysqli, "SELECT * FROM list AS l JOIN venue_has_events AS v 													 ON v.event_id = l.event_id WHERE l.name LIKE '$patronName'");

	$registerPatron = mysqli_query($mysqli, "INSERT INTO patrons(patron_id, name, bday, rg, cell) VALUES (null, '$patronName','$bday','$rg', '$patronCell')");
	
	$lastPatronId = mysqli_insert_id($mysqli);

	/*
	*
	* BUG MALDITO AKI, VOU VERIFICAR SE O NUMERO DA COMANDA JA FOI CADASTRADA, SE JA FOI ENTAO VAI DAR ERRO
	*
	*/


	$bugMaldito = mysqli_query($mysqli, "SELECT * FROM tabs WHERE tab_number = '$tabNumber'");
	$bugCount = mysqli_num_rows($bugMaldito);

	if($bugCount > 0){
		echo "<script>window.location = 'errorMultiplosCadastros.php'</script>";

	}else{

	$openTab = mysqli_query($mysqli, "INSERT INTO tabs(tab_id, tab_number, patron_id, entrance, event_id, venue_id, tab_status) VALUES (null, '$tabNumber','$lastPatronId','$entrancePrice', '$eventId','$venueId', '1')");

	$insertIntoProblems = mysqli_query($mysqli, "INSERT INTO problems(problem_id, name, rg, tab_number, event_id) VALUES (null, '$patronName', '$rg', '$tabNumber', '$eventId')");
	}

	if($openTab){
		echo "<script>alert('comanda cadastrada com sucesso')</script>";
	}else{
		echo "<script>window.location = 'error.php'</script>";
	}
}
}
if(isset($_POST['enterPatron'])){


	$tabNumber = $_POST['oldTabNumber'];
	$patronCell = $_POST['oldCell'];
	$findPatron = mysqli_query($mysqli, "SELECT * FROM patrons WHERE cell = '$patronCell'");

	$patronString = $findPatron->fetch_assoc();
	$patronName = $patronString['name'];
	$patronId = $patronString['patron_id'];

	$countFindPatron = mysqli_num_rows($findPatron);

	$checkList = mysqli_query($mysqli, "SELECT * FROM list WHERE name LIKE '%$patronName' AND event_id = '$eventId'");
	$resultCheck = mysqli_num_rows($checkList);
	$checkListType = $checkList->fetch_assoc();
	$listType = $checkListType['discount_type'];

	if(($resultCheck > 0)&&($listType == 1)){
		$entrancePrice = $getPrices['priceList'];
	}elseif(($resultCheck > 0)&&($listType == 0)){
		$entrancePrice = 0;
	}elseif(($resultCheck > 0)&&($listType == 2)){
		$entrancePrice = 5;
	}else{
		$entrancePrice = $getPrices['priceNoList'];
	}

	if($countFindPatron > 0){
		$openTab = mysqli_query($mysqli, "INSERT INTO tabs(tab_id, tab_number, patron_id, entrance, event_id, venue_id, tab_status) VALUES (null, '$tabNumber','$patronId','$entrancePrice', '$eventId','$venueId', '1')");

	$insertIntoProblems = mysqli_query($mysqli, "INSERT INTO problems(problem_id, name, tab_number) VALUES (null, '$patronName','$tabNumber')");
	}

	if($openTab){
		echo "<script>alert('comanda cadastrada com sucesso')</script>";
	}else{
		echo "<script>window.location = 'error.php'</script>";
	}

}









?>