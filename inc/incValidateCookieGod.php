<?php
require_once 'connect.php';	

	//Essa função gera um valor de String aleatório do tamanho recebendo por parametros
    function randString($size){
       
        $basic = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
		$return= "";
        for($count= 0; $size > $count; $count++){
            $return.= $basic[rand(0, strlen($basic) - 1)];
        }
        return $return;
    }
 	
	// Ver se ja tem o cookie no navegador
	if(isset($_COOKIE['god-session'])){

		$cookieBrowser = $_COOKIE['god-session'];

		// Se sim validar com o banco de dados
		$cookieDb = mysqli_query($mysqli," SELECT * FROM cookies WHERE value LIKE '$cookieBrowser' ")->fetch_assoc();

		if($cookieDb){

			$access = mysqli_query($mysqli, "SELECT * FROM staff WHERE employee_id LIKE '".$cookieDb['employee_id']."'")->fetch_assoc();

			foreach ($niveis as $nivel) {
				if($nivel == $access['position'] ){
					$accessKey = true;
				}
			}

			if(!isset($accessKey)){$accessKey=false;}

			if($accessKey==true){
				// BORAAAAA - ACESSO OK
			} else {echo 'NAO TEM O ACESSO CERTO';exit;}
			
		} else {
			setcookie('god-session', '',  time()-3600*8);
			echo 'NAO TEM NO BANCO ISSO AI; <br> MATEI O COOKIE';exit;
		}

	} else {
		
		if(isset($_POST['enterNow'])){
		
			$passW = $_POST['pass']; // IF ISSET
			$nameE = $_POST['name'];

			$access = mysqli_query($mysqli, "SELECT * FROM staff WHERE pass LIKE '$passW' AND name LIKE '$nameE'")->fetch_assoc();
			
			// SO FAZ ISSO SE A SENHA ESTIVER CERTAAAAAAA <<<<<<<<<<<<<<<<<<<<<<<<<<<<
			if($access){

				$employee_id = $access['employee_id'];

				// Se Nao verificar se no banco tem hash criada para esse usuario
				$cookieValue = randString(60);

				// salva no banco
				mysqli_query($mysqli," INSERT INTO cookies (cookie_id, value, employee_id, day) VALUES (NULL, '$cookieValue', '$employee_id', CURDATE()) ");

				// seta cookie
				setcookie('god-session', $cookieValue, time()+3600*24); /* expira em 1 hora * 24 */

			} else {
				echo 'Erro senha';exit;
			}
	
	} else {
		header("Location:logOut.php");
	}
}
$venueId = $access['venue_id'];

