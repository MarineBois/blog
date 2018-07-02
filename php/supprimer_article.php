<?php 

include 'utilities.php';

//on vérifie que l'id de l'article est bien passé par le GET, sinon on redirige
if(!array_key_exists('idArticle', $_GET) OR !ctype_digit($_GET['idArticle'])){
	header('Location: ../admin.php');
	exit();
}

//les suppression ne sont pas paramétrés en cascade dans la bdd donc on commence par supprimer les commentaires puis l'article:
	// on supprime d'abord les commentaires liés à l'article :
	$query = $pdo->prepare
	(
	    'DELETE FROM commentaire
	     WHERE idArticle = ?
	     '
	);

	$query->bindParam(1,$_GET['idArticle'], PDO::PARAM_INT);
	$query->execute();

	// supprimer l'article sélectionné :
	$query = $pdo->prepare
	(
	    'DELETE FROM article
	     WHERE article.id = ?
	     '
	);
	$query->bindParam(1,$_GET['idArticle'], PDO::PARAM_INT);
	$query->execute();

//redirection :				
header('Location: ../admin.php');
exit();

// possibilité de faire les 2 requetes en 1 :
	// $requete = $pdo->prepare("
	// 	DELETE FROM commentaire WHERE idArticle = ?;
	// 	DELETE FROM article WHERE id = ?;
	// 	");
	// $requete->execute(array($id,$id));



?>