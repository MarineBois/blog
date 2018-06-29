<?php 
include 'utilities.php';


$newTitre = htmlspecialchars($_POST['titre']);
$newContenu = htmlspecialchars($_POST['contenu']);
$idArticle  = htmlspecialchars($_POST['id']);
$modifierPar = htmlspecialchars($_SESSION['connexion_pseudo']);

var_dump($modifierPar);

$modify = $pdo->prepare
(
    'UPDATE 
    	article
     SET titre=?, contenu=?, modifierPar=?
     WHERE article.id = ?
     '
);

$modify->bindParam(1, $newTitre, PDO::PARAM_STR);
$modify->bindParam(2, $newContenu, PDO::PARAM_STR);
$modify->bindParam(3, $modifierPar, PDO::PARAM_STR);
$modify->bindParam(4, $idArticle, PDO::PARAM_INT);


$modify->execute();

header('Location: ../admin.php');
exit();
 
?>