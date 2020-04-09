<?php
//Champs BDD 	idBlague 	idCatBlague 	contentBlague 	pseudoBlague 	createBlague
//POST categorie content pseudo
$adresse = "http://".$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bddblagues;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$req = $bdd->prepare("INSERT INTO blagues (idCatBlague, contentBlague, pseudoBlague) VALUES (:idCatBlague, :contentBlague, :pseudoBlague)");
if($_POST){
    $req->execute(array(
        'idCatBlague' => $_POST['categorie'],
        'contentBlague' => $_POST['content'],
        'pseudoBlague' => $_POST['pseudo']
    ));
    header('location:  ' .$adresse);
}
?>
