<?php 
	require_once("model.php");
	require_once("view.php");
	function process_request($length_param,$width_param,$rent_type_param,$db){	
			$request_sent=true;
			$length = $length_param;
			$width=$width_param;
			$rent_type=$rent_type_param;
			$db = search($length,$width,$rent_type);
			$results= [$db,$width,$length,$rent_type];
			$num_results= count($db);
			return $results;	
	}	


	if (strlen($_SERVER["QUERY_STRING"])>0){
		$width = $_GET["width"];
		$lengths = get_lengths($width);
		echo(display_lengths($lengths));
	}?>

	

