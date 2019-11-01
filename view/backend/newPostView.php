<?php ob_start();
?>
    <div class="newEditPost container">
        <form action="index.php?action=add-post" method="post">

            <h2>Rédiger un nouvel article</h2>
            <div class="titlePost">
                <input type="text" class="form-control text-primary" id="title" name="title"
                       aria-describedby="titrearticle"
                       placeholder="Titre de l'article" maxlength="255" required>

            </div>

            <div class="contentPost">
                <div id="tinyMCE">
                    <textarea class="form-control" name="content" id="content"></textarea>
                </div>
            </div>
            <br>

            <input type="text" name="slug" class="form-control text-primary"
                   placeholder="URL personnalisée de l'article sans espace ni accent, exemple : chapitre-3"
                   aria-describedby="URLpersonnalisée"
                   id="slug" maxlength="255" required>
            <br>
            <button class="btn btn-primary" type="submit">Enregistrer</button>

        </form>
    </div>
<?php
$content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>