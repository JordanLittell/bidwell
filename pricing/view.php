
<?php 
	//stil need to add code for pagination and incorporate AJAX for to dynamically update the form
	


	function display_results($width,$length,$db,$rent_type) {?>

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
	<?php }?>

<?php function display_error(){
	?>
	<section>
		<?php 
		//Let the user know when the unit is available.
	echo "We have no more units available in that size. Call us if you have any questions";

	}?>
<?php function display_width_options($widths){
	$widths = get_dimensions()[1];
	foreach ($widths as $width) {
		if ($width[0]!=0){?>
		<option value="<?php echo $width[0];?>"><?php echo $width[0];?></option>
	<?php }
	} 
} ?>

<?php function display_lengths($lengths){?>
		<label for="length" >Select Storage Length:</label><br>
		<select name="length" form="unit_form" id="length" onChange="$('#billing_options').fadeIn('slow');">
<?php
	foreach ($lengths as $length) {
		if ($length[0]!=0){?>
		<option value="<?php echo $length[0][0];?>"><?php echo($length["dcLength"]);?></option>
	<?php }
	
	}?>
	</select>
<?php }?>



