<?php ob_start(); ?>
    <div class="newEditPost">
        <form action="index.php?action=addPost" method="post">

            <h2>Rédiger un nouvel article</h2>

            <label for="title">Titre de l'article</label>
            <input type="text" name="title" id="title" maxlength="255" required>

            <label for="content">Contenu</label>
            <div id="tinyMCE">
                <textarea name="content" id="content"></textarea>
            </div>

            <label for="slug">
                <button type="button" class="btn btn-secondary" title="" data-container="body" data-toggle="popover"
                        data-placement="bottom" data-content="Vivamus
              sagittis lacus vel augue laoreet rutrum faucibus." data-original-title="URL personnalisée"
                        aria-describedby="popover194453">
                    URL personnalisée
                </button>
            </label>
            <input type="text" name="slug" id="slug" maxlength="255" required>
            <input type="submit" value="Enregistrer">

        </form>
    </div>
<?php
$content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>