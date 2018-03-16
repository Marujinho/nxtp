<?php
$niveis = array('adm', 'caixa');
require_once 'inc/inc.validateCookie.php';

//PEGA AS COMANDA ABERTA, QTO JA ENTROU E QTO AINDA FALTA ENTRAR
$getEvent  = mysqli_query($mysqli, "SELECT * FROM events AS e JOIN venue_has_events AS v ON e.event_id = v.event_id WHERE v.venue_id = '$venueId' AND e.status = '2'")->fetch_assoc();

$todayEvent = $getEvent['event_id'];
$eventId = $getEvent['event_id'];

$getOpenTabs = mysqli_query($mysqli, "SELECT COUNT(*) AS tot FROM tabs WHERE event_id = '$todayEvent' AND tab_status BETWEEN '1' AND '2'")->fetch_assoc();

$receivedBar = mysqli_query($mysqli, "SELECT SUM(product_price) AS tr FROM booze_sold AS b JOIN tabs AS t ON t.tab_number = b.tab_number WHERE t.tab_status = '0' AND t.event_id = '$todayEvent'")->fetch_assoc();

$receivedEntrance = mysqli_query($mysqli, "SELECT SUM(entrance) AS etot FROM tabs WHERE tab_status = '0' AND event_id = '$todayEvent'")->fetch_assoc();

$toReceiveEntrance = mysqli_query($mysqli, "SELECT SUM(entrance) AS tre FROM tabs WHERE tab_status BETWEEN '1' AND '2' AND event_id = '$todayEvent'")->fetch_assoc();

$toReceiveBar = mysqli_query($mysqli, "SELECT SUM(product_price) AS trb FROM booze_sold AS b JOIN tabs AS t ON t.tab_number = b.tab_number WHERE t.tab_status BETWEEN '1' AND '2' AND t.event_id = '$todayEvent' AND b.event_id = '$todayEvent'")->fetch_assoc();

$totalEver = $toReceiveEntrance['tre']+$toReceiveBar['trb'];


//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//PEGA TD O QUE O CARA CONSUMIU E COLOCA NA TELA

if(isset($_GET['consumed'])){

	$tabNumber = $_GET['tab'];

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//PEGA NOME DO CLIENTE	

$getPatronName = mysqli_query($mysqli, "SELECT name FROM patrons AS p JOIN tabs AS t ON t.patron_id = p.patron_id WHERE t.tab_number = '$tabNumber'")->fetch_assoc();

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//VERIFICA SE ESSA COMANDA TAVA ABERTA EM OUTRO EVENTO 
$isCrook = mysqli_query($mysqli, "SELECT * FROM tabs WHERE tab_number = '$tabNumber' AND event_id != '$eventId' AND tab_status = '1'");
$countCrook = mysqli_num_rows($isCrook);

$isCrookFetch = $isCrook->fetch_assoc();

$eventCrooked = $isCrookFetch['event_id'];

if($countCrook>0){

$gotcha = mysqli_query($mysqli, "SELECT * FROM events WHERE event_id = '$eventCrooked'")->fetch_assoc();
$eventCrookedName = $gotcha['event_name'];
echo "<h1>OPS...</h1>";
echo "<h1>Essa comanda nao foi fechada no evento <b>".$eventCrookedName.'</b></h1>';

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//VE O QUE FICOU PRA ELE PAGAR E MANDA ELE PAGAR


$getBill = mysqli_query($mysqli, "SELECT * FROM booze_sold AS b JOIN products AS p ON p.id_product = b.product_id WHERE b.tab_number = '$tabNumber' AND b.event_id = '$eventCrooked'");

$somaBar = mysqli_query($mysqli, "SELECT SUM(product_price) AS somaBar, entrance, product_price FROM booze_sold AS b JOIN tabs AS t ON t.tab_number = b.tab_number WHERE t.event_id = '$eventCrooked' AND t.tab_number LIKE '".$tabNumber."'")->fetch_assoc();


$checkTab = mysqli_query($mysqli, "SELECT * FROM tabs WHERE event_id = '$eventCrooked' AND tab_number = '$tabNumber'");

$checkTab2 = mysqli_query($mysqli, "SELECT * FROM tabs WHERE event_id = '$eventCrooked' AND tab_number = '$tabNumber'")->fetch_assoc();

$somaTot = $checkTab2['entrance']+$somaBar['somaBar'];

$itemsConsumed = mysqli_query($mysqli, "SELECT * FROM booze_sold AS b JOIN products AS p ON p.id_product = b.product_id WHERE b.tab_number = '$tabNumber' AND b.event_id = '$eventCrooked'");

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
echo "<form method='post'>
<input name='closeNow' type='submit' value='COMANDA PAGA'>
</form>";

if(isset($_POST['closeNow'])){
	$closeTab = mysqli_query($mysqli,"UPDATE tabs SET tab_status = '0' WHERE tab_number = '$tabNumber' AND event_id = '$eventCrooked'");
	if($closeTab){
	echo "<script>alert('Comanda foi fechada copm sucesso')</script>";
	echo "<script>window.location= 'cashier.php'</script>";
	}
}
exit;}

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//SE COMANDA TA OK, ELE SEGUE VENDO O QUE FOI CONSUMIDO NORMAL E IMPRIME NA TELA

	$checkTab = mysqli_query($mysqli, "SELECT * FROM tabs WHERE event_id = '$todayEvent' AND tab_number = '$tabNumber'");

	$checkTab2 = mysqli_query($mysqli, "SELECT * FROM tabs WHERE event_id = '$todayEvent' AND tab_number = '$tabNumber'")->fetch_assoc();

	$tabStatus = $checkTab2['tab_status'];

	$countCheck = mysqli_num_rows($checkTab);



	if(($tabStatus == '2')&&($countCheck==1)){
		echo "<script>alert('ESSA COMANDA HAVIA SIDO DADA COMO PERDIDA...')</script>";

		$itemsConsumed = mysqli_query($mysqli, "SELECT * FROM booze_sold AS b JOIN products AS p ON p.id_product = b.product_id WHERE b.tab_number = '$tabNumber' AND b.event_id = '$eventId'");

		$itemsConsumedCount = mysqli_num_rows($itemsConsumed); 



	$somaBar = mysqli_query($mysqli, "SELECT SUM(product_price) AS somaBar, entrance, product_price FROM booze_sold AS b JOIN tabs AS t ON t.tab_number = b.tab_number WHERE t.event_id = '$eventId' AND t.tab_number LIKE '".$tabNumber."'")->fetch_assoc();

		$somaTot = $checkTab2['entrance']+$somaBar['somaBar'];
		$total = "<h3>TOTAL: ".$somaTot."</h3>";

		
	}elseif(($tabStatus == '0')&&($countCheck==1)){
		echo "<script>alert('Comanda encerrada! Favor retirar outra comanda na entrada')</script>";
		echo "<script>window.location= 'cashier.php'</script>";
	}elseif(($tabStatus == '1')&&($countCheck==1)){


	$itemsConsumed = mysqli_query($mysqli, "SELECT * FROM booze_sold AS b JOIN products AS p ON p.id_product = b.product_id WHERE b.tab_number = '$tabNumber' AND b.event_id = '$eventId'");

	$itemsConsumedCount = mysqli_num_rows($itemsConsumed); 

	

	$somaBar = mysqli_query($mysqli, "SELECT SUM(product_price) AS somaBar, entrance, product_price FROM booze_sold AS b JOIN tabs AS t ON t.tab_number = b.tab_number WHERE t.event_id = '$eventId' AND t.tab_number LIKE '".$tabNumber."'")->fetch_assoc();

		$somaTot = $checkTab2['entrance']+$somaBar['somaBar'];
		$total = "<h3>TOTAL: ".number_format($somaTot, 2, ',', '.')."</h3>";




}else{
	echo "<script>alert('Essa comanda não existe')</script>";
	echo "<script>window.location = 'cashier.php'</script>";
}

	if($somaTotal['product_price']==null){$somaTotal['soma'] = $entrancePrice['entrance'];}
		
	$hidden = 'hidden';
	$hidden2 = '';
	



}else{
	$hidden = '';
	$hidden2 = 'hidden';
	$total = "<h3>TOTAL: <h3>";
}
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//FECHA COMANDA
if(isset($_POST['closeTab'])){

	$tabN = $_POST['tab'];
    $historySelect = mysqli_query($mysqli, "SELECT * FROM tabs AS t JOIN events AS e ON t.event_id = e.event_id WHERE t.tab_number = '$tabN'")->fetch_assoc();

    $soma = mysqli_query($mysqli, "SELECT SUM(product_price) AS soma FROM booze_sold where tab_number LIKE '".$tabN."'")->fetch_assoc();

    $somaProducts = $soma['soma']; 
    $patronId = $historySelect['patron_id'];
    $entrancePrice = $historySelect['entrance'];
    $eventId = $historySelect['event_id'];
    $tabId = $historySelect['tab_number'];
    $music = $historySelect['type_of_music'];
    $day = $historySelect['day'];

	$historyInsert = mysqli_query($mysqli, "INSERT INTO history(id_history, event_id,  patron_id, type_of_music, entrance_price, money_spent, venue_id, week_day) VALUES (null, '$eventId', '$patronId', '$music', '$entrancePrice', '$somaProducts','$venueId', '$day')");

	$closeTab = mysqli_query($mysqli,"UPDATE tabs SET tab_status = '0' WHERE tab_number = '$tabN'");

	echo "<script>window.location='cashier.php'</script>";}



?>

