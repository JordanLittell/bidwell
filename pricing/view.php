
<?php 
	//stil need to add code for pagination and incorporate AJAX for to dynamically update the form
	

function display_results($width,$length,$db,$rent_type) {
	if(!empty($db) && !empty($width) && !empty($length)&& !empty($rent_type)){
	?>

<h3>We found some matches for a <?php echo($width);?> x <?php echo($length);?> unit!</h3><br><br>

 	<table id="pricing-table">	
		<tr>
			<th>Unit</th>
			<th>Price</th>
		</tr>
		<?php 
		foreach($db as $result){ ?>
		<tr>
			<td><?php echo $result["sUnitName"]?></td>

			<?php if ($rent_type=="monthly"){ ?>
			<td>$<?php echo $result["dcStdRate"]?>/mo</td>
			<?php } else 	{?>

			<td>$<?php echo $result["dcStdWeeklyRate"]?>/wk</td>
			<?php } ?>

		</tr>
		<?php     } ?>
	</table>
	<h3>Please call to confirm the price and/or reserve:</h3>
	<?php }
	else{
		echo "We could not find any matches.";
	}
}
	?>


<?php function display_width_options($widths){
	$widths = get_dimensions()[1];
	foreach ($widths as $width) {
		if ($width["dcWidth"]!=0){?>
		<option value="<?php echo $width['dcWidth'];?>"><?php echo $width["dcWidth"];?></option>
	<?php }
	} 
} ?>

<?php function display_lengths($lengths){?>
		
<?php
	foreach ($lengths as $length) {
		if ($length["dcLength"]!=0){?>
		<option value="<?php echo $length['dcLength'];?>"><?php echo($length["dcLength"]);?></option>
	<?php }
	
	}
}
	function display_available_units($available){?>
	<table id ="pricing-table">
		<tr>
			<th>Length</th>
			<th>Width</th>
			<th>Price</th>
		</tr>
	<?php
		foreach($available as $unit){
	?>	
		<tr>
			<td><?php echo $unit['dcWidth'];?></td>
			<td><?php echo $unit['dcLength'];?></td>
			<td><?php echo "$".$unit["WeeklyRate"]."/wk";?></td>
		</tr>
		<?php } ?>
	</table>
<?php } ?>




