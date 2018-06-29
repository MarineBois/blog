<?php 

$contenu = htmlspecialchars($_POST['contenu']);
$auteur = htmlspecialchars($_POST['auteur']);
$categorie = htmlspecialchars($_POST['categorie']);
$titre = htmlspecialchars($_POST['titre']);
$image = htmlspecialchars($_POST['image']);
$description = htmlspecialchars($_POST['description']);


//l'id de la catégorie est déjà retournée par le POST
//rechercher l'id de l'auteur :

$query = $pdo->prepare
	(
	    'SELECT *
	     FROM auteur
	     WHERE nom = ?
	     '
	);
	$query->bindParam(1,$auteur, PDO::PARAM_STR);
	$query->execute();

	$auteur = $query->fetch(PDO::FETCH_ASSOC);

$idAuteur = $auteur['id'];	

var_dump($idAuteur);





//insérer le nouvel article :
	
	$query = $pdo->prepare
	(
	    'INSERT INTO article (contenu, idAuteur,idCategorie,titre, image, description)
	     VALUES (?,?,?,?,?,?)
	     '
	);

	$query->bindParam(1,$contenu, PDO::PARAM_STR);
	$query->bindParam(2,$idAuteur, PDO::PARAM_INT);
	$query->bindParam(3,$categorie, PDO::PARAM_INT);
	$query->bindParam(4,$titre, PDO::PARAM_STR);
	$query->bindParam(5,$image, PDO::PARAM_STR);
	$query->bindParam(6,$description, PDO::PARAM_STR);

	$query->execute();

	$affichage_article = $query->fetch(PDO::FETCH_ASSOC);

	var_dump($affichage_article);
					
 header('Location: ../admin.php');
 exit();

?>