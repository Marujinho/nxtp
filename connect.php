<?php

	// Manual completo do MySQLi https://secure.php.net/manual/pt_BR/book.mysqli.php

	// Define o host do MySQL
	$host = "br398.hostgator.com.br";
	$user = "nextp065_me";
	$pass = "SM_i{6nNg~MG";
	$db = "nextp065_nxtparty";

	// Inicia a conexão com banco
	$mysqli = new mysqli($host,$user,$pass,$db);

	// Retorna erro do banco
	if ($mysqli->connect_errno)
		echo "Falha na conexão: (".$mysqli->connect_errno.") ".$mysqli->connect_errno;

