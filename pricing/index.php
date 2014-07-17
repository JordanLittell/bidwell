<?php 
include("../partials/header.php");
	include("../inc/database.php");
	include("controller.php");
	 


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
	<section><h1>Available Units:</h1></section>
	<section><?php render_available();?></section>
	<section>



	<?php if (count(available_units(get_data()))>20){;?>
		<h1>Search For Prices and Units</h1>
	</section>


	<section>
		<form id="unit_form">
			<fieldset>
				<label for="width">Select Storage Width:</label><br>
				<select name="width" form="unit_form" id="width">
					<?php display_width_options();?>
				</select>
				<br><br>

				
					<label for="length" >Select Storage Length:</label><br>
					<select name="length" form="unit_form" id="length-selector">
						<option id ="4" value="6">4</option>
						<option id = "5" value="5">5</option>
						<option id = "6" value="6">6</option>
						<option id = "7" value="7">7</option>
						<option id = "8" value="8">8</option>
						<option id = "9" value="9">9</option>
						<option id = "10" value="10">10</option>
						<option id = "11" value="11">11</option>
						<option id = "12" value="12">12</option>
						<option id = "20" value="20">20</option>
						<option id = "22" value="22">22</option>
						
					</select>
				<br><br>
				
				<div id="billing_options">
					<label for="rent_type">Select Billing Plan:</label><br>
					<select name="rent_type" id="rent_type" value="monthly">
						<option value="monthly">monthly</option>
						<option value="weekly">weekly</option>
					</select>
					<br><br>
					<input type="submit">
				</div>
				
			</fieldset>
		</form>
	</section>
	<section id = "form-results">
		
	</section>
	<?php } ?>
<?php include("../partials/footer.php");?>
