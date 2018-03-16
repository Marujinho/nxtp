<?php
require_once 'listBack.php';

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no">

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


	<title></title>
	<title>Lista</title>
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
	<div class="row">
		
	</div>
		<div class="col-lg-6">
			<h1>Lista normal</h1>
			<form method="post">
				<div class="form-group">
					<label for="which">Qual festa?</label>
					<select class="form-control" id="which" name="whichEvent">
						<?php
							while($event = $getEvent->fetch_assoc()){
								echo "<option value = '".$event['event_id']."'>".$event['event_name']."</option>";
							}
						?>
					</select>	
					</div>
				<div class="form-group">
					<textarea name="list"  rows="40" cols="50">
						
					</textarea>
				</div>
				<div class="form-group">
					
					<h3>NORMAL:&nbsp<input type="radio" name="type" value="1"></h3>
					<h3>VIP:&nbsp<input type="radio" name="type" value="0" class=""></h3>
				</div>
				<div>
					<label></label>
					<input type="submit" name="registerNames" class="btn">
				</div>
				
			</form>
	    </div>
</div>
</body>
</html>