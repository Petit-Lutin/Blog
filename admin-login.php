<?php
//if (!isset($_SESSION)){
//    session_start();
//}  ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Administration - blog</title>
</head>
<body>
<p>Pour administrer votre blog, veuillez saisir votre email et votre mot de passe :</p>
<form action="admin.php" method="post">

    <div><label for="email">Votre email</label>
        <input type="text" name="email" required></div>
    <div><label for="password">Votre mot de passe</label>
        <input type="password" name="password" required/>
    </div>
    <input type="submit" value="Valider"/>
</form>

</body>
</html>

