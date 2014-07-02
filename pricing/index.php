<?php 	
	
	include("../partials/header.php");
	?>
	<section>
		<h1>Pricing Inquiry</h1>
	</section>
	<section>
		<form action="GET" id="unit_form">
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
			<select name="length" form="unit_form" id="width">
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
		</form>
	</section>

	
	
<?php include("../partials/footer.php");
include("model.php");?>

