<?php include 'php/header.php'; 

?>
		<!--MAIN CONTENT-->
		<main>
			<h2><i class="fas fa-pencil-alt"></i> Rédiger un nouvel article </h2>


			<section>		

			<?php 
				//requete pour afficher les auteurs

				$query_auteur = $pdo->prepare
				(
				    'SELECT
				    	*
				     FROM auteur
				     '
				);
				$query_auteur->execute();

				$auteurs = $query_auteur->fetchAll(PDO::FETCH_ASSOC);

				//requete pour afficher les catégories
				$query_categorie = $pdo->prepare
				(
				    'SELECT
				    	*
				     FROM categorie
				     '
				);
				$query_categorie->execute();

				$categories = $query_categorie->fetchAll(PDO::FETCH_ASSOC);

			?>		

				<form method="POST" action="php/nouvel_article.php">
					<fieldset>
						<legend><i class="far fa-sticky-note"></i> Nouvel Article</legend>
						<ul>
							<li>
								<label for="titre">Titre:</label>
								<input name="titre" id="titre">
							</li>
							<li>
								<label for="contenu">Article : </label>
								<textarea type="text" name="contenu" id="contenu"></textarea>
							</li>
							<li>
								<label for="image">nom de l'image dans le dossier img:</label>
								<input name="image" id="image">
							</li>
							<li>
								<label for="description">Description de l'image:</label>
								<input name="description" id="description">
							</li>
							<li>
								<label for="auteur">Auteur : </label>
								<select name="auteur" id="auteur">
									<?php
											echo('<option value="'.$_SESSION['connexion_pseudo'].'">'.$_SESSION['connexion_pseudo'].'</option>');
									?>	
								</select>		
							</li>
							<li>
								<label for="categorie">Catégorie : </label>
								<select name="categorie" id="categorie">
									<?php
										foreach($categories as $index)
											echo('<option value="'.$index['id'].'">'.$index['libelle'].'</option>');
									?>
								</select>			
							</li>
							<li class='liButton'>
								<label for="envoi"></label>
								<button type="submit">Enregistrer</button>
							</li>
							<li class='liButton'>
								<label for="annuler"></label>
								<a href="admin.php">Annuler</a>
							</li>	
						</ul>		
					</fieldset>

			</section>

		</main>
<?php include 'php/footer.php'; ?>