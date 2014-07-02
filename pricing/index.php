<?php 
	
	include("../partials/header.php"); 
	
	if (strlen($_SERVER["QUERY_STRING"])>0){
		include("model.php");
		$length = $_GET["length"];
		$width=$_GET["width"];
		$rent_type=$_GET["rent_type"];
		$db = search($length,$width);
		$num_results= count($db_entries);
		

	}
?>

	<section>
		<h1>Pricing Inquiry</h1>
	</section>
	<section>
		<form id="unit_form" method="GET">
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
<?php if (strlen($_SERVER["QUERY_STRING"])>0) { ?>
	<section id = "form-results">
		<h3>We found some matches!</h3><br><br>
		<table id="pricing-table">
			<tr>
				<th>Unit</th>
				<th>Price</th>
				<th>Available</th>
			</tr>
			<?php foreach($db as $result){ ?>
			<tr>
				<td><?php echo $result[0]?></td>

				<?php if ($rent_type=="monthly"){ ?>
				<td>$<?php echo $result[6]?>/mo</td>
				<?php } else 	{?>

				<td>$<?php echo $result[7]?>/wk</td>
				<?php } ?>

				<?php if ($result[13]=="TRUE"){?>
				<td><?php echo "NO";?></td>
				<?php } else { ?>
				<td><?php echo "YES";?></td>
				<?php } ?>
			</tr>
			<?php     } ?>
		</table>

	</section>
<?php } else {?>
	<h3>Sorry. No such units are available.</h3>
	<?php }?>
	
	
<?php include("../partials/footer.php");
?>

