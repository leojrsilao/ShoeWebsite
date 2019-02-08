<?php
	$host = 'localhost';
	$dbname = 'teamproject';
	$user = 'root';
	$pass = '';

	try
	{
		$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
		$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $e)
	{
		echo $e->getMessage();
	}
?>