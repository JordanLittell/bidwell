<?php 
require_once("model.php");
	function process_request($length_param,$width_param,$rent_type_param,$db){	
			$request_sent=true;
			$length = $length_param;
			$width=$width_param;
			$rent_type=$rent_type_param;
			$db = search($length,$width,$rent_type);
			return $db;	
	}	