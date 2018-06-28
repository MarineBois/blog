<?php

	include 'utilities.php';

	var_dump($_POST);
	$nom = htmlspecialchars($_POST['nom']);


	session_start();

	$query = $pdo->prepare
	(
	    'SELECT nom, mdp, id
		FROM auteur
		WHERE nom = ?
		
	     '
	);

	$query->bindParam(1, $nom, PDO::PARAM_STR);

	$query->execute();

	$auteur = $query->fetch(PDO::FETCH_ASSOC);

	var_dump($auteur);

	if (($_POST['nom'] == $auteur['nom']) && (password_verify($_POST['password'],$auteur['mdp']))) {

		$_SESSION['connexion_pseudo'] = $_POST['nom'];
		echo($_SESSION['connexion_pseudo']);
	}

header('Location: ../admin.php');
exit();


?>	