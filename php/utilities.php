<?php 
	$pdo = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
	$pdo->exec('SET NAMES UTF8');