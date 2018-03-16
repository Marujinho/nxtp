<?php

	$niveis = array('adm', 'caixa');
	require_once 'inc/inc.validateCookie.php';


	if(isset($_POST['findTab'])){
	$name = $_POST['name'];
	$patron = mysqli_query($mysqli, "SELECT * FROM patrons AS p JOIN tabs AS t ON  t.patron_id = p.patron_id 							 WHERE p.name LIKE '%$name%'");
}
	//

	if(isset($_POST['close'])){

	$number = $_POST['comanda'];
	$close = mysqli_query($mysqli, "UPDATE tabs SET tab_status = '0' WHERE tab_number = '$number' ");

	}




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
			<div class="col-md-12">
				<h1>Encontrar comanda</h1>
					<div class="col-lg-8 col-md-8 col-sm-10 col-xs-12">
						<form method="post">	
							<div class="form-group">	
								<label>Nome do cliente:</label>
								<input type="text" name="name" placeholder="Nome que quer procurar" class="form-control">
								<br>
								<input type="submit" name="findTab" value="Procurar Comanda do cliente" class="btn btn-success">
							</div>			
						</form>

						<?php
							if($patron){
							while($p = $patron->fetch_assoc()){

								echo '<li>'.$p['name'].' --- '.$p['tab_number'].'</li>';

							}
						}?>

					</div>	
					<hr><hr>
					<br><br>
					<div class="col-lg-8 col-md-8 col-sm-10 col-xs-12">
						<form method="post">	
							<div class="form-group">	
								<label>Fechar comanda:</label>
								<input type="text" name="comanda" placeholder="Numero da comanda" class="form-control">
								<br>
								<input type="submit" name="close" value="Fechar comanda" class="btn btn-danger">
							</div>			
						</form>
					</div>	
			</div>
		</div>
</body>
</html>