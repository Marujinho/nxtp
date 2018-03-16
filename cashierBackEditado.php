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

$toReceiveBar = mysqli_query($mysqli, "SELECT SUM(product_price) AS trb FROM booze_sold AS b JOIN tabs AS t ON t.tab_number = b.tab_number WHERE t.tab_status BETWEEN '1' AND '2' AND t.event_id = '$todayEvent'")->fetch_assoc();

$totalEver = $toReceiveEntrance['tre']+$toReceiveBar['trb'];


//PEGA TD O QUE O CARA CONSUMIU E DISPLAY PRA NOIS
if(isset($_GET['consumed'])){

	$tabNumber = $_GET['tab'];

	$checkTab = mysqli_query($mysqli, "SELECT * FROM tabs WHERE event_id = '$todayEvent' AND tab_number = '$tabNumber'");

	$checkTabF = $checkTab->fetch_assoc();

	$tabStatus = $checkTabF['tab_status'];

	$countCheck = mysqli_num_rows($checkTab);

	if($tabStatus == '2'){
		echo "<script>alert('Essa comanda foi dada como perdida. Chame o responsável do bar!')</script>";
		echo "<script>window.location= 'cashier.php'</script>";
	}elseif($tabStatus == '0'){
		echo "<script>alert('Comanda encerrada! Favor retirar outra comanda na entrada')</script>";
		echo "<script>window.location= 'cashier.php'</script>";
	}elseif(($tabStatus == '1')&&($countCheck==1)){


	$itemsConsumed = mysqli_query($mysqli, "SELECT * FROM booze_sold AS b JOIN products AS p ON p.id_product = b.product_id WHERE b.tab_number = '$tabNumber'");

	$somaTotal = mysqli_query($mysqli, "SELECT (SUM(product_price)+entrance) AS soma, entrance, product_price FROM booze_sold AS b JOIN tabs AS t ON t.tab_number = b.tab_number WHERE t.tab_number LIKE '".$tabNumber."'")->fetch_assoc();
	
}else{
	echo "<script>alert('Essa comanda não foi cadastrada na entrada')</script>";
}


	if($somaTotal['product_price']==null){$somaTotal['soma'] = $entrancePrice['entrance'];}
		
	$hidden = 'hidden';
	$hidden2 = '';
	

}else{
	$hidden = '';
	$hidden2 = 'hidden';
}

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

	echo "<script>window.location='cashier.php'</script>";
}

//CASO ALGUEM PERCA COMANDA E QUEIRA ENCONTRAR
if(isset($_POST['findTab'])){

	$problemName = $_POST['problemName'];
	$find = mysqli_query($mysqli,"
		SELECT *
		FROM tabs AS t
		
		JOIN problems AS p
		ON t.tab_number = p.tab_number
		
		-- LEFT JOIN booze_sold AS b
		-- ON t.tab_number = b.tab_number
		
		WHERE p.name = '$problemName'
		AND t.event_id = '$eventId'
	")->fetch_assoc();

	/*
	[tab_id] => 34
    [tab_number] => 123
    [patron_id] => 54
    [entrance] => 15.00
    [event_id] => 13
    [venue_id] => 1
    [tab_status] => 1
    [problem_id] => 32
    [name] => daniel
	 * */

	echo $find['tab_number'].'AQUIIIIIII';exit;

if($find){
	
	$num = $find['tab_number'];
	$name = $find['name'];
	$bo = "nome: ".$name."<br>Numero da comanda: ".$num."<br>";
	echo $bo;
		  	
	$itsLost = mysqli_query($mysqli, "UPDATE tabs SET tab_status ='2' WHERE tab_id = '$num'");   
}else{
	echo 'nao achei';
}
/*
echo $find['tab_id'].'<br>';

echo $find['name'].'<br>';

echo $find['event_id'].'<br>';
*/
}

?>

