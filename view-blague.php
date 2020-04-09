<?php
include 'App/blagues.php';
$bdd =  bdd();
$id = $_GET['id'];
$Blague = ViewBlague($bdd, $id);
$AllCategorie = AllCategories($bdd);
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
    <div class="row">
        <section class="col-md-8">
            <div class="card my-2">
                <h5 class="card-header">Blague n° <?php echo $Blague->idBlague;?></h5>
                <div class="card-body">
                    <p class="card-text"><?php echo $Blague->contentBlague;?></p>
                </div>
                <div class="card-footer">
                    <?php echo $Blague->pseudoBlague;?> | <?php echo $Blague->createBlague;?> | <?php echo $Blague->idCatBlague;?> | <a href="edit-blague.php?id=<?php echo $Blague->idBlague;?>" class="btn btn-warning float-right">Edit</a>
                </div>
            </div>
        </section>
    </div>
</main>
<footer>

</footer>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>