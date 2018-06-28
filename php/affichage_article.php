<?php 

//REQUETE POUR RECUPERER LES INFO DE L'ARTICLE :

	include 'utilities.php';
	$query = $pdo->prepare
	(
	    'SELECT
	    	article.id,
            libelle,
	        titre,
	        article.contenu,
	        nom,
	        article.date,
	        img,
	        image,
	        description
	     FROM article
	     INNER JOIN auteur ON auteur.id = article.idAuteur
         INNER JOIN categorie ON categorie.id = article.idCategorie
	     WHERE article.id = ?
	     '
	);

	$query->bindParam(1, $_GET['idArticle'], PDO::PARAM_INT);

	$query->execute();

	$affichage_article = $query->fetch(PDO::FETCH_ASSOC);

//AFFICHAGE DE L'ARTICLE :
	echo('
		<ul class="index">
			<li><h2>'.$affichage_article['img'].$affichage_article['titre'].'</h2></li>');
	if (!empty($affichage_article['image'])){
		echo('	
			<li><img class="images_full" src=img/'.$affichage_article['image'].' alt="'.$affichage_article['description'].'"/></li>
		');	
	}		
	echo('		
			<li>'.$affichage_article['contenu'].'</li>
			<li>Rédigé par '.$affichage_article['nom'].' le '.$affichage_article['date'].'</li>
			<li><small>Catégorie : '.$affichage_article['libelle'].'</small></li>
		</ul>
		<hr>');

//AFFICHAGE DES COMMENTAIRES :
	$query = $pdo->prepare
	(
	    'SELECT
	    	*
	     FROM commentaire
	     WHERE idArticle = ?
	     '
	);

	$query->bindParam(1, $_GET['idArticle'], PDO::PARAM_INT);

	$query->execute();

	$affichage_commentaire = $query->fetchAll(PDO::FETCH_ASSOC);


	foreach ($affichage_commentaire as $commentaire) {

		echo('
			<ul>
				<li><h3><i class="fas fa-comment"></i><small> Rédigé par : </small>'.$commentaire['pseudo'].'</h3></li>
				<li>'.$commentaire['contenu'].'</li>
			</ul>');
	};

	echo('<hr>');

// FORMULAIRE AJOUT COMMENTAIRE :
	echo('
	<form method="POST" action="php/ajouter_commentaire.php">
		<fieldset>
			<legend>Nouveau commentaire</legend>
			<ul>
				<li class="post">
					<label for="id"></label>
					<input type="text" name="id" id="'.$_GET['idArticle'].'" value="'.$_GET['idArticle'].'">
				</li>
				<li>
					<label for="pseudo"> Pseudo :</label>
					<input type="text" name="pseudo" id="pseudo">
				</li>	
				<li>
					<label for="commentaire">Commentaire : </label>
					<textarea type="text" name="commentaire" id="commentaire"></textarea>
				</li>
				<li class="liButton">
					<label for="ajouter"></label>
					<button type="submit">Ajouter</button>
				</li>
				<li class="liButton">
					<label for="annuler"></label>
					<button type="reset">Annuler</button>
				</li>
			</ul>
		</fieldset>
	</form>				
');

	


?>