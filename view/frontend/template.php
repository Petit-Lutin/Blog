<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title><?= $title ?></title>
    <?= CONFIG['baseHref'] ?>

    <!--    Bootstrap -->
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

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
                        Dropdown button
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Link 1</a>
                        <a class="dropdown-item" href="#">Link 2</a>
                        <a class="dropdown-item" href="#">Link 3</a>
                    </div>
                </div>


                <ul class="navbar-nav">


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="" role="button"
                           aria-haspopup="true"
                           aria-expanded="false">Dropdown</a>
                        <div class="dropdown-menu" x-placement="bottom-start"
                             style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 39px, 0px);">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                    </li>
                </ul>
                <ul>
                    <li class="nav-item"><a class="nav-link" href="index.php?action=creer-article">Créer un article</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="index.php?action=gerer-commentaires">Gérer les
                            commentaires</a></li>
                    <li class="nav-item active"><a class="nav-link" href="index.php?action=logout">Se déconnecter</a>
                    </li>
                </ul>
            </div>
            <?php
        }
        ?>

        <div class="container">
            <a class="navbar-brand" href="index.php">
                <h1>Billet simple pour
                    l'Alaska</h1>
            </a>
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
                        <a class="nav-link" href="#">A propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>

                <span class="navbar-toggler-icon"></span>

                <div class="navbar-collapse collapse" id="navbarResponsive" style="">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Themes <span
                                        class="caret"></span></a>
                            <div class="dropdown-menu" aria-labelledby="themes">
                                <a class="dropdown-item" href="../default/">Default</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../cerulean/">Cerulean</a>
                                <a class="dropdown-item" href="../cosmo/">Cosmo</a>
                                <a class="dropdown-item" href="../cyborg/">Cyborg</a>
                                <a class="dropdown-item" href="../darkly/">Darkly</a>
                                <a class="dropdown-item" href="../flatly/">Flatly</a>
                                <a class="dropdown-item" href="../journal/">Journal</a>
                                <a class="dropdown-item" href="../litera/">Litera</a>
                                <a class="dropdown-item" href="../lumen/">Lumen</a>
                                <a class="dropdown-item" href="../lux/">Lux</a>
                                <a class="dropdown-item" href="../materia/">Materia</a>
                                <a class="dropdown-item" href="../minty/">Minty</a>
                                <a class="dropdown-item" href="../pulse/">Pulse</a>
                                <a class="dropdown-item" href="../sandstone/">Sandstone</a>
                                <a class="dropdown-item" href="../simplex/">Simplex</a>
                                <a class="dropdown-item" href="../sketchy/">Sketchy</a>
                                <a class="dropdown-item" href="../slate/">Slate</a>
                                <a class="dropdown-item" href="../solar/">Solar</a>
                                <a class="dropdown-item" href="../spacelab/">Spacelab</a>
                                <a class="dropdown-item" href="../superhero/">Superhero</a>
                                <a class="dropdown-item" href="../united/">United</a>
                                <a class="dropdown-item" href="../yeti/">Yeti</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../help/">Help</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://blog.bootswatch.com">Blog</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="download"
                               aria-expanded="false">Flatly <span class="caret"></span></a>
                            <div class="dropdown-menu" aria-labelledby="download">
                                <a class="dropdown-item" target="_blank"
                                   href="https://jsfiddle.net/bootswatch/jmg3gykg/">Open in JSFiddle</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../4/flatly/bootstrap.min.css" download="">bootstrap.min.css</a>
                                <a class="dropdown-item" href="../4/flatly/bootstrap.css" download="">bootstrap.css</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../4/flatly/_variables.scss"
                                   download="">_variables.scss</a>
                                <a class="dropdown-item" href="../4/flatly/_bootswatch.scss" download="">_bootswatch.scss</a>
                            </div>
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

<!--<script src="vendors/bootstrap-3.3.7/js/bootstrap.min.js"-->

</body>
</html>