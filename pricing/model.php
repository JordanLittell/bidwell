<?php 

	//put all of the business logic in this file. 
	//Use PHP PDO to interface with DB
	//'sql5c2b.megasqlservers.com','bidwellsel413306','cikXF%24'
	//have try-catch block for each point of interaction, use when interacting with external object

//CONNECT TO DATABASE AND EXTRACT
	try{

		$db = new PDO("mysql:host=localhost;dbname=UNITS;port=8889","root","root");
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$db->exec("SET NAMES utf8");
		var_dump($db);

	}	catch(Exception $e){
		echo "could not connect to db";
		exit;
	}
	try{
		$results = $db->query("SELECT sUnitName,iFloor,dcWidth,dcLength,dcStdRate,dcStdWeeklyRate,bPower,bClimate,bAlarm,bRentable,bRented FROM UNITS");
		$data = $results->fetchAll();
	}	catch(Exception $e){
		echo "could not query the database";
		exit;
	}
	echo "<pre>";
	var_dump($data[0]);

	?>