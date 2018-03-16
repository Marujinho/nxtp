<?php

$niveis = array('host','caixa','adm');
require_once 'setEventsBack.php';


/*PEGA ID DO EVENTO QUE VEIO DO FORMULARIO PREFRONT
$selecionaIdEvento = mysqli_query($mysqli, "SELECT id_evento FROM eventos WHERE nome_evento = '$eventoHoje'
                                            AND situacao != 0")->fetch_assoc();

$id_evento_porra = $selecionaIdEvento['id_evento'];
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no">
<title>Entrada</title>
<!-- Meta tag Keywords -->

<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glassy Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<link rel="stylesheet" href="css/style2.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<!-- //css files -->
<!-- web-fonts -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700" rel="stylesheet">
<!-- //web-fonts -->
<style>
  
.branca{
	color:white;
	text-align: center;
}

.branco{
	color:white ;
}

#opcoes p{
	padding-bottom: 4px;
}

</style>
</head>
<body>
		<!--header-->
		<div class="header-w3l">
			<h1> Qual evento de hoje? </h1>
		</div>
		<!--//header-->
		<!--main-->
		<div  class="main-w3layouts-agileinfo">
	           <!--form-stars-here-->
			<div class="wthree-form">            							
				<form  method="get" action="pos.php">
					<div class="form-sub-w3 form-group">
						<select class="form-control" name="eventItselfPos">
							<?php
								while($event = $getEvents->fetch_assoc()){
									echo "<option value='".$event['event_id']."'>".$event['event_name']."</option> ";
								}
							?>
						</select>
					</div>
					<div class="form-sub-w3 form-group">
					    <input  type="submit" value="OK" name="eventChosenPos" id="nome_convidado" class="btn btn btn-lg">
					</div>									
					</form>
			</div>
				<!--//form-ends-here-->

		</div>
		<!--//main-->
		<!--footer-->
		<div class="footer">
			<p></p>
		</div>
		<!--//footer-->
<script>
  
$(document).ready(function(){

  $('#evento').on('click', function(){
    $('#formulario').removeClass('hidden');
  });

});


</script>
</body>
</html>