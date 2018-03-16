<?php

require_once 'cashierBack.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no">

<!--SWEET ALERT 2-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.min.css">





<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- SWEET ALERT CSS -->
<link rel="stylesheet" type="text/css" href="css/sweetalert2.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
  integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
  crossorigin="anonymous"></script>
  

<!-- SWEET ALERT JS --> 
<script src="css/sweetalert2.js"></script>

<!--strongest blue #69d2e7
	lighest blue #A7DBD8
	gray #E0E4CC
	weird orange #F38630
	strongest orange #FA6900
	-->



	<title></title>
	<style type="text/css">
		
	#detalhes{
		background-color: #69d2e7;
		height: 600px;
		
	}

	#detalhes h3{
		color: white;
	}

	.produtos{
		background-color: white;
		height: 600px;
		
	}

	.button {
    background-color: #4CAF50; /* Green */
    border: 2px solid black;
    color: white;
    padding: 16px 32px;  
    width: 155px;
    height: 100px;
    position: relative;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;

}

.aba{

	background-color: gray; 
    border: 2px solid black;
    color: black;
    padding: 18px 32px;  
    width: 155px;
    height: 60px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;	
}

#foot{
	position: absolute;
  bottom: 0;
 
  width: 100%;
}

.pedido{
	font-size: 16pt;
	background-color: white;
	color: #222222;
	font-weight: bold;
	margin-bottom: 3px;

}

#bottom{
	font-size: 12pt !important;
}

.green{
	color: green;
}

.red{
	color: red;
}

.chao{

    position:absolute;
    bottom:0;
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
<br>
	<div class="container col-lg-12">
		<div id="detalhes" class="col-lg-4">
			<h3><?='Evento de hoje: <b>'.strtoupper($getEvent['event_name'].'</b>')?></h3><br>
			<div id="aqui" class="pre-scrollable">
				<!--AQUI VEM AS COMPRAS-->
				<?php
				if(isset($_GET['consumed'])){

				echo "<h3>".$getPatronName['name']."<br></h3>";	
				
				while($entrance = $checkTab->fetch_assoc()){
					echo "<p class='pedido'> Entrada - ".$entrance['entrance']."</p>";
				}	
				if($itemsConsumedCount > 0){
				while($item = $itemsConsumed->fetch_assoc()){
					echo "<p class='pedido'>".ucfirst($item['product']).' - '.$item['product_price'].' ----- ('.$item['hour'].")</p>";
						}
					}}?>	
			</div>
			<div id="foot">
				<div id="bottom">
					<div class="<?=$hidden?>">
						<h3>Numero da Comanda: </h3>
						<form method="get" action="#"  id="">
							<input type="text" name="tab" autofocus="" id="consumedText" minlength="10" maxlength="10" size="25"><br>
							<input type="submit" class="hidden" name="consumed">
						</form>
					</div>
					<div class="<?=$hidden2?>">
					<form name="change" method="post">	
						<input type="submit" value="Calcular troco para:" id="changeButton" name="" class=""><input name="given" maxlength="3" size="5" id="changeValue" class="">
							<!--Troco:--><h3 class="" id="trocoAqui"> </h3>
					</form>	
						
						<?=$total;?>

						<form method="post">
							<input type="text" class="hidden" name="tab" value="<?=$_GET['tab']?>" maxlength="25" size="25"><br>
							<input type="submit" value="COMANDA OK" class="btn btn-success" name="closeTab">
						</form>
					</div>
				</div>
				<br>
			</div>
		</div>	
		<div  class="col-lg-8 produtos">
			<h2>Comandas em aberto: <?='<b><i>'.$getOpenTabs['tot'].'</i></b>'?></h2>
			<h3></h3>
			<h2>Total recebido bar: <?='<b class="green"><i>'.number_format($receivedBar['tr'], 2, ',', '.').'</i></b>'?></h2>
			<h3></h3>
			<h2 >Total recebido da entradas: <?='<b class="green"><i>'.number_format($receivedEntrance['etot'], 2, ',', '.').'</i></b>'?></h2>
			<h3></h3>
			<h2>Total à receber: <?='<b  class="red"><i>'.number_format($totalEver, 2, ',', '.').'</i></b>'?></h2>
			
			<h3></h3>
			<div class="chao">
				
					<a href="lostTab.php"><button class="btn btn-warning btn-lg">Comanda perdida? </button></a>
					<a href="donoComanda.php"><button class="btn btn-info btn-lg">Procurar cliente</button></a>
					<a href="balao.php"><button class="btn btn-danger btn-lg">Quem deu balão?</button></a>
					<a href="dailyReport.php"><button class="btn btn-success btn-lg">Itens consumidos</button></a>


				
			</div>
		</div>
	</div>
	<!--FUNCOES JAVASCRIPT E JQUERY QUE FAZEM A PAGINA FUNCIONAR-->
	<script>

	document.getElementById("defaultOpen").click();
function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

$(document).ready(function(){

    $('#changeValue').keyup(function(){
    	$.post('calc.php', {given: change.given.value }, function(result){
    		$('#trocoAqui').html(result).show();
    	});
    });
	
	});
</script>
</body>
</html>