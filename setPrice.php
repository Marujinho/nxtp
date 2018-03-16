<?php 

$niveis = array('god');
require_once 'inc/incValidateCookieGod.php';

if(isset($_POST['setPrice'])){

$getEvent = mysqli_query($mysqli, "SELECT * FROM events WHERE status = 2")->fetch_assoc();

$id = $getEvent['event_id'];

$list = $_POST['list'];
$noList = $_POST['noList'];

$change = mysqli_query($mysqli, "UPDATE events SET priceNoList = '$noList' WHERE event_id = '$id'");
$change2 = mysqli_query($mysqli, "UPDATE events SET priceList = '$list' WHERE event_id = '$id'");

}




?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no">
<script href="css/js/jquery-3.2.1.min" ></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
  integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
  crossorigin="anonymous"></script>

<!-- CSS padrão na pasta css/redmond -->
<link href="css/redmond/jquery-ui-1.10.1.custom.css" rel="stylesheet" />

	<title></title>
<style>
	.ui-widget {
    font-family: "Lucida Grande", "Lucida Sans", Arial, sans-serif;
    font-size: 12px;
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
                	<li><a href="godMenu55Paulinha.php">Menu Principal</a></li>  
                	<li><a href="logOut.php">Sair</a></li>   
             	</ul>
            </div>
            <!-- #Nav Ends -->
          </div>
        </div>
</div>
<div class="container">

<h1>Mudar preco da balada</h1>
	<div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
		
			<form method="post">	

				
				<div class="form-group">	
					<label>Sem lista:</label>
					<input type="text" name="noList" placeholder="SEM LISTA" class="form-control">
					<br>
					<label>COM lista:</label>
					<input type="text" name="list" placeholder="COM LISTA" class="form-control">
					<br>
					<input type="submit" name="setPrice" class="btn btn-success">
				</div>
				
			</form>
	
	
	</div>
		
	<hr>
</div>

</body>
</html>