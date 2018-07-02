<?php
include 'utilities.php';

$nom = htmlspecialchars($_POST['nom']);

//requete pour récupérer les infos de l'auteur :
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

// si le nom rentré est === au nom de la base ET que le mdp rentré est === au mdp de la base 
if (($_POST['nom'] == $auteur['nom']) && (password_verify($_POST['password'],$auteur['mdp']))) {
	//alors on créé un nouvel index de session qui comprend le nom :
	$_SESSION['connexion_pseudo'] = $_POST['nom'];
}

header('Location: ../admin.php');
exit();


?>	