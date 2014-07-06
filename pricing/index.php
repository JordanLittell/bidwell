<?php 
	include("model.php");
	include("view.php");
	include("controller.php");
	include("../partials/header.php"); 


	if (strlen($_SERVER["QUERY_STRING"])>0){
		$result_response = process_request($_GET["length"],$_GET["width"],$_GET["rent_type"]);
		//make this a hash so you can access the values with a string
		$db = $result_response[0];
		$num_results = count($db);
		$request_sent=true;
		$width = $result_response[1];
		$length=$result_response[2];
		$rent_type=$result_response[3];
	}
	?>
	<section>
		<h1>Search For Prices and Units</h1>
	</section>
	<section>
		<form id="unit_form">
			<fieldset>
				<label for="width" id="width">Select Storage Width:</label><br>
				<select name="width" form="unit_form" id="width" onChange="showLengths(this.value);">
					<?php display_width_options();?>
				</select>
				<br><br>
				
				<div id ="lengths"></div>

				<br><br>
				
				<div id="billing_options">
					<label for="rent_type">Select Billing Plan:</label><br>
					<select name="rent_type" id="rent_type" onChange="$('#price_button').fadeIn('slow');">
						<option value="monthly">monthly</option>
						<option value="weekly">weekly</option>
					</select>
					<br><br>
					<input type="submit">
				</div>
				
			</fieldset>
		</form>
	</section>
	<?php if ($request_sent&&$num_results>0) { ?>
	<section id = "form-results">
		<?php 
		display_results($width,$length,$db,$rent_type); 
		?>
		<?php } elseif($request_sent&&$num_results==0) {
			display_error();
	 	}?>
	</section>
<?php include("../partials/footer.php");?>
