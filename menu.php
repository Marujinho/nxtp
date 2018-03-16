<?php


require_once 'productsBack.php';

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


	<title>Menu</title>
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
                	<li><a href="logOut.php.php">Sair</a></li>                      
             	</ul>
            </div>
            <!-- #Nav Ends -->
          </div>
        </div>
</div>
<div class="container">
	<div>
		<h2>OS PRODUTOS QUE VOCÊ VENDE NO BAR:</h2><br>
	</div>
	<form method="post">
			<?php
				
			while ($p = $getNa->fetch_assoc() ) {
						echo "<h4>".ucfirst($p['product'])." <input class='' type='text' value='".$p['price']."' name='product[".$p['product_id']."]'></h4>";
					}?>
					<br>
		<button id="alterar" class="btn btn-info" type="submit" name="alterPrices">ALTERAR PREÇOS</button>
		<br><br>
	</form>		
		<br>
	
		<h3>Criar produto novo</h3>	
		<div class="col-lg-5">
		<form method="post">
			
			<div class="form-group">
				<input type="text" class="form-control" name="productName" placeholder="Nome da bebida/Serviço">
			</div>
			
			<div class="form-group">
				<input type="text" class="form-control" name="productPrice" placeholder="Preço">
			</div>
			<div class="form-group">
				<label for="typeOfBooze"> Selecione o tipo de bebida/Serviço:</label>
				<select class="form-control" id="typeOfBooze" name="classification">
					<option value="water">Água</option>
					<option value="soda">Refrigerante</option>
					<option value="energy">Energético</option>
					<option value="beer">Cerveja</option>
					<option value="distilled">Destilado</option>
					<option value="drink">Drink comum</option>
					<option value="drink_especial">Drink criado pela casa</option>
					<option value="other">Outros serviços</option>
				</select>
			</div>
			<div class="form-group">
				<label for="soldAs">Como será vendido?</label>
				<select class="form-control" id="soldAs" name="soldAs">
					<option value="distilled">Latinha/Garrafinha</option>
					<option value="shot">Dose</option>
					<option value="drink">Drink comum</option>
					<option value="drink_especial">Drink criado pela casa</option>
					<option value="other">Outros serviços</option>
					<option value="combo">Combo/Promoção</option>	
				</select>
			</div>
			<div>
				<input type="submit" class="btn" value="Criar produto" name="setNewProduct" >
			</div>
		</form>
		</div>	

</div>
<script>

	$(document).ready(function(){

		$('$alterar').on('click', function(){
			$('#opcoes').removeClass('hidden');
		});
	});

</script>
</body>
</html>