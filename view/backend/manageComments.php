<?php $title = "Billet simple pour l'Alaska" ?>

<?php ob_start(); ?>
<div class="contenuPage">
    <h2>Gérer les commentaires</h2>

    <?php
//    $data = $posts->fetch();

    while ($comment = $comments->fetch()) {
        ?><p>Sur <a
                href="index.php?action=article&amp;id=<?= $comment['post_id'] ?>"><?= htmlspecialchars($comment['post_title']) ?></a> :
        </p>


        <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
        <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>

        <?php
        // si le commentaire en question a déjà été signalé par un utilisateur (reconnu par son adresse IP), on n'affiche pas de bouton "signaler"
        if ($comment['reported'] == 1) {
            ?>
            <div class="btn-warning reportedComment">Vous avez signalé ce commentaire.</div>
            <?php
            // autrement on affiche un bouton "signaler"
        } else {
            ?>
            <p>
                <button class="btn-warning btn-reportComment"><a
                            href="index.php?action=report-comment&amp;commentid=<?= $comment['id'] ?>"
                            title="Si ce commentaire vous semble injurieux ou offensant, vous pouvez demander à ce qu'il soit modéré par Jean Forteroche.">Signaler</a>
                </button>
            </p>
            <hr>

            <?php
        }

    }
    if ($page >= 1) {
        ?>
        <a href="index.php?action=gerer-commentaires&amp;page=<?= $page - 1 ?>">page précédente</a>
        <?php
    }
    if ($comments->rowCount() === 10) {
        ?> <a href="index.php?action=gerer-commentaires&amp;page=<?= $page + 1 ?>">page suivante</a>
    <?php }

    ?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
