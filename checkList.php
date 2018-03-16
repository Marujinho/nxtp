

<?php
$niveis = array('host', 'adm', 'caixa');
require_once 'inc/inc.validateCookie.php';


//CHECA QUAL O EVENTO DE HJ
$getEvent  = mysqli_query($mysqli, "SELECT * FROM events AS e JOIN venue_has_events AS v ON e.event_id = v.event_id WHERE v.venue_id = '$venueId' AND e.status = '2'")->fetch_assoc();

$list = $getEvent['priceList'];
$noList = $getEvent['priceNoList'];
$todayEvent = $getEvent['event_id'];

//CHECA SE O NOME DA PESSOA TA NA LISTA
if(isset($_POST['patronName'])){

$patronName = $_POST['patronName'];

$getList = mysqli_query($mysqli, "SELECT * FROM list AS l JOIN venue_has_events AS v 													 ON v.event_id = l.event_id WHERE l.name LIKE '%$patronName' AND l.event_id = '$todayEvent'");
										
$count = mysqli_num_rows($getList);

$d = $getList->fetch_assoc();
$dt = $d['discount_type'];


if(($count>0)&&($patronName!=null)&&($dt == '1')){

echo  "<div class= 'green-font'><img src= 'images/yes.png' width= '22'/> Nome na lista ok - Entrada: ".$list."</div>";
}elseif(($count>0)&&($patronName!=null)&&($dt == '0')){
	echo  "<div class= 'yellow-font'><img src= 'images/star.png' width= '22'/> Cliente vip - Entrada: 0,00 </div>";
}elseif(($count>0)&&($patronName!=null)&&($dt == '2')){
	echo  "<div class= 'yellow-font'><img src= 'images/star.png' width= '22'/> Desconto especial - Entrada: 5,00 </div>";
}else{
echo "<div class='red-font'><img src= 'images/no.png' width= '22'/> Sem nome na lista - Entrada: ".$noList."</div>";
	}
									
}

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

//CHECA SE JÁ É CLIENTE, PEGA NOME DELE E VERIFICA SE ESTA NA LISTA
if(isset($_POST['oldCell'])){

$regularPatronCell = $_POST['oldCell'];

$getPatron = mysqli_query($mysqli, "SELECT * FROM patrons WHERE cell = '$regularPatronCell'")->fetch_assoc();


$regularPatron = $getPatron['name'];

if($getPatron){
echo "<div class = 'pName'>".ucfirst(strtolower($regularPatron))."</div><br>";
}else{
	echo "Esse cliente não esta cadastrado<br><br>";
}
$getList = mysqli_query($mysqli, "SELECT * FROM list AS l JOIN venue_has_events AS v 													 ON v.event_id = l.event_id WHERE l.name LIKE '%$regularPatron' AND l.event_id = '$todayEvent'");
										
$count = mysqli_num_rows($getList);


$d = $getList->fetch_assoc();
$dt = $d['discount_type'];
$theName = $d['name'];

if(($count>0)&&($regularPatronCell!=null)&&($dt == '1')&&($regularPatron!=null)){

echo  "<div class= 'green-font'><img src= 'images/yes.png' width= '22'/> Nome na lista ok - Entrada: ".$list."</div>";
}elseif(($count>0)&&($regularPatronCell!=null)&&($dt == '0')&&($regularPatron!=null)){
	echo  "<div class= 'yellow-font'><img src= 'images/star.png' width= '22'/> Cliente vip - Entrada: 0,00 </div>";
}
elseif($count==0){
echo "<div class='red-font'><img src= 'images/no.png' width= '22'/> Sem nome na lista - Entrada: ".$noList."</div>";
	}



}

?>