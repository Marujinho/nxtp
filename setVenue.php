<?php
require_once 'setVenueBack.php';
?>

<html>
<head>
<meta charset="utf-8">
<script src="css/js/jquery-3.2.1.min.js"></script>
<script src="css/js/UI/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<meta name="viewport" content="width=device-width, user-scalable=no">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="modal/jquery.modal.js"></script>

<script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
  integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
  crossorigin="anonymous"></script>
	<title>Cadastro de estabelecimentos</title>
</head>
<body>
<div class="container">
	<h1>Cadastro de estabelecimentos</h1>
	<br>
	<div class="col-lg-6">
		<form method="post" class="form-group">
			<div>
				<label for='venueName'>Nome do estabelecimento</label>
				<input type="text" class="form-control" name="venueName" id="venueName">
			</div>
			<div>
				<label for='venueCity'>Cidade</label>
				<select name="venueCity" id="venueCity" class="form-control">
					<option>Jundiai</option>
					<option>Itupeva</option>
				</select>
			</div>
			<br>
			<div>
				<label for="venueType">Tipo do estabelecimento</label>
				<select name="venueType" id="venueType" class="form-control">
					<option>Balada</option>
					<option>Open Air</option>
					<option>Clube</option>
				</select>
			</div>
			<br><br>
			<h1>Responsável/gerente:</h1>
			
				<div class="form-group">
					<label for="name">Nome:</label>
					<input type="text" class="form-control" name="name" id="name">
				</div>
				<div class="form-group">
					<label for="cell">Celular:</label>
					<input type="text" class="form-control" name="cell" id="cell">
				</div>
				<div class="form-group">
					<label for="cpf">CPF:</label>
					<input type="text" class="form-control" name="cpf" id="cpf">
				</div>
				<div class="form-group">
					<label for="employeePass">Definir senha (Para o funcionário):</label>
					<input type="text" class="form-control" name="employeePass" id="employeePass">
				</div>
			<br><br><br>
			<div>
				<input type="submit" name="registerVenue" value="Cadastrar" class="btn btn-lg btn-success">
			</div>
		</form>
	</div>

</div>
</body>
</html>