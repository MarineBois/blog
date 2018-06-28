<?php 

	include 'utilities.php';

session_start();

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

// barre de recherche par catégories :

	echo('
		<form method="POST" action="php/recherche.php">
			<label for="recherche">Afficher une catégorie</label>
			<select name="categorie" id="categorie">
				<option value="0">Toutes</option>	
		');


		foreach($categories as $index){
			echo('<option value="'.$index['id'].'">'.$index['libelle'].'</option>');
		};
		echo('
				</select>
				<button type="submit"><i class=\'fas fa-search\'></i></button>
			</form>
		</div>	');
	


//affichage des articles :

// avec pagination automatique tous les 3 articles:
$articlesParPages = 3;

//requete pour compter le nombre d'articles au total :
	$query = $pdo->prepare
		(
		    'SELECT
		    	COUNT(*) AS total
		     FROM article
		     ORDER BY date
		     '
		);

		$query->execute();

		$pagination = $query->fetch(PDO::FETCH_ASSOC);


	$total = $pagination['total'];

//on va compte le nombre de page qui s'affichera :	

$nombreDePage = ceil($total/$articlesParPages);

// si l'index de la page existe :
if(isset($_GET['page'])) {
	// on affecte l'index à une variable	
	$pageActuelle = intval($_GET['page']);
		// et si cette index est > au nombre de page
		if($pageActuelle > $nombreDePage) {
			// on limite à la page maxi à afficher	
			$pageActuelle = $nombreDePage;
		}
} else {
	//sinon, on l'initialise à 1
	$pageActuelle = 1;
}

//on calcul la première entrée à afficher :
$premiereEntree = ($pageActuelle-1)*$articlesParPages;

//requete pour afficher les articles :

if (isset($_SESSION['recherche']) && ($_SESSION['recherche']!="0")){	

	$query = $pdo->prepare
	(
	    'SELECT
	    	article.id,
	    	categorie.id AS categ,
	    	categorie.img AS img,
	    	libelle,
	        titre,
	        contenu,
	        nom,
			image,
			description,
	        date
	     FROM article
	     INNER JOIN auteur ON auteur.id = article.idAuteur
	     INNER JOIN categorie ON categorie.id = article.idCategorie
	     WHERE categorie.id = ?
	     ORDER BY date
	     LIMIT '.$premiereEntree.','.$articlesParPages.'
	     '
	);

	$query->bindParam(1, $_SESSION['recherche'], PDO::PARAM_INT);

	$query->execute();

	$articles = $query->fetchAll(PDO::FETCH_ASSOC);

	if(empty($articles)) {
		echo('<p>Cette catégorie ne contient pas encore d\'articles</p>');
	}

}else {
	$query = $pdo->prepare
	(
	    'SELECT
	    	article.id,
	    	categorie.id AS categ,
	    	categorie.img AS img,
	    	libelle,
	        titre,
	        contenu,
	        nom,
			image,
			description,
	        date
	     FROM article
	     INNER JOIN auteur ON auteur.id = article.idAuteur
	     INNER JOIN categorie ON categorie.id = article.idCategorie
	     ORDER BY date DESC
	     LIMIT '.$premiereEntree.','.$articlesParPages.'
	     '
	);

	$query->execute();

	$articles = $query->fetchAll(PDO::FETCH_ASSOC);
}

//boucle pour afficher les articles :

	foreach ($articles as $article) {



		if (strlen($article['contenu']) > 200) {
			$contenuTronque = substr($article['contenu'],0,strpos($article['contenu']," ",200));
		} else {
			$contenuTronque = $article['contenu'];
		}

		$date = substr($article['date'],0,10);

		echo('
			<ul class="index">
				<li><h2><a href="article.php?idArticle='.$article['id'].'"> '.$article['img'].' </i>'.$article['titre'].'</a></h2></li>');
				if (!empty($article['image'])){
					echo('	
						<li><img class="images" src=img/'.$article['image'].' alt="'.$article['description'].'"/></li>
					');	
				}
		echo('		
				<li class="overflow">'.$contenuTronque.'[...]</li>
				<li><small>Rédigé par '.$article['nom'].' le '.$date.'</small></li>
				<li><small>Catégorie : '.$article['libelle'].'</small></li>
			</ul>
		<hr>
		');
	};

echo('<nav class="pagination">');	

// fait la boucle pour savoir sur quelle page on est
	for($i=1; $i<=$nombreDePage; $i++) 
{
     // si il s'agit de la page actuelle :
     if($i==$pageActuelle) 
     {
     	//on affiche le n° de la page entre [] sans lien
         echo ' [ '.$i.' ] '; 
     }	
     else //Sinon...
     {
     	//on affiche les index des autres pages :	
          echo ' <a href="index.php?page='.$i.'">[ '.$i.' ]</a> ';
     }
}

echo ('</nav>')


?>