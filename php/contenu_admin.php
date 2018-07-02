<?php

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
			<h2><a href="ajouter_article.php"><i class="far fa-file-alt"></i> <= Rédiger un nouvel article </a></h2>
			<br>');



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
				<caption>Liste des auteurs</caption>
				<thead>
					<th> Auteur </th>
					<th> Modifier Password </th>
				</thead>
		');

		foreach ($auteurs as $auteur) {

			echo('
				<tr>
					<td>
						'.$auteur['nom'].'
					</td>');
			if ($_SESSION['connexion_pseudo'] === $auteur['nom']) {
				echo('
						<td class="action">
							<i class="fas fa-pencil-alt" id="modifier_mdp"></i>
						</td>
	
				');
			}else {
				echo('
						<td>
						</td>
	
				');
			}	

			echo('</tr>');
			

		};

		echo('
				<tr>
					<td colspan=2 id="ajoutauteur" class="action"><i class="fas fa-plus-circle" ></i> Ajouter un auteur</td>

				');

		echo('</table>
			');

		// afficher le formulaire pour ajouter un auteur

		echo('
			<form class="connexion show" method="POST" action="php/nouvel_auteur.php" id="nouvelAuteur">
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

			

		');

		// formulaire de modification de mot de passe : A afficher quand on clique sur le lien :

		echo('
					<form class="connexion show" method="POST" action="php/modifier_mdp.php" id="formmdp">
						<label for="ancienPassword">Ancien Password</label>
						<input type="password" name="ancienPassword" required>
						<label for="nouveauPassword">Nouveau Password</label>
						<input type="password" name="nouveauPassword" required>
						<label for="nouveauPassword2">Confirmation Nouveau Password</label>
						<input type="password" name="nouveauPassword2" required>
						<label for="connexion"></label>
						<button type="submit" >Modifier</button>
					</form>	

				');







		echo('
			<div class="flex">

			');

		//afficher la liste des articles :
		$query = $pdo->prepare
		(
		    'SELECT titre, article.contenu, nom, libelle, article.id, article.date, COUNT(commentaire.id) AS nbCom, modifierPar
			FROM article
			INNER JOIN auteur ON auteur.id = article.idAuteur
			INNER JOIN categorie ON categorie.id = article.idCategorie
			LEFT JOIN commentaire ON commentaire.idArticle = article.id
			GROUP BY article.id
			ORDER BY date DESC
 		     '
		);

		$query->execute();

		$articles = $query->fetchAll(PDO::FETCH_ASSOC);

		echo('
			
			<table class="admin_table">
				<caption>Liste des articles</caption>
				<thead>
					<tr>
						<th>titre</th>
						<th>Contenu</th>
						<th>Auteur</th>
						<th>Catégorie</th>
						<th>Date</th>
						<th>Nombre de Com\'</th>
						<th>Modifié par</th>
						<th>Editer</th>
						<th>Supprimer</th>
					</tr>
				</thead>
				<tbody>
				

		');

		foreach ($articles as $article) {

			if (strlen($article['contenu']) > 10) {
				$contenuTronque = substr($article['contenu'],0,strpos($article['contenu']," ",10));
			} else {
				$contenuTronque = $article['contenu'];
			}
			$date = substr($article['date'],0,10);
			echo('
				<tr>
					<td>
						<a href="article.php?idArticle='.$article['id'].'"> '.$article['titre'].'</a>
					</td>
					<td>'.$contenuTronque.'[...]</td>
					<td>'.$article['nom'].'</td>
					<td>'.$article['libelle'].'</td>
					<td>'.$date.'</td>
					<td>'.$article['nbCom'].'</td>
					<td>'.$article['modifierPar'].'</td>
					<td>
						<a href="contenu_editer_article.php?idArticle='.$article['id'].'" class="edit"><i class="fas fa-pencil-alt"></i></a>
					</td>
					<td>
						<a href="php/supprimer_article.php?idArticle='.$article['id'].'" class="delete"><i class="fas fa-trash-alt"></i></a>
					</td>
				</tr>
			');
		};

		echo('
			</tbody>
			</table>

			</div>

			
			</section>

			');




	}

?>