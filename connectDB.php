<?php

require_once 'config.php';

function connectMysqlPDO($host, $db, $user, $pass){

	$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

	try {
		$pdo = new PDO($dsn, $user, $pass);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $pdo;
		if ($pdo) {
			echo "Connected to the $db database successfully!";
		}
	} catch (PDOException $e) {
		exit($e->getMessage());
	}
}

return connectMysqlPDO($hostname, $database, $user, $password);

?>
