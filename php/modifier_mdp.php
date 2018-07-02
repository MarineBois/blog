<?php

include 'utilities.php';

$nom = $_SESSION['connexion_pseudo'];


$query = $pdo->prepare
		(
		    'SELECT *
		     FROM auteur
		     WHERE nom = ?
		     '
		);

		$query->bindParam(1,$nom, PDO::PARAM_STR);

		$query->execute();

		$auteur = $query->fetch(PDO::FETCH_ASSOC);


if (password_verify($_POST['ancienPassword'],$auteur['mdp'])) {

	if ($_POST['nouveauPassword'] === $_POST['nouveauPassword2']) {

	
	$password = password_hash($_POST['nouveauPassword'], PASSWORD_DEFAULT);

	$query = $pdo->prepare
	(
	    'UPDATE 
			auteur
 		SET mdp=?
 		WHERE nom = ?
	     '
	);

	
	$query->bindParam(1,$password, PDO::PARAM_STR);
	$query->bindParam(2,$nom, PDO::PARAM_STR);

	$query->execute();

	$insertmdp = $query->fetch(PDO::FETCH_ASSOC);

	echo('Le mot de passe a bien été modifié !');

	header('Location: ../admin.php');
 	exit();

	} else {

		echo('Le mot de passe n\'a pas été modifié !');

		header('Location: ../admin.php');
		exit();


	}	

}else {

	echo('Le mot de passe initial n est pas celui de la base!');

	header('Location: ../admin.php');
	exit();


	}
