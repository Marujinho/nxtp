<?php
$niveis = array('god');
require_once 'inc/incValidateCookieGod.php';

$getProducers = mysqli_query($mysqli, "SELECT * FROM staff WHERE position = 'producer' AND venue_id = '$12'");

$getVenues = mysqli_query($mysqli, "SELECT * FROM venue");

//POE O QUE VEM DO FORMULARIO NAS VARIAVEIS
if(isset($_POST['createEvent'])){
	if(!empty ($_POST['eventName'])){
	$eventName = $_POST['eventName'];
}else{
	$eventName = 'evento sem nome';
}
	$typeOfMusic = $_POST['typeOfMusic'];
	if(isset($_POST['lgbt'])){
		$lgbt = '1';
	}else{
		$lgbt = '0';
	}
	$priceNoList = $_POST['priceNoList'];
	$priceList = $_POST['priceList'];
	$day = explode('/', $_POST['day']);
	$daySet = $day[2].'-'.$day[1].'-'.$day[0];
	$producer = $_POST['producer'];
	$venue = $_POST['venue'];
	$ageAllowed = $_POST['ageAllowed'];

//CRIA O EVENTO NO BANCO
$createEventBitch = mysqli_query($mysqli, "INSERT INTO events(event_id, event_name, type_of_music, lgbt, day, priceNoList, priceList, ageAllowed, status, producer) VALUES (null, '$eventName', '$typeOfMusic','$lgbt','$daySet', '$priceNoList', '$priceList', '$ageAllowed', '1','$producer')");

$lastId = mysqli_insert_id($mysqli);




$insertRel = mysqli_query($mysqli, "INSERT INTO venue_has_events(rel_id, venue_id, event_id) VALUES (null, '$venue','$lastId')");

//header('Location:eventosForm.php');
}

//PEGA OS EVENTOS QUE EXISTEM PARA MOSTRAR NA TABELA QUAIS EVENTOS TEM NA SEMANA
$getEvents = mysqli_query($mysqli, "SELECT * FROM events AS e JOIN venue_has_events AS v ON v.event_id = e.event_id WHERE e.status BETWEEN 1 AND 2");



?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no">
<script href="css/js/jquery-3.2.1.min" ></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
  integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
  crossorigin="anonymous"></script>

<!-- CSS padrão na pasta css/redmond -->
<link href="css/redmond/jquery-ui-1.10.1.custom.css" rel="stylesheet" />

	<title></title>
<style>
	.ui-widget {
    font-family: "Lucida Grande", "Lucida Sans", Arial, sans-serif;
    font-size: 12px;
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
                	<li><a href="godMenu55Paulinha.php">Menu Principal</a></li>  
                	<li><a href="logOut.php">Sair</a></li>   
             	</ul>
            </div>
            <!-- #Nav Ends -->
          </div>
        </div>
</div>
<div class="container">

<h1>Criar evento</h1>
	<div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
		
			<form method="post">	

				<div class="form-group">
					<label>Estabelecimento:</label>
					<select class="form-control" name="venue">
						<?php
							while($v = $getVenues->fetch_assoc()){
								echo "<option value = '".$v['venue_id']."'>".$v['venue_name']."</option>";
							}

						?>	
					</select>
				</div>
				<div class="form-group">	
					<input type="text" name="eventName" placeholder="Nome do evento" class="form-control">
				</div>
				<div class="form-group">
					<select name="typeOfMusic" class="form-control">
						<option value="nenhum">Estilo de musica do evento</option>
						<option value="forro">Forró</option>
						<option value="eletronica">Eletrônica</option>
						<option value="indie rock">indie rock</option>
						<option value="indie e pop">indie&pop</option>
						<option value="pop">Musica pop</option>
						<option value="baile funk">Baile funk</option>
						<option value="mix">Varios estilos misturados</option>	
					</select>
				</div>	
				<div class="form-group">
					LGBT &nbsp<img src="images/flag.png" width="35">&nbsp &nbsp
					<input type="checkbox" name="lgbt" id="lgbt">
				</div>
				<div class="form-group">
					<input type="text" name="priceNoList" placeholder="Valor SEM nome na lista" class="form-control">
				</div>
				<div class="form-group">
					<input type="text" name="priceList" placeholder="Valor COM nome na lista" class="form-control">
				</div>
				<div class="form-group">
					<input type="text" name="ageAllowed" placeholder="Idade minima no evento">
				</div>
				<div class="form-group">
					<input id="datepicker" name="day" type="text" placeholder="Data do evento" required=""  class="form-control">
				</div>
				<div class="form-group">
					<select name="producer" class="form-control">
					<option value="0">Evento próprio</option>
					<?php
						while($producer = $getProducers->fetch_assoc()){
							echo "<option value = '".$producer['employee_id']."'>".$producer['name'].' '."</option>";
						}
					?>
					</select>
				</div>
				<br>
				<div class="form-group">
					<input type="submit" class="btn btn-success" name="createEvent" value="Criar evento">		
				</div>
			</form>
	<br>
	<a href="index2.php"><button class="btn btn-info">Voltar ao menu</button></a>
	<h1>Eventos desta semana</h1>
	</div>
		<table class="table">
			<tr>
				<td><b>NOME DO EVENTO</b></td>
				<td><b>ESTILO MUSICAL</b></td>
				<td><b>PREÇO SEM NOME NA LISTA</b></td>
				<td><b>PREÇO COM NOME NA LISTA</b></td>
				<td><b>DATA</b></td>
				<td><b>ID DO EVENTO</b></td>
			</tr>	
				<?php
				
				while ($event = $getEvents->fetch_assoc()) {
					echo "<tr><td>".$event['event_name']."</td><td>".$event['type_of_music']."</td><td>".$event['priceNoList']."</td><td>".$event['priceList']."</td><td>".$event['day']."</td><td>".$event['event_id']."</td></tr>";
				}
				?>	
		</table>
	<hr>
</div>
<script type="text/javascript">
$(document).ready(function(e) {
    $("#datepicker").datepicker({
        dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
        dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
        dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
        monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
        monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
        dateFormat: 'dd/mm/yy',
        nextText: 'Próximo',
        prevText: 'Anterior'
    });



});
</script>
</body>
</html>