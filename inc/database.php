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
	try{
		$results = $db->query("SELECT sUnitName,iFloor,dcWidth,dcLength,dcStdRate,dcStdWeeklyRate,bPower,bClimate,bAlarm,bRentable,bRented FROM UNITS");
		$data = $results->fetchAll();
	}	catch(Exception $e){
		echo "could not query the database";
		exit;
	}
