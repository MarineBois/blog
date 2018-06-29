<?php
include 'utilities.php';

	$nom = htmlspecialchars($_POST['nom']);




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


	if (($_POST['nom'] == $auteur['nom']) && (password_verify($_POST['password'],$auteur['mdp']))) {

		$_SESSION['connexion_pseudo'] = $_POST['nom'];
	}

header('Location: ../admin.php');
exit();


?>	