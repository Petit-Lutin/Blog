<?php ob_start(); ?>
    <div class="newEditPost">

        <form action="../index.php?action=update-post&id=<?= $post['id']; ?>" method="post">

            <h2>Modifier un article</h2>

            <div class="titlePost">
                <input type="text" class="form-control text-primary title" aria-describedby="titrearticle" name="title"
                       id="title"
                       maxlength="255" value="<?php echo $post['title']; ?>" required>
            </div>

            <div class="contentPost">
                <div id="tinyMCE">
                    <textarea name="content" class="form-control" id="content"
                              required><?= $post['content']; ?></textarea>
                </div>
            </div>
            <br>

            <input type="text" name="slug" class="form-control text-primary slug" aria-describedby="URLpersonnalisée"
                   id="slug" maxlength="255" value="<?php echo $post['slug']; ?>" required>
            <br>
            <button class="btn btn-primary formWithSlug" type="submit">Enregistrer</button>

        </form>
    </div>

    <script src="../public/js/Post.js"</script>

<?php
$content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>