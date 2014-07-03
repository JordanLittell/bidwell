<?php 
	include("model.php");
	include("view.php");

	include("../partials/header.php"); 
	if (strlen($_SERVER["QUERY_STRING"])>0){
		$request_sent= true;
		$length = $_GET["length"];
		$width=$_GET["width"];
		$rent_type=$_GET["rent_type"];
		$db = search($length,$width,$rent_type);
		$num_results= count($db);
	}
?>

	<section>
		<h1>Pricing Inquiry</h1>
	</section>
	<section>
		<form id="unit_form" method="GET">
			<fieldset>
				<label for="length">Select Storage Length:</label><br>
				<select name="length" form="unit_form" id="length">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
				</select>
				<br><br>
				<label for="width">Select Storage Width:</label><br>
				<select name="width" form="unit_form" id="width">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
				</select><br><br>
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

	<div id="phone"><a href="tel:5308932109"><img src="<?php echo BASE_URL;?>img/phone.svg" class="icon"></a></div>
	</section>
<?php 
// print_r(error_get_last());
	include("../partials/footer.php");
	
?>

