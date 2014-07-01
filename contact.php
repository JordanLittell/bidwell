<?php 
	if($_SERVER["REQUEST_METHOD"]==="POST"){
		$success=true;
		//extract data from form
		
		$body="";
		$errors= array();
		$name = trim($_POST["name"]);
		$email = trim($_POST["email"]);
		$R1 = trim($_POST["R1"]);
		$R2 = trim($_POST["R2"]);
		$R3 = trim($_POST["R3"]);
		$R4 = trim($_POST["R4"]);
		
		
		//clean the data: 
	
		$name = htmlspecialchars(($name));
		$email = htmlspecialchars(($email));
		$message = htmlspecialchars(($message));

		//validate the data
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    		array_push($errors,"Email address is invalid.");
    		$success=false;
    	}

	
		if(!(isset($name))||!(isset($email))||$name==""||$email==""){
			array_push($errors, "It looks like you didn't complete the form. ");
			$success=false;
		}
		if(!(isset($R1))&&!(isset($R2))&&!isset($R3)&&!isset($R4)||$R1==""&&$R2==""&&$R3==""&&$R4==""){
			array_push($errors, "Select at least one reason for contact.");
		}


		$body=$body.$name." has sent you the following message: \r\n".$message." email them back at: \r\n".$email;
		if(!mail("bidwellmini2@gmail.com","email",$body)){
			array_push($errors, "Mail not sent. Server Error.");
			$success=false;
		}
		mail('jordanlittell@gmail.com','email',$body);
	}
include("partials/header.php");?>
		
	<div class="col-right-mobile">
		<div class="container" id="contact">
			<span class="feature-text-big">Contact Page</span>
			<br><br><br><br>
			<span class="feature-text">Put Yourself in contact with us</span>
			<br>
			<br>
			<div id="contact-form">
				<br>
				
				<?php 
				if(isset($errors)&&count($errors)!=0){
					echo "<h1 class='feature-text-big'>we found the following errors:</h1>";
					echo '<ul>';
				}
					foreach($errors as $error){
						echo "<li class='feature-text-error' id='error'>".$error."</li>";
					}		
					echo '</ul>';
				if(!$success){
				
				?>
				<div class="form-container">
					<h1 class="feature-text white" id="header">Contact Form</h1>
					<form>
						<div class="row">
							<div class="col_6">
								<label class="feature-text white" for="name">Name</label>
								<input type="text" id="name1" name="name">
							</div>
							<div class="col_5 off_1 hint feature-text white" id="name-hint">Please enter first and
								last name (this is required)
							</div>
						</div>
						<div class="row">
							<div class="col_6">
								<span for="email" class="feature white">Email</span>
								<input type="text" id="email" name="email">
							</div>
							<div class="col_5 off_1 hint" id="email-hint">Please enter your full email
								address (this is required)</div>
						</div>
						<div class="row" id="reason-area">
							<span class="feature white col_5">Reason for Contact:</span><span class="col_4 off_1 feature-text-white hint"id="reason-hint">Select at least one</span>
							<br>
							<input type="checkbox" name="R1"> <span class="feature-text white">Rent storage space</span><br>
							<input type="checkbox" name="R2"> <span class="feature-text white">More information</span><br>
							<input type="checkbox" name="R3"> <span class="feature-text white">Problem with website</span><br>
							<input type="checkbox" name="R4"> <span class="feature-text white">Other</span><br>


						</div>
						<div class="row">
							<div class="col_4">
								<h4 class="feature white">Enter Your Message Below:</h4>
							</div>
							<div class="col_5 off_3 hint" id="message-hint">
								(OPTIONAL): You can ask us any questions or concerns if you wish.
							</div>
						</div>
						<br>
						<textarea id="message">Message Here</textarea>
					
						<div class="col_6 off_3">
							<button type="submit" id="submit-button">SEND FORM</button>
						</div>
					</form>
				</div>
				<?php }
				
				else{
					echo '<div class="row"><span class="feature-text-big">Message Successfully Sent!</span></div>
					<div class="row"><a href="index.php"><span id="submit-button">TAKE ME BACK</span></a></div>';
				}
				?>
		
			</div>
		</div>
	</div>

		<?php include("partials/footer.php");?>	
		<script type="text/javascript" src="jquery/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="functions.js" language="javascript"></script>
	</body>
</html> 