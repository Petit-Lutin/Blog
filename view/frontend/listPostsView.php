<?php $title = "Billet simple pour l'Alaska" ?>

<?php ob_start(); ?>

<div class="contenuPage">

    <div class="jumbotron">
        <h3 class="display-6 text-center">Plongez dans la lecture du nouveau roman de Jean Forteroche&nbsp;!</h3>
    </div>


    <?php
    while ($data = $posts->fetch()) {
        ?>

        <div class="news">

            <div class="card border-secondary mb-3">
                <div class="card-header">
                    <h4 class="card-title">
                        <a class="card-link"
                           href="<?= $data['id'] ?>/<?= $data['slug'] ?>"><?= htmlspecialchars($data['title']) ?></a>
                        <small class="card-subtitle mb-2 text-muted">- le <?= $data['creation_date_fr'] ?></small>
                    </h4>
                </div>

                <div class="card-body">
                    <?php
                    if (isset($_SESSION['email'])) {
                        ?>
                        <p class="text-right">
                            <button class="btn btn-outline-info nav-item"><a
                                        href="modifier-article/<?= $data['id'] ?>">Modifier</a>
                            </button>
                            <button class="btn btn-outline-warning nav-item"><a
                                        href="supprimer-article/<?= $data['id'] ?>">Supprimer</a></button>
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
                               href="../<?= $data['id'] ?>/<?= $data['slug'] ?>#commentaires">Commentaires</a>
                        </em>
                    </div>
                </div>

            </div>
        </div>

    <?php } ?>

    <?php
    if ($posts->rowCount() === 0) { ?>
        <div class="container jumbotron text-center">
            <p class="lead">Bravo, vous avez tout lu ! <br>
                <a href="liste-articles/page-<?= $page - 1 ?>"> <i class="fas fa-angle-left flecheGauche"></i> Revenir à
                    la
                    page précédente</a>
            </p>
            <img class="readingFinished" src="public/img/snow-3953603_1920.jpg"></div>    <?php } ?>


    <ul class="pagination navbar">

        <?php
        if ($page >= 1) {
            ?>
            <li>

                <button class="btn btn-primary"><a class="nav-link nav-item active"
                                                   href="liste-articles/page-<?= $page - 1 ?>">
                        <div class="text-secondary">
                            <i class="fas fa-angle-left flecheGauche"></i>
                            page précédente
                        </div>
                    </a></button>
            </li>

            <?php
        } ?>


        <?php
        if ($posts->rowCount() === 5) {
            ?>
            <li>
                <button class="btn btn-primary"><a href="liste-articles/page-<?= $page + 1 ?>">
                        <div class="text-secondary">
                            page
                            suivante <i class="fas fa-angle-right flecheDroite"></i></div>
                    </a></button>
            </li>
        <?php }
        ?>

    </ul>

</div>


<?php $content = ob_get_clean();
require('template.php'); ?>
