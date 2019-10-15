<?php $title = "Billet simple pour l'Alaska" ?>

<?php ob_start(); ?>

<div class="contenuPage">

    <div class="jumbotron">
        <h3 class="display-6 text-center">Plongez dans la lecture du nouveau roman de Jean Forteroche&nbsp;!</h3>
    </div>

    <?php
    if ($posts->rowCount() === 0) {
        echo 'vous êtes arrivé sur la dernière page';
    } ?>
    <?php
    while ($data = $posts->fetch()) //
    {
    ?>

    <div class="news">

        <div class="card border-secondary mb-3">
            <div class="card-header">
                <h4 class="card-title">
                    <a class="card-link"
                       href="index.php?action=article&amp;id=<?= $data['id'] ?>&amp;slug=<?= $data['slug'] ?>"><?= htmlspecialchars($data['title']) ?></a>
                    <small class="card-subtitle mb-2 text-muted">- le <?= $data['creation_date_fr'] ?></small>
                </h4>
            </div>

            <div class="card-body">
                <?php
                if (isset($_SESSION['email'])) {
                    ?>
                    <p class="text-right">
                        <button class="btn btn-outline-info nav-item"><a
                                                                 href="index.php?action=modifier-article&amp;id=<?= $data['id'] ?>">Modifier</a>
                        </button>
                    </p>
                <?php }
                ?>

                <div class="card-text">
                    <?= $data['content'] ?><!-- pas d htmlspecialchars pour la mise en forme -->
                </div>

            </div>

            <div class="card-footer">
                <div class="text-right">
                    <em>
                        <a class="card-link"
                           href="index.php?action=article&amp;id=<?= $data['id'] ?>">Commentaires</a>
                    </em>
                </div>
            </div>

        </div>
    </div>

<!--    <div class="row">-->
<!--        <div class="col-sm-6">-->
            <?php
            }
            if ($page >= 1) {
                ?>
                <div class="text-left">
                    <a href="liste-articles/page-<?= $page - 1 ?>">page précédente</a></div>

                <?php
            } ?>
<!--        </div>-->
<!---->
<!--        <div class="col-sm-6">-->

            <?php

            if ($posts->rowCount() === 5) {
                ?>
                <div class="text-right"><a href="liste-articles/page-<?= $page + 1 ?>">page
                        suivante</a></div>

            <?php }
            ?>
<!--        </div>-->
<!---->
<!--    </div>-->
</div>


<?php $content = ob_get_clean();
require('template.php'); ?>
