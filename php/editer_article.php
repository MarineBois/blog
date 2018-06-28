<?php 
var_dump($_POST);

include 'utilities.php';

$newTitre = $_POST['titre'];
$newContenu = $_POST['contenu'];
$idArticle  = $_POST['id'];

$modify = $pdo->prepare
(
    'UPDATE 
    	article
     SET titre=?, contenu=?
     WHERE article.id = ?
     '
);

$modify->bindParam(1, $newTitre, PDO::PARAM_STR);
$modify->bindParam(2, $newContenu, PDO::PARAM_STR);
$modify->bindParam(3, $idArticle, PDO::PARAM_INT);


$modify->execute();

 header('Location: ../admin.php');
 exit();
 
?>