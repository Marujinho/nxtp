<?php



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
	<title></title>
	<style type="text/css">

body{
	background-color: purple;
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
	border:8px solid #222222;
	
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
			
				<li id="fotoEventos"><a href="setEvents.php"><img width="400" src="images/eventos.jpg"></a></li>				
			</ul>		
			
		</div>
	
</div>

<script type="text/javascript">
	



</script>
</body>
</html>