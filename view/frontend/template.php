<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <title><?= $title ?></title>
    <?= CONFIG['baseHref'] ?>

    <!--    Bootstrap -->
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!--    FontAwesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <!--    TinyMCE-->
    <script src='https://cdn.tiny.cloud/1/jgj1tljq7t2ygjgfhk8qgs8h5x54v22ah86n0wocq3d06nbg/tinymce/5/tinymce.min.js'
            referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#content'
        });
    </script>

    <!--    CSS custom -->
    <link href="public/css/style.css" rel="stylesheet"/>
</head>

<body>
<header>

    <!-- Navigation -->
    <nav class="mainNavbar navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <?php
        if (isset($_SESSION['email'])) { ?>

            <div class="container admin">

                <div class="dropdown">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        Administration
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item " href="creer-article">Créer un article</a>
                        <a class="dropdown-item text-primary" href="gerer-commentaires/page-<?= $page ?>">Gérer les
                            commentaires</a>
                        <a class="dropdown-item text-danger" href="logout">Se déconnecter</a>
                    </div>
                </div>

            </div>
            <?php
        }
        ?>

        <div class="container">
            <a class="navbar-brand" href="index.php">
                <h1>Billet simple pour
                    l'Alaska</h1>
            </a>
        </div>
        <div class="container">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Accueil
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">À&nbsp;propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>

            </div>

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
<script src="../../vendors/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
<script src="../../vendors/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/core.js"></script>
<script src="../../public/js/Confirmation.js"></script>


<!--<script src="vendors/bootstrap-3.3.7/js/bootstrap.min.js"-->

</body>
</html>