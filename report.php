<?php
require_once 'reportBack.php';
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

	<title>Reports</title>
</head>
<body>
<div class="container">
	<div class="col-lg-6">
		<div class="row">
			<h1>Gerar relatorio:</h1>
			<h3>Escolha as datas:</h3>
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
					<input id="from" name="from" type="text" placeholder="Desde" required=""  class="form-control">
				</div>
				<div class="form-group">
					<input id="til" name="til" type="text" placeholder="Até" required=""  class="form-control">
				</div>
				<div class="form-group">
					<select name="month" class="form-control">
						<option value="janeiro">Janeiro</option>
						<option value="fevereiro">Fevereiro</option>
						<option value="marco">Março</option>
						<option value="abril">Abril</option>
						<option value="maio">Maio</option>
						<option value="junho">Junho</option>
						<option value="julho">Julho</option>
						<option value="agosto">Agosto</option>
						<option value="setembro">Setembro</option>
						<option value="outubro">Outubro</option>
						<option value="novembro">Novembro</option>
						<option value="dezembro">Dezembro</option>
					</select>	
				</div>
				<div class="form-group">
					<select name="week" class="form-control">
						<option value="1º semana">1º semana</option>
						<option value="2º semana">2º semana</option>
						<option value="3º semana">3º semana</option>
						<option value="4º semana">4º semana</option>
					</select>
				</div>
				<div class="form-group">
					<input  name="generate" type="submit"  value="GERAR RELATÓRIO" class="btn btn-success form-control">
				</div>
			</form>
		</div>

		<div id="aqui">
			<!--RELATORIO APARECE AQUI-->
			<h1><?=strtoupper($month).' - '.$week?></h1>

			<br>
			<h2>Ganhos:</h2>
			<h4>TOTAL GERAL: <?=$totalMonth?></h4>
			<h4>ENTRADA: <?=$totE?></h4>
			<h4>BAR: <?=$totB?></h4>
			<br>
			<h2>Clientes :</h2>

			<h4>TOTAL DE VISITANTES: <?=$people?> </h4>
			<h4>MÉDIA DE CONSUMO NO BAR POR CLIENTE: <?=number_format($ticketMedio, 2, ',', '.')?></h4>
			<br>
			<h2>Bar :</h2>
			<h4>Lorem ipsum</h4>
			<h2>Eventos :</h2>
			<h4>A casa abriu <?=$opened?> vezes</h4>
			
		</div>	
	</div>
</div>





<script type="text/javascript">
$(document).ready(function(e) {
    $("#from").datepicker({
        dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
        dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
        dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
        monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
        monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
        dateFormat: 'dd/mm/yy',
        nextText: 'Próximo',
        prevText: 'Anterior'
    });
     $("#til").datepicker({
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