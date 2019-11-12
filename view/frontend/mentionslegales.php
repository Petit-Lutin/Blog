<?php $title = "Mentions légales" ?>
<?php ob_start(); ?>


<div class="container jumbotron jumbotronImportant">
    <h3 class="text-center ">Mentions légales</h3>
    <hr>
    <p class="text-justify">
    <h4>Contenu et développement du site internet</h4>

    Laurence Platzer. Ce site internet est une démonstration de la création d'un blog mettant en avant une personnalité
    fictive écrivant un roman fictif.
    <hr>


    <h4>Hébergeur</h4>

    O2Switch, SARL au capital de 100 000 euros<br>
    SIRET 510 909 80700024<br>
    RCS Clermont-Ferrand<br>
    Marque déposée INPI<br>
    222-224 Boulevard Gustave Flaubert<br>
    63000 Clermont-Ferrand<br>
    04 44 44 60 40<br>
    </p>
    <hr>

    <h4>Crédits photos</h4>

    <a href="https://pixabay.com/photos/cruise-ship-rail-sightseeing-scenic-1253275/" class="btn btn-link">Cruise
        ship</a> /
    <a href="https://pixabay.com/photos/sea-otter-swimming-floating-water-1772039/" class="btn btn-link">Sea
        otter</a> /
    <a href="https://pixabay.com/photos/snow-winter-drink-in-the-morning-3953603/"
       class="btn btn-link">Snow</a> /
    <a href="https://pixabay.com/photos/typewriter-alphabet-vintage-2306479/"
       class="btn btn-link">Typewriter</a>


    <p class="text-center">
        <a class="btn btn-primary btn-lg" href="liste-articles/page-0" role="button">Retour au site</a>
    </p>

</div>
</div>

<?php $content = ob_get_clean();
require('template.php'); ?>

