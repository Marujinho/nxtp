<?php


$niveis = array('adm');
require_once 'inc/inc.validateCookie.php';
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

<script src="css/jquery-match-height-master/jquery.matchHeight.js" type="text/javascript"></script>
<script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
  integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
  crossorigin="anonymous"></script>
	<title></title>
	<style type="text/css">
		
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
	border:8px solid lightblue;
		
}

.azul{
	color: lightblue !important;
}

.baixo{
	margin-bottom: 100px;
}

	</style>
</head>
<body>
<!--NAVBAR-->
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
                	<li><a href="index2.php">Menu inicial</a></li>                      
             	</ul>
            </div>
            <!-- #Nav Ends -->

          </div>
        </div>

</div>
<!--FIM NAVBAR-->

<!--COMEÇA BOTOES-->
<div class="container">
	<div>
		<div class="foto-legenda" > 
			<ul class="fotos botoes">
				<li id="fotoEventos"><a href='ganhos.php'><img width="400" src="images/novoGanhos.jpg"></a></li>
				<li><a href='relatorio.php'><img width="400" src="images/novoRelatorios.jpg"></a></li>
				<li><a href='setTeam.php'><img width="400" src="images/equipe.jpg"></a></li>
				
			</ul>				
		</div>			
	</div>
</div>
<!--FIM BOTOES-->
<script type="text/javascript">
	
$(document).ready(function(){

	$('#superSenhaBotao').on('click',function(){
		$('#superSenha').toggleClass('hidden');
	});

});


</script>
</body>
</html>