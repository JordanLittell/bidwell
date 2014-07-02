<?php

//CONNECT TO DATABASE AND EXTRACT
	try{

		$db = new PDO("mysql:host=localhost;dbname=UNITS;port=8889","root","root");
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$db->exec("SET NAMES utf8");
		

	}	catch(Exception $e){
		echo "could not connect to db";
		exit;
	}
?>