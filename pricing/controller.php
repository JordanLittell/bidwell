<?php 
	require_once("model.php");
	require_once("view.php");
	// function process_request($length_param,$width_param,$rent_type_param,$db){	
	// 		$request_sent=true;
	// 		$length = $length_param;
	// 		$width=$width_param;
	// 		$rent_type=$rent_type_param;
	// 		$db = search($length,$width,$rent_type);
	// 		$results= [$db,$width,$length,$rent_type];
	// 		$num_results= count($db);
	// 		return $results;	
	// }	

	if (isset($_GET["width"])&&!empty($_GET["width"])&&!isset($_GET["length"])){
		$width = $_GET["width"];
		$lengths = get_lengths($width);
		echo(display_lengths($lengths));
	}
	if (isset($_GET["width"])&&isset($_GET["length"])&&isset($_GET["length"])&&isset($_GET["rent_type"])&&!empty($_GET["width"])&&!empty($_GET["length"])&&!empty($_GET["rent_type"])){
		$width=$_GET["width"];
		$length=$_GET["length"];
		$db = search($length,$width,$rent_type);
		echo display_results($width,$length,$db,$rent_type);
	}
	?>


	

