<?php $title = "À propos" ?>
<?php ob_start(); ?>


<div class="container jumbotron jumbotronImportant">
    <h2 class="text-center display-4">À propos</h2>
    <hr>
    <p class="text-center lead">
        Qui suis-je ? Mon nom est Jean Forteroche, acteur et écrivain.
    </p>
    <p class="text-center lead"><img class="imgAbout" src="/public/img/typewriter-2306479_1280.jpg">
    </p>
    <p class="text-justify lead">
        Après le succès de mes premiers romans, je me lance le pari un peu fou de publier mon prochain roman, <span
                class="text-info">Billet simple pour l'Alaska</span>, en avant-première ici-même sur mon blog, épisode par épisode. <br>

    </p>
    <p class="text-center">
        <a class="btn btn-primary btn-lg" href="liste-articles/page-0" role="button">Lire mon nouveau roman en ligne</a>
    </p>

</div>
</div>

<?php $content = ob_get_clean();
require('template.php'); ?>

