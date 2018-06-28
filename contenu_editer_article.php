<?php include 'php/header.php'; ?>

		<!--MAIN CONTENT-->
		<main>
			<h2><i class="fas fa-pencil-alt"></i>Editer un article</h2>


			<section>	

<?php 

include 'php/utilities.php';
$query = $pdo->prepare
(
    'SELECT
    	article.id,
        libelle,
        titre,
        contenu,
        nom,
        date,
        image,
        description
     FROM article
     INNER JOIN auteur ON auteur.id = article.idAuteur
     INNER JOIN categorie ON categorie.id = article.idCategorie
     WHERE article.id = ?
     '
);

$query->execute(array($_GET['idArticle']));

$affichage_article = $query->fetch(PDO::FETCH_ASSOC);
					

$idArticle = $affichage_article['id'];
$titre = $affichage_article['titre'];
$contenu = $affichage_article['contenu'];
$image = $affichage_article['image'];
$description = $affichage_article['description'];


echo('
	<form method="POST" action="php/editer_article.php">
		<fieldset>
			<legend>Article</legend>
			<ul>
				<li class="post">
					<label for="id"></label>
					<input type="text" name="id" id="'.$idArticle.'" value="'.$idArticle.'">
				</li>
				<li>
					<label for="'.$titre.'"> Titre :</label>
					<input type="text" name="titre" id="'.$titre.'" value="'.$titre.'">
				</li>
				<li>
					<label for="'.$image.'"> Nom de l\'image dans le dossier img :</label>
					<input type="text" name="image" id="'.$image.'" value="'.$image.'">
				</li>
				<li>
					<label for="'.$description.'"> Description de l\'image :</label>
					<input type="text" name="description" id="'.$description.'" value="'.$description.'">
				</li>	
				<li>
					<label for="'.$contenu.'">Article : </label>
					<textarea type="text" name="contenu" id="'.$contenu.'">'.$contenu.'</textarea>
				</li>
				<li class="liButton">
					<label for="MAJ"></label>
					<button type="submit">Mettre à jour</button>
				</li>
				<liclass="liButton">
					<label for="annuler"></label>
					<a href="admin.php">Annuler</a>
				</li>
			</ul>
		</fieldset>
	</form>				
');





?>

</section>

		</main>
		<!--FOOTER-->
<?php include 'php/footer.php'; ?>