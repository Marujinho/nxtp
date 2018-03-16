<?php
require_once 'connect.php';

$getUnity = mysqli_query($mysqli, "SELECT * FROM venue_has_products AS v JOIN products AS p 
								   ON  p.id_product = v.product_id WHERE v.venue_id = '1' 
								   AND p.sold_as = 'unity' ");

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


	<title>Balão</title>
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
		<div class="row">	
			<h2>Entrada:</h2>
				<form method="post">
					<?php
						while($u = $getUnity->fetch_assoc()){
							echo strtoupper($u['product'])." <input type='text' name='' value=''><br><br>";
						}?>
						<input type="submit" name="cadastrarEstoque" class="btn btn-info">
				</form>
		</div>

		<div class="row">	
			
		</div>

	</div>
</div>

</body>
</html>