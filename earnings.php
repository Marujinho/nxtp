<?php

require_once 'earningsBack.php';
$niveis = array('adm');

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/js/css/jquery-3.2.1.min.js" />
<link rel="stylesheet" href="css/js/css/UI/jquery-ui-1.12.1.custom/jquery-ui.min.js" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
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

  <link rel="stylesheet" href="css/circle.css">
	<title>Ganhos</title>
	<style>
		#entradaGanhos{

			margin: auto 0;
			background-color:white;
			font-weight: bold;
			font-size: 14pt;
		}

		.inner{
			display: table;
  			margin: 0 auto;
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
                	<li><a href="mainMenu.php">Menu inicial</a></li>
                	<li><a href="logOut.php">Sair</a></li>                      
             	</ul>
            </div>
            <!-- #Nav Ends -->
          </div>
        </div>
</div>
	<div class="container">
		<div id="entradaGanhos">
			<br>
			<h1 class="inner"><?=ucfirst($eventName)?></h1>
			<br>
			<div class="row inner">
				<div class="col-lg-12 col-sm-12">
					<h3>Ganhos entrada: </h3>
					<div class="c100 p50 big">
						<span><?=$totEntrance['totEntrance']?></span>
					</div>
				</div>
			</div>		
		
			<div class="row inner">
				<div class="col-lg-12 col-sm-12">
					<h3>Ganhos bar: </h3>
					<div class="c100 p50 big">
						<span><?=$totBar['totBar']?></span>
					</div>
				</div>
			</div>

			<div class="row inner">
				<div class="col-lg-12 col-sm-12">
					<h3>Numero de pessoas na casa: </h3>
					<div class="c100 p50 big">
						<span><?=$totPeople['countPeople']?></span>
					</div>
				</div>
			</div>
			<button onclick="myFunction()" class="btn btn-lg inner">ATUALIZAR</button>
		</div>	
	</div>
	
	<script type="text/javascript">
			function myFunction() {
  			location.reload();
}
	</script>
</body>
</html>