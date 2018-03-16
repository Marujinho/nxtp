<?php

$niveis = array('adm', 'caixa');
require_once 'inc/inc.validateCookie.php';

// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
// PEGA EVENTO DE HJ E POE NA VARIAVEL
$getEvent  = mysqli_query($mysqli, "SELECT * FROM events AS e JOIN venue_has_events AS v ON e.event_id = v.event_id WHERE v.venue_id = '$venueId' AND e.status = '2'")->fetch_assoc();

$todayEvent = $getEvent['event_id'];
$eventId = $getEvent['event_id'];


//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
// ENCONTRA O CLIENTE ATRAVES DO RG E ENCONTRA O NUMERO DA COMANDA QUE ELE ENTROU

if(isset($_GET['findIt'])){


	$rg = $_GET['fuckerId'];

	$findTab = mysqli_query($mysqli, "SELECT * FROM problems WHERE rg = '$rg' AND event_id = '$eventId'")->fetch_assoc();

	$motherfuckerTab = $findTab['tab_number'];

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
// VE SE A COMANDA É DO EVENTO PASSADO

$isCrook = mysqli_query($mysqli, "SELECT * FROM tabs WHERE tab_number = '$motherfuckerTab' AND event_id != '$eventId' AND tab_status = '1'");
$countCrook = mysqli_num_rows($isCrook);

$isCrookFetch = $isCrook->fetch_assoc();

$eventCrooked = $isCrookFetch['event_id'];

if($countCrook>0){

$gotcha = mysqli_query($mysqli, "SELECT * FROM events WHERE event_id = '$eventCrooked'")->fetch_assoc();
$eventCrookedName = $gotcha['event_name'];

echo "<h1>Essa comanda nao foi fechada no evento <b>".$eventCrookedName.'</b></h1>';

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//VE O QUE FICOU PRA ELE PAGAR E MANDA ELE PAGAR


$getBill = mysqli_query($mysqli, "SELECT * FROM booze_sold AS b JOIN products AS p ON p.id_product = b.product_id WHERE b.tab_number = '$motherfuckerTab' AND b.event_id = '$eventCrooked'");

$somaBar = mysqli_query($mysqli, "SELECT SUM(product_price) AS somaBar, entrance, product_price FROM booze_sold AS b JOIN tabs AS t ON t.tab_number = b.tab_number WHERE t.event_id = '$eventCrooked' AND t.tab_number LIKE '".$motherfuckerTab."'")->fetch_assoc();


$checkTab = mysqli_query($mysqli, "SELECT * FROM tabs WHERE event_id = '$eventCrooked' AND tab_number = '$motherfuckerTab'");

$checkTab2 = mysqli_query($mysqli, "SELECT * FROM tabs WHERE event_id = '$eventCrooked' AND tab_number = '$motherfuckerTab'")->fetch_assoc();

$somaTot = $checkTab2['entrance']+$somaBar['somaBar'];

$itemsConsumedCount = mysqli_num_rows($getBill);

echo "<h2>itens consumidos: </h2>";

while($entrance = $checkTab->fetch_assoc()){
					echo "<p class='pedido'> Entrada - ".$entrance['entrance']."</p>";
				}	
				if($itemsConsumedCount > 0){
				while($item = $itemsConsumed->fetch_assoc()){
					echo "<p class='pedido'>".ucfirst($item['product']).' - '.$item['product_price'].' ----- ('.$item['hour'].")</p>";
						}
					}

echo "<h1> Total á pagar: ".number_format($somaTot, 2, ',', '.')."</h1>";
echo "<a href = 'cashier.php'><button class = 'btn btn-danger'>VOLTAR PARA O CAIXA</button></a>";
exit;

}

	
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//PEGA TD QUE ESSE NUMERO CONSUMIU (ta no mesmo laço do botao *** $_GET['findIt'] *** )

	//$tabNumber = $_GET['tab'];
	$checkTab = mysqli_query($mysqli, "SELECT * FROM tabs WHERE event_id = '$todayEvent' AND tab_number = '$motherfuckerTab'");

	$checkTab2 = mysqli_query($mysqli, "SELECT * FROM tabs WHERE event_id = '$todayEvent' AND tab_number = '$motherfuckerTab'")->fetch_assoc();

	$tabStatus = $checkTab2['tab_status'];

	$countCheck = mysqli_num_rows($checkTab);



	if(($tabStatus == '2')&&($countCheck==1)){
		echo "<script>alert('ESSA COMANDA HAVIA SIDO DADA COMO PERDIDA...')</script>";

		$itemsConsumed = mysqli_query($mysqli, "SELECT * FROM booze_sold AS b JOIN products AS p ON p.id_product = b.product_id WHERE b.tab_number = '$motherfuckerTab' AND b.event_id = '$eventId'");

		$itemsConsumedCount = mysqli_num_rows($itemsConsumed); 



	$somaBar = mysqli_query($mysqli, "SELECT SUM(product_price) AS somaBar, entrance, product_price FROM booze_sold AS b JOIN tabs AS t ON t.tab_number = b.tab_number WHERE t.event_id = '$eventId' AND t.tab_number LIKE '".$motherfuckerTab."'")->fetch_assoc();

		$somaTot = $checkTab2['entrance']+$somaBar['somaBar'];
		$total = "<h3>TOTAL: ".number_format($somaTot, 2,  ',', '.')."</h3>";

								
	}elseif(($tabStatus == '0')&&($countCheck==1)){
		echo "<script>alert('Comanda encerrada! Favor retirar outra comanda na entrada')</script>";
		echo "<script>window.location= 'cashier.php'</script>";
	}elseif(($tabStatus == '1')&&($countCheck==1)){


	$itemsConsumed = mysqli_query($mysqli, "SELECT * FROM booze_sold AS b JOIN products AS p ON p.id_product = b.product_id WHERE b.tab_number = '$motherfuckerTab' AND b.event_id = '$eventId'");

	$itemsConsumedCount = mysqli_num_rows($itemsConsumed); 

	

	$somaBar = mysqli_query($mysqli, "SELECT SUM(product_price) AS somaBar, entrance, product_price FROM booze_sold AS b JOIN tabs AS t ON t.tab_number = b.tab_number WHERE t.event_id = '$eventId' AND t.tab_number LIKE '".$motherfuckerTab."'")->fetch_assoc();

		$somaTot = $checkTab2['entrance']+$somaBar['somaBar'];
		$total = "<h3>TOTAL: ".number_format($somaTot, 2,  ',', '.')."</h3>";


		$hidden = 'hidden';
		$hidden2 = '';
	
}


}

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//FECHA COMANDA
if(isset($_POST['closeTab'])){

	//$tabN = $_POST['tab'];
    $historySelect = mysqli_query($mysqli, "SELECT * FROM tabs AS t JOIN events AS e ON t.event_id = e.event_id WHERE t.tab_number = '$motherfuckerTab'")->fetch_assoc();

    $soma = mysqli_query($mysqli, "SELECT SUM(product_price) AS soma FROM booze_sold where tab_number LIKE '".$motherfuckerTab."'")->fetch_assoc();

    $somaProducts = $soma['soma']; 
    $patronId = $historySelect['patron_id'];
    $entrancePrice = $historySelect['entrance'];
    $eventId = $historySelect['event_id'];
    $tabId = $historySelect['tab_number'];
    $music = $historySelect['type_of_music'];
    $day = $historySelect['day'];

	$historyInsert = mysqli_query($mysqli, "INSERT INTO history(id_history, event_id,  patron_id, type_of_music, entrance_price, money_spent, venue_id, week_day) VALUES (null, '$eventId', '$patronId', '$music', '$entrancePrice', '$somaProducts','$venueId', '$day')");

	$closeTab = mysqli_query($mysqli,"UPDATE tabs SET tab_status = '0' WHERE tab_number = '$motherfuckerTab'");

	if($closeTab){
		
	echo "<script>alert('Pagamento efetuado com sucesso!')</script>";
	echo "<script>window.location='cashier.php'</script>";		
	}else{
		echo "<script>alert('ERRO em fechar a comanda! ')</script>";
		echo "<script>window.location='lostTab.php'</script>";
	}

	
}





?>