<?php


include 'utilities.php';


$_SESSION['recherche'] = $_POST['categorie'];

header('Location: ../index.php');
exit();
