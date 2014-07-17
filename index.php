
<?php 
	include("../inc/database.php");
	include("model.php");
	include("view.php");
	include("controller.php");
	include("partials/header.php");
?>
	<div class="col_12" id="banner">
		<div id="banner-text">BIDWELL <span class="mobile" id="mobile-inline-text"> STORAGE</span> <span id="title-text" class="mobile-no">AFFORDABLE, SECURE, CONVENIENT</span>
		</div>
	</div>
	<div id="feature-image">
		<br>

		<img src="img/bidwell.jpg" id="feature-image">
	</div>				
	<br class="mobile">

	<div class="container">
		<h1>We <strong>are</strong> currently leasing units.</h1>
		<div class="pannel">
			
			<h1>Why Us?</h1>
			<h3>With a U-Haul certification, A/C and C/C self-storage units, a modern security system, 
			affordable pricing plans and a convenient location, Bidwell offers secure, convenient, and affordable storage.
			We have clients ranging from pharmaceutical firms to college students. Whatever your storage needs are, we have you covered. </h3>
		</div>
		<div class="pannel" id="main-pannel">
				
			<a href="#info" class="trigger"><img src="img/info.png" class="icon" ><br><span class="target">Info</span></a>
			<a href="#contact" class="trigger"><img src="img/contact.png" class="icon"><br><span class="target">Contact</span></a>
			<a href="#location" class="trigger"><img src="img/location.svg" class="icon"><br><span class="target">Location</span></a>
			<a href="#secure" class="trigger"><img src="img/secure.png" class="icon"><br><span class="target">Security</span></a>
		</div>
		<hr>


		<div class="pannel" id="info">
			<img src="img/info.png" class="feature-icon">
			<h1>General Information</h1><br>
			<img src = 'img/uhaul_logo.png' class="img-small">
			<h3>Bidwell is now <strong>UHaul</strong> certified</h3><br>
	  		<h3><strong>Address</strong></h3> 65 Heritage Lane Chico, CA 95926<br>
	  		<h3><strong>Business Hours</strong></h3>
	  		Monday-Friday: 9AM - 5PM 
  			<br>Saturday-Sunday: 10AM - 4PM
  			<br>Gate Access: 7 Days a week, 7AM - 6PM

	  		<br><br>We are located in the K-mart parking lot.

	  		<br><span class="feature-text">General Warehousing and Storage License # 07334</span>
		</div>
		<hr>

	  	<div class="pannel" id="secure">
	  		<img src="img/secure.png" class="feature-icon">
	  		<h1>Security</h1>
	  		<ul>
	  			<li>Resident Manager</li>
	  			<li>Video Surveillance</li>
	  		</ul>
	  		<p>Some of our clients store valuable pharmecuticals, some store common household items. We provide the same level of security 
	  			to all of our clients. We have security cameras that monitor all of the units 24/7. 
	  			Our current manager also lives on site. Whether it is 2:00 AM or lunchtime, we are watching your belongings.</p>
		</div>
		<hr>
		<div class="pannel" id="location">
			<img src="img/location.svg" class="feature-icon">
			<h1>Location</h1>
			<p>Need help driving to Bidwell Self Storage from your current location?
				No problem.</p>
				<button id="getMap" class="main-button">
					Get Directions
				</button>
				<button id="hideMap" class="main-button hidden">Hide Map</button>
				<br>
				<br>
				<div id="loading" class="hidden">
					<img src="img/loading.gif">
				</div>
				<div id="direction-container" class="hidden">
					<div id="map-canvas"></div><br>
					<div id="directionsPanel"></div>
				</div>
				
		</div>
		<hr>

		<div class="pannel" id="contact">
			<img src="img/contact.png" class="feature-icon">
			<h1>Contact</h1><br>
			<?php
				render_available();
			?>
			<form>
				
				<h3>Via (Smart) Phone</h3>
				<fieldset>
					<h3>Call us at: (530) 893-2109</h3><br>
					Or simply tap below:<br>
					<div id="phone"><a href="tel:5308932109"><img src="img/phone.svg" class="icon"></a></div>
					<div>Don't be shy. We are here to help.</div>
				</fieldset>
				
			</form>
		</div>
	</div>
	<?php include("partials/footer.php"); ?>			

</html>