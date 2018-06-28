<?php

session_start();

$_SESSION['recherche'] = $_POST['categorie'];

header('Location: ../index.php');
exit();
