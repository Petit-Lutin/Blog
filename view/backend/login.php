<?php $title = "Billet simple pour l'Alaska" ?>

<?php ob_start(); ?>

    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8"/>
            <title>Administration - blog</title>
        </head>

        <body>
            <div class="contenuPage jumbotron">
                <p><strong>Pour administrer votre blog, veuillez saisir votre email et votre mot de passe :</strong></p>
                <form action="index.php?action=post-login" method="post">
                    <div><label for="email">Votre email :</label>
                        <input type="email" name="email" required></div>
                    <div><label for="password">Votre mot de passe :</label>
                        <input type="password" name="password" required/>
                    </div>
                    <input class="btn btn-outline-primary" type="submit" value="Valider"/>
                </form>

                <div class="messageErreur">
                    <!--           si on a une erreur à la connexion, on la stylise ici-->
                    <?= isset($message) ? $message : ''; ?>
                </div>
            </div>
        </body>
    </html>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>