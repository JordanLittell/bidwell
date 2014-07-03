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
		$db = get_data();
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


	function get_available_dimensions(){
		$db = get_data();
		var_dump($db);
		try{		
			$width_query = $db->query("SELECT DISTINCT dcWidth FROM UNITS ORDER BY dcWidth ASC");
			$widths = $width_query->fetchAll();
		}	catch(Exception $e){
			echo "could not get dimensions";
		}
		try{		
			$length_query = $db->query("SELECT DISTINCT dcWidth FROM UNITS ORDER BY dcWidth ASC");
			$lengths = $length_query->fetchAll();
		}	catch(Exception $e){
			echo "could not get dimensions";
		}
		return [$widths,$lengths];
	}


