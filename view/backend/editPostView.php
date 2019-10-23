<?php ob_start(); ?>
    <div class="newEditPost">

        <form action="update-post&id=<?= $post['id']; ?>" method="post">

            <h2>Modifier un article</h2>
            <div class="titlePost">
                <input type="text" class="form-control text-primary" aria-describedby="titrearticle" name="title"
                       id="title"
                       maxlength="255" value="<?php echo $post['title']; ?>" required>
            </div>
            <div class="contentPost">

                <div id="tinyMCE">
                    <textarea name="content" class="form-control" id="content"
                              required><?= $post['content']; ?></textarea></div>

            </div>
            <label for="slug">

                URL personnalisée
                <button type="button" class="btn btn-secondary" title="URL personnalisée" data-container="body"
                        data-toggle="popover"
                        data-placement="bottom" data-content="Vivamus
              sagittis lacus vel augue laoreet rutrum faucibus." data-original-title="URL personnalisée"
                        aria-describedby="popover194453">
                    ?
                </button>
            </label>
            <input type="text" name="slug" id="slug" maxlength="255" value="<?php echo $post['slug']; ?>" required>
            
            <button class="btn btn-primary" type="submit">Enregistrer</button>

        </form>
    </div>

<?php
$content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>