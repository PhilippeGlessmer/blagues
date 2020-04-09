<?php
include 'App/blagues.php';
$bdd =  bdd();
$AllCategorie = AllCategories($bdd);
if(isset($_POST['addcategorie'])){
    $donnees = ViewCategorie($bdd, $_POST['addcategorie']);
    if($donnees){
        $message = '<div class="alert alert-warning mt-3" role="alert">La catégorie <em><strong>'.$_POST['addcategorie'].'</strong></em> existe déja dans nore base de données!</div>';
    }else{
        addCategorie($bdd, $_POST['addcategorie']);
        $message = '<div class="alert alert-success mt-3" role="alert">La catégorie <em><strong>'.$_POST['addcategorie'].'</strong></em> à bien éte enregistrer dans nore base de données!</div>';
    }
}
if(isset($_POST['content'])){
    addBlague($bdd, $_POST['categorie'], $_POST['content'], $_POST['pseudo']);
    $message = '<div class="alert alert-success mt-3" role="alert">La Blagues à bien été enregistré dans la catégorie <em><strong>'.$_POST['addcategorie'].'</strong></em> !</div>';
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./Assets/css/bootstrap.css">
    <link rel="stylesheet" href="./Assets/css/style.css">
    <title>Document</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Accueil</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <?php
                foreach ($AllCategorie as $Categorie) {
                    ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php?categorie=<?php echo $Categorie->idCat;?>"><?php echo $Categorie->nameCat;?></a>
                    </li>
                    <?php
                }
                ?>
                <li class="nav-item active">
                    <a class="nav-link" href="add-blague.php">Ajouter blague</a>
                </li>
            </ul>
            <!--
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            -->
        </div>
    </nav>
</header>
<main class="container mb-5">
    <?php
    if(isset($message)){ echo $message;}
    ?>
    <section>
        <div class="card my-2">
            <h5 class="card-header">Formulaire d'ajout de catégorie </h5>
            <div class="card-body">
                <form method="post" >
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Catégorie</span>
                        </div>
                        <input type="text" class="form-control" name="addcategorie" placeholder="Inscrivez votre Catégorie" required>
                    </div>
                    <input type="submit" class="btn btn-success" value="Enregistrer">
                </form>
            </div>
        </div>
        <div class="card my-2">
            <h5 class="card-header">Formulaire d'ajout de blague </h5>
            <div class="card-body">
                <form method="post" >
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Catégorie</span>
                        </div>
                        <select class="form-control" name="categorie" required>
                            <option>-- Choisissez --</option>
                            <?php
                            foreach ($AllCategorie as $Categorie){ ?>
                                <option value="<?php echo $Categorie->idCat;?>"><?php echo $Categorie->nameCat;?></option>;
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Blagues</span>
                        </div>
                        <textarea class="form-control" name="content" placeholder="Inscrivez votre blague" required></textarea>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Pseudo</span>
                        </div>
                        <input type="text" class="form-control" name="pseudo" placeholder="Pseudo" required>
                    </div>
                    <input type="submit" class="btn btn-success" value="Enregistrer">
                </form>
            </div>
        </div>
    </section>
</main>
<footer>

</footer>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>