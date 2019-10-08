<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title><?= $title ?></title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css"
    <script src='https://cdn.tiny.cloud/1/jgj1tljq7t2ygjgfhk8qgs8h5x54v22ah86n0wocq3d06nbg/tinymce/5/tinymce.min.js'
            referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#content'
        });
    </script>
    <link href="public/css/style.css" rel="stylesheet"/>
</head>

<body>
<header>
    <!--    <nav class="navbar navbar-expand-lg fixed-top">-->
    <!--        <div class="container">-->


    <!--            <a class="navbar-brand logo" href="index.php?action=listPosts&page=0"><h1>"Billet simple pour l'Alaska" par Jean-->
    <!--                    Forteroche</h1></a>-->
    <!--            <ul class="nav navbar-ml-auto">-->
    <!--                <li class="navbar-item"><a href="index.php?action=createPost">Créer un article</a></li>-->
    <!--                <li class="navbar-item">bla</li>-->
    <!--                <li class="navbar-item">ble</li>-->
    <!--                <li class="navbar-item">bli</li>-->

    </ul>
    <!--        </div>-->
    <!--    </nav>-->
    <?php
    // si l'utilisateur est enregistré, on affiche une barre de navigation supplémentaire
    if (isset($_SESSION['email'])) {
        require('view/backend/loggedTemplate.php');
    }
    ?>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary navbar-fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
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
                        <!--                        <li class="nav-item">-->
                        <!--                            <a class="nav-link" href="#">Services</a>-->
                        <!--                        </li>-->
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
    <!--    <h1 class="mt-4">Logo Nav by Start Bootstrap</h1>-->
    <!--        <p >The logo in the navbar is now a default Bootstrap feature in Bootstrap 4! Make sure to set the width and height of the logo within the HTML or with CSS. For best results, use an SVG image as your logo.</p>-->
    <?= $content ?>

</div>

<footer>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <ul class="navbar-nav">
                <li class="nav-link nav-item active">&copy; Jean Forteroche</li>
                <li class="nav-item"><a class="nav-link" href="#">Mentions légales</li>
            </ul>
        </nav>
    </div>
</footer>

<!--<script src="reportComment.js"></script>-->
</body>
</html>