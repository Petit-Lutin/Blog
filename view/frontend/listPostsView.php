<?php $title = "Billet simple pour l'Alaska" ?>

<?php ob_start(); ?>
<div class="contenuPage">
    <p>Derniers billets du blog :</p>
    <?php
    if ($posts->rowCount() === 0) {
        echo 'vous êtes arrivé sur la dernière page';
    } ?>
    <?php
    while ($data = $posts->fetch()) //
    {
        ?>
        <div class="news">
            <h3>
                <a href="index.php?action=article&amp;id=<?= $data['id'] ?>"><?= htmlspecialchars($data['title']) ?></a>
                <em>le <?= $data['creation_date_fr'] ?></em><?php
                if (isset($_SESSION['email'])) {


                    ?>
                    <p><a href="index.php?action=modifier-article&amp;id=<?= $data['id'] ?>">Modifier</a></p>
                <?php }
                ?>
            </h3>

            <?= $data['content'] ?> <!-- pas d htmlspecialchars pour la mise en forme -->
            <!--                <br/>-->
            <p class="text-right"><em><a
                            href="index.php?action=article&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
            </p>
        </div>

        <?php
    }

    if ($page >= 1) {
        ?>
        <a href="index.php?action=liste-articles&amp;page=<?= $page - 1 ?>">page précédente</a>
        <?php
    }
    if ($posts->rowCount() === 5) {
        ?> <a href="index.php?action=liste-articles&amp;page=<?= $page + 1 ?>">page suivante</a>
    <?php }
    ?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
