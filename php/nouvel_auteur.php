<?php 


if ($_POST['password'] === $_POST['password2']) {

$nom = htmlspecialchars($_POST['nom']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);



	include 'utilities.php';
	$query = $pdo->prepare
	(
	    'INSERT INTO auteur (nom, mdp)
	     VALUES (?,?)
	     '
	);

	$query->bindParam(1,$nom, PDO::PARAM_STR);
	$query->bindParam(2,$password, PDO::PARAM_STR);

	$query->execute();

	$affichage_article = $query->fetch(PDO::FETCH_ASSOC);


	header('Location: ../admin.php');
 	exit();

} else {

	header('Location: ../admin.php');
 	exit();
}	
					


?>