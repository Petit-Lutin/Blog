<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <title><?= $title ?></title>

    <link rel="shortcut icon" href="public/img/favicon.ico" />
    <link rel="icon" type="image/x-icon" href="public/img/favicon.ico" />
    <link rel="icon" type="image/png" href="public/img/favicon.png" />


    <meta property="<?= $title ?> - le blog de Jean Forteroche" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://p4-blog.laurenceplatzer.com/" />
    <meta property="og:image" content="https://p4-blog.laurenceplatzer.com/public/img/wintry-3758523_1280.jpg" />
    <meta property="og:image:width" content="1280" />
    <meta property="og:image:height" content="854" />

    <meta property="og:description"
          content="Billet simple pour l'Alaska est publié épisode par épisode. Plongez dans la lecture du nouveau roman de Jean Forteroche !" />
    <!--    Bootstrap -->
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">

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

    <!--    CSS personnalisé -->
    <link href="/public/css/style.css" rel="stylesheet"/>
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
                        <a class="dropdown-item " href="../creer-article">Créer un article</a>

                        <a class="dropdown-item text-primary"
                           href="../gerer-commentaires/page-<?= isset($page) ? $page : 0 ?>">Gérer les
                            commentaires</a>
                        <a class="dropdown-item text-danger" href="../logout">Se déconnecter</a>
                    </div>
                </div>

            </div>
            <?php
        }
        ?>

        <div class="container">
            <a class="navbar-brand" href="../../index.php">
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
                        <a class="nav-link" href="../about">À&nbsp;propos</a>
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary navFooter">
        <ul class="navbar-nav">
            <li class="nav-link nav-item active">&copy; Jean Forteroche</li>
            <li class="nav-item"><a class="nav-link" href="../mentionslegales">Mentions légales</a></li>
        </ul>
    </nav>
</footer>

<script src="../../public/js/Confirmation.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>