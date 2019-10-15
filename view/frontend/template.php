<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title><?= $title ?></title>

    <?= CONFIG['baseHref'] ?>
    <!--    Bootstrap -->
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <script src='https://cdn.tiny.cloud/1/jgj1tljq7t2ygjgfhk8qgs8h5x54v22ah86n0wocq3d06nbg/tinymce/5/tinymce.min.js'
            referrerpolicy="origin"></script>

    <!--    TinyMCE-->
    <script>
        tinymce.init({
            selector: '#content'
        });
    </script>
    <link href="public/css/style.css" rel="stylesheet"/>
</head>

<body>
<header>

    <?php
    // si l'utilisateur est enregistré, on affiche une barre de navigation supplémentaire
    if (isset($_SESSION['email'])) {
//        require('view/backend/loggedTemplate.php');
    }
    ?>

    <!-- Navigation -->
    <nav class="mainNavbar navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container">
            <ul>
                <li class="nav-item"><a class="nav-link" href="index.php?action=creer-article">Créer un article</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?action=gerer-commentaires">Gérer les
                        commentaires</a></li>
                <li class="nav-item active"><a class="nav-link" href="index.php?action=logout">Se déconnecter</a></li>
            </ul>
        </div>
        <div class="container">
            <a class="navbar-brand" href="index.php?action=liste-articles&page=0"><h1>Billet simple pour
                    l'Alaska</h1></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php?action=liste-articles&page=0">Accueil
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">A propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>


<!-- Page Content -->
<div class="container">
    <?= $content ?>
</div>

<footer>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <ul class="navbar-nav">
            <li class="nav-link nav-item active">&copy; Jean Forteroche</li>
            <li class="nav-item"><a class="nav-link" href="#">Mentions légales</li>
        </ul>
    </nav>
</footer>

<!--<script src="reportComment.js"></script>-->
</body>
</html>