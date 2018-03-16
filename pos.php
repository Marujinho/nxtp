<?php

require_once 'productsBack.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no">

<!--SWEET ALERT 2-->

<link rel="stylesheet"  type="text/css" src="css/sweetalert2.css">

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

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
  
<!--strongest blue #69d2e7
	lighest blue #A7DBD8
	gray #E0E4CC
	weird orange #F38630
	strongest orange #FA6900
	-->


<!--SWEET ALERT 2-->
<script src="css/sweetalert2.js"></script>


	<title></title>
	<style type="text/css">
		
	#detalhes{
		background-color: #69d2e7;
		height: 600px;
		
	}

	#detalhes h2,h3{
		color: white;
		
	}

	.produtos{
		background-color: #ffffff;
		height: 600px;
		
	}

	.button {
    background-color: #F38630; /* Green */
    border: 2px solid black;
    color: white;
    padding: 16px 32px;
    width: 155px;
    height: 100px;
    position: relative;
    text-align: center;
    text-decoration: none;
    margin: 0 auto;
    display: inline-block;
    font-size: 16px;

}



.aba{

	background-color: #69d2e7; 
    border: 2px solid black;
    color: black;
    padding: 18px 32px;  
    width: 115px;
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
	background-color: #F38630;
	margin-bottom: 3px;

}

#bottom{
	font-size: 12pt !important;
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
                	<li><a href="logOut.php.php">Sair</a></li>                      
             	</ul>
            </div>
            <!-- #Nav Ends -->
          </div>
        </div>
</div>
<br>
	<div class="container col-lg-12">
		<div id="detalhes" class="col-lg-4 col-md-4">
			<h2>Detalhes da compra:</h2><br>
			<form method="get">
			<div id="aqui" class="pre-scrollable">

				<!--AQUI VEM AS COMPRAS-->

			</div>
			<div id="foot">
				<div id="bottom"><h3>Numero da Comanda:</h3>
				
				<input type="text" id="tabTab" name="tab"  maxlength="10" minlength="10" size="25"></div>
				<br>
				<input type="submit" value="FINALIZAR PEDIDO" class="hidden" name="sell">
	
			</div>
			</form>
		</div>	
		<div  class="col-lg-8 col-md-8 produtos">
			<div class="tab">
  			  <button class="tablinks aba" onclick="openCity(event, 'Não alcolico')" id="defaultOpen">Não alcolico</button>
 			  <button class="tablinks aba" onclick="openCity(event, 'Cerveja')">Cerveja</button>
  			  <button class="tablinks aba" onclick="openCity(event, 'Doses')">Doses</button>
  			  <button class="tablinks aba" onclick="openCity(event, 'Drinks')">Drinks</button>
  			  <button class="tablinks aba" onclick="openCity(event, 'Servicos')">Serviços</button>
			</div>
<br>
			<div id="Não alcolico" class="tabcontent">
				
			  	<?php
			  	//FAZ O LOOP E PEGA OS PRODUTOS VENDIDOS PELO BAR DO BANCO E TRANSFORMA EM BOTÕES
			  	while ($p = $getNa->fetch_assoc()){
			  		if(($p['classification'] == 'water')||($p['classification'] == 'soda')||($p['classification'] == 'energy')){
			  		echo "<button preco='".$p['price']."' id_prod='".$p['product_id']."' value='".$p['product']."' class='button order'>".$p['product']."</button>";
			  		} 
			  	}?>
			</div>
			  		<div id="Cerveja" class="tabcontent">
			  		<?php
			  			while ($beer = $getBeer->fetch_assoc()){
			  		
			  		echo "<button preco='".$beer['price']."' id_prod='".$beer['product_id']."' value='".$beer['product']."' class='button order'>".$beer['product']."</button>";	 
			  	}?>
			  		</div>
			  		<div id="Doses" class="tabcontent">
					<?php
			  			while ($shot = $getDose->fetch_assoc()){
			  		
			  		echo "<button preco='".$shot['price']."' id_prod='".$shot['product_id']."' value='".$shot['product']."' class='button order'><p>".$shot['product']."</p></button>";	
			  	}?>
			  		</div>
			  		
					<div id="Drinks" class="tabcontent">			
			  		<?php
			  		while ($drink = $getDrink->fetch_assoc()){
			  		
			  		echo "<button preco='".$drink['price']."' id_prod='".$drink['product_id']."' value='".$drink['product']."' class='button order'>".$drink['product']."</button>";	
			  	}
			  		while($specialDrink = $getSpecialDrink->fetch_assoc()){
			  			echo  "<button preco='".$specialDrink['price']."' id_prod='".$specialDrink['product_id']."' value='".$specialDrink['product']."' class='button order'>".$specialDrink['product']."</button>";
			  		}
			  	?>   
				</div>
				<div id="Servicos" class="tabcontent">
					<?php
			  		while ($other = $getOther->fetch_assoc()){
			  		
			  		echo "<button preco='".$other['price']."' id_prod='".$other['product_id']."' value='".$other['product']."' class='button order'>".$other['product']."</button>";	
			  	}?>							
				</div>

			<div id="Serviços" class="tabcontent">
			    
			    <?php
			    
			    ?>
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

		var countProd = 0;

		$(".order").on('click', function(){

			var preco = $(this).attr('preco');
			var produto = $(this).val();
			var prodBrasil = $(this).attr('id_prod');

			
		    $("#aqui").append("<div class='pedido'>"+produto+" "+preco+"<input type='hidden' name='"+prodBrasil+":"+countProd+"' value='"+preco+"'></div>");		    
		   
		    countProd ++;

		    $('.pedido').on('click', function(){
		    	$(this).remove();
		    });
		});
		
		$('#fim').on('click',function(){
			alert('Obrigado por hoje!');
			alert('Bom Descanso!');
		});	

		$('button').on('click', function(){
			$('#tabTab').focus();
		});

	});
</script>
</body>
</html>