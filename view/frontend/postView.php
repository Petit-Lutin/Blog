<?php ob_start(); ?>
<div class="contenuPage">
    <div class="news">
        <h3>
            <a href="index.php?action=article&amp;id=<?= $post['id'] ?>"> <?= htmlspecialchars($post['title']) ?></a>
            <em>le <?= $post['creation_date_fr'] ?></em>
        </h3>
        <p><a href="index.php?action=modifier-article&amp;id=<?= $post['id'] ?>">Modifier</a></p>
        <p>
            <?= nl2br($post['content']) ?>
        </p>
        slug de cette page = " <?= $post['slug'] ?>"
    </div>
    <?php
    //    echo $post['id'];


    //todo: cacher l'affichage du bouton précédent quand c'est le dernier article
    if ((null != $post['id'] + 1)) {
        $biggerId = $post['id'] + 1; ?>

        <p><a href="index.php?action=article&amp;id=<?= $biggerId ?>">Post précédent (+ récent)</a></p>
        <?php
    }

    if (null != $post['id'] - 1) {
        $smallerId = $post['id'] - 1;
        ?>
        <p><a href="index.php?action=article&amp;id=<?= $smallerId ?>">Post suivant (+ ancien)</a></p>
        <?php
    }
    ?>
    <p><a href="index.php?action=liste-articles&page=0">Retour à la liste des articles</a></p>


    <h2>Commentaires</h2>
    <!--On affiche les commentaires existants -->
    <?php
    while ($comment = $comments->fetch()) {

        ?>
        <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
        <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>

        <?php var_dump($comment['author']);
        die();
        if (isset($comment['reports.comment_id']) && isset($comment['reports.user_ip'])) {

            ?>
            <div class="reportedComment">Vous avez signalé ce commentaire.</div>


        <?php } else {
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


    <div class="deletedComment">Ce commentaire a été supprimé car il contenait des propos injurieux ou offensants.
    </div>

    <!-- Pour poster un commentaire -->
    <form action="index.php?action=add-comment&amp;id=<?= $post['id'] ?>" method="post">
        <div>
            <label for="author">Auteur</label><br/>
            <input type="text" id="author" name="author" required/>
        </div>
        <div>
            <label for="comment">Commentaire</label><br/>
            <textarea id="comment" name="comment" required></textarea>
        </div>
        <div>
            <input type="submit"/>
        </div>
    </form>

    <?php $content = ob_get_clean(); ?>
</div>
<?php require('template.php'); ?>
