<!DOCTYPE html>
<html>
	<head>
		<title>Blog</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- CSS Vendor -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
		<!-- CSS Perso -->
		<link rel="stylesheet" type="text/css" href="css/normalize.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
	</head>
	<body>
		<!--HEADER-->
		<header>

			<nav id="top">
				
				<a href='index.php'><h1><i class="fas fa-microphone"></i> Mon super blog où je raconte ma life</a></h1>
				
				<a href='admin.php'><i class="fas fa-cogs"></i> Administration</a>

				<?php 
				include 'utilities.php';

				if (isset($_SESSION['connexion_pseudo'])){
					echo('
					<a href="php/deconnexion.php">Deconnexion <i class="fas fa-sign-out-alt"></i></a>
					
					');

				};
				?>

			</nav>

		</header>	