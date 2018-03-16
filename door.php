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
<script href="css/js/jquery-3.2.1.min" ></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glassy Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->

<!-- SWEET ALERT JS --> 
<script src="css/sweetalert2.js"></script>

<!--MASKS-->
<script src="css/jquery.mask.js"></script>
<script src="css/jquery.mask.min.js"></script>

<!-- css files -->
<link rel="stylesheet" href="css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<link rel="stylesheet" href="css/style2.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<!-- //css files -->
<!-- web-fonts -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700" rel="stylesheet">
<!-- //web-fonts -->

<!-- SWEET ALERT CSS -->
<link rel="stylesheet" type="text/css" href="css/sweetalert2.css">

<style>
  
.branca{
	color:white;
	text-align: center;
}

.branco{
	color:white ;
}

.hidden{
	display: none;
}

#opcoes p{
	padding-bottom: 4px;
}

.b{
	font-size: 22pt !important;
}

.green-font{
	color: green;
}

.red-font{
	color: red;
}

.yellow-font{
	color: yellow;
}

.pName{
	font-weight: bold;
	font-size: 16pt;
}
</style>

</head>
<body>
		<!--header-->
		
		<!--//header-->
		<!--main-->
		 <?php
	            echo "<h1><div class='branca'>Evento de Hoje: ".$getEvent['event_name']."</div></h1><br>";?>
		<div  class="main-w3layouts-agileinfo">
	           <!--form-stars-here-->
             
			<div class="wthree-form">
	           
								<h2 id="first" class="b">Primeira vez na casa</h2>
								<div id="notYet" class="hidden">
									<form  method="post" name="form1">
										<div class="form-sub-w3 branco col-xs-4" id="options1">
																						
										</div>
										<div class="form-sub-w3">
											<input  type="text" name="patronName" placeholder="Nome " id="patronName1" required="" autofocus="" >
										</div>
						                <div class="form-sub-w3">
											<input  type="text" name="rg" id="rg" placeholder="Numero do RG" required="" autofocus="" minlength="8" maxlength="12" ">
										</div>
						                <div class="form-sub-w3">
											<input  type="text" name="bday" id="bday" placeholder="Data de nascimento" required="" autofocus="" maxlength="10" minlength="10">
										</div>
										<div class="form-sub-w3">
						                  <input  type="text" name="patronCell" id="cellphone" placeholder="Celular" id="nome_convidado" required="" autofocus="" minlength="10" maxlength="15">
						                </div>
						                <div class="form-sub-w3">
											<input  type="text" name="tabNumber" placeholder="Comanda" required="" autofocus="" maxlength="10" minlength="10">
										</div>

										<label class="anim">
										<?php
											
											?>
										</label> 
										<div class="clear"></div>
										<div class="submit-agileits">
											<input type="submit" value="Cliente NOVO" id="register" name="register">
										</div>
									</form>
								</div>
								<br><br>
								<h2 id="2" class="b">Cliente ja cadastrado </h2>
								<div id="alreadyPatron" class="hidden">
								
									<form method="post" name="form2">
										<div class="form-sub-w3 branco col-xs-4" id="options2">
											
										</div>
										<div class="form-sub-w3">
											<input  type="text" name="oldCell" id="regularPatron" placeholder="Celular" required="" autofocus="">
										</div>
										<div class="form-sub-w3">
											<input  type="text" name="oldTabNumber" placeholder="Comanda" required="" autofocus=""  maxlength="10" minlength="10">
										</div>
										<label class="anim">
										<?php
											
											?>
										</label> 
										<div class="submit-agileits">
											<input type="submit" value="Entrar" id="enterPatron" name="enterPatron">
										</div>
									</form>
								</div>

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


    $('#first').click(function(){

    $('#notYet').slideToggle( "fast", function() {
    $(this).toggleClass('hidden');
  		});	
    });

    $('#2').click(function(){

     $('#alreadyPatron').slideToggle( "fast", function() {
     $(this).toggleClass('hidden');
  		});		
    });

    $('#patronName1').keyup(function(){
    	$.post('checkList.php', {patronName: form1.patronName.value }, function(result){
    		$('#options1').html(result).show();
    	});
    });

    $('#regularPatron').keyup(function(){
    	$.post('checkList.php', {oldCell: form2.oldCell.value }, function(result){
    		$('#options2').html(result).show();
    	});
    });

    $('#cellphone').mask('(00) 00000-0000');
    $('#regularPatron').mask('(00) 00000-0000');
    $('#bday').mask('00/00/0000');
    
   
   $('#rg').keyup(function() {
  $(this).val(this.value.replace(/\D/g, ''));
});




});


</script>
</body>
</html>