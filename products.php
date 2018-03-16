<?php
require_once 'productsBack.php';
$niveis = array('adm', 'caixa');


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
  integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
  crossorigin="anonymous"></script>
	<title></title>
	<style>
		
		.bebidas{
			font-size: 14pt;

		}

	</style>
</head>
<body>
<div class="container">
	<h1>O que você vende na casa</h1>
		<form method="post" action='menu.php'>
			<h1>Não Alcólicos</h1>
				<?php
				while ($na = $pegaNa->fetch_assoc()) {			
				 	 echo "<div class='bebidas'>".$na['marca'].' '?><input type='checkbox' value ="<?=$na['id_produto']?>"></div> <br>
					<?php
				}
					?>

			<h1>Cervejas</h1>	
				<?php
				while ($cerveja = $pegaCerveja->fetch_assoc()) {			
				 	 echo "<div class='bebidas'>".$cerveja['marca'].' '?><input type='checkbox' value ="<?=$cerveja['id_produto']?>"></div> <br>
					<?php
				}
					?>
			<h1>Doses</h1>	
				<?php
				while ($dose = $pegaDose->fetch_assoc()) {			
				 	 echo "<div class='bebidas'>".$dose['marca'].' '?><input type='checkbox' value ="<?=$dose['id_produto']?>"></div> <br>
					<?php
				}
					?>		
				<input type="submit" name="enviar" class="btn btn-success" >
		</form>
	<hr>
	<h1>Inserir produtos novos no menu do bar</h1>
	<form method="post">
		<h3>Drinks Especiais</h3>	
		<select name="tipo">
			<?php
			while ($produto = $pegaP->fetch_assoc()) {
				 echo 	"<option>".$produto['tipo_produto']."</option>";			
			}
			?>
						 <option>drink_especial</option>
		</select>
		<input type="text" name="drink_especial" placeholder="Nome do drink">		
		<input type="text" name="preco" placeholder="Preço do Drink">
		<br><br>
		<button type="submit" name="cadastrar" class="btn btn-success">Cadastrar Drink</button>
	</form>
	<br>
	<a href='menu.php'><button class="btn btn-info">VISITAR SEU MENU</button></a>
</div>
</body>
</html>

