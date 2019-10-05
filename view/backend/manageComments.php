<?php $title = "Billet simple pour l'Alaska" ?>

<?php ob_start(); ?>
<div class="contenuPage">
    <p>Gérer les commentaires :</p>
    <!--    --><?php
    //    if ($comments->rowCount() === 0) {
    //        echo 'vous êtes arrivé sur la dernière page';
    //    } ?>


    <?php


    while ($comment = $comments->fetch()) {
        ?>
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
            <?php
        }
    } ?>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
