<?php ob_start(); ?>
    <form action="index.php?action=addPost" method="post">

        <h2>Rédiger un nouvel article</h2>

        <label for="title">Titre de l'article</label>
        <input type="text" name="title" id="title" maxlength="255" required>

        <label for="content">Contenu</label>
        <div id="tinyMCE">
            <textarea name="content" id="content"></textarea>
        </div>

        <input type="submit" value="Enregistrer">

    </form>
<?php
$content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>