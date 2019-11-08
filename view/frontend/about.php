<?php $title = "À propos" ?>
<?php ob_start(); ?>


<div class="container jumbotron err404">
    <div class="row text-center">
        <div class="col-sm-6"><img class="img404" src="public/img/sea-otter-1772039_1280.jpg">
        </div>
        <div class="col-sm-6">
            <p>
            <h2>À propos</h2>
            </p>

            <p>
            <h3><a href="liste-articles/page-0"> <i class="fas fa-angle-left flecheGauche"></i> Revenir à
                    la liste des articles</a></h3>
            </p>

        </div>
    </div>
</div>

<?php $content = ob_get_clean();
require('template.php'); ?>

