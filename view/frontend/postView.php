<?php ob_start();
?>
<div class="contenuPage" xmlns="http://www.w3.org/1999/html">
    <div class="news">
        <div class="card border-secondary mb-3">
            <div class="card-header">
                <h4 class="card-title">
                    <a href="../<?= $post['id'] ?>/<?= $post['slug'] ?>"> <?= htmlspecialchars($post['title']) ?></a>
                    <small class="card-subtitle mb-2 text-muted">- le <?= $post['creation_date_fr'] ?></small>
                </h4>
            </div>

            <div class="card-body">

                <div class="card-text">
                    <?php
                    if (isset($_SESSION['email'])) {
                        ?>
                        <p class="text-right">
                            <a href="../modifier-article/<?= $post['id'] ?>" class="card-link toConfirm"
                               data-message="êtes-vous sûr....?">
                                <div class="btn btn-info disabled">Modifier</div>
                            </a>

                            <a href="../supprimer-article/<?= $post['id'] ?>" class="toConfirm"
                               data-message="Êtes-vous sûr de vouloir supprimer cet article ? Les commentaires qu'il contient seront également supprimés.">
                                <div class="btn btn-warning disabled nav-item">Supprimer</div>
                            </a>
                        </p>
                    <?php }
                    ?>

                    <p>
                        <?= nl2br($post['content']) ?>
                    </p>


                </div>
            </div>

            <div class="modal-header"><h4>Commentaires</h4></div>
            <div class="modal-body">
                <ul class="list-group list-group-flush">

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

                            <?php
                            // autrement on affiche un bouton "signaler"
                        } else {
                            ?>
                            <p>
                                <a href="index.php?action=report-comment&amp;commentid=<?= $comment['id'] ?>"
                                   title="Si ce commentaire vous semble injurieux ou offensant, vous pouvez demander à ce qu'il soit modéré par Jean Forteroche.">
                                    <div class="btn btn-warning btn-reportComment ">Signaler</div>
                                </a>

                                <?php
                                if (isset($_SESSION['email'])) { ?>
                                    <a class="toConfirm"
                                       data-message="Êtes-vous sûr de vouloir supprimer ce commentaire ?"
                                       href="../index.php?action=delete-comment&amp;commentid=<?= $comment['id'] ?>">
                                        <div class="btn btn-danger">Supprimer</div>
                                    </a>

                                <?php } ?>
                            </p>

                            </li>
                            <?php
                        }

                    } ?>

                    <li class="list-group-item">
                        <h5>Ajouter un commentaire :</h5>
                        <!-- Pour poster un commentaire -->
                        <form action="../index.php?action=add-comment&amp;id=<?= $post['id'] ?>" method="post">
                            <div>
                                <p><label for="author">Votre nom ou pseudo :</label><br/>
                                    <input type="text" id="author" name="author" required/></p>
                            </div>
                            <div>
                               <p> <label for="comment">Votre commentaire :</label><br/>
                                <textarea id="comment" name="comment" required></textarea></p>
                            </div>
                            <div>
                                <button class="btn btn-primary" type="submit">Enregistrer</button>
                            </div>
                        </form>
                    </li>
                </ul>

            </div>

            <div class="card-footer">
                    <a class="card-link" href="../liste-articles/page-0">
                        <div class="btn btn-outline-primary"><i class="fas fa-angle-left"></i> Retour à la liste des
                            articles
                        </div>
                    </a>
            </div>

        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
