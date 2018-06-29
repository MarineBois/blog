<?php

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

	// header('Location: ../admin.php');
 // 	exit();

	} else {

		echo('Le mot de passe n\'a pas été modifié !');

		// header('Location: ../admin.php');
		// exit();


	}	

}else {

	echo('Le mot de passe initial n est pas celui de la base!');

	// header('Location: ../admin.php');
	// exit();


	}

// $ancienPasswordAffiche = password_hash($_POST['ancienPassword'], PASSWORD_DEFAULT);
// $nouveauPasswordAffiche = password_hash($_POST['nouveauPassword'], PASSWORD_DEFAULT);
// $nouveau2PasswordAffiche = password_hash($_POST['nouveauPassword2'], PASSWORD_DEFAULT);
// $mdpbase = password_hash($auteur['mdp'], PASSWORD_DEFAULT);

// echo( '<li>'.$ancienPasswordAffiche.'</li>
// 		<li>'.$nouveauPasswordAffiche.'</li>
// 		<li>'.$nouveau2PasswordAffiche.'</li>
// 		<li>'.$nouveau2PasswordAffiche.'</li>'

// 	);