<?php $title = "Billet simple pour l'Alaska" ?>

<?php ob_start(); ?>
<div class="contenuPage">
    <p>Derniers billets du blog :</p>
    <?php
    if ($posts->rowCount() === 0) {
        echo 'vous êtes arrivé sur la dernière page';
    } ?>
    <?php
    //while ($data = $postsInfo['posts']->fetch()) //
    while ($data = $posts->fetch()) //
    {
        ?>
        <div class="news">
            <h3>
                <a href="index.php?action=article&amp;id=<?= $data['id'] ?>"><?= htmlspecialchars($data['title']) ?></a>
                <em>le <?= $data['creation_date_fr'] ?></em>
            </h3>
            <p><a href="index.php?action=modifier-article&amp;id=<?= $data['id'] ?>">Modifier</a></p>

            <p>
                <?= $data['content'] ?> <!-- pas d htmlspecialchars pour la mise en forme -->
                <br/>
                <em><a href="index.php?action=article&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
            </p>

        </div>


        <?php
    }







//    echo 'page actuelle : '. $page.' prev '.$previousPage.' next '.$nextPage;
//    $nextPage=$posts->nextpage($page);

//    if ( $_GET['page'] >=1) {
////        $previousPage=$page--;
    if ($page>=1){
    ?>
    <a href="index.php?action=liste-articles&amp;page=<?= $page-1 ?>">page précédente</a>
    <?php
    }
//
//    }
    if ($posts->rowCount() === 5) {

//        $nextPage=$page++;
        ?> <a href="index.php?action=liste-articles&amp;page=<?= $page+1 ?>">page suivante</a>
    <?php }
    // bouton page précédente (si $page>0, faire page-1 + bouton page suivante)
    ?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
