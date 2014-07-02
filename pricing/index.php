<?php 
	include("../partials/header.php"); 
	// if (SERVER["REQUEST_METHOD"]=="GET"){
	// 	$length = GET["length"];
	// 	$width=GET["width"];
	// 	header('Location: /');
	// }
	$success=true;
?>

	<section>
		<h1>Pricing Inquiry</h1>
	</section>
	<section>
		<form action="GET" id="unit_form">
			<fieldset>
				<label for="length">Select Length:</label><br>
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
				<label for="width">Select Width:</label><br>
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
				<label for="rent_type">Select Period of Rental:</label><br>
				<select name="rent_type" id="rent_type">
					<option value="monthly">monthly</option>
					<option value="weekly">weekly</option>
				</select>
				<br><br>
				<input type="submit">
			</fieldset>
		</form>
	</section>
<?php if($success) { ?>
	<section id = "form-results">
		<h3>We found some matches!</h3><br><br>
		<table id="pricing-table">
			<tr>
				<th>Unit</th>
				<th>Price</th>
				<th>Available</th>
			</tr>
			<tr>
				<td>012CC</td>
				<td>$56.00</td>
				<td>4</td>
			</tr>
		</table>

	</section>
<?php } ?>
	
	
<?php include("../partials/footer.php");
include("model.php");?>

