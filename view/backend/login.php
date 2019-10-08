<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Administration - blog</title>
</head>

<body>
<p>Pour administrer votre blog, veuillez saisir votre email et votre mot de passe :</p>
<form action="index.php?action=post-login" method="post">
    <div><label for="email">Votre email</label>
        <input type="email" name="email" required></div>
    <div><label for="password">Votre mot de passe</label>
        <input type="password" name="password" required/>
    </div>
    <input type="submit" value="Valider"/>
</form>

<div class="messageErreur">
<!--    --><?php //if (isset($message)) {
//        echo $message;
//    }; ?>
    <?= isset($message)? $message : '';?>
</div>

</body>
</html>

