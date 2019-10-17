<?php ob_start();
?>
<div class="contenuPage" xmlns="http://www.w3.org/1999/html">
    <div class="news">
        <div class="card border-secondary mb-3">
            <div class="card-header">
                <h4 class="card-title">
                    <a href="index.php?action=article&amp;id=<?= $post['id'] ?>"> <?= htmlspecialchars($post['title']) ?></a>
                    <small class="card-subtitle mb-2 text-muted">- le <?= $post['creation_date_fr'] ?></small>
                </h4>
            </div>

            <div class="card-body">

                <div class="card-text">
                    <?php
                    if (isset($_SESSION['email'])) {
                        ?>
                        <p class="text-right">
                            <button class="btn btn-info disabled"><a class="card-link"
                                                                     href="modifier-article/<?= $post['id'] ?>">Modifier</a>
                            </button>
                        </p>
                    <?php }
                    ?>

                    <p>
                        <?= nl2br($post['content']) ?>
                    </p>

                    <?php
                    //todo: cacher l'affichage du bouton précédent quand c'est le dernier article
                    if ((null != $post['id'] + 1) && !empty($post['id'] + 1)) {
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

                </div>
            </div>

            <div class="modal-header"><h4>Commentaires</h4></div>
            <div class="modal-body">
                <ul class="list-group list-group-flush">

                    <!--                <div class="card-text">-->

                    <!--On affiche les commentaires existants -->
                    <?php
                    while ($comment = $comments->fetch()) {
                        ?>
                        <li class="list-group-item ">
                        <p><strong><?= htmlspecialchars($comment['author']) ?></strong>
                            <small class="text-muted">- le <?= $comment['comment_date_fr'] ?></small>
                        </p>
                        <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
                        <?php
                        // si le commentaire en question a déjà été signalé par un utilisateur (reconnu par son adresse IP), on n'affiche pas de bouton "signaler"
                        if ($comment['reported'] == 1) {
                            ?>
                            <div class="reportedComment">Vous avez signalé ce commentaire.</div>
                            <!--                        <hr>-->

                            <?php
                            // autrement on affiche un bouton "signaler"
                        } else {
                            ?>
                            <p>
                                <button class="btn btn-warning disabled btn-reportComment "><a
                                            href="index.php?action=report-comment&amp;commentid=<?= $comment['id'] ?>"
                                            title="Si ce commentaire vous semble injurieux ou offensant, vous pouvez demander à ce qu'il soit modéré par Jean Forteroche.">Signaler</a>
                                </button>
                                <?php
                                if (isset($_SESSION['email'])) { ?>
                                    <button class="btn btn-danger" onclick="confirmDelete(event)"><a
                                                href="index.php?action=delete-comment&amp;commentid=<?= $comment['id'] ?>">Supprimer</a>
                                    </button>
                                <?php } ?>
                            </p>

                            </li>
                            <?php
                        }

                    } ?>
                    <!--                </ul>-->

                    <!--                </div>-->

                    <li class="list-group-item">
                        <h5>Ajouter un commentaire :</h5>
                        <!-- Pour poster un commentaire -->
                        <form action="index.php?action=add-comment&amp;id=<?= $post['id'] ?>" method="post">
                            <div>
                                <label for="author">Votre nom ou pseudo</label><br/>
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
                    </li>
                </ul>

            </div>

            <div class="card-footer">
                <p><a href="index.php?action=liste-articles&page=0">Retour à la liste des articles</a></p>

            </div>
        </div>
        <?php $content = ob_get_clean(); ?>

        <?php require('template.php'); ?>
