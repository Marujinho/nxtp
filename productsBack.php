
<?php
require_once 'connect.php';
$niveis = array('caixa','adm');
require_once 'inc/inc.validateCookie.php';


/*
//PEGA TODOS PRODUTOS DO BANCO E POE TUDO NA VARIAVEL
$pegaProdutos = mysqli_query($mysqli, "SELECT * FROM products");

//$produtos = $pegaProdutos['marca'];

$pegaP = mysqli_query($mysqli, "SELECT DISTINCT tipo_produto FROM produtos");

$pegaCerveja = mysqli_query($mysqli, "SELECT * FROM produtos WHERE tipo_produto = 'cerveja'");


$pegaNa = mysqli_query($mysqli, "SELECT * FROM produtos WHERE tipo_produto = 'na'");


$pegaDose = mysqli_query($mysqli, "SELECT * FROM produtos WHERE tipo_produto = 'dose'");

$pegaServico = mysqli_query($mysqli, "SELECT * FROM produtos WHERE tipo_produto = 'servico'");

if(isset($_POST['cadastrar'])){

	$drink_especial = $_POST['drink_especial'];
	$preco_drink = $_POST['preco'];
	$tipo = $_POST['tipo'];

	//COLOCA O DRINK NOVO NO BANCODE DADOS DE PRODUTOS GERAL
	$cadastra_novo = mysqli_query($mysqli, "INSERT INTO produtos (id_produto, tipo_produto, produto, marca) VALUES (null, '$tipo', '$drink_especial', '$drink_especial')");

	//POE O ID DO DRINK CRIADO E POE NA VARIAVEL
	$ultimo_id_drink = mysqli_insert_id($mysqli);

	//JA COLOCA NA RELACAO BAR E PRODUTOS COM O PRECO
	$cadastra_rel = mysqli_query($mysqli, "INSERT INTO bar_has_produtos(id_rel, id_produto, id_bar, preco) VALUES (null, '$ultimo_id_drink', '1', '$preco_drink')");
}

if(isset($_POST['enviar'])){
	foreach ($_POST as $key => $value) {
		$implementa = mysqli_query($mysqli, "INSERT INTO bar_has_produtos (id_rel, id_produto, id_bar, preco) VALUES (null, '$key', '1', null)");
	}
}
*/


//PEGA OS PRODUTOS VENDIDOS PELO BAR E SETTA OS BOTOES NA POS SEPARADOS POR TIPO (cerveja, nao alcolico, drink, etc)

$getEvent  = mysqli_query($mysqli, "SELECT * FROM events AS e JOIN venue_has_events AS v ON e.event_id = v.event_id WHERE v.venue_id = '$venueId' AND e.status = '2'")->fetch_assoc();

$todayEvent = $getEvent['event_id'];


$getNa = mysqli_query($mysqli, "SELECT * FROM venue_has_products
									   AS v JOIN products AS p
									   ON v.venue_id = '$venueId' WHERE v.product_id = p.id_product");

$getBeer = mysqli_query($mysqli, "SELECT * FROM venue_has_products
									   AS v JOIN products AS p
									   ON v.venue_id = '$venueId' WHERE v.product_id = p.id_product AND p.classification = 'beer'");

$getDrink = mysqli_query($mysqli, "SELECT * FROM venue_has_products
									   AS v JOIN products AS p
									   ON v.venue_id = '$venueId' WHERE v.product_id = p.id_product AND p.classification = 'drink'");

$getDose = mysqli_query($mysqli, "SELECT * FROM venue_has_products
									   AS v JOIN products AS p
									   ON v.venue_id = '$venueId' WHERE v.product_id = p.id_product AND p.sold_as = 'shot'");


$getSpecialDrink = mysqli_query($mysqli, "SELECT * FROM venue_has_products
									   AS v JOIN products AS p
									   ON v.venue_id = '$venueId' WHERE v.product_id = p.id_product AND p.classification = 'drink_especial'");


$getOther = mysqli_query($mysqli, "SELECT * FROM venue_has_products
									   AS v JOIN products AS p
									   ON v.venue_id = '$venueId' WHERE v.product_id = p.id_product AND p.classification = 'other'");



if(isset($_POST['alterPrices'])) {

	foreach ($_POST['product'] as $key => $value) {
		
		$priceBD = mysqli_query($mysqli,"SELECT price FROM venue_has_products WHERE product_id = ".$key)->fetch_assoc();

		if($priceBD['price'] != $value){

			// update do valor
			$update = mysqli_query($mysqli,"UPDATE venue_has_products SET price = '$value' WHERE product_id = '$key' ");
		}
	}
if($update){
	echo "<script>window.location = 'menu.php'</script>";
}

}

	
if(isset($_POST['setNewProduct'])){
	$classification = $_POST['classification'];
	$productName = $_POST['productName'];
	$soldAs = $_POST['soldAs'];
	$productPrice = $_POST['productPrice'];

	$setNew = mysqli_query($mysqli, "INSERT INTO products(id_product, classification, sold_as, product) 
		VALUES (null, '$classification', '$soldAs', '$productName')");

	$lastProduct = mysqli_insert_id($mysqli);

	$setNew2 = mysqli_query($mysqli, "INSERT INTO venue_has_products(rel_id, product_id, venue_id, price) 
		VALUES (null, '$lastProduct', '$venueId', '$productPrice')");

if($setNew2){
	echo "<script>window.location = 'menu.php'</script>";
}

}


//AQUI COMEÇA O BAR >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

	if(isset($_GET['sell'])){

	$tabNumber = $_GET['tab'];

	$checkTab = mysqli_query($mysqli, "SELECT * FROM tabs WHERE event_id = '$todayEvent' AND tab_number = '$tabNumber'")->fetch_assoc();
	$thisTab = $checkTab['tab_number'];
	$thisEvent = $checkTab['event_id'];

	$patron = $checkTab['patron_id'];
	$tabStatus = $checkTab['tab_status'];


	if($tabStatus=='2'){
		echo "<script>alert('Essa comanda foi dada como perdida. Chame o responsável do bar!')</script>";
		echo "<script>window.location= 'pos.php'</script>";
	}elseif($tabStatus == '0'){
		echo "<script>alert('Comanda encerrada! Favor retirar outra comanda na entrada')</script>";
		echo "<script>window.location= 'pos.php'</script>";
	}elseif(!$tabStatus){
		echo "<script>alert('FALHA NA VENDA')</script>";
		echo "<script>window.location= 'pos.php'</script>";
	}

	foreach ($_GET as $key => $value) {
		
		$kk = explode(':',$key);
		$k = $kk[0];
	
		if(($tabStatus == '1')&&($thisEvent == $todayEvent)){
		if((is_numeric($k))&&(is_numeric($value))){
		$insertIntoTab = mysqli_query($mysqli, "INSERT INTO booze_sold(tab_number, product_id, product_price, hour, event_id) VALUES('$tabNumber', '$k', '$value', CURTIME(), '$todayEvent')");
				}

				
			}
		}
		if($insertIntoTab){
			echo "<script>alert('YESSS VENDA FOI!!')</script>";		}		
}

?>