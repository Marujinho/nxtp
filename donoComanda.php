<?php
$niveis = array('adm', 'caixa');
require_once 'inc/inc.validateCookie.php';



$event  = mysqli_query($mysqli, "SELECT * FROM events WHERE status = '2' ")->fetch_assoc();



if(isset($_POST['enterStaff'])){

$thisTab = $_POST['thisTab'];

$procurarDono = mysqli_query($mysqli, "SELECT * FROM tabs AS t JOIN patrons AS p ON p.patron_id = t.patron_id WHERE t.event_id = 41 AND t.tab_number = '$thisTab'")->fetch_assoc();


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
	
	<form method="post" name="staffGo">
							<h1>Procurar o dono da comanda: </h1>
							
							<div class="form-group">
								<label for="theNumber">Insira comanda:</label>
								<input type="text" name="thisTab" id="theNumber" class="form-control">
							</div>
							
							<input type="submit" name="enterStaff" class="hidden" class="btn btn-success">
	</form>						
	
	<hr>

	<?php

		if($procurarDono){
			echo 'Nome: <b>'.$procurarDono['name'].'</b><br><br>';
			echo 'Documento: <b>'.$procurarDono['rg'].'</b><br><br>';
			echo 'Celular: <b>'.$procurarDono['cell'].'</b><br><br>';
		}


	?>
<hr>

	<a href="cashier.php"><button class="btn btn-info btn-lg">Voltar ao caixa</button></a>

</div>

</body>
</html>
