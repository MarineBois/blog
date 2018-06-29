<?php 



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


					
 header('Location: ../admin.php');
 exit();

?>