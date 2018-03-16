<?php
require_once 'exitBack.php';
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

<script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
  integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
  crossorigin="anonymous"></script>
	<title>Saída</title>
	<style type="text/css">
		.bloco{
			width: 500px;
			margin:0 auto !important;
			text-align: center;
			height: 560px;
			background-color: gray;
		}

		#tab-check{
			display: table;
			width: 450px;
			height: 380px;
			background-color: black;
			margin:0 auto !important;
		}

		#tab-check-nope{
			display: table;
			width: 450px;
			height: 380px;
			background-color: red;
			margin:0 auto !important;
			font-size: 30pt;
		}

		#tab-check-ok{
			display: table;
			width: 450px;
			height: 380px;
			background-color: green;
			margin:0 auto !important;
		}		

		#ok{
			display: table-cell;
			vertical-align: middle;
			font-size: 80pt;
			color: white;
		}


		#not-ok{
			display: table-cell;
			vertical-align: middle;
			font-size: 50pt;
			color: white;
		}

		#nope{
			display: table-cell;
			vertical-align: middle;
			font-size: 150pt;
			color: white;	
		}

		#check{
			display: none;
		}
	</style>
</head>
<body>
<div class="container">
	<div class="bloco">
		<div class="col-lg-12">
			<h1>Saída</h1>
				<form method="post">
					<div class="form-group">
						<label for="tab">VERIFICAR COMANDA:</label>
						<input type="text" name="tabNumber" id="tab" class="form-control" autofocus="">
						<div id="check"><input type="submit" name="checkIt" id="checkIt" class="form-co/*ntrol"></div>
					</div>
				</form>
			<div id="tab-check">
			<?php
				if(isset($_POST['checkIt'])){
					if($status == '0'){
					echo "<div id='tab-check-ok'>
					<h1 id='ok'>OK</h1>
					</div>";
					}elseif($status == '1'){
						echo "<div id='tab-check-nope'>
							  <h1 id='ok'>Comanda<br>aberta</h1>
							  </div>";
					}elseif($status == '2'){
						echo "<div id='tab-check-nope'>
							  <h1 id='ok'>Comanda<br>aberta</h1>
							  </div>";
					}else{
						echo "<div id='tab-check-nope'>
							  <h1 id='not-ok'>Erro!<br>Essa comanda<br>não existe</h1>
							  </div>";
					}
				}
				?>
			</div>	
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
	
			setInterval(function(){ $('#tab-check').css('background-color','black');}, 2500);
			setInterval(function(){ $('#ok').css('background-color','black'); 
									$('#ok').text("...");	}, 2500);
			setInterval(function(){ $('#not-ok').css('background-color','black');
									$('#not-ok').text("..."); }, 2500);

			
	
		
	});

</script>
</body>
</html>