<?php include("partials/header.php");?>
<br><br>

<div class="container">
	<div class="pannel">
		<h1>Navigation Page</h1>
		<br>	

		<div id="map-canvas"></div><br><br>
		<div id="location-app">
			<br>
			<div class="container">
				<div class="main-button col_4 off_4" onClick="calcRoute();">
					GET DIRECTIONS
				</div>
				
				<div  id="directionsPanel">
					<span id="error1">FEATURE DISABLED: You're device does not support geolocation.</span>
				</div>
			</div>
		</div>
	</div>
</div>	

<?php include("partials/footer.php");?>	
<script type="text/javascript" src="js/map.js"></script>