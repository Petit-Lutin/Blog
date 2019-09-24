<?php ob_start(); ?>
    <form action="index.php?action=updatePost&id=<?= $post['id']; ?>" method="post">

        <h2>Modifier un article</h2>

        <label for="title">Titre de l'article</label>

        <input type="text" name="title" id="title" maxlength="255" value="<?php echo $post['title'];?>" required>

        <label for="content">Contenu</label>
        <div id="tinyMCE">

            <textarea name="content" id="content" required><?= $post['content']; ?></textarea></div>

        <input type="submit" value="Enregistrer">


    </form>
<?php
$content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>