<?php
$adresse = "http://".$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
function bdd()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=bddblagues;charset=utf8', 'root', '');
        return $bdd;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
function addCategorie($bdd, $categorie){
    $req = $bdd->prepare("INSERT INTO blagues__categories (nameCat) VALUES (:nameCat)");
    $req->execute(array(
        'nameCat' => $categorie,
    ));
}
function ViewCategorie($bdd, $nameCat= null, $idCat=null){
    if($nameCat) {
        $req = $bdd->prepare("SELECT * FROM blagues__categories WHERE nameCat=? ");
        $req->execute(array( $nameCat ));
    }elseif($idCat){
        $req = $bdd->prepare("SELECT * FROM blagues__categories WHERE idCat=? ");
        $req->execute(array( $idCat ));
    }
    $datas = $req->fetchAll(PDO::FETCH_OBJ);
    return $datas;
}
function ViewBlague($bdd, $idCat){
    $req = $bdd->prepare("SELECT * FROM blagues WHERE idBlague=? ");
    $req->execute(array( $idCat));
    $datas = $req->fetch(PDO::FETCH_OBJ);
    return $datas;
}
function AllCategories($bdd){
    $req = $bdd->prepare("SELECT * FROM blagues__categories");
    $req->execute(array());
    $datas = $req->fetchAll(PDO::FETCH_OBJ);
    return $datas;
}
function AllBlagues($bdd, $categorie = null){
    if($categorie){
        $req = $bdd->prepare("SELECT * FROM blagues WHERE idCatBlague=? LIMIT 25");
        $req->execute(array($categorie));
        $datas = $req->fetchAll(PDO::FETCH_OBJ);
        return $datas;
    }else {
        $req = $bdd->prepare("SELECT * FROM blagues ORDER BY rand() LIMIT 25");
        $req->execute(array());
        $datas = $req->fetchAll(PDO::FETCH_OBJ);
        return $datas;
    }
}
function addBlague($bdd, $categorie, $content, $pseudo){
    $req = $bdd->prepare("INSERT INTO blagues (idCatBlague, contentBlague, pseudoBlague) VALUES (:idCatBlague, :contentBlague, :pseudoBlague)");
    $req->execute(array(
        'idCatBlague' => $categorie,
        'contentBlague' => $content,
        'pseudoBlague' => $pseudo
    ));
    header('location:  ' .$adresse);
}
?>
