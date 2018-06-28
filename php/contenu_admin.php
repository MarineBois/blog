<?php
include 'utilities.php';
session_start();

	if(!isset($_SESSION['connexion_pseudo'])) {
	
		echo('
			<form class="connexion" method="POST" action="php/connexion.php">
				<label for="nom">Nom</label>
				<input name="nom" required>
				<label for="password">Password</label>
				<input type="password" name="password" required>
				<label for="connexion"></label>
				<button type="submit" >Connexion</button>
			</form>	

		');
	}	

	else if(isset($_SESSION['connexion_pseudo'])) {

		echo('
			<section id="admin">
			<br>
			<h3>Bonjour '.$_SESSION['connexion_pseudo'].' !! Qu\'allez vous raconter aujourd\'hui ?</h3>
			<br>


			<div class="flex">

			<h2><a href="ajouter_article.php"><i class="far fa-file-alt"></i> <= Rédiger un nouvel article </a></h2>');

		//afficher la liste des articles :
		$query = $pdo->prepare
		(
		    'SELECT titre, contenu, nom, libelle, article.id
			FROM article
			INNER JOIN auteur ON auteur.id = article.idAuteur
			INNER JOIN categorie ON categorie.id = article.idCategorie
			ORDER BY date
		     '
		);

		$query->execute();

		$articles = $query->fetchAll(PDO::FETCH_ASSOC);

		echo('
			
			<table class="admin_table">
				<thead>
					<th colspan=6>Liste des articles</th>
				</thead>
		');

		foreach ($articles as $article) {

			if (strlen($article['contenu']) > 20) {
				$contenuTronque = substr($article['contenu'],0,strpos($article['contenu']," ",20));
			} else {
				$contenuTronque = $article['contenu'];
			}

			echo('
				<tr>
					<td>
						<a href="article.php?idArticle='.$article['id'].'"> '.$article['titre'].'</a>
					</td>
					<td>'.$contenuTronque.'[...]</td>
					<td>'.$article['nom'].'</td>
					<td>'.$article['libelle'].'</td>
					<td>
						<a href="contenu_editer_article.php?idArticle='.$article['id'].'" class="edit"><i class="fas fa-pencil-alt"></i></a>
					</td>
					<td>
						<a href="php/supprimer_article.php?idArticle='.$article['id'].'" class="delete"><i class="fas fa-trash-alt"></i></a>
					</td>
				</tr>
			');
		};

		echo('</table>

			</div>

			');

		//afficher la liste des auteurs :
		$query = $pdo->prepare
		(
		    'SELECT nom
			FROM auteur
		     '
		);

		$query->execute();

		$auteurs = $query->fetchAll(PDO::FETCH_ASSOC);

		echo('<div class="flex">');

		echo('
			<table class="admin_table">
				<thead>
					<th colspan=6>Liste des auteurs</th>
				</thead>
		');

		foreach ($auteurs as $auteur) {

			echo('
				<tr>
					<td>
						'.$auteur['nom'].'
					</td>
				</tr>
			');
		};

		echo('</table>
			

			');

		echo('
			<form class="connexion" method="POST" action="php/nouvel_auteur.php">
				<fieldset>
					<legend>Ajouter un auteur</legend>
					<label for="nom">Nom</label>
					<input name="nom" required>
					<label for="password">Password</label>
					<input type="password" name="password" required>
					<label for="password2">Confirmation Password</label>
					<input type="password" name="password2" required>
					<label for="ajouter"></label>
					<button type="submit">Ajouter</button>
				</fieldset>	
			</form>	

			</div>

			<a href="php/deconnexion.php">Deconnexion <i class="fas fa-sign-out-alt"></i></a>
			</section>

		');



	}

?>