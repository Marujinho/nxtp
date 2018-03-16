<?php
$niveis = array('adm', 'caixa');
require_once 'inc/inc.validateCookie.php';


$getEvent  = mysqli_query($mysqli, "SELECT * FROM events AS e JOIN venue_has_events AS v ON e.event_id = v.event_id WHERE v.venue_id = '1' AND e.status < 2 AND e.event_id >= 26");


$getStaff = mysqli_query($mysqli, "SELECT * FROM staff WHERE position != 'god'");



if(isset($_POST['enterStaff'])){

$tabNumber = $_POST['theNumber'];

$openTab = mysqli_query($mysqli, "INSERT INTO tabs(tab_id, tab_number, patron_id, entrance, event_id, venue_id, tab_status ) VALUES (null, '$tabNumber', 'xxxxx', '0', '$event_id', '1', '1')");


}


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


	<title>Relatorios</title>
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
	
	<form method="post" name="staffGo">
							<h1>Comanda para funcionarios</h1>
							<div class='form-group'>
								<select class="form-control">
									<?php
										while ($staff = $getStaff->fetch_assoc()){
											echo "<option value='".$staff['name']."'>".$staff['name']."</option>";
											}?>
								</select>
							</div>
							<div class="form-group">
								<label for="theNumber">Insira comanda:</label>
								<input type="text" name="theNumber" id="theNumber" class="form-control">
							</div>
							
							<input type="submit" name="enterStaff" class="hidden" class="btn btn-success">
	</form>						
	
	


</div>

</body>
</html>


