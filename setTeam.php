<?php
require_once 'setTeamBack.php';
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
	<title>Equipe</title>
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
                	<li><a href="mainMenu.php">Menu inicial</a></li>
                	<li><a href="logOut.php">Sair</a></li>                      
             	</ul>
            </div>
            <!-- #Nav Ends -->
          </div>
        </div>
</div>
	<div class="container">
		<div class="col-lg-6 col-sm-12">
			<h1>Cadastre sua equipe:</h1>
			<form method="post" class="" >
				<div class="form-group">
					<label for="name">Nome:</label>
					<input type="text" class="form-control" name="name" id="name">
				</div>
				<div class="form-group">
					<label for="cell">Celular:</label>
					<input type="text" class="form-control" name="cell" id="cell">
				</div>
				<div class="form-group">
					<label for="cpf">CPF:</label>
					<input type="text" class="form-control" name="cpf" id="cpf">
				</div>
				<div class="form-group"> 
					<label for="position">Função no seu bar:</label>
					<select name="position" class="form-control" id="position">
						<option value="adm">Gerente</option>
						<option value="caixa">Caixa/Bar</option>
						<option value="host">Host/Hostess</option>
						<option value="producer">Produtor de eventos</option>
					</select>
				</div>
				<div class="form-group">
					<label for="employeePass">Definir senha (Para o funcionário):</label>
					<input type="text" class="form-control" name="employeePass" id="employeePass">
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-success" name="registerTeam" value="CADASTRAR FUNCIONÁRIO">
				</div>
			</form>
			<div>
			<br>
				<h2>Sua equipe: </h2>
				
				<table class="table table-striped table-responsive">
						<thead>
							<tr>
								<th>Nome Funcionário</th>
								<th>Celular</th>
								<th>CPF</th>
								<th>Função</th>
								<th>Senha de acesso</th>
							</tr>
						</thead>	
						<tbody>	
				<?php
				while($employee = $getStaff->fetch_assoc()){?>

					<?php
					echo "<tr><td>".$employee['name']."</td><td>".$employee['cell']."</td><td>".$employee['cpf']."</td><td>".$employee['position']."</td><td>".$employee['pass']."</td></tr>";	
				}?>
				</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>