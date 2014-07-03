<?php 

	function process_request($_GET){	
			$request_sent=true;
			$length = $_GET["length"];
			$width=$_GET["width"];
			$rent_type=$_GET["rent_type"];
			$db = search($length,$width,$rent_type);
			$num_results= count($db);	
	}	