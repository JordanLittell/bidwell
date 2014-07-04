<?php 
	include("model.php");
	include("view.php");
	include("controller.php");

	include("../partials/header.php"); 
	if (strlen($_SERVER["QUERY_STRING"])>0){
		$db = process_request($_GET["length"],$_GET["width"],$_GET["rent_type"]);
		$num_results = count($db);
		$request_sent=true;
	}
	;?>

	<section>
		<h1>Search For Prices and Units</h1>
	</section>
	<section>
		<form id="unit_form" method="GET">
			<fieldset>
				<label for="width">Select Storage Width:</label><br>
				<select name="width" form="unit_form" id="width">
					<?php display_width_options();?>
				</select><br><br>
				<label for="length">Select Storage Length:</label><br>
				<select name="length" form="unit_form" id="length">
					<?php display_length_options();?>
				</select>
				<br><br>
				
				<label for="rent_type">Select Billing Plan:</label><br>
				<select name="rent_type" id="rent_type">
					<option value="monthly">monthly</option>
					<option value="weekly">weekly</option>
				</select>
				<br><br>
				<input type="submit">
			</fieldset>
		</form>
	</section>

	<?php if ($request_sent&&$num_results>0) { ?>
	<section id = "form-results">
		<?php display_results($width,$length,$db,$rent_type); ?>
<?php } elseif($request_sent&&$num_results==0) {

	display_error();

	 }?>

	
	</section>
<?php include("../partials/footer.php");?>
