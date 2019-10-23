<?php ob_start();
?>
    <div class="newEditPost container">
        <form action="index.php?action=add-post" method="post">

            <h2>Rédiger un nouvel article</h2>
            <div class="titlePost">
                <!--                <label for="title">Titre de l'article</label>-->
<!--                <input type="text" name="title" id="title" maxlength="255" placeholder="Titre de l'article" required>-->
                <input type="text" class="form-control" id="title" aria-describedby="titrearticle" placeholder="Titre de l'article" axlength="255" required>

            </div>

            <div class="contentPost">
                <!--                <label for="content">Contenu</label>-->
                <div id="tinyMCE">
<!--                    <textarea name="content" id="content"></textarea>-->
                    <textarea class="form-control" name="content" id="content"></textarea>
                </div>
            </div>
            <label for="slug">
                <button type="button" class="btn btn-secondary" title="" data-container="body" data-toggle="popover"
                        data-placement="bottom" data-content="Vivamus
              sagittis lacus vel augue laoreet rutrum faucibus." data-original-title="URL personnalisée"
                        aria-describedby="popover194453">
                    URL personnalisée
                </button>
                <br>

            </label>
            <input type="text" name="slug" id="slug" maxlength="255" required>
            <button class="btn btn-primary" type="submit">Enregistrer</button>

        </form>
    </div>
<?php
$content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>