<?php
require_once 'balaoBack.php';
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
</div>

</body>
</html>