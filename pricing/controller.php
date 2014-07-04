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

	echo "function compile";
		$width = $_GET["width"];
		echo "<pre>";
		$lengths = get_lengths($width)[0];
		var_dump($lengths[0][0]);
		$display_length_options($lengths[0]);
		echo "view code ran";
		
	

	

