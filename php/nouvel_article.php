<?php 



var_dump($_POST);

$contenu = htmlspecialchars($_POST['contenu']);
$auteur = htmlspecialchars($_POST['auteur']);
$categorie = htmlspecialchars($_POST['categorie']);
$titre = htmlspecialchars($_POST['titre']);
$image = htmlspecialchars($_POST['image']);
$description = htmlspecialchars($_POST['description']);


	include 'utilities.php';
	$query = $pdo->prepare
	(
	    'INSERT INTO article (contenu, idAuteur,idCategorie,titre, image, description)
	     VALUES (?,?,?,?,?,?)
	     '
	);

	$query->bindParam(1,$contenu, PDO::PARAM_STR);
	$query->bindParam(2,$auteur, PDO::PARAM_STR);
	$query->bindParam(3,$categorie, PDO::PARAM_STR);
	$query->bindParam(4,$titre, PDO::PARAM_STR);
	$query->bindParam(5,$image, PDO::PARAM_STR);
	$query->bindParam(6,$description, PDO::PARAM_STR);

	$query->execute();

	$affichage_article = $query->fetch(PDO::FETCH_ASSOC);
					
 header('Location: ../admin.php');
 exit();

?>