<?php 
session_start();
	$pdo = new PDO('mysql:host=localhost;dbname=blog', 'root', 'troiswa');
	$pdo->exec('SET NAMES UTF8');