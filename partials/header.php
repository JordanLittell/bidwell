<?php 
	define("BASE_URL","/bidwell3.0/");
	define("ROOT_PATH",$_SERVER["DOCUMENT_ROOT"]."/bidwell3.0");
	?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Bidwell Self Storage</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="<?php echo BASE_URL;?>css/main.css">
        
    </head>
    
	<body>
		<div id="nav-bar" class="mobile-no">
			<br>
			<div>			
				<ul class="nav-list">
					<a href=<?php echo BASE_URL;?>><li>Home</li></a>
					<a href="<?php echo BASE_URL;?>pricing"><li>Pricing</li></a>
				</ul>
			</div>
		</div>
		<div id="nav-bar" class="mobile">
			<div class="pull-right"><img src="<?php echo BASE_URL;?>img/menu-icon.png" class="menu-icon button"></div>
			<br>
			<div id="mobile-nav">			
				<ul class="mobile-list hidden">
					<a href=<?php echo BASE_URL;?>><li>Home</li></a>
					<a href="<?php echo BASE_URL;?>pricing.php"><li>Pricing</li></a>
				</ul>
			</div>
		</div>


	

			
		
		