<?php $title = "Billet simple pour l'Alaska" ?>

<?php ob_start(); ?>
<div class="contenuPage">
    <div class="manageComments">
        <h2>Gérer les commentaires</h2>

        <?php

        while ($comment = $comments->fetch()) {
            $post = $posts->fetch();
            ?><p>Sur <a
                    href="../<?= $comment['post_id'] ?>/<?= $post['slug'] ?>"><?= htmlspecialchars($comment['post_title']) ?></a>
            :
            </p>


            <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>

            <a class="toConfirm" data-message="Voulez-vous vraiment supprimer ce commentaire ?"
               href="../index.php?action=delete-comment&amp;commentid=<?= $comment['id'] ?>">
                <div class="btn btn-danger confirmation">Supprimer</div>
            </a>
            <hr>
            <?php


        }
        if ($page >= 1) {
            ?>
            <a href="/gerer-commentaires/page-<?= $page - 1 ?>">page précédente</a>
            <?php
        }
        if ($comments->rowCount() === 10) {
            ?> <a href="gerer-commentaires/page-<?= $page + 1 ?>">page suivante</a>
        <?php }

        ?>
    </div>
</div>
<script src="../public/js/Confirmation.js"</script>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
