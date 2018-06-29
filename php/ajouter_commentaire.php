<?php


$idArticle = htmlspecialchars($_POST['id']);
$pseudo = htmlspecialchars($_POST['pseudo']);
$commentaire = htmlspecialchars($_POST['commentaire']);

$query = $pdo->prepare
	(
	    'INSERT INTO commentaire (contenu, idArticle,pseudo)
	     VALUES (?,?,?)
	     '
	);
	$query->bindParam(1, $commentaire, PDO::PARAM_STR);
	$query->bindParam(2, $idArticle, PDO::PARAM_INT);
	$query->bindParam(3, $pseudo, PDO::PARAM_STR);
	$query->execute();

	$nouveauCommentaire = $query->fetch(PDO::FETCH_ASSOC);
					
 header('Location: ../article.php?idArticle='.$idArticle);
 exit();