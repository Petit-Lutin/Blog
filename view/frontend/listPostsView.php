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
                           href="../<?= $data['id'] ?>/<?= $data['slug'] ?>"><?= htmlspecialchars($data['title']) ?></a>
                        <small class="card-subtitle mb-2 text-muted">- le <?= $data['creation_date_fr'] ?></small>
                    </h4>
                </div>

                <div class="card-body">
                    <?php
                    if (isset($_SESSION['email'])) {
                        ?>
                        <p>
                        <div class="text-right">
                            <a href="../modifier-article/<?= $data['id'] ?>" >
                                <div class="btn btn-info disabled nav-item">Modifier</div>
                            </a>

                            <a href="../supprimer-article/<?= $data['id'] ?>" class="toConfirm"
                               data-message="Êtes-vous sûr de vouloir supprimer cet article ? Les commentaires qu'il contient seront également supprimés.">
                                <div class="btn btn-warning disabled nav-item">Supprimer</div>
                            </a>
                        </div>
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
                    la page précédente</a>
            </p>
            <img class="readingFinished" src="public/img/snow-3953603_1920.jpg"></div>    <?php } ?>

    <nav>
        <ul class="pagination navbar">

            <?php
            if ($page >= 1) {
                ?>
                <li>
                        <a href="../liste-articles/page-<?= $page - 1 ?>">
                                <div class="btn btn-primary">
                                <i class="fas fa-angle-left"></i>
                                page précédente
                            </div>
                        </a>

                </li>

                <?php
            } ?>

            <?php
            if ($posts->rowCount() === 5) {
                ?>
                <li>
                    <a href="../liste-articles/page-<?= $page + 1 ?>">
                        <div class="btn btn-primary">
                            page suivante <i class="fas fa-angle-right"></i>
                        </div>
                    </a>
                </li>
            <?php }
            ?>

        </ul>
    </nav>
</div>


<?php $content = ob_get_clean();
require('template.php'); ?>
