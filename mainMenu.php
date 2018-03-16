<?php

$niveis = array('caixa','host','adm'); // SEMPRE ARRAY

require_once 'inc/inc.validateCookie.php';

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<script src="css/js/jquery-3.2.1.min.js"></script>
<script src="css/js/UI/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<script href="css/js/jquery-3.2.1.min" ></script>
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

<!--strongest blue #69d2e7
	lighest blue #A7DBD8
	gray #E0E4CC
	weird orange #F38630
	strongest orange #FA6900
	-->

	<title></title>
	<style type="text/css">


body{
	background-color: #69d2e7;
}	
		
	.botoes{
		text-align: center;
		
	}
.botoes h1{
	font-size: 44pt;
	margin-bottom: 20px;
}

.b{
	margin-bottom: 40px;
}

.fotos li{
	list-style: none;
	display: inline-block;
	margin-right: 0px;
	margin-bottom: 3px;

}

.botoes h2{
	text-align: center;
	position: absolute;
	padding:0px;
}

.foto-legenda img{
	border:8px solid #E0E4CC;
	
}

.baixo{
	margin-bottom: 40px;
}

.modal{
	padding-right: 0px !important;
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
                	<li><a href="logOut.php">Sair</a></li>    
             	</ul>
            </div>
            <!-- #Nav Ends -->
          </div>
        </div>
</div>
<div class="container">
		<div class="foto-legenda" > 
			<ul class="fotos botoes">

			<?php
				if($access['position']=='caixa'){
			?>
				
				<li id="fotoEventos"><a href="pos.php"><img width="400" src="images/bar.jpg"></a></li>
				<li id="fotoEventos"><a href="menu.php"><img width="400" src="images/menu.jpg"></a></li>
				<li id="fotoEventos"><a href="cashier.php"><img width="400" src="images/caixa.jpg"></a></li>

			<?php
				}elseif($access['position']=='adm'){?>
					
				<li id="fotoEventos"><a href="menu.php"><img width="400" src="images/menu.jpg"></a></li>
				<li id="fotoEventos"><a href="cashier.php"><img width="400" src="images/caixa.jpg"></a></li>
				<li id="fotoEventos"><a href='earnings.php'><img width="400" src="images/ganhos.jpg"></a></li>
				<li><a href='setTeam.php'><img width="400" src="images/equipe.jpg"></a></li>					

				<?php 
				}elseif($access['position']=='host'){
					echo "<script>window.location = 'door.php'</script>";
				}?>		
			</ul>		
			
		</div>
	
</div>

<script type="text/javascript">
	



</script>
</body>
</html>