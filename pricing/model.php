<?php 
	require_once("../inc/database.php");
	//put all of the business logic in this file. 
	//Use PHP PDO to interface with DB
	//have try-catch block for each point of interaction, use when interacting with external object
	function available_units(){
		$db = get_data();
		try{
			$results = $db->query("SELECT * FROM UNITS WHERE bRented=\"FALSE\"");
			// $results->bindParam(0,$width);
			// $results->bindParam(1,$length);
			$data = $results->fetchAll();
		}	catch(Exception $e){
			echo "could not query the database";
			exit;
		}
		return $data;
	}

	function search($length,$width,$rent_type){
		/*returns the units that match the users specifications or returns errors if none are found*/
		//========     CONNECT TO DATABASE ========
		try{
		$db = new PDO("mysql:host=localhost;dbname=UNITS;port=8889","root","root");
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$db->exec("SET NAMES utf8");

		}	catch(Exception $e){
			echo "could not connect to db";
			exit;
		}

		if($rent_type=="monthly"){
			$rent_param="dcStdRate";
		}
		else{
			$rent_param="dcStdWeeklyRate";
		}
		//================       EXECUTE QUERY WITH PARAMS   ========================
		//PARAMETERS:	sUnitName  ,dcWidth  ,dcLength ,".$rent_param." ,bPower  ,bClimate  bAlarm,  bRent
		try{	
			$results = $db->prepare("SELECT * FROM UNITS WHERE dcWidth=? AND dcLength=? AND bRented=\"TRUE\"");
			//bind paramaters on the back end to prevent MySQL injection
			$results->bindParam(1,$width);
			$results->bindParam(2,$length);
			$results->execute();
			$data = $results->fetchAll();
		}	catch(Exception $e){
			echo "could not query the database";
			exit;
		}
		return $data;
	}
	function all_units(){
		/*returns the units that match the users specifications or returns errors if none are found*/
		//========     CONNECT TO DATABASE ========
		try{
		$db = new PDO("mysql:host=localhost;dbname=UNITS;port=8889","root","root");
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$db->exec("SET NAMES utf8");

		}	catch(Exception $e){
			echo "could not connect to db";
			exit;
		}

		//================       EXECUTE QUERY WITH PARAMS   ========================
		//PARAMETERS:	sUnitName  ,dcWidth  ,dcLength ,".$rent_param." ,bPower  ,bClimate  bAlarm,  bRent
		try{	
			$results = $db->query("SELECT * FROM UNITS");
			// $results->bindParam(0,$width);
			// $results->bindParam(1,$length);
			$data = $results->fetchAll();
		}	catch(Exception $e){
			echo "could not query the database";
			exit;
		}
		return $data;
	}

