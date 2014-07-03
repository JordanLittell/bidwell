<?php 
	
	include("../partials/header.php"); 
	$num_results =0;
	if (strlen($_SERVER["QUERY_STRING"])>0){
		include("model.php");
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
<?php if ($num_results>0) { ?>
	<section id = "form-results">
		<h3>We found some matches!</h3><br><br>
		<table id="pricing-table">
			<tr>
				<th>Unit</th>
				<th>Price</th>
			</tr>
			<?php foreach($db as $result){ ?>
			<tr>
				<td><?php echo $result[0]?></td>

				<?php if ($rent_type=="monthly"){ ?>
				<td>$<?php echo $result[6]?>/mo</td>
				<?php } else 	{?>

				<td>$<?php echo $result[7]?>/wk</td>
				<?php } ?>

			</tr>
			<?php     } ?>
		</table>

	</section>
<?php } else {?>
	<section>
		 
			<?php if (count(available_units())!=0) { ?>
				<h3>We could not find any matches. Here are the <?php count(available_units());?> units we have avialable:</h3><br><br>
			<?php } else {?>
				There are no units available at this time. There could be openings at any time. <br>Try Calling us:<br><div id="phone"><a href="tel:5308932109"><img src="<?php echo BASE_URL;?>img/phone.svg" class="icon"></a></div>
				<?php }?>
		
	</section>
	<?php }?>
	
	
<?php 
// print_r(error_get_last());
	include("../partials/footer.php");
	
?>

