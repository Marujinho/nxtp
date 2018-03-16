<?php
$niveis = array('adm');
require_once 'inc/inc.validateCookie.php';



$getEvent  = mysqli_query($mysqli, "SELECT * FROM events AS e JOIN venue_has_events AS v ON e.event_id = v.event_id WHERE v.venue_id = '1' AND e.status < 2 AND e.event_id >= 26");

if(isset($_POST['festa'])){

$party = $_POST['qualFesta'];

$getPeople = mysqli_query($mysqli, "SELECT COUNT(id_history) AS totC FROM history WHERE event_id = '$party'")->fetch_assoc();

//MELHOR AINDA SEPARADO POR UNIDADES VENDIDAS 
  $report = mysqli_query($mysqli, "SELECT classification, sold_as, product, SUM(product_price) as qtd, COUNT(sale) as totSold FROM booze_sold as b JOIN products as p ON p.id_product = b.product_id WHERE b.event_id = '$party' GROUP BY p.product ORDER BY totSold DESC");

$getTots = mysqli_query($mysqli, "SELECT event_id, SUM(entrance_price) AS totE, SUM(money_spent) AS totM  FROM history WHERE event_id = '$party'");

$getTotBoozeSold = mysqli_query($mysqli, "SELECT SUM(product_price) as sumBooze, COUNT(sale) as totSold FROM booze_sold as b JOIN products as p ON p.id_product = b.product_id WHERE b.event_id = '$party' ")->fetch_assoc();

$ticketMedio = $getTotBoozeSold['sumBooze']/$getPeople['totC'];

}


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
  integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
  crossorigin="anonymous"></script>
  
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="css/bootstrap.min.js"></script>


	<title>Relatorios</title>
<style type="text/css">
	.blue{
		color:blue;
	}
</style>

</head>
<body>
<div class="navbar-wrapper baixo">
        <div class="navbar-inverse" role="navigation">
         	<div class="container">
            	<div class="navbar-header">
		              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
		                <span class="sr-only">Toggle navigation</span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		              </button>
          		</div>
            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">	
              	<ul class="nav navbar-nav navbar-right">
                	<li><a href="mainMenu.php">Menu principal</a></li>              	
                	<li><a href="logOut.php">Sair</a></li>                      
             	</ul>
            </div>
            <!-- #Nav Ends -->
          </div>
        </div>
</div>

<div class="container">
	<div class="col-md-6 col-md-offset-3">
	<div class='form-group'>
	<form method="post" name="festa">
							<label for="qualFesta">Festas disponíveis no momento:</label><br>
							<select id="qualFesta" name="qualFesta" class="form-control">
								<?php
								while($event = $getEvent->fetch_assoc()){
									echo "<option value='".$event['event_id']."'>".$event['event_name']."</option>";
									}?>
								
							</select>
							<input type="submit" name="festa">
	</form>						
							</div>
		<div class="row">	
			<h1>Itens Conumidos</h1>
	
			<table class="table">			

				<thead>
					<tr>
						<th>Produto</th>
						<th>Unidades vendidas</th>
						<th>Faturamento</th>
					</tr>	

				</thead>
				<tbody>
					<?php



						while($r = $report->fetch_assoc()){

							if($r['sold_as'] == 'unity'){
								$class = 'blue';
							}else{
								$class = '';
							}

							echo "<tr><td class ='".$class."'>".$r['product']."</td>".
								 "<td class ='".$class."'>".$r['totSold']."</td>".
								 "<td class ='".$class."'>".$r['qtd']."</td></tr>";
						}
												
						


					?>
				</tbody>	
			</table>
		</div>

		<div class="row">
		<?php

				echo "<h2>Total Bar: ".$getTotBoozeSold['sumBooze'].'</h2>';

			while($t = $getTots->fetch_assoc()){

				echo "<h2>Faturamento da portaria: ".$t['totE'].'</h2>'; 
			}
				echo "<h2>Quantas pessoas entraram na festa: ".$getPeople['totC'].'</h2>';

				echo "<h2>Ticket Medio por cliente: ".number_format($ticketMedio, 2, ',', ' ').'</h2>';

		?>
		</div>	

</div>

</body>
</html>


